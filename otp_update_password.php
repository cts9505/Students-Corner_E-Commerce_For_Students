<?php
include 'components/connect.php';

$email=$_POST['email'];
// $email=$_COOKIE['email'];
include('smtp/PHPMailerAutoload.php');

session_start();
$con=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');

$res=mysqli_query($con,"select * from users where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(111111,999999);
	mysqli_query($con,"update users set otp='$otp' where email='$email'");
	// $html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
        $message[] = "'We've just sent a verification OTP to <strong>$email</strong>. 
       <br>Please check your inbox. If you can't find this email (which could be due to spam filters), just request a new one here.";
     
	// smtp_mailer($email,'OTP Verification',$html);
    $body="Please confirm your OTP for <strong> Password Update</strong>.<br>
         OTP is : <strong>$otp</strong>
         <br><small>By Giving This OTP you are Accepting our <a >Terms & Condition</a></small>";
        smtp_mailer($email,'Password Verification',$body);
	echo "yes";
}else{
	echo "not_exist";
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