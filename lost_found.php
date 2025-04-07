<?php

include './components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php?msg=Please Login to Report Lost Item');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $sold = $_POST['sold'];
   $sold = filter_var($sold, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $status='Not-Found';

   $image_1 = $_FILES['image_01']['name'];
   $image_01=time().$image_1;
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = './uploaded_img/'.$image_01;


   $select_products = $conn->prepare("SELECT * FROM `lostnfound` WHERE name = ?");
   $select_products->execute([$name]);


      $insert_products = $conn->prepare("INSERT INTO `lostnfound`(name,category, details, image_01,status,sold_by) VALUES(?,?,?,?,?,?)");
      $insert_products->execute([$name,$category,$details,$image_01,$status,$sold]);

      if($insert_products){
         if($image_size_01 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            $message[] = 'Product added for Not Found!';
         }

      }

    

};
if(isset($_GET['status'])){
    $status_id = $_GET['status'];
    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            $ns=$fetch_profile["name"]." ".$fetch_profile["sname"];}
     
    $status_product = $conn->prepare(" UPDATE `lostnfound` SET status='Found', recieved_by='$ns' WHERE id = ?");
    $status_product->execute([$status_id]);
    $message[] = 'Item Recieved sucessfully by '.$ns.'.';
    
 };
 if(isset($_GET['rep'])){
    $status_id = $_GET['rep'];
    $status_product = $conn->prepare(" UPDATE `lostnfound` SET status='Not-Found',recieved_by='' WHERE id = ?");
    $status_product->execute([$status_id]);
    $message[] = 'Item Marked as Not Recieved . ';
 };
 
 if(array_key_exists('detail', $_POST)) { 
           $id=$_POST['id'];
 $select_products = $conn->prepare("SELECT * FROM `lostnfound` Where id='$id'");
 $select_products->execute();
 if($select_products->rowCount() > 0){
    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
       $em= $fetch_products['email']; 
       $num= $fetch_products['number']; 
       $n=$fetch_products['sold_by'];
       echo "<script>alert('Contact Details of $n :-                                                     Mobile Number : $num                                                           Email : $em');</script>"; 
       } }};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lost and Found</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   
   <link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="../css/admin_style.css">
</head>
<style>
   .add-products form span {
    font-size: 1.9rem;
    color: #444;
}
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap');

:root{
   --main-color:#2980b9;
   --orange:#f39c12;
   --red:#e74c3c;
   --black:#444;
   --white:#fff;
   --light-color:#777;
   --light-bg:#f5f5f5;
   --border:.2rem solid var(--black);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}

*{
   font-family: 'Nunito', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

*::selection{
   background-color: var(--main-color);
   color:var(--white);
}

::-webkit-scrollbar{
   height: .5rem;
   width: 1rem;
}

::-webkit-scrollbar-track{
   background-color: transparent;
}

::-webkit-scrollbar-thumb{
   background-color: var(--main-color);
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

body{
   background-color: var(--light-bg);
   /* padding-bottom: 10rem; */
}

section{
   padding:2rem;
   max-width: 1200px;
   margin:0 auto;
}

.heading{
   font-size: 4rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
   text-transform: uppercase;
}

.btn,
.delete-btn,
.option-btn{
   display: block;
   width: 100%;
   margin-top: 1rem;
   border-radius: .5rem;
   padding:1rem 3rem;
   font-size: 1.7rem;
   text-transform: capitalize;
   color:var(--white);
   cursor: pointer;
   text-align: center;
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

.btn{
   background-color: var(--main-color);
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   background-color: var(--red);
}

.flex-btn{
   display: flex;
   gap:1rem;
}

.message{
   position: sticky;
   top:0;
   max-width: 1200px;
   margin:0 auto;
   background-color: var(--light-bg);
   padding:2rem;
   display: flex;
   align-items: center;
   justify-content: space-between;
   gap:1.5rem;
   z-index: 1100;
}

.message span{
   font-size: 2rem;
   color:var(--black);
}

.message i{
   cursor: pointer;
   color:var(--red);
   font-size: 2.5rem;
}

.message i:hover{
   color:var(--black);
}

.empty{
   padding:1.5rem;
   background-color: var(--white);
   border: var(--border);
   box-shadow: var(--box-shadow);
   text-align: center;
   color:var(--red);
   border-radius: .5rem;
   font-size: 2rem;
   text-transform: capitalize;
}

@keyframes fadeIn{
   0%{
      transform: translateY(1rem);
   }
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
}

.form-container form{
   padding:2rem;
   text-align: center;
   box-shadow: var(--box-shadow);
   background-color: var(--white);
   border-radius: .5rem;
   width: 50rem;
   border:var(--border);
}

.form-container form h3{
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 1rem;
   font-size: 2.5rem;
}

.form-container form p{
   font-size: 1.8rem;
   color:var(--light-color);
   margin-bottom: 1rem;
   border-radius: .5rem;
}

.form-container form p span{
   color:var(--orange);
}

.form-container form .box{
   width: 100%;
   margin:1rem 0;
   border-radius: .5rem;
   background-color: var(--light-bg);
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
}

.header{
   position: sticky;
   top:0; left:0; right:0;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   z-index: 1000;
}

.header .flex{
   display: flex;
   align-items: center;
   justify-content: space-between;
   position: relative;
}

.header .flex .logo{
   font-size: 2.5rem;
   color:var(--black);
}

.header .flex .logo span{
   color:var(--main-color);
}

.header .flex .navbar a{
   margin:0 1rem;
   font-size: 2rem;
   color:var(--black);
}

.header .flex .navbar a:hover{
   color:var(--main-color);
   text-decoration: underline;
}

.header .flex .icons div{
   margin-left: 1.7rem;
   font-size: 2.5rem;
   cursor: pointer;
   color:var(--black);
}

.header .flex .icons div:hover{
   color:var(--main-color);
}

.header .flex .profile{
   position: absolute;
   top:120%; right:2rem;
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   width: 30rem;
   padding-top: 1.2rem;
   display: none;
   animation:fadeIn .2s linear;
}

.header .flex .profile.active{
   display: inline-block;
}

.header .flex .profile p{
   text-align: center;
   color:var(--black);
   font-size: 2rem;
   margin-bottom: 1rem;
}

#menu-btn{
   display: none;
}

.dashboard .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.dashboard .box-container .box{
   padding:2rem;
   text-align: center;
   border:var(--border);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   background-color: var(--white);
}

.dashboard .box-container .box h3{
   font-size: 2.7rem;
   color:var(--black);
}

.dashboard .box-container .box h3 span{
   font-size: 2rem;
}

.dashboard .box-container .box p{
   padding:1.3rem;
   border-radius: .5rem;
   background-color: var(--light-bg);
   font-size: 1.7rem;
   color:var(--light-color);
   margin:1rem 0;
}

.add-products form{
   max-width: 80rem;
   margin: 0 auto;   
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
   padding:2rem;
}

.add-products form .flex{
   display: flex;
   gap:1.5rem;
   flex-wrap: wrap;
}

.add-products form .flex .inputBox{
   flex:1 1 25rem;
} 

.add-products form span{
   font-size:2.4rem;
   color:#444;
}

.add-products form .box{
   font-size: 1.8rem;
   background-color: var(--light-bg);
   border-radius: .5rem;
   padding:1.4rem;
   width: 100%;
   margin-top: 1.5rem;
}

.add-products form textarea{
   height: 10.4rem;
   resize: none;
}

.show-products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.show-products .box-container .box{
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   border:var(--border);
   padding:2rem;
}

.show-products .box-container .box img{
   width: 100%;
   height: 20rem;
   object-fit: contain;
   margin-bottom: 1.5rem;
}

.show-products .box-container .box .name{
   font-size: 2rem;
   color:var(--black);
}

.show-products .box-container .box .price{
   font-size: 2rem;
   color:var(--main-color);
   margin:.5rem 0;
}

.show-products .box-container .box .details{
   font-size: 1.5rem;
   color:var(--light-color);
   line-height: 2;
}

.update-product form{
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   border:var(--border);
   padding:2rem;
   max-width: 50rem;
   margin:0 auto;
}

.update-product form .image-container{
   margin-bottom: 2rem;
}

.update-product form .image-container .main-image img{
   height: 20rem;
   width: 100%;
   object-fit: contain;
}

.update-product form .image-container .sub-image{
   display: flex;
   gap:1rem;
   justify-content: center;
   margin:1rem 0;
}

.update-product form .image-container .sub-image img{
   height: 5rem;
   width: 7rem;
   object-fit: contain;
   padding:.5rem;
   border:var(--border);
   cursor: pointer;
   transition: .2s linear;
}

.update-product form .image-container .sub-image img:hover{
   transform: scale(1.1);
}

.update-product form .box{
   width: 100%;
   border-radius: .5rem;
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   background-color: var(--light-bg);
   margin:1rem 0;
}

.update-product form span{
   font-size: 1.7rem;
   color:var(--light-color);
}

.update-product form textarea{
   height: 15rem;
   resize: none;
}


.copy{
   inline-size: max-content;
    margin-left: 80%;
    background: lime;
    padding: 1rem 2.5rem 1rem 1rem;
    border-radius: 5rem;
    font-size: medium;

}



@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   #menu-btn{
      display: inline-block;
   }

   .header .flex .navbar{
      position: absolute;
      top:99%; left:0; right:0;
      border-top: var(--border);
      border-bottom: var(--border);
      background-color: var(--white);
      transition: .2s linear;
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
   }

   .header .flex .navbar.active{
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
   }

   .header .flex .navbar a{
      display: block;
      margin:2rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

   .heading{
      font-size: 3.5rem;
   }

   .flex-btn{
      flex-flow: column;
      gap:0;
   }

   .add-products form textarea{
      height:15rem;
   }   

   .show-products .box-container{
      grid-template-columns: 1fr;
   }

   .orders .box-container{
      grid-template-columns: 1fr;
   }

   .accounts .box-container{
      grid-template-columns: 1fr;
   }

   .contacts .box-container{
      grid-template-columns: 1fr;
   }

}
option{
    border-radius:2px;
}
</style>
<body>

<?php include './components/user_header.php'; ?>


<section class="search-form">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="user_profile.php">&nbsp;Profile&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Lost And Found<i align="end" style="float: inline-end;font-size:larger" class="fa-solid fa-circle-exclamation"><a style="margin:10px;text-decoration: none;color: black;font-weight: 500;"href="lost_found_report.php">Found an Item?</a></i>
   </span></div><h1 class="heading">Search Lost Item</h1>
   <form action="" method="post" style="margin:1px 31px">
   <div class="inputBox" Style="width: 50%;background:white;;text-align: center;font-size: large;border: var(--border);border-radius: .5rem;">
            <select class="box" name="category" style="    width: 100%;font-size: larger;padding: 1.51rem;">
               <option  hidden >Category of Item ? * </option>
               <option value="Book">Book</option>
               <option value="Stationery">Stationery</option>
               <option value="Electronics">Electronics</option>
               <option value="Sports">Sports</option>
               <option value="Other">Others</option>
            </select>
         </div> 
               
      <input type="text" name="search_box" placeholder="search here... (optional)" maxlength="100" class="box"  style="width:50%">
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">

   <?php
     if(isset($_POST['search_btn'])OR isset($_POST['category'])OR isset($_POST['search_box'])){
        $category=$_POST['category'];
     $search_box = $_POST['search_box'];
     $select_products = $conn->prepare("SELECT * FROM `lostnfound` WHERE category='$category' And name LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" style="font-size:large">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <div class="box">
      <img src="./lostandfound/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name" style="color:black"><?= $fetch_product['name']; ?></div>
      <div class="details" style="color:grey">Detail : <span><?= $fetch_product['details']; ?></span></div>
      <div class="details" style="text-transform: capitalize;color:black;">Found by : <?= $fetch_product['sold_by']; ?><p>On <?= $fetch_product['time']; ?> </p></div>
      <div >
       
        <input type="hidden" value="<?= $fetch_product['id']; ?>" name="id">
         <input type="submit" name="detail" class="option-btn" value="contact">
        </form>
         <a href="lost_found.php?status=<?= $fetch_product['id']; ?>" class="option-btn" style="background-color: green;" onclick="return confirm('Recived this Item till you?');">Found</a>
        
      </div>
   </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Item found yet!</p>';
      }
   }
   ?>

   </div>

</section>

<section class="show-products">

   <h1 class="heading">List of all lost Item's Found</h1>

   <div class="box-container">

   <?php
  
      $select_products = $conn->prepare("SELECT * FROM `lostnfound` Where status='Not-Found'");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            
   ?>
   <div class="box"> <form action="" method="POST">
      <img src="./lostandfound/<?= $fetch_products['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="details">Detail : <span><?= $fetch_products['details']; ?></span></div>
      <div class="details" style="text-transform: capitalize;color:black;">Found by : <?= $fetch_products['sold_by']; ?><p>On <?= $fetch_products['time']; ?> </p></div>
      <div >
       
        <input type="hidden" value="<?= $fetch_products['id']; ?>" name="id">
         <input type="submit" name="detail" class="option-btn" value="contact">
        </form>
         <a href="lost_found.php?status=<?= $fetch_products['id']; ?>" class="option-btn" style="background-color: green;" onclick="return confirm('Recived this Item till you?');">Found</a>
        
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Item found yet!</p>';
      }
   ?>
   
   </div>

</section>

<section class="show-products">

   <h1 class="heading">Item's Found and recieved</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `lostnfound` Where status='Found'");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
            
   ?>
   <div class="box">
      <img src="./lostandfound/<?= $fetch_products['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="details">Detail : <span><?= $fetch_products['details']; ?></span></div>
      <div class="details" style="text-transform: capitalize;color:black;">Found by : <?= $fetch_products['sold_by']; ?><p>On <?= $fetch_products['time']; ?> </p></div>
      <div class="details" style="text-transform: capitalize;color:black;">Recieved by : <?= $fetch_products['recieved_by']; ?></div> 
      
      <div >
      <a href="lost_found.php?rep=<?= $fetch_products['id']; ?>" class="delete-btn"  onclick="return confirm('Haven\'t recieved this Item till you?');">Report <small>(Have't Recieved yet)</small></a>
        
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Item found yet!</p>';
      }
   ?>
   
   </div>

</section>
<?php include './components/footer.php'?>
<script src="./js/script.js"></script>
<script src="../js/admin_script.js"></script>
   
</body>
</html>