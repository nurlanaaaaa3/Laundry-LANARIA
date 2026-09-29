<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h3>Login Berhasil</h3>
        <p>Selamat datang, <strong>{{ Auth::user()->nama }}</strong> ({{ Auth::user()->role }})</p>
        <p class="text-muted">Halaman ini sementara.</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</body>
</html>