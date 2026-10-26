<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Sekarang - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        .row-layanan {
            background: #F8FAFC;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 10px;
            transition: border-color 0.15s;
        }
        .row-layanan:hover { border-color: #07549A; }

        .row-layanan .select-layanan,
        .row-layanan .input-jumlah {
            border-radius: 8px;
            border: 1px solid #D1D5DB;
            font-size: 13.5px;
            padding: 8px 12px;
        }
        .row-layanan .select-layanan:focus,
        .row-layanan .input-jumlah:focus {
            border-color: #07549A;
            box-shadow: 0 0 0 3px rgba(7,84,154,0.1);
        }

        .satuan-label {
            font-size: 12px;
            color: #64748B;
            margin-top: 4px;
        }

        .subtotal-text {
            font-weight: 600;
            font-size: 14px;
            color: #07549A;
        }

        .btn-hapus-baris {
            width: 32px;
            height: 32px;
            padding: 0;
            border-radius: 8px;
            border: 1px solid #FECACA;
            background: #FEF2F2;
            color: #DC2626;
            font-size: 16px;
            line-height: 1;
            transition: all 0.15s;
        }
        .btn-hapus-baris:hover {
            background: #FEE2E2;
            border-color: #FCA5A5;
            color: #B91C1C;
        }

        .btn-tambah {
            background: #EAF4FC;
            color: #07549A;
            border: 1.5px dashed #7FB0EA;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 600;
            padding: 10px 18px;
            transition: all 0.15s;
            width: 100%;
        }
        .btn-tambah:hover {
            background: #D6ECF8;
            border-color: #07549A;
            color: #063B70;
        }

        .total-box {
            background: linear-gradient(135deg, #07549A, #1976B8);
            color: #FFFFFF;
            border-radius: 14px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .total-box .total-label {
            font-size: 13px;
            opacity: 0.85;
            margin-bottom: 4px;
        }
        .total-box .nominal {
            font-size: 26px;
            font-weight: 700;
            line-height: 1.1;
        }
        .total-box .total-icon {
            width: 48px;
            height: 48px;
            background: rgba(255,255,255,0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .info-bayar {
            background: #FFFBEB;
            border: 1px solid #FDE68A;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #92400E;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .info-bayar i { font-size: 16px; margin-top: 1px; flex-shrink: 0; color: #D97706; }

        .btn-kirim {
            background: #07549A;
            border: none;
            color: #FFFFFF;
            font-weight: 600;
            font-size: 15px;
            border-radius: 10px;
            padding: 12px 28px;
            transition: all 0.2s;
        }
        .btn-kirim:hover {
            background: #063B70;
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(7,84,154,0.3);
        }

        .section-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="p-wrapper">
        @include('pelanggan.partials.sidebar')

        <div class="p-content">
            <div class="p-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Pesan Sekarang</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-name">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout-p">Logout</button>
                    </form>
                </div>
            </div>

            <div class="p-4">
                <div class="content-card">

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-3" style="border-radius:10px; font-size:13.5px;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('booking.store') }}" id="form-transaksi">
                        @csrf

                        <div class="mb-1 section-label">
                            <i class="bi bi-basket2 me-1 text-primary"></i> Pilih Layanan
                        </div>
                        <p style="font-size:12.5px; color:#64748B; margin-bottom:12px;">
                            Tambahkan satu atau lebih layanan. Estimasi total dihitung otomatis.
                        </p>

                        <div id="daftar-layanan"></div>

                        <button type="button" id="btn-tambah-layanan" class="btn-tambah mb-4">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
                        </button>

                        <div class="mb-4">
                            <label class="section-label">
                                <i class="bi bi-chat-left-text me-1 text-primary"></i> Catatan (opsional)
                            </label>
                            <textarea name="catatan" class="form-control" rows="2"
                                style="border-radius:10px; font-size:13.5px; border-color:#D1D5DB;"
                                placeholder="Contoh: Ada noda di kemeja, tolong diperhatikan...">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="total-box mb-3">
                            <div>
                                <div class="total-label">Estimasi Total Pembayaran</div>
                                <div class="nominal" id="total-display">Rp0</div>
                            </div>
                            <div class="total-icon">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>

                        <div class="info-bayar mb-4">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Pembayaran dilakukan saat pakaian diantar atau diambil di tempat. Total akhir disesuaikan setelah penimbangan.</span>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn-kirim">
                                <i class="bi bi-send me-1"></i> Kirim Pesanan
                            </button>
                            <a href="{{ route('pelanggan.dashboard') }}" class="btn btn-outline-secondary"
                                style="border-radius:10px; font-size:14px; padding:10px 20px;">
                                Batal
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const daftarLayanan = @json($layanan);
    </script>
    <script src="{{ asset('js/booking-create.js') }}"></script>
</body>
</html>
