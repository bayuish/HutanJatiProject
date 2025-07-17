{{-- resources/views/components/layout/sidebar.blade.php --}}
<aside class="d-flex flex-column align-items-center justify-content-between bg-white shadow py-4" style="width: 80px;">
    <div class="d-flex flex-column align-items-center">
        <a href="#" class="mb-5">
            <img src="{{ asset('img/logo/logo.svg') }}" alt="Logo" class="img-fluid" style="width: 40px; height: 40px;">
        </a>
        <nav class="nav flex-column text-center">
            <a href="{{ route('dashboard') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2 {{ request()->routeIs('dashboard') ? 'active-sidebar-link' : '' }}">
                <i class="bi bi-speedometer2 fs-4 mb-1"></i> {{-- Bootstrap Icon for Dashboard --}}
                <small>Dashboard</small>
            </a>
            <a href="{{ route('menu.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2 {{ request()->routeIs('menu.*') ? 'active-sidebar-link' : '' }}">
                <i class="bi bi-grid fs-4 mb-1"></i> {{-- Bootstrap Icon for Menu (e.g., a grid) --}}
                <small>Menu</small>
            </a>
            <a href="{{ route('stock.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <i class="bi bi-box-seam fs-4 mb-1"></i> {{-- Bootstrap Icon for Stock (e.g., a box) --}}
                <small>Stock</small>
            </a>
            <a href="{{ route('tables.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <i class="bi bi-table fs-4 mb-1"></i> {{-- Bootstrap Icon for Table --}}
                <small>Table</small>
            </a>
            <a href="{{ route('history.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <i class="bi bi-clock-history fs-4 mb-1"></i> {{-- Bootstrap Icon for History (e.g., clock history) --}}
                <small>History</small>
            </a>
            <a href="{{ route('settings.index') }}" class="nav-link text-secondary d-flex flex-column align-items-center py-2">
                <i class="bi bi-gear fs-4 mb-1"></i> {{-- Bootstrap Icon for Settings (a gear) --}}
                <small>Settings</small>
            </a>
        </nav>
    </div>
    <div>
        {{-- Optional: Logout button or mini profile --}}
    </div>
</aside>