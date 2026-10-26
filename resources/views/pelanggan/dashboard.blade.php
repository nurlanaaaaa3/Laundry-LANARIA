<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan - LAUNDRIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        .stat-card {
            border-radius: 16px;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(7,84,154,0.13) !important;
        }
        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }
        .stat-label {
            font-size: 12.5px;
            font-weight: 500;
            margin-bottom: 4px;
        }
        .stat-value {
            font-size: 26px;
            font-weight: 700;
            line-height: 1.1;
        }

        .card-gradient {
            background: linear-gradient(135deg, #07549A, #1976B8);
            color: #fff;
        }
        .card-gradient .stat-label  { color: rgba(255,255,255,.8); }
        .card-gradient .stat-icon   { background: rgba(255,255,255,.18); color: #fff; }

        .card-blue {
            background: #EAF4FC;
            color: #07549A;
        }
        .card-blue .stat-label { color: #1976B8; }
        .card-blue .stat-icon  { background: #CBE5F7; color: #07549A; }

        .card-green {
            background: #F0FDF4;
            color: #16A34A;
        }
        .card-green .stat-label { color: #15803D; }
        .card-green .stat-icon  { background: #BBF7D0; color: #16A34A; }

        .card-amber {
            background: #FFFBEB;
            color: #D97706;
        }
        .card-amber .stat-label { color: #B45309; }
        .card-amber .stat-icon  { background: #FDE68A; color: #D97706; }

        .welcome-banner {
            background: linear-gradient(135deg, #063B70 0%, #07549A 60%, #1976B8 100%);
            border-radius: 18px;
            padding: 28px 32px;
            color: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .welcome-banner::after {
            content: "";
            position: absolute;
            right: -40px;
            top: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .welcome-banner::before {
            content: "";
            position: absolute;
            right: 60px;
            bottom: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .welcome-banner h5 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .welcome-banner p {
            font-size: 13.5px;
            opacity: .85;
            margin: 0;
        }
        .btn-pesan {
            background: #fff;
            color: #063B70;
            font-weight: 700;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            padding: 10px 22px;
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-pesan:hover {
            background: #EAF4FC;
            color: #063B70;
            transform: translateY(-1px);
        }

        .riwayat-card {
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .riwayat-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .riwayat-title {
            font-size: 15px;
            font-weight: 600;
            color: #1F2937;
            margin: 0;
        }
        .table-riwayat th {
            font-size: 11.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748B;
            background: #F8FAFC;
            border-bottom: 2px solid #E5E7EB;
            padding: 11px 16px;
        }
        .table-riwayat td {
            font-size: 13px;
            color: #374151;
            padding: 13px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-riwayat tbody tr:last-child td { border-bottom: none; }
        .table-riwayat tbody tr:hover td { background: #F8FAFC; }

        .kode-trx {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 6px;
            background: #EAF4FC;
            color: #063B70;
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 12.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-pill {
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
            white-space: nowrap;
        }
        .badge-menunggu  { background: #FEF08A; color: #713F12; }
        .badge-diproses  { background: #2563EB; color: #FFFFFF; }
        .badge-selesai   { background: #16A34A; color: #FFFFFF; }
        .badge-diambil   { background: #0F766E; color: #FFFFFF; }
        .badge-lunas     { background: #16A34A; color: #FFFFFF; }
        .badge-belum     { background: #DC2626; color: #FFFFFF; }

        .layanan-list {
            font-size: 12.5px;
            color: #475569;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <div class="p-wrapper">
        @include('pelanggan.partials.sidebar')

        <div class="p-content">
            <div class="p-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Dashboard</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-name">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout-p">Logout</button>
                    </form>
                </div>
            </div>

            <div class="p-4">

                @if (session('success'))
                    <div class="alert alert-success mb-3" style="border-radius:10px; font-size:13.5px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="welcome-banner">
                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                        <div>
                            <h5>Halo, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}! 👋</h5>
                            <p>Selamat datang di LAUNDRIA. Pantau status pesanan atau buat pesanan baru di sini.</p>
                        </div>
                        <a href="{{ route('booking.create') }}" class="btn-pesan">
                            <i class="bi bi-plus-circle me-1"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>

                @php
                    $totalPesanan   = $transaksi->count();
                    $menunggu       = $transaksi->where('status_laundry', 'menunggu')->count();
                    $diproses       = $transaksi->where('status_laundry', 'diproses')->count();
                    $selesai        = $transaksi->whereIn('status_laundry', ['selesai','diambil'])->count();
                @endphp
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="stat-card card-gradient shadow-sm">
                            <div class="stat-icon"><i class="bi bi-receipt-cutoff"></i></div>
                            <div>
                                <div class="stat-label">Total Pesanan</div>
                                <div class="stat-value">{{ $totalPesanan }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card card-amber shadow-sm">
                            <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                            <div>
                                <div class="stat-label">Menunggu</div>
                                <div class="stat-value">{{ $menunggu }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card card-blue shadow-sm">
                            <div class="stat-icon"><i class="bi bi-arrow-repeat"></i></div>
                            <div>
                                <div class="stat-label">Diproses</div>
                                <div class="stat-value">{{ $diproses }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card card-green shadow-sm">
                            <div class="stat-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <div>
                                <div class="stat-label">Selesai</div>
                                <div class="stat-value">{{ $selesai }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="riwayat-card">
                    <div class="riwayat-header">
                        <p class="riwayat-title">
                            <i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Pesanan
                        </p>
                        <span style="font-size:12px; color:#64748B;">{{ $totalPesanan }} pesanan</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-riwayat mb-0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Layanan</th>
                                    <th>Total</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksi as $item)
                                <tr>
                                    <td><span class="kode-trx">{{ $item->kode_transaksi ?? '-' }}</span></td>
                                    <td>{{ $item->tanggal_masuk->format('d M Y') }}<br>
                                        <span style="font-size:11.5px; color:#94A3B8;">{{ $item->tanggal_masuk->format('H:i') }}</span>
                                    </td>
                                    <td>
                                        <div class="layanan-list">
                                            @foreach ($item->detailTransaksi as $detail)
                                                <span>{{ $detail->layanan->nama_layanan ?? '-' }}
                                                    <span style="color:#94A3B8;">({{ $detail->jumlah }})</span>
                                                </span>@if (!$loop->last)<br>@endif
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
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size:32px; color:#CBD5E1;"></i>
                                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada pesanan.</p>
                                        <a href="{{ route('booking.create') }}" class="btn btn-sm mt-2"
                                            style="background:#EAF4FC; color:#07549A; font-weight:600; border-radius:8px;">
                                            Buat Pesanan Pertama
                                        </a>
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
