<?php
include "conn.php";

if(count($_POST) > 0){


$pass = sha1($_POST["pass"]);
$email =$_POST["email"];
$confirmpassword =sha1( $_POST["confirmpassword"]);

$q= mysqli_query($con,"SELECT * FROM admins WHERE email='$email'");
$row = mysqli_fetch_assoc($q);

if($pass == $confirmpassword){

if(mysqli_num_rows($q) > 0){

if($email==$row["email"]){
 mysqli_query($con, "UPDATE admins set password= '".$pass."'
  WHERE email='".$email."' ");

  echo
  "<script> alert('password reset Succ'); </script>";
}
else{
  echo
  "<script> alert('User Not Registered'); </script>";
}
}
else {

  echo
  "<script> alert('Enter the correct Email'); </script>";
}
}
else{
  echo
      "<script> alert('Password Does Not Match'); </script>";
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  
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
    }
    
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      background-image: url(ecom);
      background-size: cover;
    }

    /* Add more styles as needed */

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #007BFF;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 16px;
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
      font-size: 16px;
    }

    button:hover {
      background-color: #0056b3;
    }

    /* Style the error message if needed */
    .error {
      color: red;
    }

    .bx1{
    padding:15px 20px;
    color: black;
    background-color:orange;
    font-size:15px;

}

.bx1:hover{
    padding:15px 20px;
    color: black;
    background-color:yellow;
    font-size:15px;

}
  </style>
</head>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  
  <!-- Link to CSS -->
  <link rel="stylesheet" href="ee.com.css">
  
  <!-- Boxicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


</head>
<body>
  <!-- Navbar -->
 <center>
 <h1>Admin Space</h1>
 </center>

  <div class="container">
    <h2>Reset Password</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="email">E-mail Adress:</label>
        <input type="email" id="email" name="email" required>
        <label for="pass">Password:</label>
        <input type="password" id="password" name="pass" placeholder="password"  required>
        <label for="confim"> Confirm Pass</label>
        <input type="password" id="password" name="confirmpassword" placeholder="confirm password" required>
      </div>
      <button type="submit" name="send">Reset</button>

      <br>
      <button type="btn" class="bx1">  <a href="login.php">Login Here</a></button>

      </form></div></body></html>
