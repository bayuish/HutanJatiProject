{{-- resources/views/components/ui/product-card.blade.php --}}
@props(['id', 'name', 'category', 'review' => null, 'price', 'image'])

<div class="card h-100 shadow-sm border-0 product-card"> {{-- Added product-card class --}}
    <img src="{{ asset('img/' . $image) }}" class="card-img-top" alt="{{ $name }}" style="height: 140px; object-fit: cover;">
    <div class="card-body d-flex flex-column text-center">
        <h5 class="card-title fw-semibold text-dark mb-1">{{ $name }}</h5>
        <p class="card-text small text-secondary mb-1">{{ $category }}</p>
        @if ($review)
            <p class="card-text text-success small fw-medium mb-2">{{ $review }}</p>
        @endif
        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
            <p class="card-text h5 fw-bold text-dark mb-0">${{ number_format($price, 2) }}</p>
            <button class="btn btn-primary btn-sm d-flex align-items-center gap-1 add-to-cart-btn"
                data-product-id="{{ $id }}"
                data-product-name="{{ $name }}"
                data-product-price="{{ $price }}"
                data-product-image="{{ $image }}">
                <i class="bi bi-plus"></i> Add
            </button>
        </div>
    </div>
</div>