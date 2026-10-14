<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LAUNDRIA</title>
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
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(60% 70% at 15% 10%, rgba(25, 118, 184, 0.16), transparent 70%),
                var(--light-blue);
        }

        .auth {
            width: 100%;
            max-width: 920px;
            display: grid;
            grid-template-columns: 5fr 6fr;
            background: #FFFFFF;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 70px -30px rgba(6, 59, 112, 0.45);
        }

        /* Panel kiri */
        .auth-side {
            background: linear-gradient(180deg, rgba(6, 59, 112, 0.85) 0%, rgba(6, 59, 112, 0.25) 45%, rgba(6, 59, 112, 0.92) 100%), url('{{ asset('images/servislaundry.png') }}') center 30% / cover no-repeat;
            color: #FFFFFF;
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 32px;
        }
        .auth-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: #FFFFFF;
            text-decoration: none;
        }
        .auth-title { font-family: 'Playfair Display', serif; font-size: 1.7rem; font-weight: 700; line-height: 1.3; margin: 0 0 12px; }
        .auth-desc { margin: 0; font-size: 14.5px; line-height: 1.8; color: #CFE3F7; }

        /* Form */
        .auth-form { padding: 56px 48px; }
        .auth-form h1 { font-family: 'Playfair Display', serif; font-size: 1.9rem; font-weight: 700; color: var(--dark-blue); margin: 0 0 8px; }
        .auth-sub { margin: 0 0 32px; font-size: 14.5px; color: var(--text-sec); }

        .field { margin-bottom: 20px; }
        .field label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; }
        .input { position: relative; }
        .input .ico { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: #94A3B8; pointer-events: none; }
        .input input {
            width: 100%;
            height: 50px;
            padding: 0 48px 0 44px;
            border: 1px solid var(--border-c);
            border-radius: 12px;
            background: var(--off-white);
            font: inherit;
            font-size: 15px;
            color: var(--text-main);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }
        .input input:focus {
            outline: 0;
            border-color: var(--main-blue);
            background: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(7, 84, 154, 0.12);
        }
        .toggle {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 10px;
            background: transparent;
            color: #94A3B8;
            cursor: pointer;
        }
        .toggle:hover { color: var(--main-blue); background: var(--light-blue); }
        .toggle svg { width: 20px; height: 20px; }

        .btn-login {
            width: 100%;
            height: 52px;
            margin-top: 8px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--main-blue), var(--dark-blue));
            color: #FFFFFF;
            font: inherit;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 24px -10px rgba(7, 84, 154, 0.6);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 14px 28px -10px rgba(7, 84, 154, 0.7); }

        .alert {
            margin-bottom: 20px;
            padding: 12px 16px;
            border: 1px solid #F3D4D1;
            border-radius: 12px;
            background: #FBEEED;
            color: #9B2C26;
            font-size: 14px;
        }
        .auth-links { margin-top: 28px; text-align: center; font-size: 14px; color: var(--text-sec); }
        .auth-links a { color: var(--main-blue); font-weight: 500; text-underline-offset: 4px; }

        .btn-login:focus-visible, .toggle:focus-visible, .auth a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; }

        @media (max-width: 767px) {
            body { padding: 16px; }
            .auth { grid-template-columns: 1fr; max-width: 440px; }
            .auth-side { padding: 24px 28px; }
            .auth-title, .auth-desc { display: none; }
            .auth-form { padding: 32px 28px 36px; }
        }
    </style>
</head>
<body>

    <main class="auth">

        <aside class="auth-side">
            <a href="{{ url('/') }}" class="auth-brand">LAUNDRIA</a>
            <div>
                <h2 class="auth-title">Kelola laundry dalam satu tempat.</h2>
                <p class="auth-desc">Atur pelanggan, layanan, transaksi, dan laporan dengan lebih rapi dan mudah.</p>
            </div>
        </aside>

        <section class="auth-form">
            <h1>Selamat Datang</h1>
            <p class="auth-sub">Login untuk admin &amp; kasir</p>

            @if ($errors->any() || session('error'))
                <div class="alert" role="alert">{{ session('error') ?? $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="field">
                    <label for="username">Username</label>
                    <div class="input">
                        <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="off" placeholder="Masukkan username" required autofocus>
                    </div>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="input">
                        <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg>
                        <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Masukkan password" required>
                        <button type="button" class="toggle" data-target="password" aria-label="Tampilkan password">
                            <svg class="eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-off" style="display:none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3l18 18"/><path d="M10.6 6.1A10 10 0 0 1 12 5c6.5 0 10 7 10 7a17 17 0 0 1-3.2 4.2M6.6 6.7A16.5 16.5 0 0 0 2 12s3.5 7 10 7a9.700 9.700 0 0 0 4.200-.9"/><path d="M9.900 9.900a3 3 0 0 0 4.200 4.200"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="auth-links">
                <a href="{{ url('/') }}">&larr; Kembali ke beranda</a>
            </div>
        </section>

    </main>

    <script>
        document.querySelectorAll('.toggle').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = document.getElementById(btn.dataset.target);
                var show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
                btn.querySelector('.eye').style.display = show ? 'none' : '';
                btn.querySelector('.eye-off').style.display = show ? '' : 'none';
            });
        });
    </script>
</body>
</html>