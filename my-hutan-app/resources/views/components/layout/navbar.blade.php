{{-- Contoh perbaikan di sidebar.blade.php Anda --}}
<a href="#" class="nav-link">
    <i class="bi bi-grid"></i> {{-- Icon untuk Dashboard, pilih yang sesuai --}}
    Dashboard
</a>
<a href="#" class="nav-link">
    <i class="bi bi-list-ul"></i> {{-- Icon untuk Menu, pilih yang sesuai --}}
    Menu
</a>
<a href="#" class="nav-link">
    <i class="bi bi-box-seam"></i> {{-- Contoh untuk Stock --}}
    Stock
</a>
<a href="#" class="nav-link">
    <i class="bi bi-tablet"></i> {{-- Contoh untuk Table --}}
    Table
</a>
<a href="#" class="nav-link">
    <i class="bi bi-clock-history"></i> {{-- Contoh untuk History --}}
    History
</a>
<a href="#" class="nav-link">
    <i class="bi bi-gear"></i> {{-- Contoh untuk Settings --}}
    Settings
</a>

{{-- Untuk logo di sidebar, jika ada: --}}
{{-- Jika logo adalah teks saja: --}}
<h4 class="fw-bold text-white mb-4">Your App Name</h4>
{{-- Jika logo adalah gambar dan Anda ingin tetap memakainya (pastikan path benar): --}}
<img src="{{ asset('img/logo/ocoo_logo.svg') }}" alt="Logo Anda" class="mb-4" style="width: 100px;">