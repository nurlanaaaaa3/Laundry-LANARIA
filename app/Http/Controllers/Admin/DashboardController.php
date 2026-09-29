<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahTransaksi = Transaksi::count();

        $transaksiMenunggu = Transaksi::where('status_laundry', 'menunggu')->count();
        $transaksiDiproses = Transaksi::where('status_laundry', 'diproses')->count();
        $transaksiSelesai = Transaksi::where('status_laundry', 'selesai')->count();

        $totalPendapatan = Transaksi::where('status_pembayaran', 'lunas')->sum('total');

        return view('admin.dashboard', compact(
            'jumlahPelanggan',
            'jumlahTransaksi',
            'transaksiMenunggu',
            'transaksiDiproses',
            'transaksiSelesai',
            'totalPendapatan'
        ));
    }
}
