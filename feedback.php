<?php
include 'conn.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="ee.com.css">

  <!-- Boxicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <link rel="stylesheet" type="text/css" href="styles.css">
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
         padding: 20px 0;
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
    
    </ul>



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
    <title>Feedback Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: white;
    color:black;
    text-align: center;
    padding: 1em;
}

#feedback-form {
    max-width: 600px;
    margin: 40px auto;
    padding: 40px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

form {
    display: grid;
    gap: 10px;
}

label {
    font-weight: bold;
}

textarea,
input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-top: 4px;
}

button {
    background-color: #333;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #555;
}

    </style>
</head>
<body>

    <section id="feedback-form">
        <h2>Donnez-nous votre avis</h2>
        <form action="insert.php" method="post">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Feedback:</label>
            <textarea id="feedback" name="message" required></textarea>

            <button type="submit" onclick=ms()>Soumettre</button>
        </form>
    </section>

</body>

<script> 

    function ms(){
    
      alert('do you want to send this information ?') 
    }
    
    
    
    
    </script>

<script src="ee-com.js">
    
    </script>
</html>
