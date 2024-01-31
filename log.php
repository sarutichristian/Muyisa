<?php
include "conn.php";

if(!empty($_SESSION["id"])){
  header("Location: logout.php");
}
if(isset($_POST["submit"])){

  $nom = mysqli_real_escape_string($con, $_POST['nom']);
  $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass =sha1( mysqli_real_escape_string($con, $_POST['pass']));
  $confirmpassword =sha1( $_POST["confirmpassword"]);
  $duplicate = mysqli_query($con, "SELECT * FROM users WHERE  email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('Username or Email Has Already Taken'); </script>";
    }
  
    else{
      if($pass == $confirmpassword){
  
   $sql="INSERT INTO users 
   VALUES (' ','$nom', '$prenom', '$email','$pass')";
        mysqli_query($con, $sql);
  
        header("location:login.php");
  }
  else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
  
  }}

}

?>

<?php

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{


  $result = mysqli_query($con, "SELECT * FROM users WHERE id = 5");
  $row = mysqli_fetch_assoc($result);
 
 
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
 <style>
   /* Reset some default browser styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;

  background-size: cover;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
  background-image: url(ecom);
}

.container {
  max-width: 400px;
  margin:80px auto;
  padding: 20px;
  background-color:antiquewhite;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #007BFF; /* Change the heading color */
}

.form-group {
  margin-bottom: 15px;
  
}

label {
  display: block;
  margin-bottom: 5px;
  color:black; /* Change label color */
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px; /* Increase input font size */
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 16px; /* Increase button font size */
}

button:hover {
  background-color: #0056b3;
}

/* Style the error message if needed */
.error {
  color: red;
}

a input{
  cursor:pointer;
}

/* Add more styles as needed */

 </style>

</head>
<body>
  <!-- Navbar -->
  <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Adidas</a>
    
    <ul class="navbar">
        <li><a href="home.php">HOME</a></li>
        <li><a href="home.php">NEW ARRIVAL</a></li>
        <li><a href="home.php">PRODUCTS</a></li>
        <li><a href="home.php">CONTACT</a></li>
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

        <button  > <a href="login.php">Login Here</a> </button>
        
    
      

      
    </div>
    <script src="pass.js"></script>
  </div>
  </header>

  <div class="container">
    <h2>Create an Account</h2>
    <form method="post" action="" >
      <div class="form-group">
        <label for="nom">Name :</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Last Name :</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="motdepass">Password:</label>
        <input type="password" id="motdepass" name="pass" required>
        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value="">
      </div>
      <button type="submit" name="submit">Register</a></button>
<br>
     
    </form>
  </div>


 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Link to JS -->
  <script src="log.js">
  </script>

<script src="ee-com.js">
    
    </script>
</body>
</html>













<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bxslider@4.2.12/dist/jquery.bxslider.css">
</head>
<body>
    
    <script>
        // Function to remove an item from the cart
        function removeItem(element) {
            var box = element.parentElement;
            box.style.display = "none";
        }
    </script>

<script src="../ee-com.js">
    
    </script>
</body>
</html>
