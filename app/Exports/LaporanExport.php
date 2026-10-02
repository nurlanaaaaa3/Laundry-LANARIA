<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $dariTanggal;
    protected $sampaiTanggal;

    public function __construct($dariTanggal, $sampaiTanggal)
    {
        $this->dariTanggal = $dariTanggal;
        $this->sampaiTanggal = $sampaiTanggal;
    }

    public function collection()
    {
        return Transaksi::with(['pelanggan', 'detailTransaksi.layanan'])
            ->whereDate('tanggal_masuk', '>=', $this->dariTanggal)
            ->whereDate('tanggal_masuk', '<=', $this->sampaiTanggal)
            ->orderBy('tanggal_masuk')
            ->get();
    }

    public function headings(): array
    {
        return ['No', 'Tanggal', 'Pelanggan', 'Layanan', 'Total', 'Status Bayar', 'Status Laundry'];
    }

    public function map($transaksi): array
    {
        static $no = 0;
        $no++;

        $layananList = $transaksi->detailTransaksi->map(function ($detail) {
            return $detail->layanan->nama_layanan ?? '-';
        })->implode(', ');

        return [
            $no,
            $transaksi->tanggal_masuk->format('d/m/Y H:i'),
            $transaksi->pelanggan->nama_pelanggan ?? '-',
            $layananList,
            $transaksi->total,
            $transaksi->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas',
            ucfirst($transaksi->status_laundry),
        ];
    }
}