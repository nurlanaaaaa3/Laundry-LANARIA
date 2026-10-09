<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #EAF4FC;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 24px 0;
        }
        .register-card {
            max-width: 420px;
            width: 100%;
            margin: 0 auto;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 32px;
        }
        @media (max-width: 575px) {
            .register-card {
                max-width: 90%;
                padding: 24px 20px;
            }
            .register-card h1 {
                font-size: 20px;
            }
        }
        .register-card h1 {
            font-family: 'Playfair Display', serif;
            color: #063B70;
            font-size: 24px;
            margin-bottom: 4px;
        }
        .register-card p {
            color: #64748B;
            font-size: 14px;
            margin-bottom: 24px;
        }
        .btn-primary {
            background-color: #07549A;
            border-color: #07549A;
        }
        .btn-primary:hover {
            background-color: #063B70;
            border-color: #063B70;
        }
        a {
            color: #07549A;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card">
            <h1>LAUNDRIA</h1>
            <p>Daftar akun untuk menggunakan layanan laundry</p>

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>

            <p class="text-center mt-3 mb-0">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </div>
    </div>
</body>
</html>