<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi - LAUNDRIA</title>
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
        .input-group-text { border-color:#D1D5DB; background:#F8FAFC; font-size:13px; color:#64748B; }

        .row-layanan { background:#F8FAFC; border:1px solid #E5E7EB; border-radius:12px; padding:14px 16px; margin-bottom:10px; transition:border-color 0.15s; }
        .row-layanan:hover { border-color:#07549A; }
        .row-layanan .select-layanan, .row-layanan .input-jumlah { border-radius:8px; border-color:#D1D5DB; font-size:13px; }
        .row-layanan .select-layanan:focus, .row-layanan .input-jumlah:focus { border-color:#07549A; box-shadow:0 0 0 3px rgba(7,84,154,0.1); }
        .subtotal-text { font-weight:600; font-size:14px; color:#07549A; }
        .btn-hapus-baris { width:32px; height:32px; padding:0; border-radius:8px; border:1px solid #FECACA; background:#FEF2F2; color:#DC2626; font-size:16px; line-height:1; transition:all 0.15s; }
        .btn-hapus-baris:hover { background:#FEE2E2; color:#B91C1C; }
        .btn-tambah { background:#EAF4FC; color:#07549A; border:1.5px dashed #7FB0EA; border-radius:10px; font-size:13.5px; font-weight:600; padding:10px 18px; transition:all 0.15s; width:100%; }
        .btn-tambah:hover { background:#D6ECF8; border-color:#07549A; color:#063B70; }
        .satuan-label { font-size:11.5px; color:#94A3B8; margin-top:3px; }

        .total-box { background:linear-gradient(135deg,#07549A,#1976B8); color:#fff; border-radius:14px; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; gap:12px; }
        .total-box .total-label { font-size:13px; opacity:.85; margin-bottom:4px; }
        .total-box .nominal { font-size:26px; font-weight:700; line-height:1.1; }
        .total-box .total-icon { width:48px; height:48px; background:rgba(255,255,255,.15); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; }

        .kembalian-box { background:#F0FDF4; border:1px solid #BBF7D0; border-radius:12px; padding:16px 20px; display:flex; align-items:center; justify-content:space-between; }
        .kembalian-box .km-label { font-size:13px; color:#15803D; font-weight:500; }
        .kembalian-box .km-value { font-size:20px; font-weight:700; color:#16A34A; }

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
                <h5 class="mb-0" style="color:#1F2937;font-weight:600;">Tambah Transaksi</h5>
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
                        <div class="icon-wrap"><i class="bi bi-receipt-cutoff"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Tambah Transaksi Baru</div>
                            <div style="font-size:12px;color:#94A3B8;">Input data transaksi pelanggan</div>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <form method="POST" action="{{ route('admin.transaksi.store') }}" id="form-transaksi">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-person me-1 text-primary"></i>Pelanggan</label>
                                <select name="id_pelanggan" class="form-select" required>
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @foreach ($pelanggan as $p)
                                        <option value="{{ $p->id_pelanggan }}" {{ old('id_pelanggan') == $p->id_pelanggan ? 'selected' : '' }}>
                                            {{ $p->nama_pelanggan }} ({{ $p->no_hp }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="section-divider"><span><i class="bi bi-basket2 me-1"></i>Pilih Layanan</span></div>
                            <div id="daftar-layanan"></div>
                            <button type="button" id="btn-tambah-layanan" class="btn-tambah mb-4">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Baris Layanan
                            </button>

                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-chat-left-text me-1 text-primary"></i>Catatan <span style="font-weight:400;color:#94A3B8;">(opsional)</span></label>
                                <textarea name="catatan" class="form-control" rows="2" placeholder="Catatan khusus untuk pesanan ini...">{{ old('catatan') }}</textarea>
                            </div>

                            <div class="total-box mb-3">
                                <div>
                                    <div class="total-label">Total</div>
                                    <div class="nominal" id="total-display">Rp0</div>
                                </div>
                                <div class="total-icon"><i class="bi bi-cash-coin"></i></div>
                            </div>

                            <div class="section-divider"><span><i class="bi bi-wallet2 me-1"></i>Pembayaran</span></div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-cash me-1 text-primary"></i>Dibayar (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius:9px 0 0 9px;">Rp</span>
                                        <input type="number" name="dibayar" id="input-dibayar" class="form-control" value="{{ old('dibayar', 0) }}" min="0" required style="border-radius:0 9px 9px 0;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-arrow-return-left me-1 text-primary"></i>Kembalian</label>
                                    <div class="kembalian-box">
                                        <span class="km-label">Kembalian</span>
                                        <span class="km-value" id="display-kembalian">Rp0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn-simpan"><i class="bi bi-check2-circle me-1"></i>Simpan Transaksi</button>
                                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-outline-secondary btn-batal">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>const daftarLayanan = @json($layanan);</script>
    <script src="{{ asset('js/transaksi-create.js') }}"></script>
</body>
</html>
