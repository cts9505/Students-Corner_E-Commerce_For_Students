<?php

include 'components/connect.php';
include('smtp/PHPMailerAutoload.php');
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
  
}else{
   $user_id = '';
};
$message[] = "Currently Our Registration and verification are Closed !!! <br> You can Login to our website with demo account to Excess our Features!<br>
Gmail : demo@studentscorner.com<br>
Password : Demo@123";
if(isset($_POST['submit'])){
   
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $sname = $_POST['sname'];
   $sname = filter_var($sname, FILTER_SANITIZE_STRING);
   $clgname = $_POST['clgname'];
   $clgname = filter_var($clgname, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $city = $_POST['city'];
   $city = filter_var($city, FILTER_SANITIZE_STRING);
   $state = $_POST['state'];
   $state = filter_var($state, FILTER_SANITIZE_STRING);
   $pincode = $_POST['pincode'];
   $pincode = filter_var($pincode, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $status='Un-Verified';
   // $image = $_FILES['image']['name'];
   // $image_size = $_FILES['image']['size'];
   // $image_tmp_name = $_FILES['image']['tmp_name'];
   $username=$name.$sname;
   $usr_id=time();

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'Email already registered! <a href="user_login.php">Login now</a>';
   }else{
      $con=mysqli_connect('localhost','root','','shop_db');
      $verification_id=sha1(rand(111111111,999999999));
      $email = $_POST['email'];
         // setcookie("email","$email",$_SESSION['user_id'],"/");
         $insert_user = $conn->prepare("INSERT INTO `users`(user_id,name,sname,number,email,address,city,state,pincode,clgname,password,verification,otp,username) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $insert_user->execute([$usr_id,$name,$sname,$number,$email,$address,$city,$state,$pincode,$clgname,$cpass,$status,$verification_id,$username]);
         // header('location:verification.php');
         // move_uploaded_file($image_tmp_name, "profilepicture/".$image);
         $message[] = "We've just sent a verification Link to <strong>$email</strong>. 
      <br>Please check your inbox. If you can't find this email (which could be due to spam filters), just request a new one by <a href='verification_link.php'>clicking here</a>.";
         
      $body="<div style='backgroun-color:grey;font-family: 'Josefin Sans', sans-serif;padding-left:5%'><h1 style='color:black'>Hello !</h1>
      <h3 style='color:black'>
      Thank you for signing up at <b>Students Corner ! </b><br>
      Please Verify your Account by clicking the given button below.</h3>
         <br>
         <a href='http://localhost/studentcorner/email_verification.php?id=$verification_id&email=$email'><button style='background-color:green;

         margin-top: 0.5rem;
         border-radius: .5rem;
         padding:0.5rem 3rem;
         font-size: 1rem;
         text-transform: capitalize;
         color:white;
         cursor: pointer;
         text-align: center;'>Click For Verification</button></a>
         <br><br>
        <h3 style='color:black'> If you did not sign up, no further action is required, your Account will be deleted automatically after a few days.
</h3>
<h3 style='color:black'>
Regards,
<BR>Students Corner<br></h3>
<h6 style='color:black'>
If you're having trouble clicking the 'Verification' button, copy and paste the URL below into your web browser: http://localhost/studentcorner/email_verification.php?id=$verification_id&email=$email
         </h6><br><small>By Giving This OTP you are Accepting our <a>Term & Condition</a></small>
         <br><div  style='font-size:25px; font-family: 'Josefin Sans', sans-serif;'>Copyright © 2024 All rights reserved | Built by <span><a style='color:voilet' href='https://chaitanyashinde.web.app/'> Chaitanya Shinde </a> & Team with <span style='color: red;'>♥</span> <span> in India</span></div></div>";
         smtp_mailer($email,'Account Verification',$body);
         }    
      }
   function smtp_mailer($to,$subject, $body){
   $mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->FromName = "Students Corner";
	$mail->Username = "studentscornerpict@gmail.com";
	$mail->Password = "hjzd olwm vvth gdbr";
	$mail->SetFrom("studentscornerpict@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$body;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false));
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
 
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
   input{cursor:not-allowed}
   </style>

</head>
<body >
   
<?php include 'components/user_header.php'; ?>

<section class="form-container" style="font-variant: small-caps;">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Registeration
   </span></div>
   <form method="post" enctype="multipart/form-data">
      <h3>Registration form</h3>
      <!-- <label>Enter Your Profile Pic</label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required> -->
      <div style="display:flex;">
      <div><input type="text" readonly name="name" id="name" required placeholder="Enter your name" maxlength="20"  class="box" style="width:100%;"></div>
      <div style="    position: absolute;
    width: 15%;
    left: 50%;"><input readonly type="text" name="sname" id="sname" required placeholder="Enter your Surname" maxlength="20"  class="box" style=""></div>
      </div>
      <input type="number" readonly name="number" id="number" required placeholder="Enter your Mobile Number" maxlength="10"  class="box" >
      <input type="email" readonly name="email" id="email" required placeholder="Enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
     
      <!-- <input type="password" name="pass" required placeholder="Enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->
       <!-- <select class="box" name="clgname" id="clgid" style="width:100%" required>
         <option  hidden >Select your College Name</option>
         <option value="PICT">PICT</option>
         <option value="VJTI">VJTI</option>
         <option value="COEP">COEP</option>
      </select>  -->
      <input type="hidden" readonly value="PICT" class="box" name="clgname" id="clgid" >
      <input type="text"  readonly name="address" id="address" required placeholder="Enter your address" maxlength="100"  class="box">
       <input type="text" readonly name="city" id="city" required placeholder="Enter your City" maxlength="100"  class="box">
       <input type="text" readonly name="state" id="state" required placeholder="Enter your State" maxlength="100"  class="box">
       <input type="text" readonly name="pincode" id="pincode" required placeholder="Enter your Pincode" maxlength="100"  class="box">
      
      <!-- <input type="password" name="pass" required placeholder="Enter your password" maxlength="20"  class="box" > -->
      <input type="password" readonly id="password" name="cpass" required placeholder="Confirm your password" maxlength="20"  class="box" > 
<!-- <input type="password" name="cpass" required placeholder="Confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->
      <!-- <input type="number" name="cotp" required placeholder="Enter the OTP" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->
      <input type="submit" readonly disabled value="Proceed For Account Verification" class="btn" name="submit">
   
    <!-- <span id="email_error" class="field_error"></span> -->
    <!-- <button type="button" class="btn btn-success btn-block" onclick="send_otp()">Proceed For Account Verification</button> -->
        
     </div> 
    
     <p style="font-variant: small-caps;">Already have an Verified account?</p>
      <a href="user_login.php" class="option-btn">Login now</a>
   </form>

</section>

<script>
  
</script>
<?php

include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>