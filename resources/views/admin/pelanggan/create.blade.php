<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        @import url('');
        .form-card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; overflow:hidden; }
        .form-card-header { padding:18px 24px 14px; border-bottom:1px solid #F1F5F9; display:flex; align-items:center; gap:10px; }
        .form-card-header .icon-wrap { width:36px; height:36px; border-radius:10px; background:#EAF4FC; color:#07549A; display:flex; align-items:center; justify-content:center; font-size:16px; }
        .form-card-body { padding:24px; }
        .form-label { font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px; }
        .form-control, .form-select { border-radius:9px; border-color:#D1D5DB; font-size:13.5px; padding:10px 14px; }
        .form-control:focus, .form-select:focus { border-color:#07549A; box-shadow:0 0 0 3px rgba(7,84,154,0.1); }
        .section-divider { display:flex; align-items:center; gap:12px; margin:20px 0 16px; }
        .section-divider span { font-size:11.5px; font-weight:600; color:#94A3B8; text-transform:uppercase; letter-spacing:0.5px; white-space:nowrap; }
        .section-divider::before, .section-divider::after { content:""; flex:1; height:1px; background:#E5E7EB; }
        .btn-simpan { background:#07549A; color:#fff; border:none; border-radius:10px; font-size:14px; font-weight:600; padding:11px 28px; transition:all 0.2s; }
        .btn-simpan:hover { background:#063B70; color:#fff; transform:translateY(-1px); box-shadow:0 6px 16px rgba(7,84,154,0.3); }
        .btn-batal { border-radius:10px; font-size:14px; padding:11px 22px; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')
        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937;font-weight:600;">Tambah Pelanggan</h5>
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
                @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="border-radius:10px;font-size:13.5px;">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="icon-wrap"><i class="bi bi-person-plus"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Tambah Pelanggan Baru</div>
                            <div style="font-size:12px;color:#94A3B8;">Isi data pelanggan dengan lengkap</div>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <form method="POST" action="{{ route('admin.pelanggan.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-person me-1 text-primary"></i>Nama</label>
                                    <input type="text" name="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan') }}" placeholder="Nama lengkap" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-telephone me-1 text-primary"></i>No HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="08xx-xxxx-xxxx" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-geo-alt me-1 text-primary"></i>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            <div class="section-divider"><span><i class="bi bi-shield-lock me-1"></i>Akun Login</span></div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-at me-1 text-primary"></i>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Buat username" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-key me-1 text-primary"></i>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Buat password" required>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn-simpan"><i class="bi bi-check2-circle me-1"></i>Simpan</button>
                                <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline-secondary btn-batal">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
