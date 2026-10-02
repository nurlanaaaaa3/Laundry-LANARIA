<div class="admin-topbar">
    <h5 class="mb-0" style="color:#1F2937; font-weight:600;">{{ $title ?? 'Dashboard' }}</h5>
    <div class="d-flex align-items-center gap-3">
        <div class="text-end">
            <div class="user-name">{{ Auth::user()->nama }}</div>
            <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-logout-sb">Logout</button>
        </form>
    </div>
</div>