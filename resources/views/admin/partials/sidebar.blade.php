<style>
    :root {
        --lnd-blue: #07549A;
        --lnd-dark: #063B70;
        --lnd-medium: #1976B8;
        --lnd-light: #EAF4FC;
    }
    body {
        background-color: #F1F5F9;
    }
    .admin-wrapper {
        display: flex;
        min-height: 100vh;
    }
    .admin-sidebar {
        width: 230px;
        background: #FFFFFF;
        border-right: 1px solid #E5E7EB;
        flex-shrink: 0;
        padding: 24px 16px;
        position: sticky;
        top: 0;
        height: 100vh;
    }
    .admin-sidebar .brand {
        font-family: 'Playfair Display', serif;
        color: var(--lnd-dark);
        font-weight: 700;
        font-size: 22px;
        padding: 0 12px 24px;
    }
    .admin-sidebar .nav-link {
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
    .admin-sidebar .nav-link:hover {
        background-color: var(--lnd-light);
        color: var(--lnd-blue);
    }
    .admin-sidebar .nav-link.active {
        background-color: var(--lnd-blue);
        color: #FFFFFF;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(7, 84, 154, 0.25);
    }
    .admin-sidebar .nav-icon {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: currentColor;
        opacity: 0.6;
    }
    .admin-topbar {
        background: #FFFFFF;
        border-bottom: 1px solid #E5E7EB;
        padding: 14px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .admin-topbar .user-name {
        font-weight: 600;
        color: #1F2937;
        font-size: 14px;
    }
    .admin-topbar .user-role {
        color: #64748B;
        font-size: 12px;
    }
    .admin-content {
        flex: 1;
        min-width: 0;
    }
    .btn-logout-sb {
        background-color: #FEE2E2;
        border: none;
        color: #DC2626;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        padding: 6px 14px;
    }
    .btn-logout-sb:hover {
        background-color: #FECACA;
        color: #B91C1C;
    }

    /* Tombol menu untuk mobile */
    .sidebar-toggle,
    .sidebar-overlay {
        display: none;
    }

    @media (max-width: 991px) {
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1050;
            transform: translateX(-100%);
            transition: transform 0.25s ease;
            overflow-y: auto;
        }
        .admin-sidebar.open {
            transform: translateX(0);
            box-shadow: 0 0 40px rgba(15, 23, 42, 0.25);
        }
        .sidebar-overlay {
            display: block;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s ease;
        }
        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }
        .sidebar-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 10px;
            left: 12px;
            z-index: 1030;
            width: 42px;
            height: 42px;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            color: var(--lnd-dark);
            cursor: pointer;
        }
        .sidebar-toggle svg {
            width: 22px;
            height: 22px;
        }
        .admin-topbar {
            padding: 14px 16px 14px 68px;
        }
    }
    @media (max-width: 575px) {
        .admin-topbar .text-end {
            display: none;
        }
    }
</style>

<button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Buka menu">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
</button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="admin-sidebar" id="adminSidebar">
    <div class="brand">LAUNDRIA</div>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <span class="nav-icon"></span> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}" href="{{ route('admin.pelanggan.index') }}">
            <span class="nav-icon"></span> Pelanggan
        </a>
        <a class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}" href="{{ route('admin.layanan.index') }}">
            <span class="nav-icon"></span> Layanan
        </a>
        <a class="nav-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}" href="{{ route('admin.transaksi.index') }}">
            <span class="nav-icon"></span> Transaksi
        </a>
        <a class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}" href="{{ route('admin.laporan') }}">
            <span class="nav-icon"></span> Laporan
        </a>
        <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
            <span class="nav-icon"></span> Profil Admin
        </a>
    </nav>
</div>

<script>
    (function () {
        var sidebar = document.getElementById('adminSidebar');
        var overlay = document.getElementById('sidebarOverlay');
        var toggle  = document.getElementById('sidebarToggle');

        function setOpen(open) {
            sidebar.classList.toggle('open', open);
            overlay.classList.toggle('show', open);
        }
        toggle.addEventListener('click', function () {
            setOpen(!sidebar.classList.contains('open'));
        });
        overlay.addEventListener('click', function () {
            setOpen(false);
        });
    })();
</script>