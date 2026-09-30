<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function dashboard()
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $transaksi = Transaksi::with('detailTransaksi.layanan')
            ->where('id_pelanggan', $pelanggan->id_pelanggan)
            ->orderByDesc('id_transaksi')
            ->get();
            
            return view('pelanggan.dashboard', compact('transaksi'));
    }
    
    public function create()
    {
        $layanan = Layanan::where('status', 1)->orderBy('nama_layanan')->get();

        return view('pelanggan.booking', compact('layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'catatan' => 'nullable|string',
            'layanan' => 'required|array|min:1',
            'layanan.*.id_layanan' => 'required|exists:layanan,id_layanan',
            'layanan.*.jumlah' => 'required|numeric|min:0.1',
        ]);

        $idPelanggan = Auth::guard('pelanggan')->id();

        DB::transaction(function () use ($data, $idPelanggan) {
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

            $transaksi = Transaksi::create([
                'id_pelanggan' => $idPelanggan,
                'id_user' => null,
                'tanggal_masuk' => now(),
                'total' => $total,
                'dibayar' => 0,
                'kembalian' => 0,
                'status_pembayaran' => 'belum_lunas',
                'status_laundry' => 'menunggu',
                'catatan' => $data['catatan'] ?? null,
            ]);

            foreach ($detailData as $detail) {
                $detail['id_transaksi'] = $transaksi->id_transaksi;
                DetailTransaksi::create($detail);
            }
        });

        return redirect()->route('pelanggan.dashboard')
            ->with('success', 'Pesanan berhasil dibuat. Silakan antar pakaian Anda ke LAUNDRIA.');
    }
}