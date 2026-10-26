<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .main-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .main-card-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .filter-bar {
            background: #F8FAFC;
            border-bottom: 1px solid #E5E7EB;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .filter-bar .form-control {
            border-radius: 8px;
            border-color: #D1D5DB;
            font-size: 13px;
        }
        .filter-bar .form-control:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }

        .table-main th {
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
        .table-main td {
            font-size: 13px;
            color: #374151;
            padding: 13px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }
        .table-main tbody tr:last-child td { border-bottom: none; }
        .table-main tbody tr:hover td { background: #F8FAFC; }

        .badge-aktif {
            background: #DCFCE7;
            color: #15803D;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
        }
        .badge-nonaktif {
            background: #F1F5F9;
            color: #64748B;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
        }

        .chip-satuan {
            background: #EAF4FC;
            color: #07549A;
            font-size: 11.5px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 6px;
        }

        .btn-tambah {
            background: #07549A; color: #fff; border: none;
            border-radius: 10px; font-size: 13.5px; font-weight: 600;
            padding: 9px 20px; text-decoration: none; transition: all 0.2s;
        }
        .btn-tambah:hover { background: #063B70; color: #fff; transform: translateY(-1px); }

        .btn-cari {
            background: #07549A; color: #fff; border: none;
            border-radius: 8px; font-size: 13px; font-weight: 600;
            padding: 8px 16px; transition: 0.15s;
        }
        .btn-cari:hover { background: #063B70; color: #fff; }

        .btn-edit {
            background: #EAF4FC; color: #07549A;
            border: 1px solid #CBE5F7; border-radius: 7px;
            font-size: 12px; font-weight: 600; padding: 5px 12px;
            text-decoration: none; transition: all 0.15s;
        }
        .btn-edit:hover { background: #CBE5F7; color: #063B70; }

        .btn-hapus {
            background: #FEF2F2; color: #DC2626;
            border: 1px solid #FECACA; border-radius: 7px;
            font-size: 12px; font-weight: 600; padding: 5px 12px;
            transition: all 0.15s;
        }
        .btn-hapus:hover { background: #FEE2E2; color: #B91C1C; }

        /* Ikon layanan */
        .layanan-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: #EAF4FC;
            color: #07549A;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }
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

                @if (session('success'))
                    <div class="alert alert-success mb-3" style="border-radius:10px; font-size:13.5px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="main-card">
                    <div class="main-card-header">
                        <span style="font-size:15px; font-weight:600; color:#1F2937;">
                            <i class="bi bi-basket2-fill me-2 text-primary"></i>Daftar Layanan
                        </span>
                        <a href="{{ route('admin.layanan.create') }}" class="btn-tambah">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
                        </a>
                    </div>

                    <div class="filter-bar">
                        <form method="GET" class="d-flex align-items-center gap-2 flex-wrap w-100">
                            <div class="input-group" style="max-width:360px;">
                                <span class="input-group-text" style="background:#fff; border-color:#D1D5DB; border-radius:8px 0 0 8px;">
                                    <i class="bi bi-search" style="font-size:13px; color:#94A3B8;"></i>
                                </span>
                                <input type="text" name="q" class="form-control"
                                    placeholder="Cari nama layanan..."
                                    value="{{ $keyword }}"
                                    style="border-radius:0 8px 8px 0;">
                            </div>
                            <button type="submit" class="btn-cari">
                                <i class="bi bi-search me-1"></i> Cari
                            </button>
                            @if($keyword)
                                <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm" style="color:#64748B; font-size:13px;">Reset</a>
                            @endif
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-main mb-0">
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
                                    <td style="color:#94A3B8; font-size:12px;">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="layanan-icon">
                                                <i class="bi bi-stars"></i>
                                            </div>
                                            <div>
                                                <div style="font-weight:600;">{{ $item->nama_layanan }}</div>
                                                @if($item->keterangan)
                                                    <div style="font-size:11.5px; color:#94A3B8; margin-top:1px;">
                                                        {{ Str::limit($item->keterangan, 50) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td style="font-weight:600; color:#07549A;">
                                        Rp{{ number_format($item->harga, 0, ',', '.') }}
                                    </td>
                                    <td><span class="chip-satuan">{{ $item->satuan }}</span></td>
                                    <td>
                                        <i class="bi bi-clock me-1" style="color:#94A3B8; font-size:12px;"></i>
                                        {{ $item->estimasi }} jam
                                    </td>
                                    <td>
                                        @if($item->status)
                                            <span class="badge-aktif">
                                                <i class="bi bi-check-circle me-1"></i>Aktif
                                            </span>
                                        @else
                                            <span class="badge-nonaktif">
                                                <i class="bi bi-dash-circle me-1"></i>Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.layanan.edit', $item->id_layanan) }}" class="btn-edit">
                                                <i class="bi bi-pencil-square me-1"></i>Edit
                                            </a>
                                            <form method="POST" action="{{ route('admin.layanan.destroy', $item->id_layanan) }}"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus layanan ini?')">
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
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-basket2" style="font-size:32px; color:#CBD5E1;"></i>
                                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada data layanan.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($layanan->hasPages())
                        <div class="px-4 py-3 border-top" style="border-color:#F1F5F9 !important;">
                            {{ $layanan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
