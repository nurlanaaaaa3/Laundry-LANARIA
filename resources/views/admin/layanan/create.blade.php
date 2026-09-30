<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan - LAUNDRIA</title>
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
        <h4 class="mb-3">Tambah Layanan</h4>

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

            <form method="POST" action="{{ route('admin.layanan.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control" value="{{ old('nama_layanan') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}" placeholder="kg / pcs" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estimasi (jam)</label>
                    <input type="number" name="estimasi" class="form-control" value="{{ old('estimasi') }}" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan (opsional)</label>
                    <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>