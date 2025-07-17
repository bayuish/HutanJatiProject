{{-- resources/views/components/ui/category-filter-button.blade.php --}}
@props(['name', 'icon', 'active' => false])

<button class="btn d-flex flex-column align-items-center justify-content-center p-3 rounded shadow-sm text-center flex-shrink-0" style="width: 90px; height: 90px;
    {{ $active ? 'background-color: #0d6efd; color: white;' : 'background-color: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;' }} ">
    <i class="bi {{ $icon }} mb-2" style="font-size: 32px; {{ $active ? 'color: white;' : '' }}"></i> {{-- ⭐ Perubahan utama di sini ⭐ --}}
    <small class="fw-medium">{{ $name }}</small>
</button>