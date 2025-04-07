<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

// setcookie("email","$email",time()+1000,"/");

if(isset($_POST['submit'])){
   
  

include('../smtp/PHPMailerAutoload.php');
require '../vendor/autoload.php';

// echo smtp_mailer($name,$subject,$body);
function smtp_mailer(){
	 $subject = $_POST['subject'];
   $body = $_POST['details'];
   $name=$_POST['name'];
// $mail->AddAttachment($file_location.$file_name);
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 

	// $mail->AddAttachment('pic-1.png');
	
$con=mysqli_connect('localhost','root','','shop_db');
$sql="SELECT email FROM users WHERE verification='Verified'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
while($e=mysqli_fetch_assoc($res)){
   	$mail->FromName = $name;
	$mail->Username = "studentscornerpict@gmail.com";
	$mail->Password = "hjzd olwm vvth gdbr";
	$mail->SetFrom("studentscornerpict@gmail.com");
   $mail->Subject = $subject;
	$mail->Body =$body;
$mail->addBCC($e['email']);
echo $e['email'];
}}
	// $mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		$message[]= $mail->ErrorInfo;
	}else{
        $message[]='Sent email';
		return $msg;
	}

}
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>OFFERS</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php include '../components/admin_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3></h3>
      <input type="text" name="name" required placeholder="Enter Name" >
      <input type="text" name="subject" required placeholder="Enter SUBJECT" >
      <input type="textarea" name="details" required placeholder="Enter Details (BODY)" >
      <input type="submit" value="SEND" class="btn" name="submit">
   </form>

</section>

<?php include '../components/footer.php'; ?>

<script src="../js/script.js"></script>

</body>
</html>