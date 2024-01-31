
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
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAGASIN</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="../ee.com.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="ee-com.css">
  <style type="text/css">
    .img-box {
      max-width: 100%;
    }

    .slider_container .container {
      padding: 0 15px;
      max-width: 1230px;
      margin: 0 auto;
    }

    .cart_slider {
      padding: 50px 0;
    }

    /* Payment Form Styles */
.payment-form {
  display: flex;
  text-align: center;
  max-width: 400px;
  margin: 10px ;
  padding: 60px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  float: right;
}

.payment-form img {
  max-width: 40%;
  height: auto;
  margin-bottom: 20px;
}

.payment-form p {
  font-size: 16px;
  margin: 10px 0;
}

.payment-form form {
  margin-top: 20px;
}

.payment-form label {
  display: block;
  margin-bottom: 5px;
  font-size: 14px;
  font-weight: bold;
}

.payment-form input,
.payment-form button {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  box-sizing: border-box;
}

.payment-form input {
  border: 1px solid #ccc;
  border-radius: 5px;
}

.payment-form button {
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.payment-form button:hover {
  background-color: #45a049;
}

.custom-select {
      position: relative;
      display: inline-block;
      width: 200px;
    }

    .custom-select select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      cursor: pointer;
    }

    .custom-select select:focus {
      outline: none;
      border-color: #4caf50;
    }

    .custom-select::before {
      content: '\25BC';
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
    }

    /* Style de survol */
    .custom-select:hover select {
      border-color: #555;
    }

    /* Style lorsqu'il est ouvert */
    .custom-select select[aria-expanded="true"] {
      border-color: #4caf50;
    }


    .bx0{
    padding:20px 30px;
    color: white;
    background-color:green;
    font-size:20px;

}

.bx1{
    padding:20px 30px;
    color: black;
    background-color:orange;
    font-size:20px;

}
    
    
  </style>
</head>

<body>
  <!-- Navbar -->
  <header>
    <div class="navbar">
      <ul class="navbar">
        <li> <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a></li>
        <li><a href="admin.php"><ii>Dashboard</ii></a></li>
        <li><a href="customer.php">Customer</a></li>
        <li><a href="feedbackadmin.php">Feedback</a></li>
        <li><a href="produit.php">Poducts</a></li>
     <li>

                 <a href=""> <?php echo $row["lastName"]; ?></a> 
  </li>
        <li><a href="logout.php">Log out</a></li>
      </ul>

      <!-- Icons -->
      <div class="header-icons">
      
        <i class='bx bx-search-alt-2' id="search-icon"></i>
       
      </div>
      <!-- Search -->
      <div class="search-box">
        <input type="search" name="" id="" placeholder="search here..."><img src="loop" alt="" class="im">
      </div>

      
    
    </div>
  </header>
  <?php
  // SQL QUERY 
  $query = "SELECT * FROM `orders`;"; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          $imageURL = '../uploads/'.$row["product_image"];
          $pimage ='../uploads/'.$row["pay_image"];

          ?>
  <div class="payment-form">
 
    <form id="payment-form">
        <img src="<?php echo $imageURL; ?>" alt="Product Image">

        <label for=""> User_Name: <?php  echo $row["Name"] ?> </label>
        <p>Product Name:<?php  echo $row["product_name"]?></p>
        <p>Price: $<?php  echo $row["product_price"]?></p>
        <label for="number ">ID:<?php  echo $row["o_id"]?></label>
     
      <label for="number ">Phone Number:<?php  echo $row["phone"]?></label>
      
      <label for="email">Email : <?php  echo $row["email"]?></label>
      
      <label for="Adress">Adress:<?php  echo $row["address"]?> </label>
      <label for="email">Date : <?php  echo $row["date"]?></label>
    
      <label for="payment-method">Payment Method</label>
      <img src="<?php  echo $pimage ?>" alt="Product Image">
         
    
       
      <?php if($row["status"]==0){
          echo '<p> <a href="status.php?d_id='.$row['o_id'].'&status=1" class="bx0"> Pedding </a></p>';


        }
        if ($row["status"]==1){
          echo '<p> <a href="status.php?d_id='.$row['o_id'].'&status=0" class="bx1"> Completed </a></p>';
        } ?>
    
    </form>
   

  </div>

  <?php
} 
}  

?>

  <!-- Link to JS -->
  <script src="../ee-com.js">
    
  </script>
 
  <script src="script.js">
    function submitPayment() {
      // Here you can add logic to handle the payment submission
      alert('Payment submitted successfully!');
    }
  </script>



</body>

</html>











