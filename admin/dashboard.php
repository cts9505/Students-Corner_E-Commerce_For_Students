<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Dashboard</h1>

   <div class="box-container"  style="text-transform: capitalize;">
<!-- 
      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div> -->

      
      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount();
            $total_completes=0;
            $select_completes = $conn->prepare("SELECT * FROM `orders`");
            $select_completes->execute();
            $number_orders = $select_completes->rowCount();
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3>₹<?= $total_completes; ?><span>/-</span>[<?= $number_of_orders; ?>]</h3>
         <p>orders placed</p>
         <a href="total_orders.php" class="btn">Orders</a>
      </div>
     

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['completed']);
            $number_orders = $select_completes->rowCount();
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3>₹<?= $total_completes; ?><span>/-</span>&nbsp;[<?=$number_orders?>]</h3>
         <p>completed orders</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>

 <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['Failed']);
            $number_of_order = $select_pendings->rowCount();
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
         ?>
         <h3>₹<?= $total_pendings; ?><span>/-</span>&nbsp;[<?=$number_of_order?>]</h3>
         <p>Failed Orders</p>
         <a href="pending_orders.php" class="btn">See Failed Orders</a>
      </div>
      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>products added</p>
         <a href="live_products.php" class="btn">see products</a>
      </div>
      
      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `products` Where status='Not-Approved'");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>Products For Review</p>
         <a href="sell_products.php" class="btn">See products</a>
      </div>
      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `lostnfound`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>LOFO</p>
         <a href="lost_found.php" class="btn">All Lost & Found</a>
      </div>
      
      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>new messages</p>
         <a href="messages.php" class="btn">see messages</a>
      </div>
      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `review`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>Total Review's of website</p>
         <a href="review.php" class="btn">See all reviews</a>
      </div>
      

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>normal users</p>
         <a href="users_accounts.php" class="btn">see users</a>
      </div>
      
      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>admin users</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>


   </div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>