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
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $sold = $_POST['sold'];
   $sold = filter_var($sold, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $status='Not-Found';
   $added_on=date("j F Y, g:i a");
   $image_1 = $_FILES['image_01']['name'];
   $image_01='1'.$name.time().$image_1;
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = './lostandfound/'.$image_01;


   $select_products = $conn->prepare("SELECT * FROM `lostnfound` WHERE name = ?");
   $select_products->execute([$name]);


      $insert_products = $conn->prepare("INSERT INTO `lostnfound`(name,number,email,category, details, image_01,status,sold_by,time) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name,$number,$email,$category,$details,$image_01,$status,$sold,$added_on]);

      if($insert_products){
         if($image_size_01 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            $message[] = 'Product added for Not Found!';
         }

      }

    

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lost and Found</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
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

.orders .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}

.orders .box-container .box{
   padding:2rem;
   padding-top: 1rem;
   border-radius: .5rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.orders .box-container .box p{
   line-height: 1.5;
   font-size: 2rem;
   color:var(--light-color);
   margin:1rem 0;
}

.orders .box-container .box p span{
   color:var(--main-color);
}

.orders .box-container .select{
   margin-bottom: .5rem;
   width: 100%;
   background-color: var(--light-bg);
   padding:1rem;
   font-size: 1.8rem;
   color:var(--black);
   border-radius: .5rem;
   border:var(--border);
}

.accounts .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}

.accounts .box-container .box{
   padding:2rem;
   padding-top: .5rem;
   border-radius: .5rem;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.accounts .box-container .box p{
   font-size: 2rem;
   color:var(--light-color);
   margin: 1rem 0;
}

.accounts .box-container .box p span{
   color:var(--main-color);
}

.contacts .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}

.contacts .box-container .box{
   padding:2rem;
   padding-top: 1rem;
   border-radius: .5rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.contacts .box-container .box p{
   line-height: 1.5;
   font-size: 2rem;
   color:var(--light-color);
   margin:1rem 0;
}

.contacts .box-container .box p span{
   color:var(--main-color);
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
</style>
<body>

<?php include './components/user_header.php'; ?>

<section class="add-products">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="lost_found.php">&nbsp;Lost And Found&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Report Lost Product
   </span></div>
   <h1 class="heading">Lost & Found Report</h1>

   <form action="" method="post" enctype="multipart/form-data">
   <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
      <input style="text-transform: capitalize;" type="hidden" value="<?= $fetch_profile["name"];?>&nbsp;<?= $fetch_profile["sname"];?>"  name="sold">
      <input type="hidden" value="<?= $fetch_profile["number"];?>"  name="number">
      <input type="hidden" value="<?= $fetch_profile["email"];?>"  name="email">
      
      <span style="text-transform: capitalize;" >Found By : <?= $fetch_profile["name"];?>&nbsp;<?= $fetch_profile["sname"]; ?></span><?php }?>
      <br><br><div class="flex">
         
         <div class="inputBox">
            <span>Item Name*</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter Item name" name="name">
         </div>
         <div class="inputBox">
            <span>Item Category*</span>
            <select class="box" name="category" required>
               <option  hidden >Category of Item ? </option>
               <option value="Book">Book</option>
               <option value="Stationery">Stationery</option>
               <option value="Electronics">Electronics</option>
               <option value="Sports">Sports</option>
               <option value="Other">Others</option>
            </select>
         </div> 
               
        <div class="inputBox">
            <span>Image(Of lost item)*</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
       
         <div class="inputBox">
            <span>Item details* </span>
            <textarea name="details" style="height:5.7rem;font-size:1.6667em" placeholder="Enter details such as where did you found..." class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="Submit" class="btn" name="add_product">
   </form>

</section>
<?php include './components/footer.php'?>

<script src="./js/script.js"></script>
<script src="../js/admin_script.js"></script>
   
</body>
</html>