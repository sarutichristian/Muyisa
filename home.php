<?php
include 'conn.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{


 header("location:login.php");
 
 
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAGASIN</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="ee.com.css">

  <!-- Boxicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <style type="text/css">
     .img-box{
         max-width: 100%;
     }

     .img-box img{
      width: 300px;
     }

     .slider_container .container{
         padding: 0 15px;
         max-width: 1230px;
         margin: 0 auto;
     }

     .cart_slider{
         padding: 50px 0;
     }
 </style>

</head>
<body>
  <!-- Navbar -->
  <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a>
    
    <ul class="navbar">
        <li><a href="#home"><ii>HOME</ii></a></li>
        <li><a href="#new">NOUVELLE ARIVEE</a></li>
        <li><a href="#deal">OFFRE SPECIALE</a></li>
        <li><a href="order.php">Mes COMMANDES</a></li>
        <li><a href="#product">PRODUITS</a></li>

        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="feedback.php">FEEDBACK</a></li>
        <li> <a href=""> <?php echo $row["lastName"]; ?></a> </li>
    </ul>

    <!-- Icons -->
    <div class="header-icons">
        <i class='bx bx-menu' id="menu-icon" ></i>
        <i class='bx bx-search-alt-2' id="search-icon" ></i>
        <i class='bx bx-cart-download'  id="cart-icon"></i>
        <i class='bx bx-user' id="user-icon"></i>
    </div>
<!-----search-->
    <div class="search-box">
        <input type="search" name="" id="" placeholder="search here..."><img src="loop" alt="" class="im">
    </div>

    <!-------cart----->
    <div class="cart">
    <!-----box 1---->
    
      <div class="box">
        <img src="f1" alt="">
        <div class="text">
          <h3>T-Shirt 14A</h3>
          <span>$50.05</span>
          <span>1</span>
        </div>
        <i class='bx bxs-trash-alt' ></i>
        </div>
       <!-----box 2---->
    <div class="box">
        <img src="f12" alt="">
        <div class="text">
          <h3>T-Shirt 14A</h3>
          <span>$50.05</span>
          <span>1</span>
        </div>
        <i class='bx bxs-trash-alt' ></i>
        </div>
        <h2>Total: $100.10</h2>
        <a href="check-out.html" class="btn">Vérifier</a>
    </div>
    <!------user----->
    <div class="user">
      <div class="password-form">
        <h1><?php echo $row["Name"]?> </h1> <?php echo $row["lastName"]?> <h1></h1>

        <button  > <a href="logout.php">Changer Compte</a> </button>
        <button><a href="logout.php">Se déconnecter</a></button>
    
        <p>Mot de passe oublier? <a href="logout.php"> Réinitialiser</a></p>

        <p>Vous n'avez pas un compte? <a href="logoutr.php">Créer un compte</a></p>
    </div>
    <script src="pass.js"></script>
  </div>
  </header>
  <!-----home ----->
  <section class="home" id="home">
    <div class="home-text">
        <span>Achetez maintenant</span>
        <h1>Nouveautés <br> des Produits</h1>
        <a href="#product" class="btn">Achetez maintenant</a>
    </div>
    <div class="home-img">
        <img src="pexels.jpg" alt="">
    </div>
  </section>
<!----new arrival---->
<section class="slider_container" id="new">
  <h1 class="heading">Nouvelles<span>Arrivées</span></h1>
  
</section>
<section class="slider_container" id="new">
  <div class="container">
      <div class="swiper cart_swipper">
    
          <div class="swiper-wrapper">

          <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
              <div class="swiper-slide">
              <a href="pay.php?id=<?php echo $row['product_id'] ?>">
                  <div class="img-box">
                      <img src="<?php echo $imageURL; ?>" alt="">
                  </div>

        </a>
              </div>

<?php
        }
      }
      ?>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
      </div>
  </div>
</section>


<!----------deal section starts----->

<section class="deal" id="deal">


  
  <h1 class="heading">offre<span>spéciale</span></h1>
  <div class="image">
  <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 1; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        {  
          $imageURL = 'uploads/'.$row["product_image"];
          ?> 

          <a href="pay.php?id=<?php echo $row['product_id'] ?>">
          <div class="img-box">
              <img src="<?php echo $imageURL; ?>" alt="" class="loog-img">
          </div>

          </a>

<?php
        }
      }
      ?>
  </div>
  <div class="row">
    <div class="content">
      <span class="discount">ut à 50% offre</span>
      <h3 class="text"> L'offre du jour</h3>
      <div class="count-down">
        <div class="box">
          <h3 id="days">00</h3>
          <span>jours</span>
        </div>
        <div class="box">
          <h3 id="hours">00</h3>
          <span>heurs</span>
        </div>
        <div class="box">
          <h3 id="minutes">00</h3>
          <span>minutes</span>
        </div>
        <div class="box">
          <h3 id="seconds">00</h3>
          <span>secondes</span>
        </div>
      </div>
    
    </div>
    <a href="#product" class="btn">Deal Now</a>
  </div>
</section>

<!----------deal ends----------->

<!--------featured------>

<section class="featured" id="featured">
  <h1 class="heading"><span>Produits </span>Populaires</h1>
  <div class="box-container">
<div class="box">
<div class="image-container">
  <div class="small-image">
  <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 3; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        {  
          $imageURL = 'uploads/'.$row["product_image"];
          ?> 


          <div class="img-box">
              <img src="<?php echo $imageURL; ?>" alt="" class="small-image-1">
          </div>

       

<?php
        }
      }
      ?>

  </div>
  <div class="big-image">
    <img src="v4-removebg-preview.png.crdownload" class="big-image-1">
  </div>
</div>
<div class="content">

<?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 1; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        {  
          $imageURL = 'uploads/'.$row["product_image"];
          ?> 
          
  <h3>Dernier Ajouté</h3>
  <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      <span>(250 Reviews)</span>
    </div>
    <p> <h2><?php  echo $row["product_name"]?> </h2></p>
       <div class="price"> $ <?php echo $row["product_price"]?> <span>$ <?php echo $row["product_price"]?></span></div>
       <i class="btn" > <a href="pay.php?id=<?php echo $row['product_id'] ?>">Buy Now</a> </i>

     <?php
        }
      }
      ?>
   </div>
</div>
<div class="box">
  <div class="image-container">
    <div class="small-image">

    <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` LIMIT 3; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        {  
          $imageURL = 'uploads/'.$row["product_image"];
          ?> 


          <div class="img-box">
              <img src="<?php echo $imageURL; ?>" alt="" class="small-image-2">
          </div>

       

<?php
        }
      }
      ?>
    </div>
    <div class="big-image">
      <img src="img/cote4-removebg-preview.png" class="big-image-2">
    </div>
  </div>
  <div class="content">

  <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` LIMIT 1; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        {  
          $imageURL = 'uploads/'.$row["product_image"];
          ?> 

    <h3>Produits Récents</h3>
    <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      <span>(250 Reviews)</span>
    </div>
    <p> <h2><?php  echo $row["product_name"]?> </h2></p>
       <div class="price"> $ <?php echo $row["product_price"]?> <span>$ <?php echo $row["product_price"]?></span></div>
       <i class="btn" > <a href="pay.php?id=<?php echo $row['product_id'] ?>">Buy Now</a> </i>
     </div>
     <?php
        }
      }
      ?>
  </div>
  </div>
</section>

<!--------------product---------->
<section class="product" id="product">
  <div class="heading">
    <h1>Derniers<span>Produits</span></h1>
</div>
<div class="container">
  <div class="swiper cart_swipper">
      <div class="swiper-wrapper">

      <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 4; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
              <div class="swiper-slide">

              <a href="pay.php?id=<?php echo $row['product_id'] ?>">
                  <div class="img-box">
                      <img src="<?php echo $imageURL; ?>" alt="">
                  </div>

        </a>
              </div>

<?php
        }
      }
      ?>

</div>


<div class="product-container">
<?php
  // SQL QUERY 
  $query = "SELECT * FROM `products`  ORDER BY product_id DESC LIMIT 12; "; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
  <div class="box">


    <img src="<?php echo $imageURL; ?>" alt="">
    <div class="content">
      <h2><?php  echo $row["product_name"]?> </h2>
      <div class="stars">
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star-half' ></i>
      </div>
      <span>$ <?php echo $row["product_price"]?></span>
      <br> <br> <br>
      <i class='bx bx-cart-download' ><a href="pay.php?id=<?php echo $row['product_id'] ?>">Buy Now</a></i>

    </div>
  </div>
<?php
} 
    }  
  
?>

</div>
</section>

<section class="product" id="product">
  <div class="heading">
    <h1>Nos<span> Produits</span></h1>
</div>
<section class="slider_container" id="new">
  <div class="container">
      <div class="swiper cart_swipper">
          <div class="swiper-wrapper">
              


       

          <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products`; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
              <div class="swiper-slide">
              <a href="pay.php?id=<?php echo $row['product_id'] ?>">
                  <div class="img-box">
                      <img src="<?php echo $imageURL; ?>" alt="">
                  </div>

        </a>
              </div>

<?php
        }
      }
      ?>

</div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
      </div>
              
</section>
<div class="product-container">


<?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ; "; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
  <div class="box">


    <img src="<?php echo $imageURL; ?>" alt="">
    <div class="content">
      <h2><?php  echo $row["product_name"]?> </h2>
      <div class="stars">
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star-half' ></i>
      </div>
      <span>$ <?php echo $row["product_price"]?></span>
      <br> <br> <br>
      <i class='bx bx-cart-download' ><a href="pay.php?id=<?php echo $row['product_id'] ?>">Buy Now</a></i>

    </div>
  </div>
<?php
} 
    }  
  
?>
  </div>
  
</section>

<!-----review----->

<section class="reviews" id="reviews">
  <div class="heading">
    <h1>Nos<span>Clients</span></h1>
  </div>
  <div class="reviews-container">
    <div class="box">
      <img src="img/ELLCRIS-removebg-preview.png.crdownload" alt="">
      <h2>Chris Saruti</h2>
      <p>Lorem ipsum dolor sit amet, consectetur 
        adipisicing elit. Porro asperiores, nobis autem
         ab voluptate ipsa?</p>
         <div class="stars">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star-half' ></i>
        </div>
    </div>
    <div class="box">
      <img src="img/jordi1.jpg" alt="">
      <h2>Faustin Bulus</h2>     
      <p>Lorem ipsum dolor sit amet, consectetur 
        adipisicing elit. Porro asperiores, nobis autem
         ab voluptate ipsa?</p>
         <div class="stars">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star-half' ></i>
        </div>
    </div>
    <div class="box">
      <img src="img/al1.jpg" alt="">
      <h2>Walter Chris</h2>
      <p>Lorem ipsum dolor sit amet, consectetur 
        adipisicing elit. Porro asperiores, nobis autem
         ab voluptate ipsa?</p>
         <div class="stars">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star-half' ></i>
        </div>
    </div>
    <div class="box">
      <img src="img/ELLCRIS.jpg" alt="">
      <h2>Opi Ariku</h2>
      <p>Lorem ipsum dolor sit amet, consectetur 
        adipisicing elit. Porro asperiores, nobis autem
         ab voluptate ipsa?</p>
         <div class="stars">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star-half' ></i>
        </div>
    </div>
  </div>
</section>


<section class="home1" id="home1">
<div class="container">
      <div class="swiper cart_swipper">
    
          <div class="swiper-wrapper">

          <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC LIMIT 4 ; " ; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = 'uploads/'.$row["product_image"];
          ?>
          

              <div class="swiper-slide">
              <a href="pay.php?id=<?php echo $row['product_id'] ?>">
                  <div class="img-box">
                      <img src="<?php echo $imageURL; ?>" alt="">
                  </div>
                
        </a>
        <h1>Dernier arrivage  <br> de Produits</h1>
              </div>
           
<?php
        }
      }
      ?>
<!--------home page----back-->


    
      
    

</section>

<!-----footer ---->

<section class="footer">
  <div class="footer-box">
    <h2>Adidas</h2>
    <p>Lorem ipsum dolor sit amet consectetur 
      adipisicing elit. Quis esse quas iusto,
       consectetur nulla error.</p>
       <div class="social">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class='bx bxl-twitter'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-tiktok'></i></a>
       </div>
  </div>
  <div class="footer-box">
    <h3>Support</h3>
    <li><a href="#">Product</a></li>
    <li><a href="#">Help & Support</a></li>
    <li><a href="#">Return Policy</a></li>
    <li><a href="#">Terms Of use</a></li>
    <li><a href="#">FAQ</a></li>
  </div>
  <div class="footer-box">
    <h3>Nos Branches</h3>
    <li><a href="#">CONGO DRC</a></li>
    <li><a href="#">KENYA</a></li>
    <li><a href="#">UGANDA</a></li>
    <li><a href="#">TANZANIA</a></li>
    <li><a href="#">RWANDA</a></li>
  </div>
  <div class="footer-box">
    <h3>Methode de Paiement</h3>
    <div class="payment">
      <img src="visa" alt="">
      <img src="master" alt="">
      <img src="paypal" alt="">
      <img src="american" alt="">
    </div>
  </div>
  
</section>
<!-------copyright---->

<div class="copyright">
  <p>&#169; Adidas RDC tous droits Réservés.</p>
</div>

 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script type="text/javascript">
   var swiper = new Swiper(".cart_swipper", {
  
    spaceBetween: 30,
    loop: true,
    speed:1000,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3, 
      },
      1200: {
        slidesPerView: 4, 
      },
    
    },
     navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
 </script>


  <!-- Link to JS -->
  <script src="ee-com.js">
    
  </script>
  
</body>
</html>

