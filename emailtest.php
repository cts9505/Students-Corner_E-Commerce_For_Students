<?php 
include('smtp/PHPMailerAutoload.php');  
$email='9chaitanyashinde@gmail.com';
$body="Please confirm your account registration at <strong>Students Corner</strong>.<br>
         OTP for Registration is : <strong>$otp</strong>
         <br><small>By Giving This OTP you are Accepting our <a >Terms & Condition.</a></small>";
        smtp_mailer($email,'Account Verification',$body);
	
function smtp_mailer($to,$subject, $body){
    $mail = new PHPMailer(); 
     $mail->IsSMTP(); 
     $mail->SMTPAuth = true; 
     $mail->SMTPSecure = 'tls'; 
     $mail->Host = "smtp.gmail.com";
     $mail->Port = 587; 
     $mail->IsHTML(true);
     $mail->CharSet = 'UTF-8';
     $mail->SMTPDebug = 2; 
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