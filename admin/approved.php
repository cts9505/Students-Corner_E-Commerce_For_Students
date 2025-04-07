<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};


$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
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

$image_01 = $_POST['image_01'];
// $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
// $image_size_01 = $_FILES['image_01']['size'];
$image_tmp_name_01 = $_POST['temp01'];
$image_folder_01 = '../uploaded_img/'.$image_01;

$image_02 = $_POST['image_02'];
// $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
// $image_size_02 = $_FILES['image_02']['size'];
$image_tmp_name_02 = $_POST['temp02'];
$image_folder_02 = '../uploaded_img/'.$image_02;

$image_03 = $_POST['image_03'];
// $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
// $image_size_03 = $_FILES['image_03']['size'];
$image_tmp_name_03 = $_POST['temp03'];
$image_folder_03 = '../uploaded_img/'.$image_03;

// $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
// $select_products->execute([$name]);

// echo $image_tmp_name_01;
   $insert_products = $conn->prepare("INSERT INTO `products`(name,category,quantity,quality, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?,?,?,?)");
   $insert_products->execute([$name,$category, $quantity,$quality,$details, $price, $image_01, $image_02, $image_03]);

   if($insert_products){
    //   $location="./uploaded_img/"
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         $message[] = 'New product added sucessfully!';
      

$delete_id = $_POST['id'];
$delete_product_image = $conn->prepare("SELECT * FROM `sell` WHERE id = ?");
$delete_product_image->execute([$delete_id]);
$fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
unlink('../sell_images/'.$fetch_delete_image['image_01']);
unlink('../sell_images/'.$fetch_delete_image['image_02']);
unlink('../sell_images/'.$fetch_delete_image['image_03']);
$delete_product = $conn->prepare("DELETE FROM `sell` WHERE id = ?");
$delete_product->execute([$delete_id]);
   }

 
$message[]= 'Approved';
//}
  header('location:products.php');
?><?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};


$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
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

$image_01 = $_POST['image_01'];
// $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
// $image_size_01 = $_FILES['image_01']['size'];
$image_tmp_name_01 = $_POST['temp01'];
$image_folder_01 = '../uploaded_img/'.$image_01;

$image_02 = $_POST['image_02'];
// $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
// $image_size_02 = $_FILES['image_02']['size'];
$image_tmp_name_02 = $_POST['temp02'];
$image_folder_02 = '../uploaded_img/'.$image_02;

$image_03 = $_POST['image_03'];
// $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
// $image_size_03 = $_FILES['image_03']['size'];
$image_tmp_name_03 = $_POST['temp03'];
$image_folder_03 = '../uploaded_img/'.$image_03;

// $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
// $select_products->execute([$name]);

// echo $image_tmp_name_01;
   $insert_products = $conn->prepare("INSERT INTO `products`(name,category,quantity,quality, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?,?,?,?)");
   $insert_products->execute([$name,$category, $quantity,$quality,$details, $price, $image_01, $image_02, $image_03]);

   if($insert_products){
    //   $location="./uploaded_img/"
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         $message[] = 'New product added sucessfully!';
      

$delete_id = $_POST['id'];
$delete_product_image = $conn->prepare("SELECT * FROM `sell` WHERE id = ?");
$delete_product_image->execute([$delete_id]);
$fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
unlink('../sell_images/'.$fetch_delete_image['image_01']);
unlink('../sell_images/'.$fetch_delete_image['image_02']);
unlink('../sell_images/'.$fetch_delete_image['image_03']);
$delete_product = $conn->prepare("DELETE FROM `sell` WHERE id = ?");
$delete_product->execute([$delete_id]);
   }

 
$message[]= 'Approved';
//}
  header('location:products.php');
?>