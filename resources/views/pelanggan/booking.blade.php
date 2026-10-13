<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Sekarang - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        .row-layanan { background: #EAF4FC; border-radius: 8px; padding: 12px; margin-bottom: 10px; }
        @media (max-width: 575px) {
            .row-layanan > :nth-child(1) { flex: 0 0 100%; max-width: 100%; }
            .row-layanan > :nth-child(2) { flex: 0 0 40%; max-width: 40%; }
            .row-layanan > :nth-child(3) { flex: 1 1 0; max-width: none; }
            .row-layanan > :nth-child(4) { flex: 0 0 auto; width: auto; }
        }
        .total-box { background: #063B70; color: #FFFFFF; border-radius: 8px; padding: 16px; }
        .total-box .nominal { font-size: 24px; font-weight: 600; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
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
                <div class="content-card" style="max-width: 700px;">
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('booking.store') }}" id="form-transaksi">
                        @csrf

                        <label class="form-label">Pilih Layanan</label>
                        <div id="daftar-layanan"></div>
                        <button type="button" id="btn-tambah-layanan" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Layanan</button>

                        <div class="mb-3">
                            <label class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" class="form-control" rows="2">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="total-box mb-3">
                            <div>Estimasi Total</div>
                            <div class="nominal" id="total-display">Rp0</div>
                        </div>

                        <p class="text-muted" style="font-size: 13px;">
                            Pembayaran dilakukan saat pakaian diantar atau diambil di tempat.
                        </p>

                        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                        <a href="{{ route('pelanggan.dashboard') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const daftarLayanan = @json($layanan);
    </script>
    <script src="{{ asset('js/booking-create.js') }}"></script>
</body>
</html>