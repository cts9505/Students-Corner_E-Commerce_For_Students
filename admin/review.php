<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update'])){

    $review_id=$_POST['review_id'];
    $user_review = $_POST['user_review'];
    $user_review = filter_var($user_review, FILTER_SANITIZE_STRING);
    
    $user_rating = $_POST['user_rating'];
    $user_rating = filter_var($user_rating, FILTER_SANITIZE_STRING);
    
 
    $update_product = $conn->prepare("UPDATE `review` SET  user_rating = ?,user_review=? WHERE review_id = ?");
    $update_product->execute([$user_rating,$user_review,$review_id]);
 
    $message[] = 'Review updated successfully!';
}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `review` WHERE review_id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   $delete_product = $conn->prepare("DELETE FROM `review` WHERE review_id = ?");
   $delete_product->execute([$delete_id]);
  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Review And Rating</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<style>
   .add-products form span {
    font-size: 1.9rem;
    color: #444;
}
</style>
<body>

<?php include '../components/admin_header.php'; ?>



<section class="show-products">

   <h1 class="heading">products added</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `review`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
   <form  action="" method="post" enctype="multipart/form-data"  style="text-transform: capitalize;">
   <input type="hidden" name="review_id" value="<?= $fetch_products['review_id'];?>">
      <div class="price" style="color:#ffd800"><span ><i style="color:#ffd800"class="fa-solid fa-star"></i><input style="    font-size: large;" type="number" min="1" max="5" name="user_rating" value="<?= $fetch_products['user_rating']; ?>"></span></div>
      <div class="name"><input style="    font-size: inherit;" type="text" name="user_review" value="<?= $fetch_products['user_review']; ?>"></div>
      <div class="details" style="text-transform: capitalize;color:black;">Given by :<?= $fetch_products['user_name']; ?></div>
      
      <!-- <div class="details"><span><?= $fetch_products['datetime']; ?></span></div> -->
      <div >
         <input type="submit" class="option-btn" value="Update" name="update">
</form>
         <!-- <a href="sell_products.php?status=<?= $fetch_products['id']; ?>" class="option-btn" style="background-color: green;" onclick="return confirm('Approve this product?');">Approve</a> -->
         <a href="review.php?delete=<?= $fetch_products['review_id']; ?>" class="delete-btn" onclick="return confirm('Delete this Review?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Review added Yet !</p>';
      }
   ?>
   
   </div>

</section>








<script src="../js/admin_script.js"></script>
   
</body>
</html>