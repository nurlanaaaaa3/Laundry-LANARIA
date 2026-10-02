<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAUNDRIA - Laundry Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --main-blue: #07549A;
            --dark-blue: #063B70;
            --medium-blue: #1976B8;
            --light-blue: #EAF4FC;
            --off-white: #F8FAFC;
            --border-c: #E5E7EB;
            --text-main: #1F2937;
            --text-sec: #64748B;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
        }
        h1, h2, h3, .brand-font {
            font-family: 'Playfair Display', serif;
        }

        /* NAVBAR */
        .navbar-laundria {
            background-color: #FFFFFF;
            box-shadow: 0 2px 20px rgba(6, 59, 112, 0.08);
        }
        .navbar-laundria .navbar-brand {
            color: var(--dark-blue) !important;
            font-weight: 700;
            font-size: 22px;
            letter-spacing: 0.3px;
        }
        .navbar-laundria .nav-link {
            color: var(--text-main) !important;
            font-weight: 500;
            position: relative;
            transition: color 0.2s ease;
        }
        .navbar-laundria .nav-link:hover {
            color: var(--main-blue) !important;
        }
        .navbar-laundria .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 14px;
            width: 0;
            height: 2px;
            background-color: var(--main-blue);
            transition: width 0.25s ease;
        }
        .navbar-laundria .nav-link:hover::after {
            width: calc(100% - 28px);
        }

        /* TOMBOL */
        .btn-cta {
            background-color: var(--main-blue);
            border-color: var(--main-blue);
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(7, 84, 154, 0.3);
            transition: all 0.2s ease;
        }
        .btn-cta:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            color: #FFFFFF;
            box-shadow: 0 6px 20px rgba(6, 59, 112, 0.4);
            transform: translateY(-2px);
        }

        /* HERO */
        .hero-section {
            background: linear-gradient(180deg, var(--light-blue) 0%, #FFFFFF 100%);
            padding: 90px 0 70px;
            position: relative;
            overflow: hidden;
        }
        .hero-section h1 {
            color: var(--dark-blue);
            font-size: 42px;
            font-weight: 700;
            line-height: 1.3;
        }
        .hero-section p {
            color: var(--text-sec);
            font-size: 17px;
            max-width: 600px;
            margin: 20px auto 30px;
        }
        .hero-section img {
            box-shadow: 0 20px 50px rgba(6, 59, 112, 0.25);
            transition: transform 0.3s ease;
        }
        .hero-section img:hover {
            transform: scale(1.015);
        }

        section {
            padding: 80px 0;
        }
        .section-title {
            color: var(--dark-blue);
            font-weight: 700;
            margin-bottom: 12px;
        }
        .section-subtitle {
            color: var(--text-sec);
            margin-bottom: 45px;
        }

        /* TENTANG KAMI */
        .about-box {
            background-color: var(--off-white);
            border: 1px solid var(--border-c);
            border-radius: 16px;
            padding: 34px;
            box-shadow: 0 6px 24px rgba(15, 23, 42, 0.04);
        }

        /* KARTU LAYANAN */
        #layanan .p-4 {
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
            border-radius: 14px !important;
        }
        #layanan .p-4:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(6, 59, 112, 0.14);
            border-color: var(--main-blue) !important;
        }

        /* CARA KERJA */
        .step-circle {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--main-blue), var(--medium-blue));
            color: #FFFFFF;
            border-radius: 50%;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 8px 20px rgba(7, 84, 154, 0.3);
        }

        /* KONTAK */
        #kontak .p-4 {
            border-radius: 14px !important;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
            transition: all 0.2s ease;
        }
        #kontak .p-4:hover {
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
            transform: translateY(-3px);
        }

        /* FOOTER */
        footer {
            background: linear-gradient(135deg, var(--dark-blue), #052C54) !important;
        }

        /* TABEL HARGA PREMIUM */
        .price-table-wrap {
            background: #FFFFFF;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 34px rgba(6, 59, 112, 0.1);
        }
        .price-table thead tr {
            background: linear-gradient(90deg, var(--dark-blue), var(--main-blue));
        }
        .price-table thead th {
            color: #FFFFFF;
            font-weight: 600;
            border: none;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .price-table tbody tr {
            border-bottom: 1px solid #F1F5F9;
            transition: background-color 0.15s ease;
        }
        .price-table tbody tr:last-child {
            border-bottom: none;
        }
        .price-table tbody tr:hover {
            background-color: var(--light-blue);
        }
        .price-pill {
            display: inline-block;
            background-color: var(--light-blue);
            color: var(--dark-blue);
            font-weight: 700;
            font-size: 14px;
            padding: 6px 16px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-laundria sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="#beranda">LAUNDRIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#harga">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cara-kerja">Cara Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item mt-2 mt-lg-0">
                        <a class="btn btn-cta px-3" href="{{ route('login') }}">Pesan Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <h1>Laundry Profesional<br>Merawat Pakaian Anda<br>Untuk Hari yang Lebih Nyaman</h1>
                    <p class="mx-auto mx-lg-0">Kami Membantu Merawat Pakaian Anda Agar Tetap Bersih, Rapi, Segar, dan Siap Digunakan Setiap Hari.</p>
                    <a href="#layanan" class="btn btn-cta btn-lg px-4">Lihat Layanan</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/laundryservices.jpg') }}" alt="LAUNDRIA" class="img-fluid rounded-4 shadow" style="max-height: 400px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section id="tentang">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Tentang Kami</h2>
                <p class="section-subtitle">Mengenal lebih dekat LAUNDRIA</p>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('images/laundry.jpg') }}" alt="Tentang LAUNDRIA" class="img-fluid rounded-4 shadow" style="max-height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-7">
                    <div class="about-box">
                        <p class="mb-0" style="color: var(--text-sec); line-height: 1.8;">
                            LAUNDRIA hadir untuk membantu Anda merawat pakaian dengan lebih praktis dan nyaman. Kami menyediakan
                            berbagai layanan laundry, mulai dari cuci lipat, cuci dan setrika, setrika saja, hingga perawatan bed
                            cover, selimut, gorden, boneka, dan tas.
                            <br><br>
                            Kami memahami kesibukan sehari-hari yang membuat Anda tidak selalu memiliki waktu untuk mengurus cucian.
                            Karena itu, LAUNDRIA hadir untuk membantu meringankan pekerjaan Anda agar waktu bisa digunakan untuk hal yang lebih penting.
                            Dengan proses pengerjaan yang teratur dan pelayanan yang ramah, kami berusaha memberikan hasil yang bersih,
                            rapi, dan wangi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN --}}
    <section id="layanan" class="bg-white">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Berbagai pilihan layanan laundry sesuai kebutuhan Anda</p>
            </div>
            <div class="row g-4">
                @forelse ($layanan as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 h-100 d-flex flex-column" style="background-color: var(--off-white); border: 1px solid var(--border-c); border-radius: 12px;">
                        <h5 style="color: var(--dark-blue); font-weight: 600;">{{ $item->nama_layanan }}</h5>
                        <p class="mb-2" style="color: var(--text-sec); font-size: 14px;">
                            Estimasi Selesai: {{ $item->estimasi }} jam
                        </p>
                        <p class="mb-3" style="color: var(--text-sec); font-size: 13px;">
                            @if ($item->keterangan)
                                {{ $item->keterangan }}
                            @elseif ($item->nama_layanan == 'Cuci Lipat')
                                Cocok untuk pakaian harian, dicuci bersih dan dilipat rapi.
                            @elseif ($item->nama_layanan == 'Cuci & Setrika')
                                Pakaian dicuci bersih, dikeringkan, disetrika halus, dan siap pakai.
                            @elseif($item->nama_layanan == 'Setrika Saja')
                                Untuk pakaian yang sudah dicuci, disetrika rapi agar siap digunakan.
                            @elseif($item->nama_layanan == 'Cuci Bed Cover')
                                Perawatan khusus untuk bed cover agar tetap bersih dan nyaman digunakan.
                            @elseif($item->nama_layanan == 'Cuci Selimut & Gorden')
                                Dibersihkan menyeluruh, bebas debu, dan wangi segar untuk kenyamanan rumah Anda.
                            @elseif($item->nama_layanan == 'Boneka & Tas')
                                Dicuci dengan lembut, menjaga bentuk dan kualitas boneka serta tas kesayangan Anda.
                            @else
                                Dikerjakan oleh tim profesional dengan perhatian pada setiap detail agar hasilnya memuaskan.
                            @endif
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-cta btn-sm mt-auto align-self-start">Pilih Layanan</a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">Layanan belum tersedia.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- HARGA --}}
    <section id="harga" style="background-color: var(--light-blue);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Daftar Harga</h2>
                <p class="section-subtitle">Harga transparan, tanpa biaya tersembunyi</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="price-table-wrap">
                        <table class="table mb-0 price-table">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3" style="background: var(--dark-blue); color: #FFFFFF; border: none;">Layanan</th>
                                    <th class="py-3" style="background: var(--dark-blue); color: #FFFFFF; border: none;">Satuan</th>
                                    <th class="text-end pe-4 py-3" style="background: var(--dark-blue); color: #FFFFFF; border: none;">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanan as $item)
                                    <tr>
                                        <td class="ps-4 py-3" style="color: var(--text-main); font-weight: 500;">{{ $item->nama_layanan }}</td>
                                        <td class="py-3" style="color: var(--text-sec);">{{ $item->satuan }}</td>
                                        <td class="text-end pe-4 py-3">
                                            <span class="price-pill">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CARA KERJA --}}
    <section id="cara-kerja" style="background-color: var(--off-white);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Cara Kerja</h2>
                <p class="section-subtitle">Proses mudah dalam 4 langkah</p>
                <p class="mb-5" style="color: var(--text-sec); text-align: center; max-width: 700px; margin: 0 auto 3rem;">
                    Kami membuat proses laundry menjadi lebih praktis, cepat, dan nyaman untuk Anda.
                    Hanya dalam beberapa langkah, pakaian Anda akan kembali bersih, rapi, wangi,
                    dan siap digunakan.
                </p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-3">
                    <div class="step-circle">1</div>
                    <h6 style="color: var(--dark-blue); font-weight: 600;">Pesan Sekarang</h6>
                    <p style="color: var(--text-sec); font-size: 14px;">Daftar/login lalu pilih layanan laundry yang Anda butuhkan, lalu tentukan jenis perawatan yang sesuai dengan kebutuhan pakaian Anda.</p>
                </div>
                <div class="col-md-3">
                    <div class="step-circle">2</div>
                    <h6 style="color: var(--dark-blue); font-weight: 600;">Antar / Jemput</h6>
                    <p style="color: var(--text-sec); font-size: 14px;">Antarkan pakaian Anda ke LAUNDRIA untuk diproses dengan teliti, atau manfaatkan layanan jemput agar lebih praktis.</p>
                </div>
                <div class="col-md-3">
                    <div class="step-circle">3</div>
                    <h6 style="color: var(--dark-blue); font-weight: 600;">Proses Pencucian</h6>
                    <p style="color: var(--text-sec); font-size: 14px;">Pakaian dicuci dan dirawat dengan teliti sesuai jenis layanan, agar hasilnya bersih, rapi, dan wangi.</p>
                </div>
                <div class="col-md-3">
                    <div class="step-circle">4</div>
                    <h6 style="color: var(--dark-blue); font-weight: 600;">Siap Diambil / Antar</h6>
                    <p style="color: var(--text-sec); font-size: 14px;">Pakaian selesai dicuci dan siap diambil atau kami yang akan mengantar ke rumah Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- KONTAK --}}
    <section id="kontak" class="bg-white">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Kontak Kami</h2>
                <p class="section-subtitle">Hubungi kami untuk informasi lebih lanjut</p>
            </div>
            <div class="row g-4 justify-content-center text-center">
                <div class="col-md-4">
                    <div class="p-4 h-100" style="background-color: var(--off-white); border: 1px solid var(--border-c);">
                        <h6 style="color: var(--dark-blue); font-weight: 600;">Nomor WhatsApp</h6>
                        <p class="mb-0" style="color: var(--text-sec);">0812-3456-7890</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 h-100" style="background-color: var(--off-white); border: 1px solid var(--border-c);">
                        <h6 style="color: var(--dark-blue); font-weight: 600;">Alamat</h6>
                        <p class="mb-0" style="color: var(--text-sec);">Surakarta, Jawa Tengah</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 h-100" style="background-color: var(--off-white); border: 1px solid var(--border-c);">
                        <h6 style="color: var(--dark-blue); font-weight: 600;">Jam Operasional</h6>
                        <p class="mb-0" style="color: var(--text-sec);">Senin-Jumat, 08.00 - 20.00</p>
                        <p class="mb-0" style="color: var(--text-sec);">Sabtu, 08.00 - 18.00</p>
                        <p class="mb-0" style="color: var(--text-sec);">Minggu, TUTUP</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer style="background-color: var(--dark-blue); color: #FFFFFF; padding: 30px 0;">
        <div class="container text-center">
            <h5 class="brand-font mb-2">LAUNDRIA</h5>
            <p class="mb-0" style="color: #CBD5E1; font-size: 14px;">&copy; {{ date('Y') }} LAUNDRIA. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

</body>
</html>