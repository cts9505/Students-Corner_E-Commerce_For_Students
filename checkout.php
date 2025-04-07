<?php

 include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php?msg=Please Login for further procedure .');
};

// if(isset($_POST['order'])){

//    $name = $_POST['name'];
//    $name = filter_var($name, FILTER_SANITIZE_STRING);
//    $number = $_POST['number'];
//    $number = filter_var($number, FILTER_SANITIZE_STRING);
//    $email = $_POST['email'];
//    $email = filter_var($email, FILTER_SANITIZE_STRING);
//    $method = $_POST['method'];
//    $method = filter_var($method, FILTER_SANITIZE_STRING);
//    $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
//    $address = filter_var($address, FILTER_SANITIZE_STRING);
//    $total_products = $_POST['total_products'];
//    $total_price = $_POST['total_price'];

//    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
//    $check_cart->execute([$user_id]);

//    if($check_cart->rowCount() > 0){

//       $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
//       $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

//       $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
//       $delete_cart->execute([$user_id]);

//       $message[] = 'order placed successfully!';
//    }else{
//       $message[] = 'your cart is empty';
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="checkout-orders">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="cart.php">&nbsp;Cart&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Checkout
   </span></div>
   <form >

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
      $i=1;
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $i.') '.$fetch_cart['name'].' :-  Price : '.$fetch_cart['price'].' X Quantity : '. $fetch_cart['quantity'].' :- Total = '.$fetch_cart['price']*$fetch_cart['quantity'].' - ';
               $i++;
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);

      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= '₹'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" id="des" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" id="amt">
         <div class="grand-total">Grand total : <span>₹<?= $grand_total; ?>/-</span></div>
      </div>
      <?php  $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC); }?>
      <h3>Place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Your name :</span>
            <input type="text" name="name" id="name" placeholder="enter your name" class="box" maxlength="20" value="<?= $fetch_profile["name"]; ?>" required/>
         </div>
         <div class="inputBox">
            <span>Your surname :</span>
            <input type="text" name="sname" id="sname"placeholder="enter your name" class="box" maxlength="20" value="<?= $fetch_profile["sname"]; ?>" required/>
         </div>
         <div class="inputBox">
            <span>Your number :</span>
            <input type="tel" name="phonenumber" id="number" placeholder="enter your number" class="box" min="0" max="9999999999" value="<?= $fetch_profile["number"]; ?>" required/>
         </div>
         <div class="inputBox">
            <span>Your email :</span>
            <input type="email" name="email" id="email" placeholder="enter your email" class="box" maxlength="50" value="<?= $fetch_profile["email"]; ?>"required/>
         </div>
          <div class="inputBox">
            <span>Address:</span>
            <input type="text" name="flat" id="add" placeholder="e.g. flat number, Lane number" class="box" maxlength="100" value="<?= $fetch_profile["address"]; ?>" required>
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" id="city" placeholder="e.g. mumbai" class="box" maxlength="50" value="<?= $fetch_profile["city"]; ?>"required>
         </div>
         <div class="inputBox">
            <span>State :</span>
            <input type="text" name="state" id="state" placeholder="e.g. maharashtra" class="box" maxlength="50"value="<?= $fetch_profile["state"]; ?>" required>
         </div>
         <div class="inputBox">
            <span>Pin code :</span>
            <input type="number" min="0" id="pincode" name="pin_code" placeholder="e.g. 123456" min="0" max="999999" value="<?= $fetch_profile["pincode"]; ?>" onkeypress="if(this.value.length == 6) return false;" class="box" required>
         </div>
      </div> 

      <!-- <input type="submit" name="order"  value="place order">
    -->
    <input type="button" name="btn" id="btn"class="btn" value="Pay Now" onclick="pay_now()"/>

   </form>

</section>

<script>


function pay_now(){
        var amt=jQuery('#amt').val();
        var name=jQuery('#name').val();
        var sname=jQuery('#sname').val();
        var number=jQuery('#number').val();
        var email=jQuery('#email').val();
        var address=jQuery('#add').val();
        var city=jQuery('#city').val();
        var state=jQuery('#state').val();
        var pincode=jQuery('#pincode').val();
        var description=jQuery('#des').val();

        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name+"&sname="+sname+"&email="+email+"&number="+number+"&amt="+amt+"&description="+description+"&address="+address+"&city="+city+"&state="+state+"&pincode="+pincode,
               success:function(result){
                   var options = {
                        "key": "rzp_test_zHhNFsppG7bIjH", 
                        //my key :rzp_test_DlyvZv3mIVRiQw
                        // for upi key : rzp_test_zHhNFsppG7bIjH
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Students Corner",
                        "description": description,
                        "image": "http://studentscorner.great-site.net/studentcorner/images/logobanner.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="orders.php?order=placed";

                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>










<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>