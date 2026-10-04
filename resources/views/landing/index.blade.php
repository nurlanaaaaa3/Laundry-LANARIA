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
            font-size: 28px;
            letter-spacing: 0.5px;
        }

        @media (max-width: 575px) {
            .navbar-laundria .navbar-brand { font-size: 24px; }
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

        /* Hero */
        .hero-section {
            background:
                radial-gradient(60% 80% at 85% 20%, rgba(25, 118, 184, 0.12) 0%, rgba(25, 118, 184, 0) 70%),
                linear-gradient(180deg, var(--light-blue) 0%, #FFFFFF 100%);
            padding: 88px 0 72px;
            position: relative;
            overflow: hidden;
        }
        .hero-section h1 {
            color: var(--dark-blue);
            font-size: clamp(2rem, 4.2vw, 3.2rem);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 20px;
        }
        .hero-accent { display: block; color: var(--main-blue); }
        .hero-text {
            max-width: 520px;
            margin: 0 0 32px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--text-sec);
        }

        .btn-hero-outline {
            background: transparent;
            border: 1.5px solid var(--main-blue);
            color: var(--main-blue);
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-hero-outline:hover {
            background: #FFFFFF;
            border-color: var(--dark-blue);
            color: var(--dark-blue);
            transform: translateY(-2px);
        }

        .hero-stats { display: flex; flex-wrap: wrap; gap: 20px 0; margin-top: 44px; }
        .hero-stat { padding: 0 28px; border-left: 1px solid #CFE0F1; text-align: left; }
        .hero-stat:first-child { padding-left: 0; border-left: 0; }
        .hero-stat strong { display: block; font-size: 1.3rem; font-weight: 600; line-height: 1.2; color: var(--dark-blue); }
        .hero-stat span { font-size: 13px; color: var(--text-sec); }

        .hero-photo { position: relative; }
        .hero-photo::before {
            content: "";
            position: absolute;
            top: 24px;
            left: 24px;
            right: -16px;
            bottom: -16px;
            border-radius: 32px;
            background: linear-gradient(135deg, rgba(25, 118, 184, 0.18), rgba(7, 84, 154, 0.08));
        }
        .hero-photo img {
            position: relative;
            display: block;
            width: 100%;
            aspect-ratio: 5 / 4;
            object-fit: cover;
            border-radius: 28px;
            box-shadow: 0 30px 60px -24px rgba(6, 59, 112, 0.45);
        }
 
        @media (max-width: 991px) {
            .hero-section { padding: 64px 0 56px; }
        }
        @media (max-width: 575px) {
            .hero-stat { padding: 0 16px; }
            .hero-stat:first-child { padding-left: 0; }
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

        /* Tentang Kami */
        .ab-photo {
            position: relative;
            max-width: 440px;
            min-height: 380px;
            height: 100%;
            margin: 0 auto;
        }
        .ab-photo::before {
            content: "";
            position: absolute;
            top: 28px;
            left: 0;
            right: 18px;
            bottom: 0;
            background: var(--light-blue);
            border-radius: 28px;
        }
        .ab-photo img {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 18px;
            width: calc(100% - 18px);
            height: calc(100% - 28px);
            object-fit: cover;
            object-position: 50% 25%;
            border-radius: 24px;
            box-shadow: 0 24px 48px -20px rgba(6, 59, 112, 0.4);
        }
        .ab-badge {
            position: absolute;
            z-index: 2;
            right: 12px;
            bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 16px;
            padding: 12px 18px 12px 12px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--dark-blue);
            box-shadow: 0 16px 32px -12px rgba(6, 59, 112, 0.3);
        }
        .ab-badge-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: var(--main-blue);
            color: #FFFFFF;
        }
        .ab-badge-icon svg { width: 18px; height: 18px; }

        .ab-lead {
            font-size: clamp(1.6rem, 2.8vw, 2.1rem);
            font-weight: 700;
            line-height: 1.3;
            color: var(--dark-blue);
            margin: 0 0 16px;
        }
        .ab-text { max-width: 560px; margin: 0 0 28px; color: var(--text-sec); line-height: 1.8; }
        
        .ab-features { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 32px; }
        .ab-ft {
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(6, 59, 112, 0.04), 0 10px 28px -16px rgba(6, 59, 112, 0.2);
        }
        .ab-ft-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: var(--light-blue);
            color: var(--main-blue);
        }
        .ab-ft-icon svg { width: 22px; height: 22px; }
        .ab-ft-title { font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 600; color: var(--dark-blue); margin: 14px 0 6px; line-height: 1.4; }
        .ab-ft p { margin: 0; font-size: 13.5px; line-height: 1.7; color: var(--text-sec); }
        
        @media (max-width: 767px) {
            .ab-features { grid-template-columns: 1fr; }
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
        .step-card {
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 16px;
            padding: 36px 24px 28px;
            text-align: center;
            height: 100%;
            position: relative;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        }
        .step-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 34px rgba(6, 59, 112, 0.14);
            border-color: var(--main-blue);
        }
        .step-badge {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--main-blue), var(--medium-blue));
            color: #FFFFFF;
            border-radius: 50%;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -58px auto 18px;
            box-shadow: 0 8px 20px rgba(7, 84, 154, 0.3);
            border: 4px solid var(--off-white);
        }
        .step-card h6 {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 10px;
        }
        .step-card p {
            color: var(--text-sec);
            font-size: 13.5px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* KONTAK */
        html { scroll-padding-top: 80px;}

        #kontak .kt-lead { max-width: 560px; margin: 0 auto 48px; color: var(--text-sec); line-height: 1.7;}
        .kt-grid { display: grid; grid-template-columns: 1.25fr 1fr 1fr; gap: 24px; align-items: stretch;}
        .kt-card {
            background:#FFFFFF; border:  1px solid var(--border-c); border-radius: 20px;
            padding: 32px 28px; display: flex; flex-direction: column; text-align: left;
            box-shadow: 0 1px 2px rgba(6,59,112,.04), 0 12px 32px -16px rgba(6,59,112,.18);
        }
        .k-card h3 { font-family: 'Poppins', sans-serif; font-size: 1.05rm; font-weight: 600; color: var(--dark-blue); margin: 20px 0 10px; }
        .kt-icon { width: 52px; height: 52px; border-radius: 14px; display: grid; place-items: center; background: var(--light-blue); color: var(--main-blue); }
        .kt-icon svg { width: 24px; height: 24px; }

        .kt-main { background: linear-gradient(160deg, var(--main-blue), var(--dark-blue)); border-color: var(--dark-blue); box-shadow: 0 24px 48px -20px rgba(6,59,112,.55); }
        .kt-main .kt-icon { background: rgba(255,255,255,.14); color: #FFFFFF; }
        .kt-main h3 { color: #CFE3F7; }
        .kt-number { font-size: clamp(1.6rem, 2.6vw, 2rem); font-weight: 600; color: #FFFFFF; text-decoration: none; margin-bottom: 12px; width: max-content; max-width: 100%; }
        .kt-number:hover { color: #FFFFFF; text-decoration: underline; text-underline-offset: 6px; }
        .kt-note { margin: 0 0 28px; font-size: 14px; line-height: 1.7; color: #CFE3F7; }
        .kt-btn {
            margin-top: auto; display: inline-flex; justify-content: center; align-items: center;
            background: #FFFFFF; color: var(--dark-blue); font-weight: 600; font-size: 15px;
            text-decoration: none; padding: 14px 22px; border-radius: 12px;
            transition: background-color .2s ease, transform .2s ease;
        }
        .kt-btn:hover { background: var(--light-blue); color: var(--dark-blue); transform: translateY(-2px); }

        .kt-text { margin: 0 0 18px; color: var(--text-main); line-height: 1.6; }
        .kt-link { margin-top: auto; color: var(--main-blue); font-weight: 500; font-size: 14px; text-decoration: underline; text-underline-offset: 5px; }
        .kt-link:hover { color: var(--dark-blue); }

        .kt-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; }
        .kt-status {
            display: inline-flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 500;
            padding: 6px 12px; border-radius: 999px; background: var(--off-white);
            border: 1px solid var(--border-c); color: var(--text-sec);
        }
        .kt-status::before { content: ""; width: 8px; height: 8px; border-radius: 50%; background: currentColor; }
        .kt-status.is-open { color: #1F9D63; background: #EAF7F0; border-color: #CDEBDC; }
        .kt-status.is-closed { color: #C2453D; background: #FBEEED; border-color: #F3D4D1; }

        .kt-hours { list-style: none; margin: 0; padding: 0; }
        .kt-hours li { display: flex; justify-content: space-between; gap: 12px; padding: 12px; margin: 0 -12px; border-radius: 10px; font-size: 14px; color: var(--text-sec); }
        .kt-hours li + li { border-top: 1px solid var(--border-c); }
        .kt-hours b { font-weight: 500; color: var(--text-main); white-space: nowrap; }
        .kt-hours li.is-closed b { color: #C2453D; }
        .kt-hours li.is-today { background: var(--light-blue); border-top-color: transparent; color: var(--dark-blue); font-weight: 600; }
        .kt-hours li.is-today + li { border-top-color: transparent; }
        .kt-hours li.is-today b { color: var(--dark-blue); font-weight: 600; }

        #kontak a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; border-radius: 8px; }

        @media (max-width: 991px) {
            .kt-grid { grid-template-columns: 1fr 1fr; }
            .kt-main { grid-column: 1 / -1; }
        }
        @media (max-width: 575px) {
            .kt-grid { grid-template-columns: 1fr; }
        }

        /* Footer */
        footer.ft {
            background-color: #063B70;
            background-image: linear-gradient(160deg, #063B70 0%, #052C54 100%);
            color: #B9D2EC;
            padding: 72px 0 0;
        }
        .ft-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: #FFFFFF;
            margin: 0 0 16px;
        }
        .ft-desc { font-size: 14.5px; line-height: 1.8; max-width: 360px; margin: 0; }
        .ft-title { font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 600; color: #FFFFFF; margin: 0 0 20px; }

        .ft-links { list-style: none; margin: 0; padding: 0; display: grid; gap: 12px; }
        .ft-links a { color: #B9D2EC; font-size: 14.5px; text-decoration: none; transition: color 0.2s ease; }
        .ft-links a:hover { color: #FFFFFF; text-decoration: underline; text-underline-offset: 5px; }

        .ft-contact { list-style: none; margin: 0 0 24px; padding: 0; display: grid; gap: 14px; }
        .ft-contact li { display: flex; gap: 12px; font-size: 14.5px; line-height: 1.6; }
        .ft-contact svg { flex: none; width: 18px; height: 18px; margin-top: 3px; color: #7FB0EA; }
        .ft-contact a { color: #FFFFFF; font-weight: 500; text-decoration: none; }
        .ft-contact a:hover { text-decoration: underline; text-underline-offset: 5px; }

        .ft-btn {
            display: inline-flex;
            align-items: center;
            background: #FFFFFF;
            color: var(--dark-blue);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .ft-btn:hover { background: var(--light-blue); color: var(--dark-blue); transform: translateY(-2px); }

        .ft-bottom {
            margin-top: 56px;
            padding: 22px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 24px;
            font-size: 13.5px;
            color: #9DBCDD;
        }
        .ft-bottom a { color: #CFE3F7; text-decoration: none; }
        .ft-bottom a:hover { color: #FFFFFF; }
        .ft a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; border-radius: 6px; }
        
        @media (max-width: 575px) {
            .kt-grid { grid-template-columns: 1fr; }
        }

        /* Harga */
        .hg-card {
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(6, 59, 112, 0.04), 0 20px 48px -24px rgba(6, 59, 112, 0.28);
        }
        .hg-group-title {
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--main-blue);
            margin: 0;
            padding: 14px 32px;
            background: var(--off-white);
            border-bottom: 1px solid var(--border-c);
        }
        .hg-group + .hg-group .hg-group-title { border-top: 1px solid var(--border-c); }
        .hg-list { list-style: none; margin: 0; padding: 0; }
        .hg-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 32px;
            transition: background-color 0.15s ease;
        }
        .hg-row + .hg-row { border-top: 1px solid #F1F5F9; }
        .hg-row:hover { background-color: var(--light-blue); }

        .hg-name { margin: 0 0 2px; font-weight: 600; font-size: 1rem; line-height: 1.4; color: var(--text-main); }
        .hg-eta { margin: 0; font-size: 13px; color: var(--text-sec); }

        .hg-price {
            text-align: right;
            white-space: nowrap;
            font-weight: 600;
            font-size: 1.3rem;
            line-height: 1.2;
            color: var(--dark-blue);
            font-variant-numeric: tabular-nums;
        }
        .hg-price small { display: block; margin-top: 2px; font-size: 12.5px; font-weight: 400; color: var(--text-sec); }

        .hg-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px 24px;
            padding: 24px 32px;
            background: linear-gradient(135deg, var(--dark-blue), var(--main-blue));
        }
        .hg-cta strong { display: block; color: #FFFFFF; font-weight: 600; font-size: 1.05rem; }
        .hg-cta span { color: #DCEBFA; font-size: 14px; }
        .hg-cta a {
            background: #FFFFFF;
            color: var(--dark-blue);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .hg-cta a:hover { background: var(--light-blue); transform: translateY(-2px); }
        #harga a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; }

        @media (max-width: 575px) {
            .hg-group-title, .hg-row, .hg-cta { padding-left: 20px; padding-right: 20px; }
            .hg-price { font-size: 1.15rem; }
            .hg-cta a { width: 100%; text-align: center; }
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
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1>
                         <span class="hero-accent">Laundry Profesional</span>
                            Merawat Pakaian Anda Untuk Hari yang Lebih Nyaman
                    </h1>
                    <p class="hero-text mx-auto mx-lg-0">
                        Kami membantu merawat pakaian Anda agar tetap bersih, rapi, segar, dan siap digunakan setiap hari.
                    </p>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('login') }}" class="btn btn-cta btn-lg px-4">Pesan Sekarang</a>
                        <a href="#layanan" class="btn btn-hero-outline btn-lg px-4">Lihat Layanan</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-photo">
                        <img src="{{ asset('images/laundryservices.jpg') }}" alt="Layanan LAUNDRIA">
                    </div>
                </div>
                
            <div>
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section id="tentang" style="background-color: var(--off-white);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Tentang Kami</h2>
                <p class="section-subtitle">Mengenal lebih dekat LAUNDRIA</p>
            </div>

            <div class="row align-items-stretch g-5">
                
                {{-- Foto --}}
                <div class="col-lg-5">
                    <div class="ab-photo">
                        <img src="{{ asset('images/laundryy.jpg') }}" alt="Tentang LAUNDRIA">
                        <div class="ab-badge">
                            <span class="ab-badge-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 4.5 4.5L19 7"/></svg>
                            </span>
                            Bersih, Rapi, dan Wangi
                        </div>
                    </div>
                </div>

                {{-- Teks --}}
                <div class="col-lg-7">
                    <p class="ab-text">
                        LAUNDRIA hadir untuk membantu Anda merawat pakaian dengan lebih praktis dan nyaman. 
                        Kami menyediakan berbagai layanan laundry, mulai dari cuci lipat, cuci dan 
                        setrika, setrika saja, hingga perawatan bed cover, selimut, gorden, boneka, dan tas.
                        <br></br>
                        Kami memahami kesibukan sehari-hari yang membuat Anda tidak selalu memiliki waktu 
                        untuk mengurus cucian. Karena itu, LAUNDRIA hadir untuk membantu meringankan pekerjaan 
                        Anda agar waktu bisa digunakan untuk hal yang lebih penting. Dengan proses pengerjaan yang 
                        teratur dan pelayanan yang ramah, kami berusaha memberikan hasil yang bersih, rapi, dan wangi.
                    </p>

                    <div class="ab-features">
                        <div class="ab-ft">
                            <div class="ab-ft-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="3"/><circle cx="12" cy="13" r="4"/><path d="M8 7h.01M11 7h.01"/></svg>
                            </div>
                            <h4 class="ab-ft-title">Layanan lengkap</h4>
                            <p>Cuci lipat, cuci dan setrika, setrika saja, hingga bed cover, selimut, gorden, karpet, boneka, tas, dan cuci sepatu.</p>
                        </div>
                        <div class="ab-ft">
                            <div class="ab-ft-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6h11M9 12h11M9 18h11"/><path d="m3.5 6 1 1 2-2M3.5 12l1 1 2-2M3.5 18l1 1 2-2"/></svg>
                            </div>
                            <h4 class="ab-ft-title">Proses teratur</h4>
                            <p>Pengerjaan dilakukan secara teratur dari awal sampai cucian siap diambil.</p>
                        </div>
                        <div class="ab-ft">
                            <div class="ab-ft-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 14a4.5 4.5 0 0 0 7 0"/><path d="M9 9.5h.01M15 9.5h.01"/></svg>
                            </div>
                            <h4 class="ab-ft-title">Pelayanan ramah</h4>
                            <p>Kami siap membantu dengan ramah, mulai dari pemesanan sampai cucian kembali ke Anda.</p>
                        </div>
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
                    <div class="hg-card">
                        
                        @php
                            $labelSatuan = ['kg' => 'Harga / kilogram', 'pcs' => 'Harga / item'];
                        @endphp

                        @forelse (collect($layanan)->groupBy(fn ($i) => strtolower($i->satuan)) as $satuan => $items)
                            <div class="hg-group">
                                <h3 class="hg-group-title"> {{ $labelSatuan[$satuan] ?? 'Harga /' . $satuan }}</h3>
                                <ul class="hg-list">
                                    @foreach ($items as $item)
                                        <li class="hg-row">
                                            <div>
                                                <p class="hg-name">{{ $item->nama_layanan }}</p>
                                                @if ($item->estimasi)
                                                    <p class="hg-eta">Estimasi selesai {{ $item->estimasi }} jam</p>
                                                @endif
                                            </div>
                                            <div class="hg-price">
                                                Rp{{ number_format($item->harga, 0, ',', '.') }}
                                                <small>per {{ $item->satuan }}</small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @empty
                            <p class="text-center text-muted m-0 p-5">Daftar harga belum tersedia.</p>
                        @endforelse

                        <div class="hg-cta">
                            <div>
                                <strong>Siap memesan?</strong>
                                <span>Pilih layanan dan buat pesenan Anda.</span>
                            </div>
                            <a href="{{ route('login') }}">Pesan Sekarang</a>
                        </div>
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
                <p style="color: var(--text-sec); text-align: center; max-width: 700px; margin: 0 auto 3rem;">
                    Kami membuat proses laundry menjadi lebih praktis, cepat, dan nyaman untuk Anda.
                    Hanya dalam beberapa langkah, pakaian Anda akan kembali bersih, rapi, wangi,
                    dan siap digunakan.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-badge">1</div>
                        <h6>Pesan Sekarang</h6>
                        <p>Daftar/login lalu pilih layanan laundry yang Anda butuhkan, lalu tentukan jenis perawatan yang sesuai.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-badge">2</div>
                        <h6>Antar / Jemput</h6>
                        <p>Antarkan pakaian Anda ke LAUNDRIA untuk diproses dengan teliti, atau manfaatkan layanan jemput agar lebih praktis.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-badge">3</div>
                        <h6>Proses Pencucian</h6>
                        <p>Pakaian dicuci dan dirawat dengan teliti sesuai jenis layanan, agar hasilnya bersih, rapi, dan wangi.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-badge">4</div>
                        <h6>Siap Diambil / Antar</h6>
                        <p>Pakaian selesai dicuci dan siap diambil atau kami yang akan mengantar ke rumah Anda.</p>
                    </div>
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
            
            <div class="kt-grid">

                <article class="kt-card kt-main">
                    <div class="kt-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.7-5.4A8.4 8.4 0 1 1 21 11.5Z"/><path d="M9 9.2c.3 2.4 2.4 4.6 5.8 5.6l1-1.3-1.9-1-.9.7c-.8-.4-1.6-1.2-2-2l.7-.9-1-1.9L9 9.2Z"/></svg>
                    </div>
                    <h3>Nomor WhastsApp</h3>
                    <a class="kt-number" href="https://wa.me/6281234567890" target="_blank" rel="noopener">0812-3456-7890</a>
                    <p class="kt-note">Cara tercepat untuk menghubungi kami. Pesan di jam operasional dibalas dalam hitungan menit.</p>
                    <a class="kt-btn" href="https://wa.me/6281234567890?text=Halo%20LAUNDRIA%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20laundry." target="_blank" rel="noopener">Chat via WhatsApp</a>
                </article>

                <article class="kt-card">
                    <div class="kt-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
                    </div>
                    <h3>Alamat</h3>
                    <p class="kt-text">Surakarta, Jawa Tengah</p>
                    <a class="kt-link" href="https://www.google.com/maps/search/?api=1&query=Surakarta%2C+Jawa+Tengah" target="_blank" rel="noopener">Buka di Google Maps</a>
                </article>

                <article class="kt-card">
                    <div class="kt-top">
                        <div class="kt-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        </div>
                        <span id="kt-status" class="kt-status" aria-live="polite"></span>
                    </div>
                    <h3>Jam Operasional</h3>
                    <ul class="kt-hours" id="kt-hours">
                        <li data-days="1,2,3,4,5"><span>Senin - Jumat</span><b>08.00 - 20.00</b></li>
                        <li data-days="6"><span>Sabtu</span><b>08.00 - 18.00</b></li>
                        <li data-days="0" class="is-closed"><span>Minggu</span><b>Tutup</b></li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="ft">
        <div class="container">
            <div class="row g-5">

                {{-- Brand --}}
                <div class="col-lg-4">
                    <h2 class="ft-brand">LAUNDRIA</h2>
                    <p class="ft-desc">Laundry profesional yang membantu merawat pakaian Anda agar tetap bersih, rapi, dan wangi,
                        sehingga waktu Anda bisa dipakai untuk hal yang lebih penting.</p>
                    </div>

                    {{-- Menu --}}
                    <div class="col-6 col-lg-2">
                        <h3 class="ft-title">Menu</h3>
                        <ul class="ft-links">
                            <li><a href="#beranda">Beranda</a></li>
                            <li><a href="#tentang">Tentang Kami</a></li>
                            <li><a href="#layanan">Layanan</a></li>
                            <li><a href="#harga">Harga</a></li>
                            <li><a href="#cara-kerja">Cara Kerja</a></li>
                            <li><a href="#kontak">Kontak</a></li>
                        </ul>
                    </div>
                    
                    {{-- Layanan (otomatis dari database) --}}
                    <div class="col-6 col-lg-3">
                        <h3 class="ft-title">Layanan</h3>
                        <ul class="ft-links">
                            @foreach (collect($layanan)->take(6) as $item)
                                 <li><a href="#layanan">{{ $item->nama_layanan }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Kontak + CTA --}}
                    <div class="col-lg-3">
                        <h3 class="ft-title">Hubungi Kami</h3>
                        <ul class="ft-contact">
                            <li>
                                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.7-5.4A8.4 8.4 0 1 1 21 11.5Z"/><path d="M9 9.2c.3 2.4 2.4 4.6 5.8 5.6l1-1.3-1.9-1-.9.7c-.8-.4-1.6-1.2-2-2l.7-.9-1-1.9L9 9.2Z"/></svg>
                                 <a href="https://wa.me/6281234567890" target="_blank" rel="noopener">0812-3456-7890</a>
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
                                <span>Surakarta, Jawa Tengah</span>
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                                 <span>Senin - Jumat, 08.00 - 20.00<br>Sabtu, 08.00 - 18.00<br>Minggu, tutup</span>
                            </li>
                        </ul>
                        <a href="{{ route('login') }}" class="ft-btn">Pesan Sekarang</a>
                    </div>

                </div>

                <div class="ft-bottom">
                     <span>&copy; {{ date('Y') }} LAUNDRIA. Semua hak cipta dilindungi.</span>
                     <a href="#beranda">Kembali ke atas &uarr;</a>
                </div>
            </div>
    </footer>

    <script>
        (function () {
            var jadwal = {0: null, 1: [8, 20], 2: [8, 20], 3: [8, 20], 4: [8, 20], 5: [8, 20], 6: [8, 18]};
            var now  = new Date(new Date().toLocaleString('en-US', {timeZone: 'Asia/Jakarta'}));
            var day  = now.getDay();
            var hour = now.getHours() + now.getMinutes() / 60;
            var jam  = jadwal[day];
            var buka = jam && hour >= jam[0] && hour < jam[1];

            var status = document.getElementById('kt-status');
            if (status) {
                status.textContent = buka ? 'Buka sekarang' : 'Tutup sekarang';
                status.className = 'kt-status ' + (buka ? 'is-open' : 'is-closed');
            }
            document.querySelectorAll('#kt-hours li').forEach(function (li) {
                if (li.dataset.days.split(',').indexOf(String(day)) > -1) li.classList.add('is-today');
            });
        })();
    </script>
</body>
</html>