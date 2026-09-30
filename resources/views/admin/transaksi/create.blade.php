<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .content-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 14px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .row-layanan { background: #EAF4FC; border-radius: 8px; padding: 12px; margin-bottom: 10px; }
        .total-box { background: #063B70; color: #FFFFFF; border-radius: 8px; padding: 16px; }
        .total-box .nominal { font-size: 24px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Tambah Transaksi</h5>
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
                <div class="content-card">
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.transaksi.store') }}" id="form-transaksi">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Pelanggan</label>
                            <select name="id_pelanggan" class="form-select" required>
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id_pelanggan }}">{{ $p->nama_pelanggan }} ({{ $p->no_hp }})</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="form-label">Layanan</label>
                        <div id="daftar-layanan"></div>
                        <button type="button" id="btn-tambah-layanan" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Baris Layanan</button>

                        <div class="mb-3">
                            <label class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" class="form-control" rows="2">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="total-box mb-3">
                            <div>Total</div>
                            <div class="nominal" id="total-display">Rp0</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dibayar (Rp)</label>
                            <input type="number" name="dibayar" id="input-dibayar" class="form-control" value="{{ old('dibayar', 0) }}" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <input type="text" id="display-kembalian" class="form-control" value="Rp0" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const daftarLayanan = @json($layanan);
    </script>
    <script src="{{ asset('js/transaksi-create.js') }}"></script>
</body>
</html>