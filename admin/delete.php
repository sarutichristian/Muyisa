<?php
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
