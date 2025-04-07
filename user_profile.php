<?php

include 'components/connect.php';
include('smtp/PHPMailerAutoload.php');
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
  
}else{
   $user_id = '';
   header('location:user_login.php?msg=Please Login to View your account profile .');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f3f3;
}

.wrapper{
  position: absolute;
  top: 47%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 450px;
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.wrapper .left{
  width:fit-content;
  background: linear-gradient(to right,#0f82f9,#01dbdf);
  padding: 150px 25px;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  text-align: center;
  color: #fff;
}

.wrapper .left img{
  border-radius: 5px;
  margin-bottom: 10px;
}

.wrapper .left h4{
  margin-bottom: 10px;
}

.wrapper .left p{
  font-size: 12px;
}

.wrapper .right{
  width: 65%;
  background: #fff;
  padding: 30px 25px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.wrapper .right .info,
.wrapper .right .projects{
  margin-bottom: 25px;
}

.wrapper .right .info h3,
.wrapper .right .projects h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
}

.wrapper .right .info_data,
.wrapper .right .projects_data{
  /* display: flex; */
  justify-content: space-between;
}

.wrapper .right .info_data .data,
.wrapper .right .projects_data .data{
  width: 45%;
}

.wrapper .right .info_data .data h4,
.wrapper .right .projects_data .data h4{
    color: #353c4e;
    margin-bottom: 5px;
}

.wrapper .right .info_data .data p,
.wrapper .right .projects_data .data p{
  font-size: 13px;
  margin-bottom: 10px;
  color: #919aa3;
}

.wrapper .social_media ul{
  display: flex;
}

.wrapper .social_media ul li{
  width: 45px;
  height: 45px;
  background: linear-gradient(to right,#0f82f9,#01dbdf);
  margin-right: 10px;
  border-radius: 5px;
  text-align: center;
  line-height: 45px;
}

.wrapper .social_media ul li a{
  color :#fff;
  display: block;
  font-size: 18px;
}

@media (max-width: 590px) {
  .wrapper{
    position: absolute;
    top: 40%;
    left: 60%;
    transform: translate(-50%, -50%);
    width: 350px;
    display: block;
    box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}
  
  .wrapper .left {
    width: 230px;
    background: linear-gradient(to right, #0f82f9, #01dbdf);
    padding: 38px 25px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    height: 120px;
    text-align: center;
    color: #fff;}
}
@media (max-width: 400px) {
  .wrapper{
    
    top: 16%;
    }
}

@media (max-width: 400px) {
  .wrapper{
    
    top: 20%;
    left: 40%;}
}

    /* Googlefont Poppins CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.sidebar{
  /* position: fixed; */
  height: 100%;
  width: 240px;
  background: #fff;
  transition: all 0.5s ease;
  
}
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #000;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 3px;
  margin-bottom:2px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  
}
.sidebar .nav-links li a.active{
  background: #8c8c8c;
}
.sidebar .nav-links li a:hover{
  background: #b2b5b9;
  transform:scale(1.08);
  border-radius:1rem;
  
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #000;
}
.sidebar .nav-links li a .links_name{
  color: #000;
  font-size: 15px;
  font-weight: 500;
  white-space: nowrap;
  transition: all 0.8s ease;
}
.sidebar .nav-links .log_out{
  /* position: absolute; */
  bottom: 0;
  /* width: 100%; */
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}

nav .sidebar-button i{
  font-size: 35px;
  font-weight:larger;
  margin-right: 10px;
}

/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .links_name{
    display:none;
  }
  .sidebar.active{
    width: 220px;
    
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
  @media (max-width: 400px) {
 
  .sidebar.active{
    width: 60px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 60px;
    width: calc(100% - 60px);
  }
}
</style>
<body>
   
<?php include 'components/user_header.php'; ?>

 <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <div class="wrapper">
    <div class="left">
        <!-- <img src="<?= $fetch_profile["p_p"];?>" alt="user" width="100"> -->
       <p style="letter-spacing: 1.5px;margin-bottom: 5px;">PICTIAN</p>
       <h4 style="font-size:large;text-transform: capitalize;"><?= $fetch_profile["name"];?>&nbsp;<?= $fetch_profile["sname"];?></h4>
         
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p><?= $fetch_profile["email"];?></p>
                 </div><br>
                 <div class="data">
                   <h4>Phone</h4>
                    <p><?= $fetch_profile["number"];?></p>
            </div><br>
                  <div class="data">
                    <h4>Address</h4>
                    <p style="text-transform: capitalize;"><?= $fetch_profile["address"];?>&nbsp;<?= $fetch_profile["city"];?>&nbsp;<?= $fetch_profile["state"];?></p>
                 </div>
                <br>
                 <div class="data">
                    <h4>Pincode</h4>
                    <p><?= $fetch_profile["pincode"];?></p>
                 </div>
                 <br>
                 <div class="data">
                    <h4>Last Login</h4>
                    <p><?= $fetch_profile["last_seen"];?></p>
                 </div>

              </div>
            </div>
        </div>
    </div>
</div>
         
<div class="sidebar">

          <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bxs-user-detail' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="order.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li> --> 
        <!-- <li>
          <a href="chat/index.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Chat</span>
          </a>-->
        <li>
          <a href="contact.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Contact</span>
          </a>
        </li>
        <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();

            $order = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
            $order->execute([$user_id]);
            $order = $order->rowCount();
         ?>
        <li>
          <a href="wishlist.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Wishlist <span>(<?= $total_wishlist_counts; ?>)</span></span>
          </a>
        </li>
        <li>
          <a href="cart.php">
            <i class='bx bx-cart' ></i>
            <span class="links_name">Cart <span>(<?= $total_cart_counts; ?>)</span></span>
          </a>
        </li>
        <li>
          <a href="orders.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Order's <span>(<?= $order; ?>)</span></span>
          </a>
        </li>
        
        <li>
          <a href="update_user.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Update</span>
          </a>
        </li>
        <li>
          <a href="user_login.php">
            <i class='bx bx-log-in' ></i>
            <span class="links_name">Login</span>
          </a>
        </li>
        <li>
          <a href="user_register.php">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Registration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="components/user_logout.php"  onclick="return confirm('Are you sure you want to logout from the website?');">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>


          
         <?php
            }else{
                $message[]="Please Login First!";
         ?>
         <p>please login or register first!</p>
         <div >
            <a href="user_register.php" class="option-btn">Register</a>
            <a href="user_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>
  
<?php

include 'components/footer.php'; ?>

<script src="js/script.js">

</script>

</body>
</html>