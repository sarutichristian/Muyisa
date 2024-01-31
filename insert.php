
<?php

include "conn.php";
$nom = mysqli_real_escape_string($con, $_POST['name']);

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $message = mysqli_real_escape_string($con, $_POST['message']);


  $sql="INSERT INTO messages 
  VALUES (' ','$nom','$email','$message',NOW())";
       mysqli_query($con, $sql);

    
       
      header("location:feedback.php");

      echo
      "<script> alert('message sent'); </script>";
?>


