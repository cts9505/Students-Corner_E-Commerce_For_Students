<?php

// $email=$_COOKIE['email'];
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 }
 $con=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');

 $id=mysqli_real_escape_string($con,$_GET['id']);
 $email=mysqli_real_escape_string($con,$_GET['email']);
 $res=mysqli_query($con,"select * from users where email='$email' and otp='$id'");
$count=mysqli_num_rows($res);
if($count>0){
 mysqli_query($con,"update users set verification='Verified',otp='' where email='$email'");
 ?>
 <?php include './components/user_header.php'?>
 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Verified</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <style>
     
      .defUhW .kirk-successModal  .kirk-modal-dialog {
    display: flex;
    justify-content: center;
    margin: 0px auto;
    width: 100%;
    padding-top: 0px;
    padding-bottom: 0px;
    border-radius: 0px;
    background-color: hsla(118, 38%, 45%, 1);
    min-height: 100%;
    max-width: 100%;}
    @media (min-width: 800px){
    .defUhW .kirk-modal-body {
    flex-flow: wrap;
    align-items: center;
}}
.defUhW .kirk-modal-body {
    display: flex;
    flex-direction: column;
}
.bBDacO .kirk-modal-body {
    flex: 1 1 0%;
}
@media (min-width: 800px){
.cHlXSx {
    max-width: var(--_1gzv7bh43);
    margin-left: auto;
    margin-right: auto;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}}
.cHlXSx {
    display: flex;
    flex-direction: column;
    flex: 1 1 0%;
}
@media (min-width: 800px)
{
.jaCBne {
    margin: 0px;
    width: 33.33%;
    min-width: 33.33vh;
}
}

.jaCBne {
    padding-left: var(--_1gzv7bh4g);
    padding-right: var(--_1gzv7bh4g);
    display: flex;
    margin-top: calc(2* var(--_1gzv7bh4e));
    justify-content: center;
    align-items: center;
    height: 33.33%;
    max-height: 33.33%;
}


   </style>
</head>
   <body>
   <div class="kirk-modal-dialog" style="background-color:hsla(118, 38%, 45%, 1);"><div class="kirk-modal-body"><div class="sc-f5645b07-1 cHlXSx"><figure class="sc-f5645b07-2 jaCBne"><img src="https://cdn.blablacar.com/kairos/assets/images/verification_id_man_checked-be49d723e4bb0f08a722.svg" alt=""></figure><div class="sc-f5645b07-3 gLPsTj"><h1 class="jqy9ue10y jqy9ue12r jqy9ue13b jqy9ue11n jqy9ue122 jqy9ue127 jqy9uek0 jqy9uezp jqy9ue1j0 jqy9ue1sl jqy9ue1ld jqy9ue1p9 jqy9ue1uj jqy9ue24y jqy9ue1y0 jqy9ue21h jqy9ue13d jqy9ue7"><span class="_2ywtvb0 _2ywtvb1">Congratulations! Your Account has been verified.</span></h1><div class="sc-f5645b07-4 bLHTNV"><a href="user_login.php"><button href="" type="button" class="option-btn" style="
    justify-content: center;
    margin: var(--_1gzv7bh4b);
    min-width: 8rem;
    background-color: var(--_1gzv7bhf);
    border-color: var(--_1gzv7bhq);
    color: var(--_1gzv7bhw);
"><a href="user_login.php"><span class="option-btn">Click here to Login</span></a></button></a></div></div></div></div></div>
   </body>
 <?php include './components/footer.php'?>
 <?php 
 }else{
    ?>
    <img src="https://i.stack.imgur.com/njWmJ.png" height="100%" width="100%">
    <?php
 }
 ?>