<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi - LAUNDRIA</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #1F2937; }
        h2 { color: #063B70; margin-bottom: 4px; }
        p.sub { color: #64748B; margin-top: 0; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #E5E7EB; padding: 6px 8px; text-align: left; }
        th { background-color: #EAF4FC; color: #063B70; }
        .text-end { text-align: right; }
        .summary { margin-bottom: 16px; }
        .summary td { border: none; padding: 2px 8px; }
    </style>
</head>
<body>
    <h2>LAUNDRIA - Laporan Transaksi</h2>
    <p class="sub">Periode: {{ \Carbon\Carbon::parse($dariTanggal)->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse($sampaiTanggal)->format('d/m/Y') }}</p>

    <table class="summary">
        <tr>
            <td><strong>Jumlah Transaksi</strong></td>
            <td>: {{ $totalTransaksi }}</td>
        </tr>
        <tr>
            <td><strong>Pendapatan (Lunas)</strong></td>
            <td>: Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Belum Lunas</strong></td>
            <td>: Rp{{ number_format($totalBelumLunas, 0, ',', '.') }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Layanan</th>
                <th class="text-end">Total</th>
                <th>Status Bayar</th>
                <th>Status Laundry</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $item)
                <tr>
                    <td>{{ $item->id_transaksi }}</td>
                    <td>{{ $item->tanggal_masuk->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                    <td>
                        @foreach ($item->detailTransaksi as $detail)
                            {{ $detail->layanan->nama_layanan ?? '-' }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="text-end">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                    <td>{{ $item->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas' }}</td>
                    <td>{{ ucfirst($item->status_laundry) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data pada rentang tanggal ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>