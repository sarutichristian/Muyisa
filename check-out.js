document.addEventListener("DOMContentLoaded", function () {
    const cartItems = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const productList = document.getElementById("product-list");

    const updateCartTotal = () => {
        let total = 0;
        const cartItemsList = cartItems.querySelectorAll("li");

        cartItemsList.forEach((item) => {
            const price = parseFloat(item.getAttribute("data-price"));
            total += price;
        });

        cartTotal.textContent = total.toFixed(2);
    };

    const addToCart = (product) => {
        const li = document.createElement("li");
        li.setAttribute("data-name", product.getAttribute("data-name"));
        li.setAttribute("data-price", product.getAttribute("data-price"));

        const productName = document.createTextNode(product.getAttribute("data-name"));
        const price = parseFloat(product.getAttribute("data-price")).toFixed(2);

        li.innerHTML = `<img src="${product.querySelector("img").src}" alt="${product.getAttribute("data-name")}"> ${productName} - $${price} <button class="remove-from-cart">Supprimer</button>`;

        cartItems.appendChild(li);
        updateCartTotal();

        // Cacher l'image du produit ajouté au panier
        const productImage = product.querySelector("img");
        productImage.style.display = "none";

        // Ajouter un gestionnaire d'événements pour supprimer l'article du panier
        const removeButton = li.querySelector(".remove-from-cart");
        removeButton.addEventListener("click", () => {
            cartItems.removeChild(li);
            updateCartTotal();
            
            // Réafficher l'image lorsque l'article est retiré du panier
            productImage.style.display = "block";
        });
    };

    const productButtons = productList.querySelectorAll(".add-to-cart");
    productButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const product = button.parentElement;
            addToCart(product);
        });
    });
});
