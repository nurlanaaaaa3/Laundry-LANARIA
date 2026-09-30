<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Sekarang - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8FAFC; font-family: 'Poppins', sans-serif; }
        .navbar-p { background-color: #07549A; }
        .navbar-p .navbar-brand { font-family: 'Playfair Display', serif; color: #FFFFFF !important; font-weight: 700; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .form-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 12px; padding: 24px; max-width: 700px; margin: 0 auto; }
        .row-layanan { background: #EAF4FC; border-radius: 8px; padding: 12px; margin-bottom: 10px; }
        .total-box { background: #063B70; color: #FFFFFF; border-radius: 8px; padding: 16px; }
        .total-box .nominal { font-size: 24px; font-weight: 600; }
    </style>
</head>
<body>
    <nav class="navbar navbar-p">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0">LAUNDRIA</span>
            <div>
                <a href="{{ route('pelanggan.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <h4 class="mb-3 text-center">Pesan Sekarang</h4>

        <div class="form-card">
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

    <script>
        const daftarLayanan = @json($layanan);
    </script>
    <script src="{{ asset('js/booking-create.js') }}"></script>
</body>
</html>