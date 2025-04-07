<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   // $message[] = 'Logined successfully !';
}else{
   $user_id = '';
   // $message[] = 'Welcome! Please login now for uninterupted services! <a href="user_login.php" style="
   // background-color: var(--orange);
   // width: 100%;
   // margin-top: 1rem;
   // border-radius: 1.5rem;
   // padding: 0.5rem 1rem;
   // font-size: 1.7rem;
   // text-transform: capitalize;
   // color: var(--white);
   // cursor: pointer;
   // text-align: center;" >login now</a>';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Students Corner</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
<style>
	
   .slider{
    width: 1000px;
    max-width: 100vw;
    height: 560px;
    margin: auto;
    position: relative;
    overflow: hidden;
    border: 3px solid var(--box-shadow);
    box-shadow: 0 0 8px 2px rgba(0,0,0,0.2);
    margin-top:0.8%;
    margin-bottom:0.9%
}
.slider .list{
    position: absolute;
    width: max-content;
    height: 100%;
    left: 0;
    top: 0;
    display: flex;
    transition: 1.2s;
padding:5%
}
.slider .list img{
    /* width: 1000px;
    max-width: 100vw; */
    height: 100%;
    object-fit: cover;
    margin-left:95px
}
.slider .buttons{
    position: absolute;
    top: 45%;
    /* left: 5%; */
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.slider .buttons button{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: var(--box-shadow);
    color: #000;
    border: none;
    font-family: monospace;
    font-weight: bold;
    font-size:large;
}
.slider .buttons button :hover{
   background-color:lightgrey;
   padding:1rem;
    /* border-radius: 50%; */
    color: #000;
    font-weight: bold;
    transform:scale(1.5);
    cursor:pointer;
}
.slider .dots{
    position: absolute;
    bottom: 10px;
    left: 0;
    color: #fff;
    width: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}
.slider .dots li{
    list-style: none;
    width: 10px;
    height: 10px;
    background-color: grey;
    margin: 10px;
    border-radius: 20px;
    transition: 0.5s;
}
.slider .dots li.active{
    width: 30px;
}
@media screen and (max-width: 768px){
    .slider{
        height: 400px;
    }
}
</style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<body1>
    
    <div class="slider">
        <div class="list">
            <div class="item">
            <a href="shop.php">
                <img src="images/enggbooks.gif" alt="">
            </a>
            </div>
            <div class="item">
            <a href="pg_flat.php">
               <img src="images/pg.gif" alt="">
            </a>
            </div>
            <div class="item">
            <a href="lost_found.php">
               <img src="images/lofo.gif" alt="">
            </a>
            </div>
            <div class="item">
            <a href="events.php">
               <img src="images/events.gif" alt="">
            </a>
            </div>
            <div class="item">
            <a href="category.php?category=stationery">
               <img src="images/stat.gif" alt="">
            </a>
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button id="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
<script>
   let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 2580);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};

</script>
    
</body1>
<div class="home-bg">


<!-- <section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/drafter.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3>Drafter</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/phy.jpg" alt="">
         </div>
         <div class="content">
            <span>Upto 5% off</span>
            <h3>Physics Books</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div>
         
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section> -->

</div>


<section class="category">

   <h1 class="heading"> category</h1>
   

   <div class="swiper category-slider">

   <div class="swiper-wrapper">
   <a href="category.php?category=book" class="swiper-slide slide">
         <img src="images/book.gif" alt="">
         <h3>Book</h3>
      </a>
      <a href="ebook.php" class="swiper-slide slide">
         <img src="images/ebook.gif" alt="">
         <h3>E-Book</h3>
      </a>
   <a href="category.php?category=stationery" class="swiper-slide slide">
      <img src="images/stationery.gif" alt="">
      <h3>Stationery</h3>
   </a>
   
   <a href="pg_flat.php" class="swiper-slide slide">
      <img src="images/hotel.gif" alt="">
      <h3>PG/HOSTEL</h3>
   </a>
   <a href="events.php" class="swiper-slide slide">
         <img src="images/event.gif" alt="">
         <h3>EVENTS</h3>
      </a>
   </div>

   <!-- <div class="swiper-pagination"></div> -->

   </div>

</section>
<section class="products">

   <h1 class="heading">latest Books / stationery</h1>

   <div class="box-container">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` Where status='Approved' ORDER BY id desc LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
   <div class="copy" style="inline-size: max-content;
    margin-left: 24.7rem;
    background: lime;
    padding: 1rem 2.5rem 1rem 1rem;
    border-radius: 5rem;
    font-size: medium;"><p><?= $fetch_product['quality']; ?></p></div>
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name" style="text-transform:capitalize;font-size:x-large"><?= $fetch_product['name']; ?></div>
      <div class="details" style="text-transform:capitalize;color:grey;font-size:medium;margin-top: 2%;margin-bottom: 1.5%;"><?= $fetch_product['details']; ?></div>
     
      <div class="flex">
         
         <div class="price"><span>₹</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="<?=$fetch_product['quantity']; ?>" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">No products found!</p>';
   }
   ?>

   </div>

</section>


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>