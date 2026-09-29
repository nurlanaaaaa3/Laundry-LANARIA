<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8FAFC; font-family: 'Poppins', sans-serif; }
        .navbar-admin { background-color: #07549A; }
        .navbar-admin .navbar-brand { font-family: 'Playfair Display', serif; color: #FFFFFF !important; font-weight: 700; }
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
    <nav class="navbar navbar-admin">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0">Admin LAUNDRIA</span>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data Transaksi</h4>
            <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">+ Tambah Transaksi</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" class="mb-3" style="max-width: 350px;">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari nama pelanggan" value="{{ $keyword }}">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Masuk</th>
                        <th>Total</th>
                        <th>Status Bayar</th>
                        <th>Status Laundry</th>
                        <th>Kasir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $item)
                        <tr>
                            <td>{{ $item->id_transaksi }}</td>
                            <td>{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                            <td>{{ $item->tanggal_masuk->format('d/m/Y H:i') }}</td>
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
                            <td>{{ $item->user->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.transaksi.edit', $item->id_transaksi) }}" class="btn btn-sm btn-outline-primary">Kelola</a>
                                <form method="POST" action="{{ route('admin.transaksi.destroy', $item->id_transaksi) }}" class="d-inline" onsubmit="return confirm('Yakin hapus transaksi ini beserta detailnya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $transaksi->links() }}
    </div>
</body>
</html>