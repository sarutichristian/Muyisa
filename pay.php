<?php
include 'conn.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  $name = $_SESSION["Name"];

  $v= mysqli_query($con," SELECT * FROM products WHERE product_id='".$_GET['id']."'");
  $row = mysqli_fetch_assoc($v);
  $img=$row["product_image"];
  
}
else{

  header("location:login.php");
 
 
}


$result = mysqli_query($con, "SELECT * FROM products WHERE product_id='".$_GET['id']."'");
$row = mysqli_fetch_array($result);






  
$statusMsg = ''; 
 
// File upload directory 
$targetDir = "uploads/"; 
 
if(isset($_POST["submit"])){ 
    if(!empty($_FILES["file"]["name"])){ 


        $Pname=$_POST["name"];  
        $price=$_POST["pri"];
        $phone = $_POST["phone"];
        $email =$_POST["email"];
        $address =$_POST["address"];
        $img=$row["product_image"];
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $insert = $con->query("INSERT INTO orders (o_id,userid,Name,product_name,product_price,product_image,email,address,phone,pay_image, date,status) VALUES ('','".$id."','".$name."','".$Pname."','".$price."','".$img."','".$email."','".$address."','".$phone."','".$fileName."', NOW(),'')"); 
                if($insert){ 
                 header("location:home.php");
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 





?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAGASIN</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="ee.com.css">
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
  text-align: center;
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.payment-form img {
  max-width: 100%;
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

  </style>
</head>

<body>
  <!-- Navbar -->
  <header>
    <div class="navbar">
      <ul class="navbar">
        <li> <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>fawane<br>62385 <span>❤</span></a></li>
        <li><a href="home.php"><ii>HOME</ii></a></li>
        <li><a href="home.php">NEW ARRIVAL</a></li>
        <li><a href="home.php">SPECIAL DEAL</a></li>
        <li><a href="order.php">MY Orders</a></li>
        <li><a href="home.php">PRODUCTS</a></li>

        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="feedback.php">FEEDBACK</a></li>
      
      </ul>

    
<!--
   
  </header>
  <form id="payment-form" action="p.php" method="post" enctype="multipart/form-data">
  <div class="payment-form">
    <img src="uploads/<?php echo $row['product_image'];?>" name="image" alt="Product Image">
    
    <p name="name">Product Name:<?php echo $row['product_name'];?></p>
    <p>Product Price:$<?php echo $row['product_price'];?> </p>

       
      <input type="hidden" id="" name="name" value="<?php echo $row['product_name'];?>">

      <input  type="hidden" id="" name="pri" value="<?php echo $row['product_price'];?>">
     
      <label for="number ">Phone-Number:</label>
      <input type="number" id="buyer-name" name="phone" required>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>

      <label for="Adress">Address:</label>
      <input type="text" id="Adress" name="address" required>
      <label for="payment-method">Payment Method</label>
      <p>Bank Acount:09932444446544789</p>
      <p>M-pesa:0793260995</p>
      <p>Paypal:0784323</p>

      <label for="file">Upload File:</label>
      <input type="file" name="file">

      <button type="submit" onclick="submitPayment()">Submit Payment</button>
    </form>
  
-->
</header>
<form action="" method="post" enctype="multipart/form-data">
<div class="payment-form">
    <img src="uploads/<?php echo $row['product_image'];?>" name="image" alt="Product Image">
    
    <p name="name">Product Name:<?php echo $row['product_name'];?></p>
    <p>Product Price:$<?php echo $row['product_price'];?> </p>

       
      <input type="hidden" id="" name="name" value="<?php echo $row['product_name'];?>">

      <input  type="hidden" id="" name="pri" value="<?php echo $row['product_price'];?>">
     
      <label for="number ">Phone-Number:</label>
      <input type="number" id="buyer-name" name="phone" required>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>

      <label for="Adress">Address:</label>
      <input type="text" id="Adress" name="address" required>
      <label for="payment-method">Payment Method</label>
      <p>Bank Acount:09932444446544789</p>
      <p>M-pesa:0793260995</p>
      <p>Paypal:0784323</p>

      <label for="file">Upload File:</label>


    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>


  <script src="script.js">
    function submitPayment() {
      // Here you can add logic to handle the payment submission
      alert('Payment submitted successfully!');
    }
  </script>
</body>

</html>
