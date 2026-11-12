<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        $transaksiTerbaru = Transaksi::with('pelanggan')
            ->latest('tanggal_masuk')
            ->take(5)
            ->get();

        // Grafik pendapatan 6 bulan terakhir
        $bulanLabels = [];
        $bulanData   = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $bulanLabels[] = $bulan->translatedFormat('M Y');
            $bulanData[]   = Transaksi::where('status_pembayaran', 'lunas')
                ->whereYear('tanggal_masuk', $bulan->year)
                ->whereMonth('tanggal_masuk', $bulan->month)
                ->sum('total');
        }

        return view('admin.dashboard', compact(
            'jumlahPelanggan',
            'jumlahTransaksi',
            'transaksiMenunggu',
            'transaksiDiproses',
            'transaksiSelesai',
            'totalPendapatan',
            'transaksiTerbaru',
            'bulanLabels',
            'bulanData'
        ));
    }
}
