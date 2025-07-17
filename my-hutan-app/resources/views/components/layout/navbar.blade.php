{{-- resources/views/components/layout/navbar.blade.php --}}
<header class="bg-white shadow-sm p-3 d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        {{-- Current Orders / Tables Status --}}
        <x-ui.current-order-card customer="Michael Jordan" table="Table 12" items="12 Items" price="$290" type="success" />
        <x-ui.current-order-card customer="Sulwo Bejo" table="Table 09" items="4 Items" price="$180" type="info" />
        <x-ui.current-order-card customer="Dera Rikani" table="Table 10" items="6 Items" price="$190" type="warning" />
        <x-ui.current-order-card customer="Filipus Seris" table="Table 1" items="3 Items" price="$90" type="danger" />
    </div>
    <div class="d-flex align-items-center gap-3">
        <span class="text-secondary">Sania</span>
        <img src="{{ asset('img/users/sania.jpg') }}" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
        <button class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
            <i class="bi bi-three-dots"></i>
        </button>
    </div>
</header>