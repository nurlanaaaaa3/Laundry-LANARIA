<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .trx-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .trx-card-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .table-trx th {
            font-size: 11.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748B;
            background: #F8FAFC;
            border-bottom: 2px solid #E5E7EB;
            padding: 11px 14px;
            white-space: nowrap;
        }
        .table-trx td {
            font-size: 13px;
            color: #374151;
            padding: 13px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-trx tbody tr:last-child td { border-bottom: none; }
        .table-trx tbody tr:hover td { background: #F8FAFC; }

        .kode-trx {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 6px;
            background: #EAF4FC;
            color: #063B70;
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 12.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-pill {
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
            white-space: nowrap;
        }
        .badge-menunggu  { background: #FEF08A; color: #713F12; }
        .badge-diproses  { background: #2563EB; color: #FFFFFF; }
        .badge-selesai   { background: #16A34A; color: #FFFFFF; }
        .badge-diambil   { background: #0F766E; color: #FFFFFF; }
        .badge-lunas     { background: #16A34A; color: #FFFFFF; }
        .badge-belum     { background: #DC2626; color: #FFFFFF; }

        .filter-bar {
            background: #F8FAFC;
            border-bottom: 1px solid #E5E7EB;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .filter-bar .form-control,
        .filter-bar .form-select {
            border-radius: 8px;
            border-color: #D1D5DB;
            font-size: 13px;
        }
        .filter-bar .form-control:focus,
        .filter-bar .form-select:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }
        .btn-cari {
            background: #07549A;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 16px;
            transition: 0.15s;
        }
        .btn-cari:hover { background: #063B70; color: #fff; }

        .btn-kelola {
            background: #EAF4FC;
            color: #07549A;
            border: 1px solid #CBE5F7;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 12px;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-kelola:hover { background: #CBE5F7; color: #063B70; }
        .btn-hapus {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FECACA;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 12px;
            transition: all 0.15s;
        }
        .btn-hapus:hover { background: #FEE2E2; color: #B91C1C; }

        .btn-tambah {
            background: #07549A;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 600;
            padding: 9px 20px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-tambah:hover { background: #063B70; color: #fff; transform: translateY(-1px); }
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

                @if (session('success'))
                    <div class="alert alert-success mb-3" style="border-radius:10px; font-size:13.5px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="trx-card">
                    <div class="trx-card-header">
                        <span style="font-size:15px; font-weight:600; color:#1F2937;">
                            <i class="bi bi-receipt-cutoff me-2 text-primary"></i>Daftar Transaksi
                        </span>
                        <a href="{{ route('admin.transaksi.create') }}" class="btn-tambah">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Transaksi
                        </a>
                    </div>

                    <div class="filter-bar">
                        <form method="GET" class="d-flex align-items-center gap-2 flex-wrap w-100">
                            <div class="input-group" style="max-width:320px;">
                                <span class="input-group-text" style="background:#fff; border-color:#D1D5DB; border-radius:8px 0 0 8px;">
                                    <i class="bi bi-search" style="font-size:13px; color:#94A3B8;"></i>
                                </span>
                                <input type="text" name="q" class="form-control"
                                    placeholder="Cari kode atau nama pelanggan..."
                                    value="{{ $keyword }}"
                                    style="border-radius:0 8px 8px 0;">
                            </div>
                            <select name="status" class="form-select" style="max-width:180px;" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="menunggu" {{ $status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai"  {{ $status == 'selesai'  ? 'selected' : '' }}>Selesai</option>
                                <option value="diambil"  {{ $status == 'diambil'  ? 'selected' : '' }}>Diambil</option>
                            </select>
                            <button type="submit" class="btn-cari">
                                <i class="bi bi-search me-1"></i> Cari
                            </button>
                            @if($keyword || $status)
                                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-sm"
                                    style="color:#64748B; font-size:13px;">Reset</a>
                            @endif
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-trx mb-0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Total</th>
                                    <th>Pembayaran</th>
                                    <th>Status Laundry</th>
                                    <th>Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksi as $item)
                                <tr>
                                    <td><span class="kode-trx">{{ $item->kode_transaksi ?? '-' }}</span></td>
                                    <td style="font-weight:500;">{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                                    <td>
                                        {{ $item->tanggal_masuk->format('d M Y') }}<br>
                                        <span style="font-size:11.5px; color:#94A3B8;">{{ $item->tanggal_masuk->format('H:i') }}</span>
                                    </td>
                                    <td style="font-weight:600; color:#07549A;">
                                        Rp{{ number_format($item->total, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($item->status_pembayaran === 'lunas')
                                            <span class="badge-pill badge-lunas">Lunas</span>
                                        @else
                                            <span class="badge-pill badge-belum">Belum Lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status_laundry === 'menunggu')
                                            <span class="badge-pill badge-menunggu">Menunggu</span>
                                        @elseif($item->status_laundry === 'diproses')
                                            <span class="badge-pill badge-diproses">Diproses</span>
                                        @elseif($item->status_laundry === 'selesai')
                                            <span class="badge-pill badge-selesai">Selesai</span>
                                        @else
                                            <span class="badge-pill badge-diambil">Diambil</span>
                                        @endif
                                    </td>
                                    <td style="color:#64748B; font-size:12.5px;">{{ $item->user->nama ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1 flex-wrap">
                                            <a href="{{ route('admin.transaksi.edit', $item->id_transaksi) }}" class="btn-kelola">
                                                <i class="bi bi-pencil-square me-1"></i>Kelola
                                            </a>
                                            <form method="POST" action="{{ route('admin.transaksi.destroy', $item->id_transaksi) }}"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-hapus">
                                                    <i class="bi bi-trash3 me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size:32px; color:#CBD5E1;"></i>
                                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada data transaksi.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($transaksi->hasPages())
                        <div class="px-4 py-3 border-top" style="border-color:#F1F5F9 !important;">
                            {{ $transaksi->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
