{{-- resources/views/components/layout/sidebar.blade.php --}}
<aside class="d-flex flex-column align-items-center justify-content-between bg-white shadow py-4" style="width: 80px;">
    <div class="d-flex flex-column align-items-center">
        <a href="#" class="mb-5">
            <img src="{{ asset('img/logo/ocoo_logo.svg') }}" alt="Logo" class="img-fluid" style="width: 40px; height: 40px;">
        </a>
        <nav class="nav flex-column text-center">
            <a href="{{ route('dashboard') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2 {{ request()->routeIs('dashboard') ? 'active-sidebar-link' : '' }}">
                <img src="{{ asset('img/icons/nav/dashboard.svg') }}" alt="Dashboard" class="mb-1" style="width: 24px; height: 24px;">
                <small>Dashboard</small>
            </a>
            <a href="{{ route('menu.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2 {{ request()->routeIs('menu.*') ? 'active-sidebar-link' : '' }}">
                <img src="{{ asset('img/icons/nav/menu.svg') }}" alt="Menu" class="mb-1" style="width: 24px; height: 24px;">
                <small>Menu</small>
            </a>
            <a href="{{ route('stock.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <img src="{{ asset('img/icons/nav/stock.svg') }}" alt="Stock" class="mb-1" style="width: 24px; height: 24px;">
                <small>Stock</small>
            </a>
            <a href="{{ route('tables.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <img src="{{ asset('img/icons/nav/table.svg') }}" alt="Table" class="mb-1" style="width: 24px; height: 24px;">
                <small>Table</small>
            </a>
            <a href="{{ route('history.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <img src="{{ asset('img/icons/nav/history.svg') }}" alt="History" class="mb-1" style="width: 24px; height: 24px;">
                <small>History</small>
            </a>
            <a href="{{ route('settings.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <img src="{{ asset('img/icons/nav/settings.svg') }}" alt="Settings" class="mb-1" style="width: 24px; height: 24px;">
                <small>Settings</small>
            </a>
        </nav>
    </div>
    <div>
        {{-- Optional: Logout button or mini profile --}}
    </div>
</aside>