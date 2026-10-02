<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin-theme.css') }}" rel="stylesheet">
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            @include('admin.partials.topbar', ['title' => 'Laporan'])

            <div class="p-4">
                <div class="content-card mb-3">
                    <form method="GET" class="row g-2 align-items-end">
                        <div class="col-auto">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control" value="{{ $dariTanggal }}">
                        </div>
                        <div class="col-auto">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control" value="{{ $sampaiTanggal }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.laporan.export-excel', ['dari' => $dariTanggal, 'sampai' => $sampaiTanggal]) }}" class="btn btn-outline-primary">Export Excel</a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.laporan.export-pdf', ['dari' => $dariTanggal, 'sampai' => $sampaiTanggal]) }}" class="btn btn-outline-danger">Export PDF</a>
                        </div>
                    </form>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Jumlah Transaksi</div>
                            <div class="value">{{ $totalTransaksi }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Pendapatan (Lunas)</div>
                            <div class="value">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Belum Lunas</div>
                            <div class="value">Rp{{ number_format($totalBelumLunas, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Layanan</th>
                                    <th>Total</th>
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
                                        <td>Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                        <td>{{ $item->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas' }}</td>
                                        <td>{{ ucfirst($item->status_laundry) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Tidak ada data pada rentang tanggal ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>