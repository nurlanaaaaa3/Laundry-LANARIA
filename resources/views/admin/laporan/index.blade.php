<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .filter-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            padding: 22px 24px;
            margin-bottom: 20px;
        }
        .filter-card .form-label {
            font-size: 12.5px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .filter-card .form-control {
            border-radius: 8px;
            border-color: #D1D5DB;
            font-size: 13.5px;
        }
        .filter-card .form-control:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }
        .btn-tampil {
            background: #07549A;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            padding: 9px 20px;
            transition: 0.15s;
        }
        .btn-tampil:hover { background: #063B70; color: #fff; }

        .btn-excel {
            background: #F0FDF4;
            color: #15803D;
            border: 1px solid #BBF7D0;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 18px;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-excel:hover { background: #DCFCE7; color: #166534; }

        .btn-pdf {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FECACA;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 18px;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-pdf:hover { background: #FEE2E2; color: #B91C1C; }

        .stat-card {
            border-radius: 16px;
            padding: 22px 24px;
            height: 100%;
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 24px rgba(7,84,154,0.12) !important; }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            margin-bottom: 14px;
        }
        .stat-label { font-size: 12.5px; font-weight: 500; margin-bottom: 5px; }
        .stat-value { font-size: 24px; font-weight: 700; line-height: 1.1; }

        .card-gradient {
            background: linear-gradient(135deg, #07549A, #1976B8);
            color: #fff;
        }
        .card-gradient .stat-label { color: rgba(255,255,255,.8); }
        .card-gradient .stat-icon  { background: rgba(255,255,255,.18); color: #fff; }

        .card-green {
            background: #F0FDF4; color: #15803D;
        }
        .card-green .stat-label { color: #166534; }
        .card-green .stat-icon  { background: #BBF7D0; color: #16A34A; }

        .card-red {
            background: #FEF2F2; color: #DC2626;
        }
        .card-red .stat-label { color: #B91C1C; }
        .card-red .stat-icon  { background: #FECACA; color: #DC2626; }

        .laporan-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .laporan-card-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-laporan th {
            font-size: 11.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748B;
            background: #F8FAFC;
            border-bottom: 2px solid #E5E7EB;
            padding: 11px 14px;
            white-space: nowrap;
        }
        .table-laporan td {
            font-size: 13px;
            color: #374151;
            padding: 13px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-laporan tbody tr:last-child td { border-bottom: none; }
        .table-laporan tbody tr:hover td { background: #F8FAFC; }

        .badge-pill {
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
            white-space: nowrap;
        }
        .badge-menunggu { background: #FEF08A; color: #713F12; }
        .badge-diproses { background: #2563EB; color: #FFFFFF; }
        .badge-selesai  { background: #16A34A; color: #FFFFFF; }
        .badge-diambil  { background: #0F766E; color: #FFFFFF; }
        .badge-lunas    { background: #16A34A; color: #FFFFFF; }
        .badge-belum    { background: #DC2626; color: #FFFFFF; }

        .layanan-list { font-size: 12px; color: #475569; line-height: 1.7; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            @include('admin.partials.topbar', ['title' => 'Laporan'])

            <div class="p-4">

                <div class="filter-card">
                    <form method="GET" class="row g-3 align-items-end">
                        <div class="col-auto">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control" value="{{ $dariTanggal }}">
                        </div>
                        <div class="col-auto">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control" value="{{ $sampaiTanggal }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn-tampil">
                                <i class="bi bi-funnel me-1"></i> Tampilkan
                            </button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.laporan.export-excel', ['dari' => $dariTanggal, 'sampai' => $sampaiTanggal]) }}"
                                class="btn-excel">
                                <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.laporan.export-pdf', ['dari' => $dariTanggal, 'sampai' => $sampaiTanggal]) }}"
                                class="btn-pdf">
                                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
                            </a>
                        </div>
                    </form>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="stat-card card-gradient shadow-sm">
                            <div class="stat-icon"><i class="bi bi-receipt-cutoff"></i></div>
                            <div class="stat-label">Jumlah Transaksi</div>
                            <div class="stat-value">{{ $totalTransaksi }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card card-green shadow-sm">
                            <div class="stat-icon"><i class="bi bi-cash-coin"></i></div>
                            <div class="stat-label">Pendapatan (Lunas)</div>
                            <div class="stat-value" style="font-size:18px;">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card card-red shadow-sm">
                            <div class="stat-icon"><i class="bi bi-clock-history"></i></div>
                            <div class="stat-label">Belum Lunas</div>
                            <div class="stat-value" style="font-size:18px;">Rp{{ number_format($totalBelumLunas, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <div class="laporan-card">
                    <div class="laporan-card-header">
                        <span style="font-size:15px; font-weight:600; color:#1F2937;">
                            <i class="bi bi-table me-2 text-primary"></i>
                            Detail Transaksi
                            <span style="font-size:12px; color:#64748B; font-weight:400; margin-left:8px;">
                                {{ $dariTanggal }} s/d {{ $sampaiTanggal }}
                            </span>
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-laporan mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Layanan</th>
                                    <th>Total</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksi as $i => $item)
                                <tr>
                                    <td style="color:#94A3B8; font-size:12px;">{{ $i + 1 }}</td>
                                    <td>
                                        {{ $item->tanggal_masuk->format('d M Y') }}<br>
                                        <span style="font-size:11.5px; color:#94A3B8;">{{ $item->tanggal_masuk->format('H:i') }}</span>
                                    </td>
                                    <td style="font-weight:500;">{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                                    <td>
                                        <div class="layanan-list">
                                            @foreach ($item->detailTransaksi as $detail)
                                                {{ $detail->layanan->nama_layanan ?? '-' }}@if (!$loop->last), @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td style="font-weight:600; color:#07549A;">
                                        Rp{{ number_format($item->total, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($item->status_pembayaran === 'lunas')
                                            <span class="badge-pill badge-lunas">Lunas</span>
                                        @else
                                            <span class="badge-pill badge-belum">Belum Lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status_laundry === 'menunggu')
                                            <span class="badge-pill badge-menunggu">Menunggu</span>
                                        @elseif($item->status_laundry === 'diproses')
                                            <span class="badge-pill badge-diproses">Diproses</span>
                                        @elseif($item->status_laundry === 'selesai')
                                            <span class="badge-pill badge-selesai">Selesai</span>
                                        @else
                                            <span class="badge-pill badge-diambil">Diambil</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size:32px; color:#CBD5E1;"></i>
                                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">
                                            Tidak ada data pada rentang tanggal ini.
                                        </p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
