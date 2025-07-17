{{-- resources/views/components/ui/category-filter-button.blade.php --}}
@props(['name', 'icon', 'active' => false])

<button class="btn category-filter-btn d-flex flex-column align-items-center justify-content-center p-3 rounded shadow-sm text-center flex-shrink-0"
    style="width: 90px; height: 90px;
    {{ $active ? 'background-color: #0d6efd; color: white;' : 'background-color: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;' }}"
    data-category="{{ Str::lower(str_replace(' ', '-', $name)) }}"> {{-- ⭐ Perubahan Utama di sini: Tambahkan data-category ⭐ --}}
    <i class="bi {{ $icon }} mb-2" style="font-size: 32px; {{ $active ? 'color: white;' : '' }}"></i>
    <small class="fw-medium">{{ $name }}</small>
</button>