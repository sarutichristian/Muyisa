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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admi.css">
</head>

<style>
    a{
  text-decoration: none;


}

.bx0{
    padding:5px 7px;
    color: white;
    background-color:green;
    font-size:15px;
    text-align:center;

}

.bx1{
    padding:5px 7px;
    color: black;
    background-color:orange;
    font-size:15px;
    text-align:center;

}
</style>

<body>
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
           
                <li>
                    <a href="customer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Clients</span>
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
                        <span class="title">Produits</span>
                    </a>
                </li>

                <li>
                    <a href="log.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">add admins</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Se deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">

            <a href="produit.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sql = "SELECT * from products"; if ($result = mysqli_query($con, $sql)) {
$rowcount = mysqli_num_rows( $result ); echo " $rowcount";}?></div>
                        <div class="cardName">Produits</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                  
                </div>
                </a>
                <a href="payadmi.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sql = "SELECT * from orders "; if ($result = mysqli_query($con, $sql)) {
$rowcount = mysqli_num_rows( $result ); echo " $rowcount";}?></div>
                        <div class="cardName">Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                        </a>

             <a href="feedbackadmin.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sql = "SELECT * from messages"; if ($result = mysqli_query($con, $sql)) {
$rowcount = mysqli_num_rows( $result ); echo " $rowcount";}?></div>
                        <div class="cardName">Feedback</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>
                        </a>

                        <a href="customer.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sql = "SELECT * from users"; if ($result = mysqli_query($con, $sql)) {
$rowcount = mysqli_num_rows( $result ); echo " $rowcount";}?></div>
                        <div class="cardName">Clients</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                        </a>

                        <a href="customeradmin.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sql = "SELECT * from admins"; if ($result = mysqli_query($con, $sql)) {
$rowcount = mysqli_num_rows( $result ); echo " $rowcount";}?></div>
                        <div class="cardName">Admins</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                        </a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="payadmi.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prix</td>
                                <td>Nom Produit</td>
                                <td>Statut</td>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
  // SQL QUERY 
  $query = "SELECT * FROM `orders`"; 

  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

?>
                            <tr>
                                <td><?php  echo $row["Name"]?></span></td>
                                <td>$<?php  echo $row["product_price"]?></td>
                                <td><?php  echo $row["product_name"]?></td>
                                <td> <?php if($row["status"]==0){
          echo "<p class='bx0'>Pedding </p>";


        }
        if ($row["status"]==1){
          echo "<p class='bx1'>Completed </p>";
        } ?></td>
                            </tr>
<?php
        }
    }
    ?>
                          
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                    <?php
  // SQL QUERY 
  $query = "SELECT * FROM `users`;"; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $con->query($query); 
  
    if ($result->num_rows > 0)  
    { 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) 
        { 

          ?>
                        <tr>
    
                            <td>
                                <h4><?php echo $row["Name"]?> <br> <span> <?php echo $row["lastName"] ?></span></h4>
                            </td>

                           

     
                        </tr>
                        <?php

                    }
                }
                ?>

                       
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="admi.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>