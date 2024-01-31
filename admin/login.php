<?php
require 'conn.php';
if(!empty($_SESSION["id"])){
  header("Location: login.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password =sha1( $_POST["password"]);
  $result = mysqli_query($con, "SELECT * FROM admins WHERE  email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["admin_id"];
      header("Location: admin.php");
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

  <center>
  <h1>Admin Space</h1>
  </center>



  <div class="password-form">
    <h2>Login</h2>
    <form class="" action="" method="post" >
      <label for="usernameemail"> Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>

      <p>Forgot Password? <a href="rest.php"> Reset Now</a></p>


    </form>

</div>

 


    <div class="success-message" id="successMessage" style="display: none;">
        <p>welcome...</p>
    </div>

    <script src="pass.js"></script>
  </body>
</html>
