<?php

include "conn.php";

$id= $_GET['d_id'];
$status = $_GET['status'];

$q="update orders set status=$status WHERE o_id=$id ";

mysqli_query($con,$q);

header("location:payadmi.php")
?>