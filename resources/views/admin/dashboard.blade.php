<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 24px;
            height: 100%;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12) !important;
        }
        .stat-card .card-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
        }
        .stat-card .card-label {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .stat-card .card-value {
            font-size: 30px;
            font-weight: 700;
            line-height: 1.1;
        }
        .stat-card .card-sub {
            font-size: 12px;
            margin-top: 6px;
            opacity: 0.75;
        }
        .stat-card .bg-shape {
            position: absolute;
            right: -18px;
            bottom: -18px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            opacity: 0.08;
            background: currentColor;
        }

        .card-blue {
            background: #EAF4FC;
            color: #07549A;
        }
        .card-blue .card-icon { background: #CBE5F7; color: #07549A; }

        .card-indigo {
            background: #EEF2FF;
            color: #4338CA;
        }
        .card-indigo .card-icon { background: #C7D2FE; color: #4338CA; }

        .card-green {
            background: #F0FDF4;
            color: #16A34A;
        }
        .card-green .card-icon { background: #BBF7D0; color: #16A34A; }

        .card-amber {
            background: #FFFBEB;
            color: #D97706;
        }
        .card-amber .card-icon { background: #FDE68A; color: #D97706; }

        .card-orange {
            background: #FFF7ED;
            color: #EA580C;
        }
        .card-orange .card-icon { background: #FED7AA; color: #EA580C; }

        .card-gradient {
            background: linear-gradient(135deg, #07549A 0%, #1976B8 100%);
            color: #FFFFFF;
        }
        .card-gradient .card-label { color: rgba(255,255,255,0.8); }
        .card-gradient .card-icon { background: rgba(255,255,255,0.18); color: #FFFFFF; }

        .section-title {
            font-size: 15px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 16px;
        }
        .table-recent th {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748B;
            border-bottom: 2px solid #E5E7EB;
            padding: 10px 16px;
            background: #F8FAFC;
        }
        .table-recent td {
            font-size: 13px;
            color: #374151;
            padding: 12px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-recent tbody tr:last-child td { border-bottom: none; }
        .table-recent tbody tr:hover td { background: #F8FAFC; }

        .badge-status {
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }
        .badge-menunggu  { background: #FEF9C3; color: #A16207; }
        .badge-diproses  { background: #DBEAFE; color: #1D4ED8; }
        .badge-selesai   { background: #DCFCE7; color: #15803D; }
        .badge-diambil   { background: #F0FDF4; color: #166534; }
        .badge-lunas     { background: #DCFCE7; color: #15803D; }
        .badge-belum     { background: #FEE2E2; color: #B91C1C; }

        .recent-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .recent-card-header {
            padding: 18px 20px 12px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div class="admin-wrapper">
    @include('admin.partials.sidebar')

    <div class="admin-content">
        <div class="admin-topbar">
            <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Dashboard</h5>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="user-name">{{ Auth::user()->nama }}</div>
                    <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-logout-sb">Logout</button>
                </form>
            </div>
        </div>

        <div class="p-4">

            <div class="row g-3 mb-3">
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-blue shadow-sm">
                        <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="card-label">Jumlah Pelanggan</div>
                        <div class="card-value">{{ $jumlahPelanggan }}</div>
                        <div class="card-sub">Total pelanggan terdaftar</div>
                        <div class="bg-shape"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-indigo shadow-sm">
                        <div class="card-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <div class="card-label">Jumlah Transaksi</div>
                        <div class="card-value">{{ $jumlahTransaksi }}</div>
                        <div class="card-sub">Semua transaksi</div>
                        <div class="bg-shape"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-gradient shadow-sm">
                        <div class="card-icon"><i class="bi bi-cash-coin"></i></div>
                        <div class="card-label">Total Pendapatan</div>
                        <div class="card-value" style="font-size:22px;">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                        <div class="card-sub">Dari transaksi lunas</div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-amber shadow-sm">
                        <div class="card-icon"><i class="bi bi-hourglass-split"></i></div>
                        <div class="card-label">Transaksi Menunggu</div>
                        <div class="card-value">{{ $transaksiMenunggu }}</div>
                        <div class="card-sub">Belum diproses</div>
                        <div class="bg-shape"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-blue shadow-sm">
                        <div class="card-icon"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="card-label">Transaksi Diproses</div>
                        <div class="card-value">{{ $transaksiDiproses }}</div>
                        <div class="card-sub">Sedang dikerjakan</div>
                        <div class="bg-shape"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card card-green shadow-sm">
                        <div class="card-icon"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="card-label">Transaksi Selesai</div>
                        <div class="card-value">{{ $transaksiSelesai }}</div>
                        <div class="card-sub">Siap diambil</div>
                        <div class="bg-shape"></div>
                    </div>
                </div>
            </div>

            <div class="recent-card">
                <div class="recent-card-header">
                    <span class="section-title mb-0">
                        <i class="bi bi-clock-history me-2 text-primary"></i>Transaksi Terbaru
                    </span>
                    <a href="{{ route('admin.transaksi.index') }}" class="btn btn-sm" style="font-size:12px; color:#07549A; font-weight:500;">
                        Lihat semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-recent mb-0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksiTerbaru as $t)
                            <tr>
                                <td><span style="font-weight:600; color:#07549A;">{{ $t->kode_transaksi }}</span></td>
                                <td>{{ $t->pelanggan->nama_pelanggan ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($t->tanggal_masuk)->format('d M Y') }}</td>
                                <td>Rp{{ number_format($t->total, 0, ',', '.') }}</td>
                                <td>
                                    @if($t->status_pembayaran === 'lunas')
                                        <span class="badge-status badge-lunas">Lunas</span>
                                    @else
                                        <span class="badge-status badge-belum">Belum Lunas</span>
                                    @endif
                                </td>
                                <td>
                                    @if($t->status_laundry === 'menunggu')
                                        <span class="badge-status badge-menunggu">Menunggu</span>
                                    @elseif($t->status_laundry === 'diproses')
                                        <span class="badge-status badge-diproses">Diproses</span>
                                    @elseif($t->status_laundry === 'selesai')
                                        <span class="badge-status badge-selesai">Selesai</span>
                                    @else
                                        <span class="badge-status badge-diambil">Diambil</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted" style="font-size:13px;">
                                    <i class="bi bi-inbox me-2"></i>Belum ada transaksi
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
