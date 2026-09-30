<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8FAFC; font-family: 'Poppins', sans-serif; }
        .navbar-admin { background-color: #07549A; }
        .navbar-admin .navbar-brand { font-family: 'Playfair Display', serif; color: #FFFFFF !important; font-weight: 700; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .form-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 12px; padding: 24px; max-width: 100%; }
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
        <h4 class="mb-3">Edit Pelanggan</h4>

        <div class="form-card">
            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.pelanggan.update', $pelanggan->id_pelanggan) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username', $pelanggan->username) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password baru (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>