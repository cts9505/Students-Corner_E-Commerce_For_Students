<?php

// $email=$_COOKIE['email'];
include 'components/connect.php';
include('smtp/PHPMailerAutoload.php');
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 }
 if(isset($_POST['submit'])){
$conn=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');
      $verification_id=sha1(rand(111111111,999999999));
      $email = $_POST['email'];
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
            $select_profile->execute([$email]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            $name=$fetch_profile["name"];
            $sname=$fetch_profile["sname"];
         }
      $s = $conn->prepare("SELECT verification FROM `users` WHERE  email = '$email'"); 
     $s->execute();
     $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? ");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
  
     if($s->rowCount() > 0){
      while($f = $s->fetch(PDO::FETCH_ASSOC)){
         
 if( $f['verification']=='Verified'){
   $message[] = "Your account Already Verified!";
 }
    elseif($select_user->rowCount() > 0){
       $_SESSION['user_id'] = $row['id'];
    //    $message[] = 'Logined successfully !';
        $message[] = "We've just sent a verification Link to <strong>$email</strong>. 
      <br>Please check your inbox. If you can't find this email (which could be due to spam filters)";
      mysqli_query($con,"update users set otp='$verification_id' where email='$email'");

      $body="<div style='backgroun-color:grey;font-family: 'Josefin Sans', sans-serif;padding-left:5%'><h2 style='color:black;font-size:x-large'>Hello <span style='color:black;'> $name&nbsp;$sname!</span></h2>
      <h3 style='color:black'>
      Thank you for signing up at Students Corner ! <br>
      Please Verify your Account by clicking the given button below.</h3>
         <a href='http://localhost/studentcorner/email_verification.php?id=$verification_id&email=$email'><button style='background-color:green;margin: 0.1rem;border-radius: .5rem;padding:0.5rem 3rem;font-size: 1rem;text-transform: capitalize; color:white;cursor: pointer;text-align: center;'>Click For Verification</button></a>
        <h3 style='color:black'> If you did not sign up, no further action is required, your Account will be deleted automatically after a few days.
</h3>
<h3 style='color:black'>
Regards,
<BR>Students Corner<br></h3>
<h5 style='color:black'>
If you're having trouble clicking the 'Verification' button, copy and paste the URL below into your web browser: <br> http://localhost/studentcorner/email_verification.php?id=$verification_id&email=$email</h5>
         </h6 style='color:black'><small>By Giving This OTP you are Accepting our <a>Term & Condition</a></small>
         <br><div  style='font-size:25px; font-family: 'Josefin Sans', sans-serif;'>Copyright ©  All rights reserved | Built by <span><a style='color:voilet' href='https://chaitanyashinde.web.app/'> Chaitanya Shinde </a> & Team with <span style='color: red;'>♥</span> <span> in India</span></div></div>";
         smtp_mailer($email,'Account Verification',$body);
    }else{
       $message[] = 'Invaild Email !';
    }
   
 
        //  $insert_user = $conn->prepare("INSERT INTO `users`(name,sname,number,email,address,city,state,pincode,clgname,password,verification,otp) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
        //  $insert_user->execute([$name,$sname,$number,$email,$address,$city,$state,$pincode,$clgname,$cpass,$status,$verification_id]);
}}   
 }
// }}}
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
	$mail->Username = "studentscornerpict@gmail.com";
	$mail->Password = "hjzd olwm vvth gdbr";
	$mail->SetFrom("no-reply@studentscornerpict.com","Students Corner");
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
   <title>Verification</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container" style="font-variant: small-caps;">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="user_login.php">&nbsp;Login&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Verification
   </span></div>
   <form method="post">
      <h3 style="font-variant: small-caps;">Verification</h3>
      
      <!-- <div style="display:flex;"> -->
      <input type="email" name="email" id="email" required placeholder="Enter your unverified email" maxlength="50"  class="box" >
       <!-- <input type="number" name="cotp" required placeholder="Enter the OTP" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->
      <input type="submit" value="Send Verification Link" class="btn" name="submit">
   
    <!-- <span id="email_error" class="field_error"></span> -->
    <!-- <button type="button" class="btn btn-success btn-block" onclick="send_otp()">Proceed For Account Verification</button> -->
        
     </div> 
    
     <p>Already have an Verified Account?</p>
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