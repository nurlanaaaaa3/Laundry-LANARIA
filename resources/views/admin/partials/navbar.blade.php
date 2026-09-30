<style>
    :root {
        --lnd-blue: #07549A;
        --lnd-dark: #063B70;
        --lnd-medium: #1976B8;
        --lnd-light: #EAF4FC;
    }
    .navbar-admin {
        background: linear-gradient(90deg, var(--lnd-dark), var(--lnd-blue));
        box-shadow: 0 2px 12px rgba(6, 59, 112, 0.15);
        padding: 14px 0;
    }
    .navbar-admin .navbar-brand {
        font-family: 'Playfair Display', serif;
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 20px;
        letter-spacing: 0.5px;
    }
    .navbar-admin .nav-link {
        color: rgba(255,255,255,0.85) !important;
        font-weight: 500;
        font-size: 14px;
        padding: 8px 14px !important;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    .navbar-admin .nav-link:hover {
        color: #FFFFFF !important;
        background-color: rgba(255,255,255,0.12);
    }
    .navbar-admin .nav-link.active {
        color: #FFFFFF !important;
        background-color: rgba(255,255,255,0.18);
        font-weight: 600;
    }
    .navbar-admin .btn-logout {
        background-color: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.3);
        color: #FFFFFF;
        font-size: 13px;
        transition: all 0.2s ease;
    }
    .navbar-admin .btn-logout:hover {
        background-color: rgba(255,255,255,0.25);
        color: #FFFFFF;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-admin">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">LAUNDRIA Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" style="border-color: rgba(255,255,255,0.4);">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}" href="{{ route('admin.pelanggan.index') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}" href="{{ route('admin.layanan.index') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}" href="{{ route('admin.transaksi.index') }}">Transaksi</a>
                </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout btn-sm px-3">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>