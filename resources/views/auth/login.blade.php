<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - LAUNDRIA</title>
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
        .login-card{
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 32px;
        }
        @media (max-width: 575px) {
            .login-card {
                max-width: 90%;
                padding: 24px 20px;
            }
            .login-card h1 {
                font-size: 20px;
            }
        }
        .login-card h1 {
            font-family: 'Playfair Display', serif;
            color: #063b70;
            font-size: 24px;
            margin-bottom: 24px;
        }
        .login-card p {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h1>LAUNDRIA</h1>
            <p>Login untuk admin & kasir</p>

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    {{  $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>