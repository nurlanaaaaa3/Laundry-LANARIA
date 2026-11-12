<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .chart-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .chart-card-header {
            padding: 18px 24px 14px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .chart-card-header .icon-wrap {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: #EAF4FC;
            color: #07549A;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
        }
        .chart-card-body { padding: 24px; }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.partials.sidebar')

        <div class="admin-content">
            @include('admin.partials.topbar', ['title' => 'Statistik'])

            <div class="p-4">

                {{-- Grafik Pendapatan Bulanan --}}
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div class="icon-wrap"><i class="bi bi-bar-chart-line"></i></div>
                        <div>
                            <div style="font-size:15px;font-weight:600;color:#1F2937;">Pendapatan 6 Bulan Terakhir</div>
                            <div style="font-size:12px;color:#94A3B8;">Total pendapatan dari transaksi lunas</div>
                        </div>
                    </div>
                    <div class="chart-card-body">
                        <canvas id="grafikPendapatan" height="80"></canvas>
                    </div>
                </div>

                <div class="row g-4">
                    {{-- Grafik Status Transaksi --}}
                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="chart-card-header">
                                <div class="icon-wrap"><i class="bi bi-pie-chart"></i></div>
                                <div>
                                    <div style="font-size:15px;font-weight:600;color:#1F2937;">Status Transaksi</div>
                                    <div style="font-size:12px;color:#94A3B8;">Distribusi status laundry saat ini</div>
                                </div>
                            </div>
                            <div class="chart-card-body">
                                <canvas id="grafikStatus" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Grafik Transaksi Harian --}}
                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="chart-card-header">
                                <div class="icon-wrap"><i class="bi bi-graph-up"></i></div>
                                <div>
                                    <div style="font-size:15px;font-weight:600;color:#1F2937;">Transaksi 7 Hari Terakhir</div>
                                    <div style="font-size:12px;color:#94A3B8;">Jumlah transaksi masuk per hari</div>
                                </div>
                            </div>
                            <div class="chart-card-body">
                                <canvas id="grafikHarian" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        // Grafik Pendapatan Bulanan
        new Chart(document.getElementById('grafikPendapatan'), {
            type: 'bar',
            data: {
                labels: @json($bulanLabels),
                datasets: [{
                    label: 'Pendapatan',
                    data: @json($bulanData),
                    backgroundColor: 'rgba(7,84,154,0.15)',
                    borderColor: '#07549A',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ' Rp' + new Intl.NumberFormat('id-ID').format(ctx.raw)
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F1F5F9' },
                        ticks: {
                            callback: val => 'Rp' + new Intl.NumberFormat('id-ID').format(val),
                            font: { size: 11 }
                        }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 11 } } }
                }
            }
        });

        // Grafik Status Transaksi
        new Chart(document.getElementById('grafikStatus'), {
            type: 'doughnut',
            data: {
                labels: @json($statusLabels),
                datasets: [{
                    data: @json($statusData),
                    backgroundColor: ['#FEF08A', '#2563EB', '#16A34A', '#0F766E'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom', labels: { font: { size: 12 } } }
                }
            }
        });

        // Grafik Transaksi Harian
        new Chart(document.getElementById('grafikHarian'), {
            type: 'line',
            data: {
                labels: @json($hariLabels),
                datasets: [{
                    label: 'Transaksi',
                    data: @json($hariData),
                    borderColor: '#07549A',
                    backgroundColor: 'rgba(7,84,154,0.08)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#07549A',
                    pointRadius: 5,
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F1F5F9' },
                        ticks: { stepSize: 1, font: { size: 11 } }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });
    </script>
</body>
</html>
