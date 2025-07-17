document.addEventListener("DOMContentLoaded", function () {
    const productListContainer = document.getElementById("product-list-container");

    const products = [
        {
            name: "Beef Wellington",
            image: "BeefWellington.jpg",
            price: 12.99,
        },
        {
            name: "Cheesy Pizza",
            image: "CheesyPizza.jpg",
            price: 9.5,
        },
        {
            name: "Chicken Tofu Soup",
            image: "ChickenTofuSoup.jpg",
            price: 8.25,
        },
        {
            name: "Crispy Calamari",
            image: "CrispyCalamari.jpg",
            price: 7.75,
        },
        {
            name: "Matcha Ice Cream",
            image: "MatchaIceCream.jpg",
            price: 5.25,
        },
        {
            name: "Melting Brownie",
            image: "MeltingBrownie.jpg",
            price: 6.5,
        },
        {
            name: "Quinoa Salad",
            image: "QuinoaSalad.jpg",
            price: 6.75,
        },
        {
            name: "Seafood Tempting",
            image: "SeafoodTempting.jpg",
            price: 11.99,
        }
    ];

    products.forEach((product) => {
        const col = document.createElement("div");
        col.className = "col";

        col.innerHTML = `
            <div class="card h-100 shadow-sm">
                <img src="${ASSET_URL}img/products/${product.image}" class="card-img-top" alt="${product.name}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold">${product.name}</h5>
                    <p class="card-text text-muted mb-3">$${product.price.toFixed(2)}</p>
                    <button class="btn btn-primary mt-auto add-to-order" data-name="${product.name}" data-price="${product.price}">
                        Add to Order
                    </button>
                </div>
            </div>
        `;
        productListContainer.appendChild(col);
    });
});
