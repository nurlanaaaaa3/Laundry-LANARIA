<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Layanan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .content-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 14px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        table thead { background-color: #EAF4FC; }
        .badge-aktif { background-color: #1976B8; }
        .badge-nonaktif { background-color: #94A3B8; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Data Layanan</h5>
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
                    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">+ Tambah Layanan</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="content-card">
                    <form method="GET" class="mb-3" style="max-width: 350px;">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari nama layanan" value="{{ $keyword }}">
                            <button type="submit" class="btn btn-outline-secondary">Cari</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Estimasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($layanan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_layanan }}</td>
                                        <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->estimasi }} jam</td>
                                        <td>
                                            @if ($item->status)
                                                <span class="badge badge-aktif">Aktif</span>
                                            @else
                                                <span class="badge badge-nonaktif">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.layanan.edit', $item->id_layanan) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <form method="POST" action="{{ route('admin.layanan.destroy', $item->id_layanan) }}" class="d-inline" onsubmit="return confirm('Yakin hapus layanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data layanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $layanan->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>