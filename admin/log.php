<?php
include "conn.php";
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM admins WHERE admin_id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{

 header("location:login.php");
 
 
}
if(isset($_POST["submit"])){

  $nom = mysqli_real_escape_string($con, $_POST['nom']);
  $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass =sha1( mysqli_real_escape_string($con, $_POST['pass']));
  $confirmpassword =sha1( $_POST["confirmpassword"]);
  $duplicate = mysqli_query($con, "SELECT * FROM admins WHERE  email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('Username or Email Has Already Taken'); </script>";
    }
  
    else{
      if($pass == $confirmpassword){
  
   $sql="INSERT INTO admins 
   VALUES (' ','$nom', '$prenom', '$email','$pass')";
        mysqli_query($con, $sql);
  
        header("location:admin.php");
  }
  else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
  
  }}

}

?>













 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Client </title>
     <!-- ======= Styles ====== -->
     <link rel="stylesheet" href="admi.css">
    <style>
      body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

/* Add your existing styles here */

h1 {
    text-align: center;
    color: #333;
    padding: 20px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    margin-top: 0;
}

.image-container {
    max-width: 300px;
    margin: 30px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    width: 100%;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
}

ii {
    color: blue;
    font-weight: bold;
}

/* Optional: Style the submit button */
form button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

/* Optional: Hover effect for the submit button */
form button:hover {
    background-color: #45a049;
}


body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

/* ... (existing styles) ... */

.image-container {
    max-width: 300px;
    margin:80px 30px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: inline-block; /* Set display to inline-block */
    vertical-align: top; /* Align containers from the top */
    float:right;
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


/* ... (existing styles) ... */

    </style>
 
     <!-- =============== Navigation ================ -->
     <div class="container">
         <div class="navigation">
             <ul>
                 <li>
                     <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a>
                     <a href="#">
                         <span class="icon">
                             <ion-icon name="logo-apple"></ion-icon>
                         </span>
                         <span class="title">Brand Name</span>
                     </a>
                 </li>
 
                 <li>
                     <a href="admin.php">
                         <span class="icon">
                             <ion-icon name="home-outline"></ion-icon>
                         </span>
                         <span class="title">Dashboard</span>
                     </a>
                 </li>
 
                 <li>
                     <a href="#">
                         <span class="icon">
                             <ion-icon name="people-outline"></ion-icon>
                         </span>
                         <span class="title">Client</span>
                     </a>
                 </li>
 
                 <li>
                     <a href="feedbackadmin.php">
                         <span class="icon">
                             <ion-icon name="chatbubble-outline"></ion-icon>
                         </span>
                         <span class="title">feedback</span>
                     </a>
                 </li>
 
                 <li>
                     <a href="produit.php">
                         <span class="icon">
                             <ion-icon name="cart-outline"></ion-icon>
                         </span>
                         <span class="title">Produit</span>
                     </a>
                 </li>
 
              
 
                 <li>
                     <a href="log.php">
                         <span class="icon">
                             <ion-icon name="lock-closed-outline"></ion-icon>
                         </span>
                         <span class="title">Add Admins</span>
                     </a>
                 </li>
 
                 <li>
                     <a href="logout.php">
                         <span class="icon">
                             <ion-icon name="log-out-outline"></ion-icon>
                         </span>
                         <span class="title">Sign Out</span>
                     </a>
                 </li>
             </ul>
         </div>
 
     </div>
     </head>
     <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="">
                 <a href=""> <?php echo $row["lastName"]; ?></a> 
                </div>
            </div>
            
<body>
    <h1> <span> Add admins users</span></h1>


    <div class="container">
    <h2>Create an Admin Account </h2>
    <form method="post" action="" >
      <div class="form-group">
        <label for="nom">Name :</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Last Nom :</label>
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
      <button type="submit" name="submit">Add Admin</a></button>
    </form>
  </div>



  <!-- =========== Scripts =========  -->
  <script src="admi.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
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





























    
    <script>
        // Function to remove an item from the cart
        function removeItem(element) {
            var box = element.parentElement;
            box.style.display = "none";
        }
    </script>
</body>
</html>
