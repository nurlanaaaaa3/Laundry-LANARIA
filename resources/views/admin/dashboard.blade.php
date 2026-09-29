<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #F8FAFC;
            font-family: 'Poppins', sans-serif;
        }
        .navbar-admin {
            background-color: #07549A;
        }
        .navbar-admin .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #FFFFFF !important;
            font-weight: 700;
        }
        .card-stat {
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 20px;
            background: #FFFFFF;
            height: 100%;
        }
        .card-stat .label {
            color: #64748B;
            font-size: 13px;
            margin-bottom: 6px;
        }
        .card-stat .value {
            color: #063B70;
            font-size: 26px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-admin">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0">Admin LAUNDRIA</span>
            <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <h4 class="mb-1">Dashboard</h4>
        <p class="text-muted mb-4">Selamat datang, {{ Auth::user()->nama }} ({{ Auth::user()->role }})</p>

        <div class="row g-3">
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Jumlah Pelanggan</div>
                    <div class="value">{{ $jumlahPelanggan }}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Jumlah Transaksi</div>
                    <div class="value">{{ $jumlahTransaksi }}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Total Pendapatan</div>
                    <div class="value">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Transaksi Menunggu</div>
                    <div class="value">{{ $transaksiMenunggu }}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Transaksi Diproses</div>
                    <div class="value">{{ $transaksiDiproses }}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card-stat">
                    <div class="label">Transaksi Selesai</div>
                    <div class="value">{{ $transaksiSelesai }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>