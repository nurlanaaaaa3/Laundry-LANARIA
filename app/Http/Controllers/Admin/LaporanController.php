<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function exportExcel(Request $request)
    {
        $dariTanggal = $request->query('dari', now()->startOfMonth()->format('Y-m-d'));
        $sampaiTanggal = $request->query('sampai', now()->format('Y-m-d'));

        $namaFile = 'laporan-laundria-' . $dariTanggal . '-sd-' . $sampaiTanggal . '.xlsx';

        return Excel::download(new LaporanExport($dariTanggal, $sampaiTanggal), $namaFile);
    }

    public function exportPdf(Request $request)
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

        $pdf = Pdf::loadView('admin.laporan.pdf', compact(
            'transaksi',
            'dariTanggal',
            'sampaiTanggal',
            'totalTransaksi',
            'totalPendapatan',
            'totalBelumLunas'
        ))->setPaper('a4', 'landscape');

        $namaFile = 'laporan-laundria-' . $dariTanggal . '-sd-' . $sampaiTanggal . '.pdf';

        return $pdf->download($namaFile);
    }
}