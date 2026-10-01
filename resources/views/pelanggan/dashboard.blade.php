<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="text-muted mb-0">Berikut riwayat pesanan Anda</p>
                    <a href="{{ route('booking.create') }}" class="btn btn-primary" style="background-color:#07549A; border-color:#07549A;">+ Pesan Sekarang</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="content-card">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
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
            </div>
        </div>
    </div>
</body>
</html>