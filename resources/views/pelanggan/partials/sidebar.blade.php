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

    /* Tombol menu untuk mobile */
    .p-toggle,
    .p-overlay {
        display: none;
    }

    @media (max-width: 991px) {
        .p-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1050;
            transform: translateX(-100%);
            transition: transform 0.25s ease;
            overflow-y: auto;
        }
        .p-sidebar.open {
            transform: translateX(0);
            box-shadow: 0 0 40px rgba(15, 23, 42, 0.25);
        }
        .p-overlay {
            display: block;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s ease;
        }
        .p-overlay.show {
            opacity: 1;
            visibility: visible;
        }
        .p-toggle {
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
        .p-toggle svg {
            width: 22px;
            height: 22px;
        }
        .p-topbar {
            padding: 14px 16px 14px 68px;
        }
    }
    @media (max-width: 575px) {
        .p-topbar .user-name {
            display: none;
        }
    }
</style>

<button type="button" class="p-toggle" id="pToggle" aria-label="Buka menu">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
</button>
<div class="p-overlay" id="pOverlay"></div>

<div class="p-sidebar" id="pSidebar">
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

<script>
    (function () {
        var sidebar = document.getElementById('pSidebar');
        var overlay = document.getElementById('pOverlay');
        var toggle  = document.getElementById('pToggle');

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

<style>
    .toast-container-custom {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
        pointer-events: none;
    }
    .toast-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 14px 18px;
        min-width: 280px;
        max-width: 360px;
        box-shadow: 0 8px 28px rgba(0,0,0,0.12);
        pointer-events: auto;
        animation: toastIn 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .toast-item::before {
        content: "";
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        border-radius: 14px 0 0 14px;
    }
    .toast-item.toast-success::before { background: #16A34A; }
    .toast-item.toast-error::before   { background: #DC2626; }
    .toast-item.toast-info::before    { background: #07549A; }
    .toast-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px; flex-shrink: 0;
    }
    .toast-success .toast-icon { background: #DCFCE7; color: #16A34A; }
    .toast-error   .toast-icon { background: #FEE2E2; color: #DC2626; }
    .toast-info    .toast-icon { background: #EAF4FC; color: #07549A; }
    .toast-msg { font-size: 13.5px; font-weight: 500; color: #1F2937; flex: 1; }
    .toast-close { background: none; border: none; color: #94A3B8; font-size: 18px; cursor: pointer; padding: 0; line-height: 1; flex-shrink: 0; }
    .toast-close:hover { color: #374151; }
    .toast-progress {
        position: absolute;
        bottom: 0; left: 0;
        height: 3px;
        border-radius: 0 0 14px 14px;
        animation: toastProgress 3.5s linear forwards;
    }
    .toast-success .toast-progress { background: #16A34A; }
    .toast-error   .toast-progress { background: #DC2626; }
    .toast-info    .toast-progress { background: #07549A; }
    @keyframes toastIn {
        from { opacity: 0; transform: translateX(40px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes toastOut {
        from { opacity: 1; transform: translateX(0); }
        to   { opacity: 0; transform: translateX(40px); }
    }
    @keyframes toastProgress {
        from { width: 100%; }
        to   { width: 0%; }
    }

    .btn-loading { position: relative; pointer-events: none; opacity: 0.8; }
    .btn-loading::after {
        content: "";
        display: inline-block;
        width: 14px; height: 14px;
        border: 2px solid rgba(255,255,255,0.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        margin-left: 8px;
        vertical-align: middle;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>

<div class="toast-container-custom" id="toastContainer"></div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showToast('{{ addslashes(session('success')) }}', 'success');
    });
</script>
@endif
@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showToast('{{ addslashes(session('error')) }}', 'error');
    });
</script>
@endif

<script>
function showToast(msg, type = 'success') {
    const icons = {
        success: '<i class="bi bi-check-circle-fill"></i>',
        error:   '<i class="bi bi-x-circle-fill"></i>',
        info:    '<i class="bi bi-info-circle-fill"></i>',
    };
    const container = document.getElementById('toastContainer');
    const el = document.createElement('div');
    el.className = `toast-item toast-${type}`;
    el.innerHTML = `
        <div class="toast-icon">${icons[type] || icons.info}</div>
        <div class="toast-msg">${msg}</div>
        <button class="toast-close" onclick="removeToast(this.parentElement)">&times;</button>
        <div class="toast-progress"></div>
    `;
    container.appendChild(el);
    setTimeout(() => removeToast(el), 3500);
}

function removeToast(el) {
    if (!el || !el.parentElement) return;
    el.style.animation = 'toastOut 0.3s ease forwards';
    setTimeout(() => el.remove(), 300);
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('form').forEach(function (form) {
        form.addEventListener('submit', function () {
            const btn = form.querySelector('button[type="submit"], .btn-simpan, .btn-kirim');
            if (btn) {
                const originalText = btn.innerHTML;
                btn.innerHTML = originalText.replace(/<i[^>]*><\/i>/g, '').trim() + ' Menyimpan...';
                btn.classList.add('btn-loading');
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.remove('btn-loading');
                }, 8000);
            }
        });
    });
});
</script>
