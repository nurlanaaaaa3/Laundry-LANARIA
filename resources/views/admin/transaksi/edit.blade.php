<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .form-card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; overflow:hidden; margin-bottom:20px; }
        .form-card-header { padding:18px 24px 14px; border-bottom:1px solid #F1F5F9; display:flex; align-items:center; gap:10px; }
        .form-card-header .icon-wrap { width:36px; height:36px; border-radius:10px; background:#EAF4FC; color:#07549A; display:flex; align-items:center; justify-content:center; font-size:16px; }
        .form-card-body { padding:24px; }
        .form-label { font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px; }
        .form-control, .form-select { border-radius:9px; border-color:#D1D5DB; font-size:13.5px; padding:10px 14px; }
        .form-control:focus, .form-select:focus { border-color:#07549A; box-shadow:0 0 0 3px rgba(7,84,154,0.1); }
        .input-group-text { border-color:#D1D5DB; background:#F8FAFC; font-size:13px; color:#64748B; }

        /* Info pelanggan */
        .info-pelanggan { background:linear-gradient(135deg,#07549A,#1976B8); border-radius:14px; padding:20px 24px; color:#fff; display:flex; align-items:center; gap:16px; margin-bottom:20px; }
        .info-avatar { width:48px; height:48px; border-radius:13px; background:rgba(255,255,255,.2); display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700; flex-shrink:0; }
        .info-pelanggan .info-name { font-size:16px; font-weight:700; margin-bottom:2px; }
        .info-pelanggan .info-meta { font-size:12.5px; opacity:.8; }
        .kode-trx { display:inline-flex; align-items:center; gap:6px; background:rgba(255,255,255,.18); border-radius:20px; padding:4px 12px; font-size:12.5px; font-weight:600; margin-top:8px; }

        /* Tabel detail */
        .table-detail th { font-size:11.5px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#64748B; background:#F8FAFC; border-bottom:2px solid #E5E7EB; padding:10px 14px; }
        .table-detail td { font-size:13px; color:#374151; padding:12px 14px; border-bottom:1px solid #F1F5F9; vertical-align:middle; }
        .table-detail tfoot th { font-size:14px; font-weight:700; color:#07549A; background:#EAF4FC; padding:12px 14px; border-top:2px solid #CBE5F7; }

        .badge-pill { font-size:11.5px; font-weight:600; padding:4px 11px; border-radius:20px; white-space:nowrap; }
        .badge-menunggu { background:#FEF08A; color:#713F12; }
        .badge-diproses { background:#2563EB; color:#fff; }
        .badge-selesai  { background:#16A34A; color:#fff; }
        .badge-diambil  { background:#0F766E; color:#fff; }

        .btn-simpan { background:#07549A; color:#fff; border:none; border-radius:10px; font-size:14px; font-weight:600; padding:11px 28px; transition:all 0.2s; }
        .btn-simpan:hover { background:#063B70; color:#fff; transform:translateY(-1px); box-shadow:0 6px 16px rgba(7,84,154,0.3); }
        .btn-batal { border-radius:10px; font-size:14px; padding:11px 22px; }
        .section-divider { display:flex; align-items:center; gap:12px; margin:4px 0 16px; }
        .section-divider span { font-size:11.5px; font-weight:600; color:#94A3B8; text-transform:uppercase; letter-spacing:0.5px; white-space:nowrap; }
        .section-divider::before, .section-divider::after { content:""; flex:1; height:1px; background:#E5E7EB; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')
        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937;font-weight:600;">Kelola Transaksi</h5>
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

                <div class="info-pelanggan">
                    <div class="info-avatar">{{ strtoupper(substr($transaksi->pelanggan->nama_pelanggan ?? 'P', 0, 1)) }}</div>
                    <div>
                        <div class="info-name">{{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</div>
                        <div class="info-meta"><i class="bi bi-telephone me-1"></i>{{ $transaksi->pelanggan->no_hp ?? '-' }} &nbsp;·&nbsp; <i class="bi bi-calendar me-1"></i>{{ $transaksi->tanggal_masuk->format('d M Y, H:i') }}</div>
                        <div class="kode-trx"><i class="bi bi-hash"></i>{{ $transaksi->kode_transaksi }}</div>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-card-header">
                        <div class="icon-wrap"><i class="bi bi-basket2"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Detail Layanan</div>
                            <div style="font-size:12px;color:#94A3B8;">Rincian layanan yang dipesan</div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-detail mb-0">
                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi->detailTransaksi as $detail)
                                <tr>
                                    <td style="font-weight:500;">{{ $detail->layanan->nama_layanan ?? '-' }}</td>
                                    <td>{{ $detail->jumlah }} <span style="color:#94A3B8;font-size:12px;">{{ $detail->layanan->satuan ?? '' }}</span></td>
                                    <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td style="font-weight:600;color:#07549A;">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total</th>
                                    <th>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="border-radius:10px;font-size:13.5px;">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <div class="form-card">
                    <div class="form-card-header">
                        <div class="icon-wrap"><i class="bi bi-pencil-square"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Update Status & Pembayaran</div>
                            <div style="font-size:12px;color:#94A3B8;">Ubah status laundry dan pembayaran</div>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <form method="POST" action="{{ route('admin.transaksi.update', $transaksi->id_transaksi) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-arrow-repeat me-1 text-primary"></i>Status Laundry</label>
                                    <select name="status_laundry" class="form-select" required>
                                        <option value="menunggu"  {{ $transaksi->status_laundry == 'menunggu'  ? 'selected' : '' }}>⏳ Menunggu</option>
                                        <option value="diproses"  {{ $transaksi->status_laundry == 'diproses'  ? 'selected' : '' }}>🔄 Diproses</option>
                                        <option value="selesai"   {{ $transaksi->status_laundry == 'selesai'   ? 'selected' : '' }}>✅ Selesai</option>
                                        <option value="diambil"   {{ $transaksi->status_laundry == 'diambil'   ? 'selected' : '' }}>📦 Diambil</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-credit-card me-1 text-primary"></i>Status Pembayaran</label>
                                    <select name="status_pembayaran" class="form-select" required>
                                        <option value="belum_lunas" {{ $transaksi->status_pembayaran == 'belum_lunas' ? 'selected' : '' }}>❌ Belum Lunas</option>
                                        <option value="lunas"       {{ $transaksi->status_pembayaran == 'lunas'       ? 'selected' : '' }}>✅ Lunas</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label"><i class="bi bi-cash me-1 text-primary"></i>Dibayar (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius:9px 0 0 9px;">Rp</span>
                                        <input type="number" name="dibayar" class="form-control" value="{{ old('dibayar', $transaksi->dibayar) }}" min="0" required style="border-radius:0 9px 9px 0;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-chat-left-text me-1 text-primary"></i>Catatan</label>
                                    <textarea name="catatan" class="form-control" rows="2">{{ old('catatan', $transaksi->catatan) }}</textarea>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn-simpan"><i class="bi bi-check2-circle me-1"></i>Update</button>
                                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-outline-secondary btn-batal">Kembali</a>
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
