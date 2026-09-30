<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8FAFC; font-family: 'Poppins', sans-serif; }
        .navbar-p { background-color: #07549A; }
        .navbar-p .navbar-brand { font-family: 'Playfair Display', serif; color: #FFFFFF !important; font-weight: 700; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        table thead { background-color: #EAF4FC; }
        .badge-menunggu { background-color: #94A3B8; }
        .badge-diproses { background-color: #1976B8; }
        .badge-selesai { background-color: #16A34A; }
        .badge-diambil { background-color: #063B70; }
        .badge-lunas { background-color: #16A34A; }
        .badge-belum_lunas { background-color: #DC2626; }
    </style>
</head>
<body>
    <nav class="navbar navbar-p">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0">LAUNDRIA</span>
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1">Halo, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</h4>
                <p class="text-muted mb-0">Berikut riwayat pesanan Anda</p>
            </div>
            <a href="{{ route('booking.create') }}" class="btn btn-primary">+ Pesan Sekarang</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
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
                            <td>
                                @foreach ($item->detailTransaksi as $detail)
                                    {{ $detail->layanan->nama_layanan ?? '-' }} ({{ $detail->jumlah }})@if (!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status_pembayaran }}">
                                    {{ $item->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $item->status_laundry }}">
                                    {{ ucfirst($item->status_laundry) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>