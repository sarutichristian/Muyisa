<?php
include 'conn.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM admins WHERE admin_id = $id");
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
  <link rel="stylesheet" href="../ee.com.css">

  <!-- Boxicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <link rel="stylesheet" href="ee-com.css">
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
 </style>

</head>
<body>
  <!-- Navbar -->
  <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a>
    
    <ul class="navbar">
        <li><a href="admin.php"><ii>Dashboard</ii></a></li>
        <li><a href="customer.php">Clients</a></li>
        <li><a href="feedbackadmin.php">Feedback</a></li>
        <li><a href="#">Produit</a></li>

     <li>
                 <a href=""> <?php echo $row["lastName"]; ?></a> 
    </li>
        <li><a href="logout.php">Se deconnecter</a></li>
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
        <a href="check-out.html" class="btn">Checkout</a>
    </div>
    <!------user----->
    <div class="user">
      <div class="password-form">
        <h1>Log in Now</h1>
        <input type="email" id="email" placeholder="Enter Your e-mail Adress">
        <input type="password" id="password" placeholder="Enter Your Password">
        <button onclick="checkPassword()"> Changer Compte </button>
        <button><a href="pass.html">Se deconnecter</a></button>
    
        <p>Mot de passe oublier? <a href="rest.html">Réinitialiser</a></p>

        <p>Vous n'avez pas un compte? <a href="log.html">Créer un compte</a></p>
    </div>
    <script src="pass.js"></script>
  </div>
  </header>
  <link rel="stylesheet" type="text/css" href="styles.css">
 



  <style>

    h1{
        padding: 20px;
        margin: 40px;
    }
    body {
  background-color: #f0f0f0;
  text-align: center;
  padding: 20px;
  background-image: url(pay);
  background-size: cover;
}

.image-container {
  display: inline-block;
  margin: 11px 5px;
  padding: 70px;

  text-align: center;
  background-color: #fff;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}



.buttons {
  margin-top: 10px;
}

.delete-button, .buy-button {
  background-color: #ff0000;
  color: #fff;
  padding: 5px 10px;
  margin: 5px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.buy-button {
  background-color: #0073e6;
}

.delete-button:hover, .buy-button:hover {
  background-color: #ff6666;
}

span{
    color:blue;
}
  </style>
</head>
<body>
   <!-- Navbar -->
 
 
    <h1>NOS <span>PRODUITS</span></h1>
    <h1><button class="add-button"> <a href="add.php">Ajouter nouveau produIts</a></button></h1>
 



   <div class="product-container">
    <?php
  // SQL QUERY 
  $query = "SELECT * FROM `products`;"; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 
          $imageURL = '../uploads/'.$row["product_image"];

          ?>
      
     <div class="box">

    <img src="<?php echo $imageURL; ?>" alt="Image 1">

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
    <div class="buttons">

    
      
    <button class="updte-button"><a href="upc.php?id=<?php echo $row['product_id']?>" > Update</a></button>
          <form action="delete.php" method="get">

      <td ><button style="background-color:red; color:#fff" type="submit" name="btn_delete" class="btn btn-danger" value="<?php echo $row['product_id']; ?>">Delete</button></td>
      </div>
      </form>
   
      

  </div>
  </div> 
 
  <?php
} 
}  

?>

 
  <!-- Répétez ces éléments pour les autres images -->
  <script>
    // Sélectionnez tous les boutons "Supprimer"
const deleteButtons = document.querySelectorAll(".delete-button");

// Ajoutez un gestionnaire d'événement pour chaque bouton "Supprimer"
deleteButtons.forEach(function(button) {
  button.addEventListener("click", function() {
    // Code à exécuter lorsque le bouton "Supprimer" est cliqué
    // Vous pouvez ajouter votre logique de suppression ici
    // Par exemple, supprimer l'élément parent (.image-container)
    button.parentNode.parentNode.remove();
  });
});

// Sélectionnez tous les boutons "Acheter"
const buyButtons = document.querySelectorAll(".buy-button");

// Ajoutez un gestionnaire d'événement pour chaque bouton "Acheter"
buyButtons.forEach(function(button) {
  button.addEventListener("click", function() {
    // Code à exécuter lorsque le bouton "Acheter" est cliqué
    // Vous pouvez ajouter votre logique d'achat ici
    // Par exemple, afficher un message d'achat réussi
    alert("Successful purchase !");
  });
});

  </script>
</body>
</html>
