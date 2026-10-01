<style>
    :root {
        --lnd-blue: #07549A;
        --lnd-dark: #063B70;
        --lnd-medium: #1976B8;
        --lnd-light: #EAF4FC;
    }
    body { background-color: #F1F5F9; font-family: 'Poppins', sans-serif; }
    .p-wrapper { display: flex; min-height: 100vh; }
    .p-sidebar {
        width: 230px;
        background: #FFFFFF;
        border-right: 1px solid #E5E7EB;
        flex-shrink: 0;
        padding: 24px 16px;
        position: sticky;
        top: 0;
        height: 100vh;
    }
    .p-sidebar .brand {
        font-family: 'Playfair Display', serif;
        color: var(--lnd-dark);
        font-weight: 700;
        font-size: 22px;
        padding: 0 12px 24px;
    }
    .p-sidebar .nav-link {
        color: #475569;
        font-weight: 500;
        font-size: 14px;
        padding: 11px 14px;
        border-radius: 8px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.15s ease;
    }
    .p-sidebar .nav-link:hover {
        background-color: var(--lnd-light);
        color: var(--lnd-blue);
    }
    .p-sidebar .nav-link.active {
        background-color: var(--lnd-blue);
        color: #FFFFFF;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(7, 84, 154, 0.25);
    }
    .p-sidebar .nav-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: currentColor;
        opacity: 0.6;
    }
    .p-topbar {
        background: #FFFFFF;
        border-bottom: 1px solid #E5E7EB;
        padding: 14px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .p-topbar .user-name { font-weight: 600; color: #1F2937; font-size: 14px; }
    .p-content { flex: 1; min-width: 0; }
    .btn-logout-p {
        background-color: #FEE2E2;
        border: none;
        color: #DC2626;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        padding: 6px 14px;
    }
    .btn-logout-p:hover { background-color: #FECACA; color: #B91C1C; }
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

<div class="p-sidebar">
    <div class="brand">LAUNDRIA</div>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}" href="{{ route('pelanggan.dashboard') }}">
            <span class="nav-dot"></span> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('booking.create') ? 'active' : '' }}" href="{{ route('booking.create') }}">
            <span class="nav-dot"></span> Pesan Sekarang
        </a>
        <a class="nav-link {{ request()->routeIs('pelanggan.profile') ? 'active' : '' }}" href="{{ route('pelanggan.profile') }}">
            <span class="nav-dot"></span> Profil Saya
        </a>
        <a class="nav-link" href="{{ route('landing') }}#layanan">
            <span class="nav-dot"></span> Layanan LAUNDRIA
        </a>
        <a class="nav-link" href="{{ route('landing') }}">
            <span class="nav-dot"></span> Beranda Website
        </a>
    </nav>
</div>