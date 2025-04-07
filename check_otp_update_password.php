<?php
include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
$con=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$password=$_POST['password'];
$password=sha1($password);
$res=mysqli_query($con,"select * from users where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update users set password='$password', otp=''  where email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	echo "yes";
}else{
	echo "not_exist";
}
?>