<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - LAUNDRIA</title>
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

        .avatar-init {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #07549A, #1976B8);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
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
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Data Pelanggan</h5>
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
                            <i class="bi bi-people-fill me-2 text-primary"></i>Daftar Pelanggan
                        </span>
                        <a href="{{ route('admin.pelanggan.create') }}" class="btn-tambah">
                            <i class="bi bi-person-plus me-1"></i> Tambah Pelanggan
                        </a>
                    </div>

                    <div class="filter-bar">
                        <form method="GET" class="d-flex align-items-center gap-2 flex-wrap w-100">
                            <div class="input-group" style="max-width:360px;">
                                <span class="input-group-text" style="background:#fff; border-color:#D1D5DB; border-radius:8px 0 0 8px;">
                                    <i class="bi bi-search" style="font-size:13px; color:#94A3B8;"></i>
                                </span>
                                <input type="text" name="q" class="form-control"
                                    placeholder="Cari nama, no HP, atau username..."
                                    value="{{ $keyword }}"
                                    style="border-radius:0 8px 8px 0;">
                            </div>
                            <button type="submit" class="btn-cari">
                                <i class="bi bi-search me-1"></i> Cari
                            </button>
                            @if($keyword)
                                <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-sm" style="color:#64748B; font-size:13px;">Reset</a>
                            @endif
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-main mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $item)
                                <tr>
                                    <td style="color:#94A3B8; font-size:12px;">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-init">
                                                {{ strtoupper(substr($item->nama_pelanggan, 0, 1)) }}
                                            </div>
                                            <span style="font-weight:500;">{{ $item->nama_pelanggan }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-family:monospace; background:#F1F5F9; padding:3px 8px; border-radius:5px; font-size:12.5px; color:#475569;">
                                            {{ $item->username }}
                                        </span>
                                    </td>
                                    <td>
                                        <i class="bi bi-telephone me-1" style="color:#94A3B8; font-size:12px;"></i>
                                        {{ $item->no_hp ?? '-' }}
                                    </td>
                                    <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; color:#64748B;">
                                        {{ $item->alamat ?? '-' }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.pelanggan.edit', $item->id_pelanggan) }}" class="btn-edit">
                                                <i class="bi bi-pencil-square me-1"></i>Edit
                                            </a>
                                            <form method="POST" action="{{ route('admin.pelanggan.destroy', $item->id_pelanggan) }}"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-people" style="font-size:32px; color:#CBD5E1;"></i>
                                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada data pelanggan.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($pelanggan->hasPages())
                        <div class="px-4 py-3 border-top" style="border-color:#F1F5F9 !important;">
                            {{ $pelanggan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
