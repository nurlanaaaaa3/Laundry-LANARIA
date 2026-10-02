<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dariTanggal = $request->query('dari', now()->startOfMonth()->format('Y-m-d'));
        $sampaiTanggal = $request->query('sampai', now()->format('Y-m-d'));

        $transaksi = Transaksi::with(['pelanggan', 'detailTransaksi.layanan'])
            ->whereDate('tanggal_masuk', '>=', $dariTanggal)
            ->whereDate('tanggal_masuk', '<=', $sampaiTanggal)
            ->orderBy('tanggal_masuk')
            ->get();

        $totalTransaksi = $transaksi->count();
        $totalPendapatan = $transaksi->where('status_pembayaran', 'lunas')->sum('total');
        $totalBelumLunas = $transaksi->where('status_pembayaran', 'belum_lunas')->sum('total');

        return view('admin.laporan.index', compact(
            'transaksi',
            'dariTanggal',
            'sampaiTanggal',
            'totalTransaksi',
            'totalPendapatan',
            'totalBelumLunas'
        ));
    }
}