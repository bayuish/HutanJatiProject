{{-- resources/views/components/ui/order-item-card.blade.php --}}
@props(['itemId', 'name', 'quantity', 'price', 'total', 'image'])

<div class="d-flex align-items-center gap-3 p-3 border rounded bg-light order-item-card" data-item-id="{{ $itemId }}">
    <img src="{{ asset('img/' . $image) }}" alt="{{ $name }}" class="rounded" style="width: 64px; height: 64px; object-fit: cover;">
    <div class="flex-grow-1">
        <h6 class="fw-semibold text-dark mb-1">{{ $name }}</h6>
        <p class="small text-secondary mb-1">${{ number_format($price, 2) }}</p>
        <div class="d-flex align-items-center gap-2 mt-1">
            <button class="btn btn-outline-secondary btn-sm p-0 d-flex align-items-center justify-content-center quantity-btn" data-action="decrease" style="width: 24px; height: 24px;"><i class="bi bi-dash"></i></button>
            <span class="fw-medium text-dark item-quantity">{{ $quantity }}</span>
            <button class="btn btn-outline-secondary btn-sm p-0 d-flex align-items-center justify-content-center quantity-btn" data-action="increase" style="width: 24px; height: 24px;"><i class="bi bi-plus"></i></button>
        </div>
    </div>
    <div class="text-end">
        <p class="fw-bold text-dark mb-1 item-total">${{ number_format($total, 2) }}</p>
        <button class="btn btn-link text-danger p-0 small remove-item-btn">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</div>