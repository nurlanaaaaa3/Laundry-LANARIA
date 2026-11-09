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

        /* ── Header pesanan ── */
        .order-header {
            background: linear-gradient(135deg, #07549A, #1976B8);
            border-radius: 18px;
            padding: 28px 32px;
            color: #fff;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }
        .order-header::after {
            content: "";
            position: absolute;
            right: -30px; top: -30px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .order-header .kode {
            font-size: 28px;
            font-weight: 700;
            font-family: ui-monospace, monospace;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .order-header .tgl {
            font-size: 13px;
            opacity: .8;
        }
        .order-header .total-hdr {
            font-size: 22px;
            font-weight: 700;
            margin-top: 12px;
        }

        /* ── Stepper ── */
        .stepper {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 0;
            margin-bottom: 28px;
            padding: 28px 24px;
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
        }
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            position: relative;
        }
        .step:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 20px;
            left: 50%;
            width: 100%;
            height: 3px;
            background: #E5E7EB;
            z-index: 0;
        }
        .step.done:not(:last-child)::after,
        .step.active:not(:last-child)::after {
            background: #07549A;
        }
        .step.done:not(:last-child)::after { background: #16A34A; }

        .step-circle {
            width: 42px; height: 42px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            font-weight: 700;
            z-index: 1;
            border: 3px solid #E5E7EB;
            background: #F8FAFC;
            color: #94A3B8;
            transition: all 0.3s;
        }
        .step.done .step-circle {
            background: #16A34A;
            border-color: #16A34A;
            color: #fff;
        }
        .step.active .step-circle {
            background: #07549A;
            border-color: #07549A;
            color: #fff;
            box-shadow: 0 0 0 5px rgba(7,84,154,0.15);
        }
        .step-label {
            font-size: 12px;
            font-weight: 600;
            color: #94A3B8;
            margin-top: 10px;
            text-align: center;
        }
        .step.done .step-label { color: #16A34A; }
        .step.active .step-label { color: #07549A; }
        .step-sublabel {
            font-size: 11px;
            color: #CBD5E1;
            text-align: center;
        }
        .step.active .step-sublabel { color: #64748B; }

        /* ── Info card ── */
        .info-card {
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .info-card-header {
            padding: 16px 20px 12px;
            border-bottom: 1px solid #F1F5F9;
            display: flex; align-items: center; gap: 10px;
        }
        .info-card-header .icon-wrap {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: #EAF4FC; color: #07549A;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px;
        }
        .info-card-body { padding: 20px; }

        /* ── Tabel detail ── */
        .table-detail th {
            font-size: 11.5px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.5px;
            color: #64748B; background: #F8FAFC;
            border-bottom: 2px solid #E5E7EB; padding: 10px 14px;
        }
        .table-detail td {
            font-size: 13px; color: #374151;
            padding: 12px 14px; border-bottom: 1px solid #F1F5F9;
            vertical-align: middle;
        }
        .table-detail tbody tr:last-child td { border-bottom: none; }
        .table-detail tfoot th {
            font-size: 14px; font-weight: 700;
            color: #07549A; background: #EAF4FC;
            padding: 12px 14px; border-top: 2px solid #CBE5F7;
        }

        /* ── Badge ── */
        .badge-pill { font-size: 12px; font-weight: 600; padding: 5px 13px; border-radius: 20px; }
        .badge-menunggu { background: #FEF08A; color: #713F12; }
        .badge-diproses  { background: #2563EB; color: #fff; }
        .badge-selesai   { background: #16A34A; color: #fff; }
        .badge-diambil   { background: #0F766E; color: #fff; }
        .badge-lunas     { background: #16A34A; color: #fff; }
        .badge-belum     { background: #DC2626; color: #fff; }

        /* ── Catatan ── */
        .catatan-box {
            background: #FFFBEB;
            border: 1px solid #FDE68A;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #92400E;
        }

        @media (max-width: 575px) {
            .stepper { padding: 20px 8px; }
            .step-circle { width: 34px; height: 34px; font-size: 14px; }
            .step-label { font-size: 10px; }
            .order-header { padding: 20px; }
            .order-header .kode { font-size: 22px; }
        }
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

                {{-- Header pesanan --}}
                <div class="order-header">
                    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                        <div>
                            <div style="font-size:12px; opacity:.8; margin-bottom:4px;">Kode Pesanan</div>
                            <div class="kode">{{ $transaksi->kode_transaksi }}</div>
                            <div class="tgl">
                                <i class="bi bi-calendar me-1"></i>{{ $transaksi->tanggal_masuk->format('d M Y, H:i') }}
                            </div>
                        </div>
                        <div class="text-end">
                            <div style="font-size:12px; opacity:.8; margin-bottom:4px;">Total</div>
                            <div class="total-hdr">Rp{{ number_format($transaksi->total, 0, ',', '.') }}</div>
                            <div class="mt-2">
                                @if($transaksi->status_pembayaran === 'lunas')
                                    <span class="badge-pill badge-lunas">✅ Lunas</span>
                                @else
                                    <span class="badge-pill badge-belum">❌ Belum Lunas</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stepper status --}}
                @php
                    $steps = ['menunggu', 'diproses', 'selesai', 'diambil'];
                    $currentIndex = array_search($transaksi->status_laundry, $steps);
                    $icons = ['hourglass-split', 'arrow-repeat', 'check-circle-fill', 'bag-check-fill'];
                    $labels = ['Menunggu', 'Diproses', 'Selesai', 'Diambil'];
                    $sublabels = ['Pesanan diterima', 'Sedang dicuci', 'Siap diambil', 'Selesai'];
                @endphp
                <div class="stepper">
                    @foreach($steps as $i => $step)
                        @php
                            $state = $i < $currentIndex ? 'done' : ($i == $currentIndex ? 'active' : '');
                        @endphp
                        <div class="step {{ $state }}">
                            <div class="step-circle">
                                @if($i < $currentIndex)
                                    <i class="bi bi-check-lg"></i>
                                @else
                                    <i class="bi bi-{{ $icons[$i] }}"></i>
                                @endif
                            </div>
                            <div class="step-label">{{ $labels[$i] }}</div>
                            <div class="step-sublabel">{{ $sublabels[$i] }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- Detail layanan --}}
                <div class="info-card">
                    <div class="info-card-header">
                        <div class="icon-wrap"><i class="bi bi-basket2"></i></div>
                        <div style="font-size:14px;font-weight:600;color:#1F2937;">Detail Layanan</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-detail mb-0">
                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi->detailTransaksi as $detail)
                                <tr>
                                    <td style="font-weight:500;">{{ $detail->layanan->nama_layanan ?? '-' }}</td>
                                    <td>{{ $detail->jumlah }} <span style="color:#94A3B8;font-size:12px;">{{ $detail->layanan->satuan ?? '' }}</span></td>
                                    <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td style="font-weight:600;color:#07549A;">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
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
                    </div>
                </div>

                {{-- Info pembayaran --}}
                <div class="info-card">
                    <div class="info-card-header">
                        <div class="icon-wrap"><i class="bi bi-cash-coin"></i></div>
                        <div style="font-size:14px;font-weight:600;color:#1F2937;">Info Pembayaran</div>
                    </div>
                    <div class="info-card-body">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <div style="font-size:12px;color:#94A3B8;margin-bottom:4px;">Total</div>
                                <div style="font-size:18px;font-weight:700;color:#07549A;">Rp{{ number_format($transaksi->total, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-sm-4">
                                <div style="font-size:12px;color:#94A3B8;margin-bottom:4px;">Dibayar</div>
                                <div style="font-size:18px;font-weight:700;color:#1F2937;">Rp{{ number_format($transaksi->dibayar, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-sm-4">
                                <div style="font-size:12px;color:#94A3B8;margin-bottom:4px;">Kembalian</div>
                                <div style="font-size:18px;font-weight:700;color:#16A34A;">Rp{{ number_format($transaksi->kembalian, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        @if($transaksi->catatan)
                            <div class="catatan-box mt-3">
                                <i class="bi bi-chat-left-text me-2"></i>{{ $transaksi->catatan }}
                            </div>
                        @endif
                    </div>
                </div>

                <a href="{{ route('pelanggan.dashboard') }}" class="btn" style="background:#EAF4FC;color:#07549A;font-weight:600;border-radius:10px;padding:10px 22px;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
                </a>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
