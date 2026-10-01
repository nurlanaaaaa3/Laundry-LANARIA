<style>
    :root {
        --lnd-blue: #07549A;
        --lnd-dark: #063B70;
        --lnd-medium: #1976B8;
        --lnd-light: #EAF4FC;
    }
    body { background-color: #F1F5F9; font-family: 'Poppins', sans-serif; }
    .navbar-p {
        background: linear-gradient(90deg, var(--lnd-dark), var(--lnd-blue));
        box-shadow: 0 2px 12px rgba(6, 59, 112, 0.15);
        padding: 14px 0;
    }
    .navbar-p .navbar-brand {
        font-family: 'Playfair Display', serif;
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 20px;
    }
    .navbar-p .nav-link {
        color: rgba(255,255,255,0.85) !important;
        font-weight: 500;
        font-size: 14px;
        padding: 8px 14px !important;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    .navbar-p .nav-link:hover {
        color: #FFFFFF !important;
        background-color: rgba(255,255,255,0.12);
    }
    .navbar-p .nav-link.active {
        color: #FFFFFF !important;
        background-color: rgba(255,255,255,0.18);
        font-weight: 600;
    }
    .btn-logout-p {
        background-color: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.3);
        color: #FFFFFF;
        font-size: 13px;
    }
    .btn-logout-p:hover { background-color: rgba(255,255,255,0.25); color: #FFFFFF; }
    .content-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
    }
    .table thead th { background-color: var(--lnd-light); color: var(--lnd-dark); font-weight: 600; font-size: 13px; text-transform: uppercase; }
    .badge { padding: 6px 12px !important; border-radius: 20px !important; font-weight: 500 !important; font-size: 12px !important; }
    .badge-menunggu { background-color: #94A3B8; }
    .badge-diproses { background-color: #1976B8; }
    .badge-selesai { background-color: #16A34A; }
    .badge-diambil { background-color: #063B70; }
    .badge-lunas { background-color: #16A34A; }
    .badge-belum_lunas { background-color: #DC2626; }
</style>

<nav class="navbar navbar-expand-lg navbar-p">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('pelanggan.dashboard') }}">LAUNDRIA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pelangganNav" style="border-color: rgba(255,255,255,0.4);">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="pelangganNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}" href="{{ route('pelanggan.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelanggan.profile') ? 'active' : '' }}" href="{{ route('pelanggan.profile') }}">Profil</a>
                </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-logout-p btn-sm px-3">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>