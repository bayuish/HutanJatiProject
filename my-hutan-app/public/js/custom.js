// public/js/custom.js

document.addEventListener('DOMContentLoaded', function() {
    const productListContainer = document.getElementById('product-list-container');
    const orderItemsList = document.getElementById('order-items-list');
    const orderItemCountSpan = document.getElementById('order-item-count');
    const orderSubtotalSpan = document.getElementById('order-subtotal');
    const orderTaxesSpan = document.getElementById('order-taxes');
    const orderTotalSpan = document.getElementById('order-total');
    const taxPercentage = 0.05; // 5% tax

    let products = [
        { id: 1, name: "Crispy Calamari", category: "Appetizer", review: "Best seller", price: 22.90, image: "products/crispy-calamari.jpg" },
        { id: 2, name: "Chicken Tofu Soup", category: "Soup", review: "Best seller", price: 12.90, image: "products/chicken-tofu-soup.jpg" },
        { id: 3, name: "Quinoa Salad", category: "Salads", review: "Best seller", price: 4.90, image: "products/quinoa-salad.jpg" },
        { id: 4, name: "Beef Wellington", category: "Main Course", review: "Best seller", price: 22.50, image: "products/beef-wellington.jpg" },
        { id: 5, name: "Seafood Tempting", category: "Italian", price: 18.50, image: "products/seafood-tempting.jpg" },
        { id: 6, name: "Melting Brownie", category: "Dessert", price: 7.00, image: "products/melting-brownie.jpg" },
        { id: 7, name: "Cheesy Pizza", category: "Italian", price: 15.00, image: "products/cheesy-pizza.jpg" },
        { id: 8, name: "Matcha Ice Cream", category: "Dessert", price: 6.50, image: "products/matcha-ice-cream.jpg" }
    ];

    let currentOrder = []; // Array to hold items in the current order

    // Function to render product cards
    function renderProductCards() {
        if (!productListContainer) return;

        productListContainer.innerHTML = ''; // Clear existing products
        products.forEach(product => {
            const colDiv = document.createElement('div');
            colDiv.className = 'col';

            // Create a temporary div to render the Blade component HTML
            const tempDiv = document.createElement('div');
            // Using backticks for template literals to embed variables
            tempDiv.innerHTML = `
                <div class="card h-100 shadow-sm border-0 product-card">
                    <img src="/img/${product.image}" class="card-img-top" alt="${product.name}" style="height: 140px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title fw-semibold text-dark mb-1">${product.name}</h5>
                        <p class="card-text small text-secondary mb-1">${product.category}</p>
                        ${product.review ? `<p class="card-text text-success small fw-medium mb-2">${product.review}</p>` : ''}
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <p class="card-text h5 fw-bold text-dark mb-0">$${product.price.toFixed(2)}</p>
                            <button class="btn btn-primary btn-sm d-flex align-items-center gap-1 add-to-cart-btn"
                                data-product-id="${product.id}"
                                data-product-name="${product.name}"
                                data-product-price="${product.price}"
                                data-product-image="${product.image}">
                                <i class="bi bi-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            `;
            colDiv.appendChild(tempDiv.firstChild); // Append the actual card element
            productListContainer.appendChild(colDiv);
        });

        // Attach event listeners to new "Add" buttons
        attachAddToCartListeners();
    }

    // Function to attach event listeners to "Add" buttons
    function attachAddToCartListeners() {
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = parseInt(this.dataset.productId);
                const productName = this.dataset.productName;
                const productPrice = parseFloat(this.dataset.productPrice);
                const productImage = this.dataset.productImage;

                addItemToOrder(productId, productName, productPrice, productImage);
            });
        });
    }

    // Function to add item to current order
    function addItemToOrder(id, name, price, image) {
        const existingItem = currentOrder.find(item => item.id === id);

        if (existingItem) {
            existingItem.quantity++;
        } else {
            currentOrder.push({
                id: id,
                name: name,
                price: price,
                image: image,
                quantity: 1
            });
        }
        renderOrderDetails();
    }

    // Function to render order details (right section)
    function renderOrderDetails() {
        if (!orderItemsList) return;

        orderItemsList.innerHTML = ''; // Clear existing items

        let subtotal = 0;
        let totalItems = 0;

        currentOrder.forEach(item => {
            const itemTotal = item.quantity * item.price;
            subtotal += itemTotal;
            totalItems += item.quantity;

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = `
                <div class="d-flex align-items-center gap-3 p-3 border rounded bg-light order-item-card" data-item-id="${item.id}">
                    <img src="/img/${item.image}" alt="${item.name}" class="rounded" style="width: 64px; height: 64px; object-fit: cover;">
                    <div class="flex-grow-1">
                        <h6 class="fw-semibold text-dark mb-1">${item.name}</h6>
                        <p class="small text-secondary mb-1">$${item.price.toFixed(2)}</p>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <button class="btn btn-outline-secondary btn-sm p-0 d-flex align-items-center justify-content-center quantity-btn" data-action="decrease" style="width: 24px; height: 24px;"><i class="bi bi-dash"></i></button>
                            <span class="fw-medium text-dark item-quantity">${item.quantity}</span>
                            <button class="btn btn-outline-secondary btn-sm p-0 d-flex align-items-center justify-content-center quantity-btn" data-action="increase" style="width: 24px; height: 24px;"><i class="bi bi-plus"></i></button>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="fw-bold text-dark mb-1 item-total">$${itemTotal.toFixed(2)}</p>
                        <button class="btn btn-link text-danger p-0 small remove-item-btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            orderItemsList.appendChild(tempDiv.firstChild);
        });

        const taxes = subtotal * taxPercentage;
        const total = subtotal + taxes;

        orderItemCountSpan.textContent = `${totalItems} items`;
        orderSubtotalSpan.textContent = `$${subtotal.toFixed(2)}`;
        orderTaxesSpan.textContent = `$${taxes.toFixed(2)}`;
        orderTotalSpan.textContent = `$${total.toFixed(2)}`;

        // Attach event listeners to quantity and remove buttons in the order list
        attachOrderListListeners();
    }

    // Function to attach event listeners to quantity and remove buttons in order list
    function attachOrderListListeners() {
        const quantityButtons = document.querySelectorAll('.order-item-card .quantity-btn');
        const removeButtons = document.querySelectorAll('.order-item-card .remove-item-btn');

        quantityButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = parseInt(this.closest('.order-item-card').dataset.itemId);
                const action = this.dataset.action;
                updateItemQuantity(itemId, action);
            });
        });

        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = parseInt(this.closest('.order-item-card').dataset.itemId);
                removeItemFromOrder(itemId);
            });
        });
    }

    // Function to update item quantity
    function updateItemQuantity(id, action) {
        const itemIndex = currentOrder.findIndex(item => item.id === id);
        if (itemIndex > -1) {
            if (action === 'increase') {
                currentOrder[itemIndex].quantity++;
            } else if (action === 'decrease') {
                if (currentOrder[itemIndex].quantity > 1) {
                    currentOrder[itemIndex].quantity--;
                } else {
                    // If quantity becomes 0, remove the item
                    removeItemFromOrder(id);
                    return; // Exit to avoid re-rendering twice
                }
            }
            renderOrderDetails();
        }
    }

    // Function to remove item from order
    function removeItemFromOrder(id) {
        currentOrder = currentOrder.filter(item => item.id !== id);
        renderOrderDetails();
    }

    // Initial render of product cards
    renderProductCards();
    renderOrderDetails(); // Render initial empty order details
});