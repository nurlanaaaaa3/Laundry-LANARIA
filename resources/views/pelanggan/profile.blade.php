<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .avatar-wrap {
            width: 88px;
            height: 88px;
            border-radius: 24px;
            background: linear-gradient(135deg, #07549A, #1976B8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 8px 24px rgba(7,84,154,0.3);
        }

        /* ── Info card ── */
        .profile-info-card {
            background: linear-gradient(135deg, #07549A 0%, #1976B8 100%);
            border-radius: 18px;
            padding: 28px;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }
        .profile-info-card::after {
            content: "";
            position: absolute;
            right: -30px; top: -30px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .profile-info-card .pname {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .profile-info-card .pusername {
            font-size: 13px;
            opacity: .8;
            margin-bottom: 10px;
        }
        .info-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .info-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(255,255,255,.18);
            border-radius: 20px;
            padding: 4px 11px;
            font-size: 12px;
            font-weight: 500;
        }

        /* ── Form card ── */
        .form-card {
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }
        .form-card-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-card-header .icon-wrap {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: #EAF4FC;
            color: #07549A;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
        }
        .form-card-body { padding: 24px; }

        .form-label {
            font-size: 12.5px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-control, .form-control-textarea {
            border-radius: 9px;
            border-color: #D1D5DB;
            font-size: 13.5px;
            padding: 10px 14px;
        }
        .form-control:focus, textarea.form-control:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }

        .section-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 20px;
        }
        .section-divider span {
            font-size: 12px;
            font-weight: 600;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        .section-divider::before,
        .section-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #E5E7EB;
        }

        .btn-simpan {
            background: #07549A;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            padding: 11px 28px;
            transition: all 0.2s;
        }
        .btn-simpan:hover {
            background: #063B70;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(7,84,154,0.3);
        }

        @media (max-width: 575px) {
            .profile-info-card { flex-direction: column; text-align: center; }
            .info-chips { justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="p-wrapper">
        @include('pelanggan.partials.sidebar')

        <div class="p-content">
            <div class="p-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Profil Saya</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-name">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout-p">Logout</button>
                    </form>
                </div>
            </div>

            <div class="p-4">

                @if (session('success'))
                    <div class="alert alert-success mb-4" style="border-radius:10px; font-size:13.5px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mb-4" style="border-radius:10px; font-size:13.5px;">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="profile-info-card">
                    <div class="avatar-wrap">
                        {{ strtoupper(substr($pelanggan->nama_pelanggan, 0, 1)) }}
                    </div>
                    <div>
                        <div class="pname">{{ $pelanggan->nama_pelanggan }}</div>
                        <div class="info-chips">
                            @if($pelanggan->no_hp)
                                <span class="info-chip">
                                    <i class="bi bi-telephone"></i> {{ $pelanggan->no_hp }}
                                </span>
                            @endif
                            @if($pelanggan->alamat)
                                <span class="info-chip">
                                    <i class="bi bi-geo-alt"></i> {{ Str::limit($pelanggan->alamat, 30) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-card-header">
                        <div class="icon-wrap"><i class="bi bi-person-gear"></i></div>
                        <div>
                            <div style="font-size:15px; font-weight:600; color:#1F2937;">Edit Profil</div>
                            <div style="font-size:12px; color:#94A3B8;">Perbarui informasi akun pelanggan</div>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <form method="POST" action="{{ route('pelanggan.profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">
                                        <i class="bi bi-person me-1 text-primary"></i> Nama Lengkap
                                    </label>
                                    <input type="text" name="nama_pelanggan" class="form-control"
                                        value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">
                                        <i class="bi bi-telephone me-1 text-primary"></i> No HP
                                    </label>
                                    <input type="text" name="no_hp" class="form-control"
                                        value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">
                                        <i class="bi bi-at me-1 text-primary"></i> Username
                                    </label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ old('username', $pelanggan->username) }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">
                                        <i class="bi bi-geo-alt me-1 text-primary"></i> Alamat
                                    </label>
                                    <textarea name="alamat" class="form-control" rows="2"
                                        required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                                </div>
                            </div>

                            <div class="section-divider">
                                <span><i class="bi bi-lock me-1"></i> Ganti Password</span>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-key me-1 text-primary"></i> Password Baru
                                    <span style="font-weight:400; color:#94A3B8;">(opsional)</span>
                                </label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Kosongkan jika tidak ingin mengubah">
                                <div style="font-size:12px; color:#94A3B8; margin-top:5px;">
                                    <i class="bi bi-info-circle me-1"></i>Minimal 6 karakter
                                </div>
                            </div>

                            <button type="submit" class="btn-simpan">
                                <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
