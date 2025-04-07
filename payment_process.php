<?php
include 'components/connect.php';
session_start();
$user_id = $_SESSION['user_id'];
$connn=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');
// if($connn){
//     echo('con');
//     mysqli_query($connn,"INSERT INTO `orders`(`user_id`, `name`, `sname`, `number`, `email`, `total_products`, `total_price`, `payment_status`, `payment_id`, `placed_on`) VALUES ('$user_id','c','s','123','e','hi','1','p','pay','9')");
//     //$_SESSION['OID']=mysqli_insert_id($connn);
//     echo ('data inserted');
// }





// if(isset($_POST['amt']) && isset($_POST['name'])){
//     $amt=$_POST['amt'];
//     $name=$_POST['name'];
//     $payment_status="pending";
//     $added_on=date('Y-m-d h:i:s');
//     mysqli_query($conn,"insert into orders(name,amount,payment_status,added_on) values('$name','$amt','$payment_status','$added_on')");
//     $_SESSION['OID']=mysqli_insert_id($conn);
// }

if(isset($_POST['amt']) && isset($_POST['name'])){

    $name = $_POST['name'];
    // $name = filter_var($name, FILTER_SANITIZE_STRING);
    $sname = $_POST['sname'];
    // $sname = filter_var($sname, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    // $email = filter_var($email, FILTER_SANITIZE_STRING);
    $address =$_POST['address'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['pincode'];
    // $address = filter_var($address, FILTER_SANITIZE_STRING);
    $total_products = $_POST['description'];
    $amt = $_POST['amt'];
    $payment_status="Failed";
    $added_on=date("j F Y, g:i a");  
    $delivery="Not Completed";
    //mysqli_query($connn,"INSERT INTO `orders`(`user_id`,` name`,`sname`,` number`, `email`, `total_products`, `total_price`,`payment_status`,`placed_on`) VALUES ('$user_id', '$name','$sname','$number','$email', '$total_products',' $amt','$payment_status','$added_on')");
    mysqli_query($connn,"INSERT INTO `orders`(`user_id`, `name`, `sname`, `number`, `email`,`address`, `total_products`, `total_price`, `payment_status`, `payment_id`, `placed_on`,`delivery`) VALUES ('$user_id','$name','$sname','$number','$email','$address','$total_products','$amt','$payment_status','NONE','$added_on','$delivery')");    
    $_SESSION['OID']=mysqli_insert_id($connn);
    echo ('data inserted');
    // $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    // $check_cart->execute([$user_id]);
 
   
    //    $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name,sname, number, email, total_products, total_price,payment_status) VALUES(?,?,?,?,?,?,?,?)");
    //    $insert_order->execute([$user_id, $name,$sname, $number, $email, $total_products, $total_price,$payment_status]);


//   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
//        $delete_cart->execute([$user_id]);
//        $message[] = 'order placed successfully!';
    }
 
 
if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    

  $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
  $delete_cart->execute([$user_id]);
  $message[] = 'Order placed successfully!';
    mysqli_query($connn,"UPDATE `orders` SET payment_status='Completed',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>
