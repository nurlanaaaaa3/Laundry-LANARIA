<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .lacak-banner {
            background: linear-gradient(135deg, #07549A, #1976B8);
            border-radius: 18px;
            padding: 32px;
            color: #fff;
            text-align: center;
            margin-bottom: 24px;
        }
        .lacak-banner h4 { font-size: 22px; font-weight: 700; margin-bottom: 8px; }
        .lacak-banner p { font-size: 14px; opacity: .85; margin: 0; }

        .lacak-card {
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 24px;
        }

        .form-control {
            border-radius: 10px;
            border-color: #D1D5DB;
            font-size: 14px;
            padding: 12px 16px;
            font-family: ui-monospace, monospace;
            letter-spacing: 1px;
        }
        .form-control:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }
        .btn-lacak {
            background: #07549A; color: #fff;
            border: none; border-radius: 10px;
            font-size: 14px; font-weight: 600;
            padding: 12px 28px; transition: all 0.2s;
            width: 100%;
        }
        .btn-lacak:hover { background: #063B70; color: #fff; transform: translateY(-1px); }

        /* Daftar pesanan */
        .pesanan-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 16px;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: all 0.15s;
            text-decoration: none;
        }
        .pesanan-item:hover {
            border-color: #07549A;
            background: #F8FAFC;
        }
        .pesanan-kode {
            font-family: ui-monospace, monospace;
            font-size: 14px;
            font-weight: 700;
            color: #07549A;
            background: #EAF4FC;
            padding: 4px 10px;
            border-radius: 6px;
        }
        .pesanan-info { font-size: 12.5px; color: #64748B; margin-top: 3px; }
        .badge-pill { font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px; }
        .badge-menunggu { background: #FEF08A; color: #713F12; }
        .badge-diproses  { background: #2563EB; color: #fff; }
        .badge-selesai   { background: #16A34A; color: #fff; }
        .badge-diambil   { background: #0F766E; color: #fff; }
    </style>
</head>
<body>
    <div class="p-wrapper">
        @include('pelanggan.partials.sidebar')

        <div class="p-content">
            <div class="p-topbar">
                <h5 class="mb-0" style="color:#1F2937;font-weight:600;">Lacak Pesanan</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-name">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout-p">Logout</button>
                    </form>
                </div>
            </div>

            <div class="p-4">

                {{-- Banner --}}
                <div class="lacak-banner">
                    <i class="bi bi-search" style="font-size:32px; margin-bottom:12px; display:block;"></i>
                    <h4>Lacak Status Pesanan</h4>
                    <p>Masukkan kode pesanan atau pilih dari daftar di bawah</p>
                </div>

                {{-- Form cari kode --}}
                <div class="lacak-card">
                    <label style="font-size:13px;font-weight:600;color:#374151;margin-bottom:8px;display:block;">
                        <i class="bi bi-hash me-1 text-primary"></i>Masukkan Kode Pesanan
                    </label>
                    <div class="d-flex gap-2">
                        <input type="text" id="input-kode" class="form-control" placeholder="Contoh: LDR-001" maxlength="10">
                        <button onclick="cariPesanan()" class="btn-lacak" style="width:auto;white-space:nowrap;">
                            <i class="bi bi-search me-1"></i> Lacak
                        </button>
                    </div>
                </div>

                {{-- Daftar pesanan --}}
                <div class="lacak-card">
                    <div style="font-size:14px;font-weight:600;color:#1F2937;margin-bottom:16px;">
                        <i class="bi bi-clock-history me-2 text-primary"></i>Semua Pesanan Saya
                    </div>
                    @forelse($transaksi as $item)
                    <a href="{{ route('pelanggan.lacak', $item->kode_transaksi) }}" class="pesanan-item">
                        <div>
                            <span class="pesanan-kode">{{ $item->kode_transaksi }}</span>
                            <div class="pesanan-info">
                                {{ $item->tanggal_masuk->format('d M Y') }} ·
                                Rp{{ number_format($item->total, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            @if($item->status_laundry === 'menunggu')
                                <span class="badge-pill badge-menunggu">Menunggu</span>
                            @elseif($item->status_laundry === 'diproses')
                                <span class="badge-pill badge-diproses">Diproses</span>
                            @elseif($item->status_laundry === 'selesai')
                                <span class="badge-pill badge-selesai">Selesai</span>
                            @else
                                <span class="badge-pill badge-diambil">Diambil</span>
                            @endif
                            <i class="bi bi-chevron-right" style="color:#CBD5E1;font-size:12px;"></i>
                        </div>
                    </a>
                    @empty
                    <div class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size:32px;color:#CBD5E1;"></i>
                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada pesanan.</p>
                    </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cariPesanan() {
            const kode = document.getElementById('input-kode').value.trim().toUpperCase();
            if (!kode) return;
            window.location.href = '/user/lacak/' + kode;
        }
        document.getElementById('input-kode').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') cariPesanan();
        });
    </script>
</body>
</html>
