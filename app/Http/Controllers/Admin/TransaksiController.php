<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $transaksi = Transaksi::with(['pelanggan', 'user'])
            ->when($keyword, function ($query, $keyword) {
                $query->whereHas('pelanggan', function ($q) use ($keyword) {
                    $q->where('nama_pelanggan', 'like', "%{$keyword}%");
                });
            })
            ->orderByDesc('id_transaksi')
            ->paginate(10)
            ->withQueryString();
        
        return view('admin.transaksi.index', compact('transaksi', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::orderBy('nama_pelanggan')->get();
        $layanan = Layanan::where('status', 1)->orderBy('nama_layanan')->get();

        return view('admin.transaksi.create', compact('pelanggan', 'layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'catatan' => 'nullable|string',
            'dibayar' => 'required|integer|min:0',
            'layanan' => 'required|array|min:1',
            'layanan.*.id_layanan' => 'required|exists:layanan,id_layanan',
            'layanan.*.jumlah' => 'required|numeric|min:0.1',
        ]);

        DB::transaction(function () use ($data) {
            $total = 0;
            $detailData = [];

            foreach ($data['layanan'] as $item) {
                $layanan = Layanan::findOrFail($item['id_layanan']);
                $subtotal = $layanan->harga * $item['jumlah'];
                $total += $subtotal;

                $detailData[] = [
                    'id_layanan' => $layanan->id_layanan,
                    'jumlah' => $item['jumlah'],
                    'harga' => $layanan->harga,
                    'subtotal' => $subtotal,
    ];
}

            $dibayar = $data['dibayar'];
            $kembalian = max(0, $dibayar - $total);
            $statusPembayaran = $dibayar >= $total ? 'lunas' : 'belum_lunas';

            $transaksi = Transaksi::create([
                'id_pelanggan' => $data['id_pelanggan'],
                'id_user' => auth()->id(),
                'tanggal_masuk' => now(),
                'total' => $total,
                'dibayar' => $dibayar,
                'kembalian' => $kembalian,
                'status_pembayaran' => $statusPembayaran,
                'status_laundry' => 'menunggu',
                'catatan' => $data['catatan'] ?? null,
            ]);

            foreach ($detailData as $detail) {
                $detail['id_transaksi'] = $transaksi->id_transaksi;
                DetailTransaksi::create($detail);
            }
        });

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $transaksi->load('detailTransaksi.layanan', 'pelanggan');

        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'status_laundry' => 'required|in:menunggu,diproses,selesai,diambil',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
            'dibayar' => 'required|integer|min:0',
            'catatan' => 'nullable|string',
        ]);

        $kembalian = max(0, $data['dibayar'] - $transaksi->total);

        $tanggalSelesai = $transaksi->tanggal_selesai;
        if (in_array($data['status_laundry'], ['selesai', 'diambil']) && !$tanggalSelesai) {
            $tanggalSelesai = now();
        }

        $transaksi->update([
            'status_laundry' => $data['status_laundry'],
            'status_pembayaran' => $data['status_pembayaran'],
            'dibayar' => $data['dibayar'],
            'kembalian' => $kembalian,
            'catatan' => $data['catatan'] ?? null,
            'tanggal_selesai' => $tanggalSelesai,
        ]);

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        DB::transaction(function () use ($transaksi) {
            $transaksi->detailTransaksi()->delete();
            $transaksi->delete();
        });

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
