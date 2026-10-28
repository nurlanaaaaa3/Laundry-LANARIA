<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .form-card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; overflow:hidden; }
        .form-card-header { padding:18px 24px 14px; border-bottom:1px solid #F1F5F9; display:flex; align-items:center; gap:10px; }
        .form-card-header .icon-wrap { width:36px; height:36px; border-radius:10px; background:#EAF4FC; color:#07549A; display:flex; align-items:center; justify-content:center; font-size:16px; }
        .form-card-body { padding:24px; }
        .form-label { font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px; }
        .form-control, .form-select { border-radius:9px; border-color:#D1D5DB; font-size:13.5px; padding:10px 14px; }
        .form-control:focus, .form-select:focus { border-color:#07549A; box-shadow:0 0 0 3px rgba(7,84,154,0.1); }
        .input-group-text { border-radius:9px 0 0 9px; border-color:#D1D5DB; background:#F8FAFC; font-size:13px; color:#64748B; }
        .input-group .form-control { border-radius:0 9px 9px 0; }
        .hint { font-size:11.5px; color:#94A3B8; margin-top:5px; }
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
                <h5 class="mb-0" style="color:#1F2937;font-weight:600;">Tambah Layanan</h5>
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
                        <div class="icon-wrap"><i class="bi bi-plus-circle"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Tambah Layanan Baru</div>
                            <div style="font-size:12px;color:#94A3B8;">Isi detail layanan laundry</div>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <form method="POST" action="{{ route('admin.layanan.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-tag me-1 text-primary"></i>Nama Layanan</label>
                                    <input type="text" name="nama_layanan" class="form-control" value="{{ old('nama_layanan') }}" placeholder="Contoh: Cuci & Setrika" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-cash me-1 text-primary"></i>Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" placeholder="0" min="0" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-rulers me-1 text-primary"></i>Satuan</label>
                                    <select name="satuan" class="form-select" required>
                                        <option value="">-- Pilih Satuan --</option>
                                        <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>kg (Kilogram)</option>
                                        <option value="pcs" {{ old('satuan') == 'pcs' ? 'selected' : '' }}>pcs (Per item)</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-clock me-1 text-primary"></i>Estimasi Selesai</label>
                                    <div class="input-group">
                                        <input type="number" name="estimasi" class="form-control" value="{{ old('estimasi') }}" placeholder="24" min="1" required style="border-radius:9px 0 0 9px;">
                                        <span class="input-group-text" style="border-radius:0 9px 9px 0;">jam</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-toggle-on me-1 text-primary"></i>Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="1" {{ old('status','1') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-card-text me-1 text-primary"></i>Keterangan <span style="font-weight:400;color:#94A3B8;">(opsional)</span></label>
                                    <textarea name="keterangan" class="form-control" rows="2" placeholder="Deskripsi singkat layanan ini...">{{ old('keterangan') }}</textarea>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn-simpan"><i class="bi bi-check2-circle me-1"></i>Simpan</button>
                                <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary btn-batal">Batal</a>
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
