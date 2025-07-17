document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded and parsed. Initializing menu logic.");

    const productListContainer = document.getElementById("product-list-container");
    const orderItemsContainer = document.getElementById("order-items-list");
    const orderItemCountSpan = document.getElementById("order-item-count");
    const orderSubtotalSpan = document.getElementById("order-subtotal");
    const orderTaxesSpan = document.getElementById("order-taxes");
    const orderTotalSpan = document.getElementById("order-total");
    const taxPercentageSpan = document.getElementById("tax-percentage");
    const categoryFilterContainer = document.querySelector(".d-flex.flex-nowrap.overflow-auto.pb-2.mb-4.gap-3"); // Selector untuk container tombol kategori

    // Array to hold order items (our "shopping cart" state)
    let orderItems = [];
    const TAX_RATE = 0.05; // 5% tax

    // Sample product data with CORRECTED IMAGE PATHS
    const products = [
        {
            id: "beef-wellington",
            name: "Beef Wellington",
            image: "img/products/BeefWellington.jpg",
            price: 12.99,
            category: "main-course" // Sesuaikan dengan format slug category
        },
        {
            id: "cheesy-pizza",
            name: "Cheesy Pizza",
            image: "img/products/CheesyPizza.jpg",
            price: 9.50,
            category: "italian" // Contoh, sesuaikan
        },
        {
            id: "chicken-tofu-soup",
            name: "Chicken Tofu Soup",
            image: "img/products/ChickenTofuSoup.jpg",
            price: 8.25,
            category: "soup"
        },
        {
            id: "crispy-calamari",
            name: "Crispy Calamari",
            image: "img/products/CrispyCalamari.jpg",
            price: 7.75,
            category: "appetizer"
        },
        {
            id: "matcha-ice-cream",
            name: "Matcha Ice Cream",
            image: "img/products/MatchaIceCream.jpg",
            price: 5.25,
            category: "dessert"
        },
        {
            id: "melting-brownie",
            name: "Melting Brownie",
            image: "img/products/MeltingBrownie.jpg",
            price: 6.50,
            category: "dessert"
        },
        {
            id: "quinoa-salad",
            name: "Quinoa Salad",
            image: "img/products/QuinoaSalad.jpg",
            price: 6.75,
            category: "salads"
        },
        {
            id: "seafood-tempting",
            name: "Seafood Tempting",
            image: "img/products/SeafoodTempting.jpg",
            price: 11.99,
            category: "main-course" // Contoh, sesuaikan
        }
    ];

    // **PENTING:** Pastikan kategori di sini sesuai dengan data-category di tombol dan di objek produk Anda
    // category properti pada object `products` harus dalam lowercase dan hyphenated (e.g., "main-course")
    // agar cocok dengan `data-category` dari tombol filter.

    // Function to create and append product card to the list
    function createProductCard(product) {
        const col = document.createElement("div");
        col.className = "col";

        col.innerHTML = `
            <div class="card h-100 shadow-sm border-0 product-card">
                <img src="${ASSET_URL}${product.image}" class="card-img-top" alt="${product.name}" style="height: 140px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title fw-semibold text-dark mb-1">${product.name}</h5>
                    <p class="card-text small text-secondary mb-1">${product.category ? product.category.replace(/-/g, ' ').replace(/\b\w/g, char => char.toUpperCase()) : 'Uncategorized'}</p>
                    <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                        <p class="card-text h5 fw-bold text-dark mb-0">$${product.price.toFixed(2)}</p>
                        <button class="btn btn-primary btn-sm d-flex align-items-center gap-1 add-to-order-btn"
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
        productListContainer.appendChild(col);
    }

    // Function to display products based on selected category
    function displayProducts(category) {
        productListContainer.innerHTML = ''; // Clear current products
        const filteredProducts = products.filter(product => {
            if (category === 'all-menu') {
                return true; // Show all products
            }
            return product.category === category;
        });

        if (filteredProducts.length === 0) {
            productListContainer.innerHTML = '<p class="text-muted text-center w-100 mt-3">No products found for this category.</p>';
        } else {
            filteredProducts.forEach(product => {
                createProductCard(product);
            });
        }
    }

    // Event listener for category filter buttons
    categoryFilterContainer.addEventListener('click', function(event) {
        const clickedButton = event.target.closest('.category-filter-btn');
        if (clickedButton) {
            // Remove active style from all buttons
            categoryFilterContainer.querySelectorAll('.category-filter-btn').forEach(btn => {
                btn.style.backgroundColor = '#f8f9fa';
                btn.style.color = '#6c757d';
                btn.style.border = '1px solid #dee2e6';
                const icon = btn.querySelector('i');
                if (icon) icon.style.color = ''; // Reset icon color
            });

            // Add active style to the clicked button
            clickedButton.style.backgroundColor = '#0d6efd';
            clickedButton.style.color = 'white';
            clickedButton.style.border = 'none';
            const icon = clickedButton.querySelector('i');
            if (icon) icon.style.color = 'white';

            const selectedCategory = clickedButton.dataset.category;
            console.log("Filtering by category:", selectedCategory);
            displayProducts(selectedCategory); // Display products for the selected category
        }
    });


    // Function to calculate and update totals (remains the same)
    function updateOrderTotals() {
        let subtotal = 0;
        let totalItems = 0;

        orderItems.forEach(item => {
            subtotal += item.price * item.quantity;
            totalItems += item.quantity;
        });

        const taxes = subtotal * TAX_RATE;
        const total = subtotal + taxes;

        orderItemCountSpan.textContent = `${totalItems} items`;
        orderSubtotalSpan.textContent = `$${subtotal.toFixed(2)}`;
        orderTaxesSpan.textContent = `$${taxes.toFixed(2)}`;
        orderTotalSpan.textContent = `$${total.toFixed(2)}`;
        taxPercentageSpan.textContent = (TAX_RATE * 100).toFixed(0);
    }

    // Function to render or update order items in the UI (remains the same)
    function renderOrderItems() {
        orderItemsContainer.innerHTML = ''; // Clear existing items

        if (orderItems.length === 0) {
            orderItemsContainer.innerHTML = '<p class="text-muted text-center mt-3">Your order list is empty.</p>';
        } else {
            orderItems.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'd-flex align-items-center gap-3 p-3 border rounded bg-light order-item-card mb-2';
                itemElement.dataset.itemId = item.id;

                itemElement.innerHTML = `
                    <img src="${ASSET_URL}${item.image}" class="rounded" alt="${item.name}" style="width: 64px; height: 64px; object-fit: cover;">
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
                        <p class="fw-bold text-dark mb-1 item-total">$${(item.price * item.quantity).toFixed(2)}</p>
                        <button class="btn btn-link text-danger p-0 small remove-item-btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                `;
                orderItemsContainer.appendChild(itemElement);
            });
        }
        addOrderItemEventListeners(); // Re-attach listeners after rendering
        updateOrderTotals(); // Update totals after items are rendered
    }

    // Function to add event listeners to order item buttons (quantity and remove) (remains the same)
    function addOrderItemEventListeners() {
        orderItemsContainer.querySelectorAll('.quantity-btn').forEach(button => {
            button.onclick = function() {
                const itemId = this.closest('.order-item-card').dataset.itemId;
                const action = this.dataset.action;
                const itemIndex = orderItems.findIndex(item => item.id === itemId);

                if (itemIndex > -1) {
                    if (action === 'increase') {
                        orderItems[itemIndex].quantity++;
                    } else if (action === 'decrease') {
                        if (orderItems[itemIndex].quantity > 1) {
                            orderItems[itemIndex].quantity--;
                        } else {
                            orderItems.splice(itemIndex, 1);
                        }
                    }
                    renderOrderItems();
                }
            };
        });

        orderItemsContainer.querySelectorAll('.remove-item-btn').forEach(button => {
            button.onclick = function() {
                const itemId = this.closest('.order-item-card').dataset.itemId;
                orderItems = orderItems.filter(item => item.id !== itemId);
                renderOrderItems();
            };
        });
    }

    // Event listener for adding products to order from product list (remains the same)
    productListContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-to-order-btn')) {
            const productId = event.target.dataset.productId;
            const productName = event.target.dataset.productName;
            const productPrice = parseFloat(event.target.dataset.productPrice);
            const productImage = event.target.dataset.productImage;

            const existingItemIndex = orderItems.findIndex(item => item.id === productId);

            if (existingItemIndex > -1) {
                orderItems[existingItemIndex].quantity++;
            } else {
                orderItems.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1
                });
            }
            renderOrderItems();
        }
    });

    // Optional: Add functionality for order type tabs (remains the same)
    const orderTypeTabs = document.getElementById("order-type-tabs");
    if (orderTypeTabs) {
        orderTypeTabs.addEventListener('click', function(event) {
            if (event.target.tagName === 'A' && event.target.closest('.nav-item')) {
                event.preventDefault();
                orderTypeTabs.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                event.target.classList.add('active');
                const orderType = event.target.dataset.orderType;
                console.log(`Order type selected: ${orderType}`);
            }
        });
    }

    // Initial load: Display "All menu" products by default
    // Find the "All menu" button and simulate a click to set its active state and display products
    const allMenuButton = categoryFilterContainer.querySelector('.category-filter-btn[data-category="all-menu"]');
    if (allMenuButton) {
        allMenuButton.click(); // Simulate click to activate and filter
    } else {
        // Fallback: If "All menu" button isn't found or for some reason not clicked, display all products
        displayProducts('all-menu');
    }

    // Initial render of order items and totals when the page loads
    // This is called by displayProducts() and also at the end of renderOrderItems(),
    // so this initial call might be redundant if displayProducts() is guaranteed to run.
    // For safety, keeping it, but ensure no double rendering issues.
    renderOrderItems(); // Ensures order side is correctly initialized
});