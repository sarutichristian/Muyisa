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

if(count($_POST) > 0){
    mysqli_query($con, "UPDATE products set product_name= '".$_POST['nam']."',
     product_image = '".$_POST['img']."', 
     product_price='".$_POST['pri']."'  WHERE product_id='".$_GET['id']."' ");
    // $message="<p style='color:green;'> Update Successfully! </p>";

    header("location:produit.php");
}
$result = mysqli_query($con, "SELECT * FROM products WHERE product_id='".$_GET['id']."'");
$row = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>

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
        <li><a href="home.php"><ii>HOME</ii></a></li>
        <li><a href="home.php">NEW ARRIVAL</a></li>
        <li><a href="home.php">SPECIAL DEAL</a></li>
        <li><a href="home.php">FEATURED</a></li>
        <li><a href="home.php">PRODUCTS</a></li>
        <li><a href="home.php">REVIEWS</a></li>
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
        <a href="check-out.html" class="btn">Checkout</a>
    </div>
    <!------user----->
    <div class="user">
      <div class="password-form">
        <h1><?php echo $row["Name"]?> </h1> <?php echo $row["lastName"]?> <h1></h1>

        <button  > <a href="logout.php">Change Account</a> </button>
        <button><a href="logout.php">Log out</a></button>
    
        <p>Forgot Password? <a href="rest.html"> Reset Now</a></p>

        <p>Don't you have An account? <a href="log.php">Create Now</a></p>
    </div>
    <script src="../pass.js"></script>
  </div>
  </header>
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <style>
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
  float: left;
  text-align: center;
  background-color: #fff;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

img {
  max-width: 100%;
  height: auto;
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

h1{
  padding: 50px;
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
  float: left;
  text-align: center;
  background-color: #fff;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

img {
  max-width: 100%;
  height: auto;
}

.buttons {
  margin-top: 10px;
}

.delete-button,
.buy-button {
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

.delete-button:hover,
.buy-button:hover {
  background-color: #ff6666;
}

span {
  color: blue;
}

h1 {
  padding: 50px;
}

/* Additional Styles for the Navbar */

header {
  background-color: snow;
  padding: 15px;
}

.logo {
  font-size: 20px;
  color:black;
}

.navbar {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

.navbar li {
  margin-right: 15px;
}

.navbar a {
  text-decoration: none;
  color: black;
  font-weight: bold;
}

.header-icons i {
  margin-right: 10px;
  font-size: 24px;
  color: black;
  cursor: pointer;
}

.search-box {
  display: none;
}

span{
    color:green;
}

/* Add media query to show search box on smaller screens */
@media screen and (max-width: 768px) {
  .navbar {
    display: none;
  }

  .header-icons,
  .search-box {
    display: block;
    margin-top: 10px;
    
  }

  .search-box input {
    width: 150px;
    padding: 8px;
    margin-right: 10px;
  }
}




body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.form-container {
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    text-align: center;
    color: #333;
}

label {
    margin-top: 10px;
    color: #555;
}

input {
    margin-bottom: 20px;
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


  </style>
</head>
<body>
    
<div>

    <form action="" method="post" >

<h1>Update product</h1>

<div><?php if(isset($message)){echo $message;}?></div>
<label for="nam">NAME:</label>
        <input type="text" name="nam" placeholder="enter the name of product" value="<?php echo $row['product_name'];?>">
        <label for="pri">PRICE:</label>
        <input type="number" name="pri" id="" placeholder="Enter the price" value="<?php echo $row['product_price'];?>">
        <label for="img">Images:</label>
        <input type="file" name="img" id="" multiple value="<?php echo $row['product_image'];?>">

        <input type="submit" value="Update">
    </form>
</div>
<script src="../ee-com.js">
    
    </script>
</body>
</html>






