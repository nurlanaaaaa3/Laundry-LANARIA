<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        // Pendapatan 6 bulan terakhir
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

        // Jumlah transaksi per status
        $statusLabels = ['Menunggu', 'Diproses', 'Selesai', 'Diambil'];
        $statusData   = [
            Transaksi::where('status_laundry', 'menunggu')->count(),
            Transaksi::where('status_laundry', 'diproses')->count(),
            Transaksi::where('status_laundry', 'selesai')->count(),
            Transaksi::where('status_laundry', 'diambil')->count(),
        ];

        // Transaksi per hari 7 hari terakhir
        $hariLabels = [];
        $hariData   = [];
        for ($i = 6; $i >= 0; $i--) {
            $hari = Carbon::now()->subDays($i);
            $hariLabels[] = $hari->translatedFormat('D, d M');
            $hariData[]   = Transaksi::whereDate('tanggal_masuk', $hari->toDateString())->count();
        }

        return view('admin.statistik', compact(
            'bulanLabels', 'bulanData',
            'statusLabels', 'statusData',
            'hariLabels', 'hariData'
        ));
    }
}
