<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php?msg=Please Login to View all Orders from your account .');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="orders">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="user_profile.php">&nbsp;Profile&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Orders
   </span></div>
   <h1 class="heading">Placed orders</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty" style="">Please login to see your orders <a href="user_login.php" class="option-btn">login now</a>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?  order by id desc");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
               
   ?>
   <div class="box">
      <p>Order Id : <span>S<?= $fetch_orders['user_id']; ?>_<?= $fetch_orders['id']+1000; ?></span></p>
      <p>Placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Name : <span><?= $fetch_orders['name']; ?>&nbsp;<?= $fetch_orders['sname']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Contact Number : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Address : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Your orders : <?php
      $name=explode(" - ",$fetch_orders['total_products']);
               foreach($name as $d){?>
      <span><br><?= $d ?></span>
      <?php }?></p>
      <p>Total price : <span>₹<?= $fetch_orders['total_price']; ?>/-</span></p>
      <p>Payment Id : <span><?= $fetch_orders['payment_id']; ?></span></p>
      <p>Payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'Failed'){ echo 'red'; }else{ echo 'lime'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
      <p>Completion status : <span style="color:<?php if($fetch_orders['delivery'] == 'Not Completed'){ echo 'red'; }elseif($fetch_orders['delivery'] == 'Cancelled'){ echo 'red';}else{ echo 'green'; }; ?>"><?= $fetch_orders['delivery']; ?></span> </p>
      <p><a href="invoice.php?id=<?php echo $fetch_orders['id'] ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View Invoice</a> 
      <a href="invoice.php?id=<?php echo $fetch_orders['id'] ?>&ACTION=DOWNLOAD" class="btn btn-danger"><i class="fa fa-download"></i> Download Invoice</a>
            </p>
   </div>
   <?php
               }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      }
   ?>

   </div>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>