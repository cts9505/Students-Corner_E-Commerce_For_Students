<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $sold = $_POST['sold'];
   $sold = filter_var($sold, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $quality = $_POST['quality'];
   $quality = filter_var($quality, FILTER_SANITIZE_STRING);
   $quantity = $_POST['quantity'];
   $quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $status='Approved';

   $image_1 = $_FILES['image_01']['name'];
   $image_01='1-Studentscorner-'.date("Y-M-j-D-G-i-s-").$image_1;
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   $image_2 = $_FILES['image_02']['name'];
   $image_02='2-Studentscorner-'.date("Y-M-j-D-G-i-s-").$image_2;
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   $image_3 = $_FILES['image_03']['name'];
   $image_03='3-Studentscorner-'.date("Y-M-j-D-G-i-s-").$image_3;
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);


      $insert_products = $conn->prepare("INSERT INTO `products`(name,category,quantity,quality, details, price, image_01, image_02, image_03,status,sold_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name,$category, $quantity,$quality,$details, $price, $image_01, $image_02, $image_03,$status,$sold]);

      if($insert_products){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'New product added sucessfully!';
         }

      }

    

};
if(isset($_GET['status'])){
   $status_id = $_GET['status'];
   $status_product = $conn->prepare(" UPDATE `products` SET status='Approved' WHERE id = ?");
   $status_product->execute([$status_id]);;
};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:products.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>

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

<section class="add-products">

   <h1 class="heading">ADD NEW PRODUCT</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Product Name*</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>Product Category*</span>
            <select class="box" name="category" required>
               <option  hidden >What type of product ? </option>
               <option value="book">Book</option>
               <option value="stationery">Stationery</option>
            </select>
         </div> 
         <div class="inputBox">
            <span>Product Quality*</span>
            <select class="box" name="quality" required>
               <option  hidden >Weather product Used or Not </option>
               <option value="1st Hand">1st Hand(Not Used)</option>
               <option value="2nd Hand">2nd Hand(Used)</option>
            </select>
         </div> 
         
         <div class="inputBox">
            <span>Product Quantity*</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter product quantity" name="quantity">
         </div>
         <div class="inputBox">
            <span>Product price*</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
         
        <div class="inputBox">
            <span>Image 1(displayed on main page)*</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 2*</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 3*</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>Product details* </span>
            <textarea name="details" placeholder="Enter product details such as uses/facilites..." class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      <input type="hidden" value="Students Corner (Admin)" name="sold">
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>


<script src="../js/admin_script.js"></script>
   
</body>
</html>