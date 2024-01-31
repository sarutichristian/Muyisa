<?php
require 'conn.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password =sha1( $_POST["password"]);
  $result = mysqli_query($con, "SELECT * FROM users WHERE  email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["Name"]=$row["Name"];
      header("Location: home.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-COMMENCE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link rel="stylesheet" href="ee.com.css">
    <style>
       /* Styles for the header */

       body{
        background-image: url(ecom);
        background-size: cover
       }
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:10px;
    background-color:rgb(245, 172, 38);
    color: #fff;
    margin: 0;
}

.logo {
    text-decoration: none;
    color:black;
    font-size: 24px;
}

.navbar {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navbar li {
    display: inline;
}

.navbar a {
    text-decoration: none;
    color:black;
}

.navbar a:hover{
    text-decoration: none;
    color: red;
}


/* Styles for the password form */
.password-form {
    max-width: 300px;
    margin: 100px auto;
    text-align: center;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.password-form input,
.password-form button {
    margin: 10px 0;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.password-form button {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.password-form button:hover {
    background-color: #2980b9;
}

/* Styles for the success message */
.success-message {
    text-align: center;
    margin-top: 20px;
}

.success-message p {
    color: green;
    font-weight: bold;
}


    </style>

</head>
  <body>

  <header>
        <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Adidas</a>
        
        <ul class="navbar">
            <li onclick=log()><a href="">HOME</a></li>
            <li onclick=log()><a href="">NOUVELLE ARIVEE</a></li>
            <li onclick=log()><a href="">OFFRE SPECIALE</a></li>
            <li onclick=log()><a href="">Mes COMMANDES</a></li>
            <li onclick=log()><a href="">PRODUITS</a></li>
            <li onclick=log()><a href="">CONTACT</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
        </ul>
      </header>

  <div class="password-form">
    <h2>Login</h2>
    <form class="" action="" method="post" >
      <label for="usernameemail"> Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>

      <p>Mot de passe oublier? <a href="rest.php" style="color:red"> Réinitialiser</a></p>

<p>Vous n'avez pas un compte? <a href="log.php" style="color:green">Créer un compte</a></p>
    </form>

</div>

 



<div class="product-container">
<?php
  // SQL QUERY 
  $query = "SELECT * FROM `products` ORDER BY product_id DESC;"; 
  
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
      <i class='bx bx-cart-download' onclick=log() ><a href="">Buy Now</a></i>

    </div>
  </div>
<?php
} 
    }  
  
?>

</div>
    <script src="ee-com.js">
    
    </script> 

    <script src="pass.js"></script>


    <script>
function log(){
  alert("Login First");
}
      </script>

  </body>
 
</html>
