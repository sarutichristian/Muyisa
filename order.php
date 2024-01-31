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
  <title>Orders</title>

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

     .slider_container .container{
         padding: 0 15px;
         max-width: 1230px;
         margin: 0 auto;
     }

     .cart_slider{
         padding: 50px 0;
     }


     .img-box {
            max-width: 100%;
          }
      
          .slider_container .container {
            padding: 0 15px;
            max-width: 1230px;
            margin: 0 auto;
          }
      
          .cart_slider {
            padding: 50px 0;
          }
      
          /* Payment Form Styles */
      .payment-form {
        display: flex;
        text-align: center;
        max-width: 300px;
        margin: 20px ;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        float: right;
      }
      
      .payment-form img {
        max-width: 40%;
        height: auto;
        margin-bottom: 20px;
      }
      
      .payment-form p {
        font-size: 16px;
        margin: 10px 0;
      }
      
      .payment-form form {
        margin-top: 20px;
      }
      
      .payment-form label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: bold;
      }
      
      .payment-form input,
      .payment-form button {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
      }
      
      .payment-form input {
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      
      .payment-form button {
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }
      
      .payment-form button:hover {
        background-color: #45a049;
      }
      
      .custom-select {
            position: relative;
            display: inline-block;
            width: 200px;
          }
      
          .custom-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
          }
      
          .custom-select select:focus {
            outline: none;
            border-color: #4caf50;
          }
      
          .custom-select::before {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
          }
      
          /* Style de survol */
          .custom-select:hover select {
            border-color: #555;
          }
      
          /* Style lorsqu'il est ouvert */
          .custom-select select[aria-expanded="true"] {
            border-color: #4caf50;
          }

          .bx0{
    padding:20px 30px;
    color: white;
    background-color:green;
    font-size:20px;

}

.bx1{
    padding:20px 30px;
    color: black;
    background-color:orange;
    font-size:20px;

}


      
      
      
 </style>

</head>
<body>
  <!-- Navbar -->
  <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a>
    
    <ul class="navbar">
    <li><a href="home.php"><ii>HOME</ii></a></li>
        <!-- <li><a href="#new">NOUVELLE ARIVEE</a></li> -->
        <!-- <li><a href="#deal">OFFRE SPECIALE</a></li> -->
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
  





<!-----review----->



<?php
  // SQL QUERY 
  $query = "SELECT * FROM `orders` WHERE userid=$id;"; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 

       
        { 
          $imageURL = 'uploads/'.$row["product_image"];
          $pimage ='uploads/'.$row["pay_image"];

          ?>
        <div class="payment-form">
          <form id="payment-form">
              <img src="<?php echo $imageURL; ?>" alt="Product Image">
              <p>Nom Produit:<?php  echo $row["product_name"]?></p>
        <p>Prix: $<?php  echo $row["product_price"]?></p>
        <label for="number ">ID:<?php  echo $row["o_id"]?></label>
      
      <label for="number ">Numero Telephone:<?php  echo $row["phone"]?></label>
      

      <label for="email">Email : <?php  echo $row["email"]?></label>
      

      <label for="Adress">Adress:<?php  echo $row["address"]?> </label>
      <label for="email">Date : <?php  echo $row["date"]?></label>
          
            <label for="payment-method">Methode paiement</label>
            <img src="<?php echo $pimage; ?>" alt="Product Image">
                
      
            

       
            <?php if($row["status"]==0){
          echo "<p class='bx0'>Pedding </p>";


        }
        if ($row["status"]==1){
          echo "<p class='bx1'>Completed </p>";
        } ?>


          </form>
        </div>

      

        <?php
} 
}  

?>
   




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

