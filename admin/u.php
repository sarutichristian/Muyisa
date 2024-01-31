<?php
require 'conn.php';
// If upload button is clicked ...

 
  
 

    $nam = $_POST["nam"];
    $pri =$_POST["pri"];
 
    // Get all the submitted data from the form
    $sql = "UPDATE products VALUES ('','$nam','', '','$pri')";
 
    // Execute query
   $re= mysqli_query($con, $sql);
 if($re){
    header("location:produit.php");
 }
    // Now let's move the uploaded image into the folder: image






include 'conn.php';
$id = $_GET['btn_delete'];

$query = "DELETE FROM Products WHERE product_id = '$id'";

$result = mysqli_query($con, $query);
if ($result) {
    mysqli_close($con);
    header("location:produit.php");
    exit();
} else {
    echo "Error deleting record";
}


?>