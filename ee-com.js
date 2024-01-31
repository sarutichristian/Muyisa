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




  // Fonction pour supprimer un élément du panier
function deleteItem(element) {
    var parent = element.closest(".box");
    parent.remove();
    updateTotal();
  }
  
  // Sélectionnez tous les éléments de corbeille
  var deleteButtons = document.querySelectorAll('.bx.bxs-trash-alt');
  deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      deleteItem(this);
    });
  });
  
  // Fonction pour mettre à jour le total du panier
  function updateTotal() {
    var boxes = document.querySelectorAll('.box');
    var total = 0;
    boxes.forEach(function(box) {
      var price = parseFloat(box.querySelector('.text span').innerText.slice(1));
      var quantity = parseInt(box.querySelector('.text span:last-child').innerText);
      total += price * quantity;
    });
    document.querySelector('h2').textContent = 'Total: $' + total.toFixed(2);
  }

  




  // Fonction pour ajouter un élément au panier
function addItem(src, title, price, quantity) {
    var cart = document.querySelector('.cart');
    var box = document.createElement('div');
    box.className = 'box';
    box.innerHTML = `
      <img src="${src}" alt="">
      <div class="text">
        <h3>${title}</h3>
        <span>$${price}</span>
        <span>${quantity}</span>
      </div>
      <i class='bx bxs-trash-alt'></i>
    `;
    cart.insertBefore(box, document.querySelector('h2'));
    updateTotal();
  
    var deleteButton = box.querySelector('.bx.bxs-trash-alt');
    deleteButton.addEventListener('click', function() {
      deleteItem(this);
    });
  }
  



// Récupérez les éléments du DOM
const smallImages1 = document.querySelectorAll('.small-image-1');
const bigImage1 = document.querySelector('.big-image-1');
const smallImages2 = document.querySelectorAll('.small-image-2');
const bigImage2 = document.querySelector('.big-image-2');
const addToCartButtons = document.querySelectorAll('.btn');

let currentIndex1 = 0;
let currentIndex2 = 0;

// Fonction pour mettre à jour l'image principale pour les produits masculins
function updateBigImage1(index) {
  bigImage1.src = smallImages1[index].src;
}

// Fonction pour mettre à jour l'image principale pour les produits féminins
function updateBigImage2(index) {
  bigImage2.src = smallImages2[index].src;
}

// Gestion du clic sur les boutons "add to cart"
function handleAddToCartClick(event) {
  const productTitle = event.target.parentNode.querySelector('h3').textContent;
  alert(`Added "${productTitle}" to cart`);
}

// Écoutez les clics sur les boutons "add to cart"
addToCartButtons.forEach(button => {
  button.addEventListener('click', handleAddToCartClick);
});

// Écoutez les clics sur les petites images des produits masculins
smallImages1.forEach((smallImage, index) => {
  smallImage.addEventListener('click', () => {
    currentIndex1 = index;
    updateBigImage1(currentIndex1);
  });
});

// Écoutez les clics sur les petites images des produits féminins
smallImages2.forEach((smallImage, index) => {
  smallImage.addEventListener('click', () => {
    currentIndex2 = index;
    updateBigImage2(currentIndex2);
  });
});

// Initialisez les images principales
updateBigImage1(currentIndex1);
updateBigImage2(currentIndex2);


document.addEventListener('DOMContentLoaded', () => {
  const countDownDate = new Date('Aug 31, 2023 00:00:00').getTime();

  function updateCountdown() {
    const now = new Date().getTime();
    const gap = countDownDate - now;

    const seconds = 1000;
    const minutes = seconds * 60;
    const hours = minutes * 60;
    const days = hours * 24;

    const remainingDays = Math.floor(gap / days);
    const remainingHours = Math.floor((gap % days) / hours);
    const remainingMinutes = Math.floor((gap % hours) / minutes);
    const remainingSeconds = Math.floor((gap % minutes) / seconds);

    document.getElementById('days').innerText = String(remainingDays).padStart(2, '0');
    document.getElementById('hours').innerText = String(remainingHours).padStart(2, '0');
    document.getElementById('minutes').innerText = String(remainingMinutes).padStart(2, '0');
    document.getElementById('seconds').innerText = String(remainingSeconds).padStart(2, '0');
  }

  // Initial update
  updateCountdown();

  // Update every second
  setInterval(updateCountdown, 1000);
});




// Attendre que le contenu soit chargé
document.addEventListener("DOMContentLoaded", function () {
  const buyNowButtons = document.querySelectorAll('.box a');

  buyNowButtons.forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      // Récupérer l'URL du produit à partir de l'attribut href
      const productURL = button.getAttribute('href');
      // Redirection vers la page du produit
      window.location.href = productURL;
    });
  });
});







// Attend que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {

  // Sélection du formulaire et des champs d'entrée
  const form = document.querySelector('.user');
  const emailInput = form.querySelector('input[type="email"]');
  const passwordInput = form.querySelector('input[type="password"]');

  // Ajout d'un écouteur d'événement pour la soumission du formulaire
  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Empêche l'envoi par défaut du formulaire

      // Validation des champs
      if (emailInput.value === 'fawane62385@nau.ac.ke' || !isValidEmail(emailInput.value)) {
          alert('Veuillez entrer une adresse e-mail valide.');
          return;
      }

      if (passwordInput.value === '3241') {
          alert('Veuillez entrer un mot de passe.');
          return;
      }

      // Si les champs sont valides, vous pouvez envoyer les données du formulaire ici
      // Par exemple, en utilisant fetch() pour les envoyer à un serveur
      
      // Exemple de code fetch (non fonctionnel sans un serveur approprié)
      /*
      fetch('url_du_serveur', {
          method: 'POST',
          body: JSON.stringify({
              email: emailInput.value,
              password: passwordInput.value
          }),
          headers: {
              'Content-Type': 'application/json'
          }
      })
      .then(response => {
          // Gérer la réponse du serveur
      })
      .catch(error => {
          console.error('Erreur :', error);
      });
      */

      // Réinitialisation des champs après soumission
      emailInput.value = '';
      passwordInput.value = '';
  });
});

// Fonction pour valider une adresse e-mail (simple validation)
function isValidEmail(email) {
  // Utilisation d'une expression régulière simple pour la validation
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

