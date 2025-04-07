<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
$message[] = "Currently Our Registration and verification are Closed !!! <br> You can Login to our website with demo account to Excess our Features!<br>
Gmail : demo@studentscorner.com<br>
Password : Demo@123";
if(isset($_GET['msg'])!=false){
$message[] = $_GET['msg'];}
// setcookie("email","$email",time()+1000,"/");
// $con=mysqli_connect('localhost','root','','shop_db');
if(isset($_POST['submit'])){
   // $email = $_SESSION['email'];
   // setcookie("email","$email",$_SESSION['user_id'],"/");
   
   $email = $_POST['email'];
   setcookie("email","$email",time()+1000,"/");
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   // $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   // $status=mysqli_query($con,"SELECT verification FROM `users` WHERE  email = '$email'");
   // $stat=json_encode($status);
   
   // $sat = $conn->prepare("SELECT * FROM `users` WHERE  email = '$email' AND verification='Verified'"); 
   // $sat->execute();
   // if($sat->rowCount() > 0){
   //  while($sat = $sat->fetch(PDO::FETCH_ASSOC)){

//  echo $status;
// $category = $_GET['category'];
     $s = $conn->prepare("SELECT verification FROM `users` WHERE  email = '$email'"); 
     $s->execute();
     if($s->rowCount() > 0){
      while($f = $s->fetch(PDO::FETCH_ASSOC)){
 if( $f['verification']!='Verified'){
   $message[] = "Please Verify Your Account! <a href='verification_link.php'>Verify here</a>";
 }else{
 $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      $message[] = 'Logined successfully !';
      header('location:home.php');
      
   }else{
      $message[] = 'Incorrect username or password!';
   }
  }
// if($status!='Verified'){
// echo $status;
// }
}}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
   a{cursor:pointer;}
</style>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container" font-variant: small-caps;>
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Login
   </span></div>
   <form action="" method="post">
      <h3>Login now</h3>
      <input type="email" name="email" required placeholder="Enter your email" maxlength="50" value="demo@studentscorner.com"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Enter your password" maxlength="20" value="demo@123" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <div style="display:flex;width:100%;gap:37.3%;"><a href="verification_link.php"><button type="button" class="" style="font-variant: small-caps;padding: 0.8rem;border-radius: 0.7rem;align:left;cursor:pointer" value="" name="" id="">Verify Your Account <span class="fas fa-user-check"></span></button></a>
      <a href="forgot_password.php"><button type="button" class="" style="font-variant: small-caps;padding: 0.8rem;border-radius: 0.7rem;cursor:pointer;" value="forgot_password" name="forgot_password" id="forgot_password">Forgot Password <i class="fa-solid fa-question"></i></button></a>
      
</div><input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account?</p>
      <a href="user_register.php" class="option-btn">register now</a>
   </form>

</section>



<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>