<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message" id="msg">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            
         </div><script>function div(){documnet.getElementById("msg").style.visibility="hidden";}
         setTimeout("div()",7000);</script>
         ';
      }
   }
?>
<head>
   <style>
      .header .flex .navbar a{
   margin:0 1rem;
   font-size: 2rem;
   color:var(--black);
   text-decoration: none;

}

.header .flex .navbar a:hover{
   color:black;
transform: scale(1.2);
   text-decoration: none;
}
   </style>
<link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</head>
<header class="header">

<link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <section class="flex" style="font-variant: small-caps;height:100px" >
      <div style="width: 30%;">
      <a href="home.php" class="logo"style="" ><img  src="./images/logobanner.png" alt="Students Corner" style="width: 100%;transform: translate(0%, 0%) rotate(0.588deg);"></a>
      </div>
      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="events.php">Events</a>
         <a href="sell_product.php">Exchange</a>
         <a href="pg_flat.php">PG/Flats</a>
         <a href="shop.php">Shop</a>
         <a href="lost_found.php">lofo</a>
         
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile" style="width:fit-content">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

         ?>
         <div class="flex-btn">
            <a href="user_profile.php" class="option-btn" style="background-color: #0d990d;
    width: min-content;"> <pre><i class="fas fa-address-card"></i>  PROFILE  </pre>    </a>
         </div>
         <?php
            }else{
         ?>
         <p>Please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
          
      </div>

   </section>

</header>