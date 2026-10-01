<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
</body>
    @include('pelanggan.partials.navbar')

    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1">Halo, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</h4>
                <p class="text-muted mb-0">Berikut riwayat transaksi pesenan Laundry Anda.</p>
            </div>
            <a href="{{ route('booking.create') }}" class="btn btn-primary" style="background-color:#07549A; border-color:#07549A;">Pesan Sekarang</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="content-card">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Layanan</th>
                            <th>Total</th>
                            <th>Status Bayar</th>
                            <th>Status Laundry</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $item)
                            <tr>
                                <td>{{ $item->id_transaksi }}</td>
                                <td>{{ $item->tanggal_masuk->format('d/m/Y H:i') }}</td>
                                <td>