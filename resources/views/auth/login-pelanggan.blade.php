<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #EAF4FC;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .auth-card {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 32px;
        }
        @media (max-width: 575px) {
            .container {
                padding-left: 12px;
                padding-right: 12px;
            }
            .auth-card {
                max-width: 100%;
                padding: 20px 16px;
            }
            .auth-card h1 {
                font-size: 20px;
            }
        }
        .auth-card h1 {
            font-family: 'Playfair Display', serif;
            color: #063B70;
            font-size: 24px;
            margin-bottom: 4px;
        }
        .auth-card p {
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
        .auth-card a {
            color: #07549A;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <h1>LAUNDRIA</h1>
            <p>Login untuk pelanggan</p>

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <p class="text-center mt-3 mb-0">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>