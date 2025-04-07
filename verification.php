<?php

// $email=$_COOKIE['email'];
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
 
$con=mysqli_connect('sql204.infinityfree.com','if0_36400025','Chait9505','if0_36400025_students_corner');
$email=$_COOKIE['email'];
$res=mysqli_query($con,"select * from users where email='$email'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style type="text/css">
	.login-form {
		width: 405px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        color:black;
    }
    .navbar {
    position: relative;
    min-height: 1px;
    margin-bottom: 0px;
    border: 1px solid transparent;
}
.icon
{
    margin-right: 5px;
    display: none;
}
.loading
{
    background-color: #014B94;
    color: #eee;
}
.loading .icon
{
    display: inline-block;
    color: #eee;
    animation: spin 2s linear infinite;
}
@keyframes spin
{
    0%
    {
    transform: rotate(0deg);
    }
    100%
    {
    transform: rotate(360deg);
    }
}
</style>
</head>
<body>
<?php include 'components/user_header.php'; ?>
<section class="form-container">
<div class="login-form">
    <form  method="post">
        <h3 style="margin-bottom:29px">Verification</h3>     
        <div class="form-group first_box">
            <input type="email" id="email" class="form-control" value="<?php echo $email ?>" placeholder="Email" required="required">
			<span id="email_error" class="field_error">On Clicking <strong>Send OTP</strong> you will recieve an Email verification otp!</span>
            <span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <button type="button" class="btn btn-primary btn-block" style="background-color:#fec108;" onclick="send_otp()"  >Send OTP</button>
        </div>
        <div class="form-group second_box">
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
            <span id="email_error" class="field_error">Submit the <strong> OTP</strong> recieved on <?php echo $email ?>!</span>
			<span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group second_box">
            <button type="button" class="btn btn-primary btn-block" style="background-color: #2aa746;" onclick="submit_otp()">Submit OTP</button>
        </div>     
          
     <p>Already have an<br> Verified account?</p>
      <a href="user_login.php" class="option-btn">Login now</a>
    </form>
    
</div>
</section>
<script>
    document.getElementById('btn').addEventListener("click", function(){
    this.classList.add("loading");
    this.innerHTML = "Sending OTP...";
});
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			if(result=='yes'){
				jQuery('.second_box').show();
				jQuery('.first_box').hide();
			}
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='user_login.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please Enter a valid OTP');
			}
		}
	});
}
</script>
<style>
.second_box{display:none;}
.field_error{color:red;
    font-size: larger;}
</style>
<?php

include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>             		                            