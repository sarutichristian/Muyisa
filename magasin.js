// Get references to elements
let searchIcon = document.getElementById('search-icon');
let searchBox = document.querySelector('.search-box');
let cartIcon = document.getElementById('cart-icon');
let cart = document.querySelector('.cart');
let userIcon = document.getElementById('user-icon');
let user = document.querySelector('.user');
let header = document.querySelector('header');

// Toggle search box visibility when search icon is clicked
searchIcon.addEventListener('click', () => {
    searchBox.classList.toggle('active');
    cart.classList.remove('active');
    user.classList.remove('active');
    navbar.classList.remove('active'); // Hide cart when showing search
});

// Toggle cart visibility when cart icon is clicked
cartIcon.addEventListener('click', () => {
    cart.classList.toggle('active');
    searchBox.classList.remove('active');
    user.classList.remove('active'); 
    navbar.classList.remove('active');// Hide search box when showing cart
});

userIcon.addEventListener('click', () => {
    user.classList.toggle('active');
    cart.classList.remove('active');
    searchBox.classList.remove('active');
    navbar.classList.remove('active'); // Hide search box when showing cart
});

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-icon').onclick = () =>{
  navbar.classList.toggle('active');
  cart.classList.remove('active');
  searchBox.classList.remove('active');
  user.classList.remove('active');

}

window.onscroll  = () =>{
  navbar.classList.remove('active');
  cart.classList.remove('active');
  searchBox.classList.remove('active');
  user.classList.remove('active');
}

// Toggle shadow on header when scrolling
window.addEventListener('scroll', () => {
    header.classList.toggle('shadow', window.scrollY > 0);
});

// Initialize Swiper for new arrivals section
document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('.new-arrival', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        },
    });
});


  const cartItems = [];

  function addToCart(productName, productPrice) {
    const newItem = {
      name: productName,
      price: productPrice,
      quantity: 1
    };

    cartItems.push(newItem);
    updateCartDisplay();
  }

  function removeCartItem(index) {
    cartItems.splice(index, 1);
    updateCartDisplay();
  }

  function updateCartDisplay() {
    const cartElement = document.querySelector('.cart');
    cartElement.innerHTML = '';

    let total = 0;

    cartItems.forEach((item, index) => {
      const box = document.createElement('div');
      box.classList.add('box');

      const img = document.createElement('img');
      img.src = `product${index + 1}.jpg`;
      img.alt = `Product ${index + 1}`;

      const text = document.createElement('div');
      text.classList.add('text');
      text.innerHTML = `<h3>${item.name}</h3><span>$${item.price.toFixed(2)}</span><span>${item.quantity}</span>`;

      const removeIcon = document.createElement('i');
      removeIcon.classList.add('bx', 'bxs-trash-alt');
      removeIcon.addEventListener('click', () => removeCartItem(index));

      box.appendChild(img);
      box.appendChild(text);
      box.appendChild(removeIcon);
      cartElement.appendChild(box);

      total += item.price * item.quantity;
    });

    const totalElement = document.createElement('h2');
    totalElement.textContent = `Total: $${total.toFixed(2)}`;

    const checkoutButton = document.createElement('a');
    checkoutButton.href = '#';
    checkoutButton.classList.add('btn');
    checkoutButton.textContent = 'Checkout';

    cartElement.appendChild(totalElement);
    cartElement.appendChild(checkoutButton);
  }
