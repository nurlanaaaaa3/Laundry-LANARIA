<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .card-stat {
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            padding: 22px;
            background: #FFFFFF;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .card-stat .label {
            color: #64748B;
            font-size: 13px;
            margin-bottom: 8px;
        }
        .card-stat .value {
            color: #063B70;
            font-size: 28px;
            font-weight: 700;
        }
        .card-stat .accent-bar {
            width: 36px;
            height: 4px;
            border-radius: 4px;
            background-color: #07549A;
            margin-bottom: 12px;
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
                <div class="row g-3">
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Jumlah Pelanggan</div>
                            <div class="value">{{ $jumlahPelanggan }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Jumlah Transaksi</div>
                            <div class="value">{{ $jumlahTransaksi }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Total Pendapatan</div>
                            <div class="value">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Transaksi Menunggu</div>
                            <div class="value">{{ $transaksiMenunggu }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Transaksi Diproses</div>
                            <div class="value">{{ $transaksiDiproses }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-stat">
                            <div class="accent-bar"></div>
                            <div class="label">Transaksi Selesai</div>
                            <div class="value">{{ $transaksiSelesai }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>