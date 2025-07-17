@extends('layouts.app')

@section('content')
<div class="row g-4 h-100">
    {{-- Left Section: Categories & Product List --}}
    <div class="col-md-8 d-flex flex-column bg-white rounded shadow-sm p-4">
        {{-- Header Categories & Search --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 fw-bold text-dark">Categories</h2>
            <div class="d-flex align-items-center gap-3">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Search menu">
                </div>
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-funnel"></i>
                </button>
            </div>
        </div>

        {{-- Category Filter Buttons (assuming x-ui.category-filter-button exists) --}}
        <div class="d-flex flex-nowrap overflow-auto pb-2 mb-4 gap-3">
            <x-ui.category-filter-button name="All menu" icon="bi-grid" active />
            <x-ui.category-filter-button name="Appetizer" icon="bi-egg-fried" />
            <x-ui.category-filter-button name="Soup" icon="bi-bowl-hot" />
            <x-ui.category-filter-button name="Salads" icon="bi-leaf" />
            <x-ui.category-filter-button name="Main Course" icon="bi-hand-thumbs-up" />
            <x-ui.category-filter-button name="Italian" icon="bi-flag-fill" />
            <x-ui.category-filter-button name="Side Dish" icon="bi-basket" />
            <x-ui.category-filter-button name="Dessert" icon="bi-cake" />
            <x-ui.category-filter-button name="Beverages" icon="bi-cup-straw" />
        </div>

        {{-- Product List Container --}}
        <div id="product-list-container" class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 overflow-auto pe-2">
            {{-- Products will be rendered here by JavaScript --}}
        </div>
    </div>

    {{-- Right Section: Order Details --}}
    <div class="col-md-4 d-flex flex-column bg-white rounded shadow-sm p-4">
        <h2 class="h4 fw-bold text-dark mb-4">Order details</h2>

        {{-- Order Type Tabs --}}
        <ul class="nav nav-pills nav-fill mb-4 bg-light rounded p-1" id="order-type-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-order-type="dine-in">Dine-in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-order-type="takeaway">Takeaway</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-order-type="delivery">Delivery</a>
            </li>
        </ul>

        {{-- Customer Info --}}
        <div class="row g-3 mb-4">
            <div class="col-6">
                <label for="customer_name" class="form-label small text-secondary">Customer name</label>
                <input type="text" id="customer_name" value="Darius Sinarumulia" class="form-control form-control-sm">
            </div>
            <div class="col-6">
                <label for="table_number" class="form-label small text-secondary">Table number</label>
                <input type="text" id="table_number" value="04" class="form-control form-control-sm">
            </div>
        </div>

        {{-- Ordered Items --}}
        <h3 class="h6 fw-semibold text-dark mb-3 d-flex justify-content-between align-items-center">
            Ordered menu
            <span id="order-item-count" class="badge bg-secondary text-light rounded-pill">0 items</span>
        </h3>
        <div class="flex-grow-1 overflow-auto pe-2 mb-4">
            <div id="order-items-list" class="order-items-list">
                {{-- Ordered items will be dynamically inserted here by JavaScript --}}
                <p class="text-muted text-center mt-3">Your order list is empty.</p>
            </div>
        </div>

        {{-- Total --}}
        <div class="pt-4 border-top">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Subtotal</span>
                <span id="order-subtotal" class="fw-semibold text-dark">$0.00</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-secondary">Taxes (<span id="tax-percentage">5</span>%)</span>
                <span id="order-taxes" class="fw-semibold text-dark">$0.00</span>
            </div>
            <div class="d-flex justify-content-between pt-2 border-top">
                <span class="h5 fw-bold text-dark">Total</span>
                <span id="order-total" class="h5 fw-bold text-dark">$0.00</span>
            </div>
        </div>

        <button class="btn btn-success btn-lg mt-4 w-100">
            Confirm
        </button>
    </div>
</div>
@endsection