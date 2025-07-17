{{-- resources/views/components/ui/current-order-card.blade.php --}}
@props(['customer', 'table', 'items', 'price', 'type' => 'info'])

@php
    $bgColor = '';
    $borderColor = '';
    $textColor = '';
    switch ($type) {
        case 'success':
            $bgColor = 'bg-success-subtle';
            $borderColor = 'border-success';
            $textColor = 'text-success';
            break;
        case 'info':
            $bgColor = 'bg-info-subtle';
            $borderColor = 'border-info';
            $textColor = 'text-info';
            break;
        case 'warning':
            $bgColor = 'bg-warning-subtle';
            $borderColor = 'border-warning';
            $textColor = 'text-warning';
            break;
        case 'danger':
            $bgColor = 'bg-danger-subtle';
            $borderColor = 'border-danger';
            $textColor = 'text-danger';
            break;
        default:
            $bgColor = 'bg-light';
            $borderColor = 'border-secondary';
            $textColor = 'text-secondary';
            break;
    }
@endphp

<div class="d-flex align-items-center gap-3 p-2 rounded {{ $bgColor }} border {{ $borderColor }}">
    <div class="rounded-circle d-flex align-items-center justify-content-center border border-2 {{ $borderColor }}" style="width: 40px; height: 40px;">
        <span class="fw-bold {{ $textColor }}">{{ Str::substr($customer, 0, 1) }}</span>
    </div>
    <div>
        <p class="fw-semibold mb-0 text-dark">{{ $customer }}</p>
        <p class="small text-secondary mb-0">{{ $table }}</p>
        <p class="text-muted small mb-0">{{ $items}} | {{ $price }}</p>
    </div>
</div>