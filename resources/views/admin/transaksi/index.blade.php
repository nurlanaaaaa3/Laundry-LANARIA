<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .content-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 14px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
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
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Data Transaksi</h5>
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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div></div>
                    <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">+ Tambah Transaksi</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="content-card">
                    <form method="GET" class="mb-3 d-flex gap-2 flex-wrap">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="q" class="form-control" placeholder="Cari nama pelanggan" value="{{ $keyword }}">
                            <button type="submit" class="btn btn-outline-secondary">Cari</button>
                        </div>
                        <select name="status" class="form-select" style="max-width: 200px;" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="menunggu" {{ $status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ $status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="diambil" {{ $status == 'diambil' ? 'selected' : '' }}>Diambil</option>
                        </select>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
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
            </div>
        </div>
    </div>
</body>
</html>