<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Transaksi - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .btn-primary { background-color: #07549A; border-color: #07549A; }
        .btn-primary:hover { background-color: #063B70; border-color: #063B70; }
        .content-card { background: #FFFFFF; border: 1px solid #E5E7EB; border-radius: 14px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .info-box { background: #EAF4FC; border-radius: 8px; padding: 16px; margin-bottom: 16px; }
        table.detail-table th, table.detail-table td { font-size: 14px; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            <div class="admin-topbar">
                <h5 class="mb-0" style="color:#1F2937; font-weight:600;">Kelola Transaksi #{{ $transaksi->id_transaksi }}</h5>
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
                <div class="content-card">
                    <div class="info-box">
                        <p class="mb-1"><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama_pelanggan }}</p>
                        <p class="mb-1"><strong>No HP:</strong> {{ $transaksi->pelanggan->no_hp }}</p>
                        <p class="mb-0"><strong>Tanggal Masuk:</strong> {{ $transaksi->tanggal_masuk->format('d/m/Y H:i') }}</p>
                    </div>

                    <table class="table table-bordered detail-table">
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
                                    <td>{{ $detail->layanan->nama_layanan ?? '-' }}</td>
                                    <td>{{ $detail->jumlah }} {{ $detail->layanan->satuan ?? '' }}</td>
                                    <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
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

                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.transaksi.update', $transaksi->id_transaksi) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Status Laundry</label>
                            <select name="status_laundry" class="form-select" required>
                                <option value="menunggu" {{ $transaksi->status_laundry == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $transaksi->status_laundry == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $transaksi->status_laundry == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="diambil" {{ $transaksi->status_laundry == 'diambil' ? 'selected' : '' }}>Diambil</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" class="form-select" required>
                                <option value="belum_lunas" {{ $transaksi->status_pembayaran == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                <option value="lunas" {{ $transaksi->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dibayar (Rp)</label>
                            <input type="number" name="dibayar" class="form-control" value="{{ old('dibayar', $transaksi->dibayar) }}" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea name="catatan" class="form-control" rows="2">{{ old('catatan', $transaksi->catatan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>