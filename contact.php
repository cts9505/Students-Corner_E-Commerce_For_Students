<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php?msg=Please Login to Send us grievance .');
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);
   $added_on=date("j F Y, g:i a");
   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ? AND time=?");
   $select_message->execute([$name, $email, $number, $msg,$added_on]);

   if($select_message->rowCount() > 0){
      $message[] = ' message Already sent!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message,time) VALUES(?,?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg,$added_on]);

      $message[] = 'Message sent successfully!';

   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<?php
      if($user_id == ''){
         echo '<p class="empty">Please login to send message! <a href="user_login.php" style="
         background-color: var(--orange);
         width: 100%;
         margin-top: 1rem;
         border-radius: 1.5rem;
         padding: 0.5rem 1rem;
         font-size: 1.7rem;
         text-transform: capitalize;
         color: var(--white);
         cursor: pointer;
         text-align: center;" >login now</a></p>';
      }else{?>
         
<section class="contact">
   <div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i><a href="user_profile.php">&nbsp;Profile&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Contact
   </span></div>
   <form action="" method="post">
      <h3>get in touch / grievance</h3>
      <?php 
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      $select_profile->execute([$user_id]);
      if($select_profile->rowCount() > 0){
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>    
<input type="hidden" name="userid" placeholder="enter your name" required maxlength="20" class="box"  value="<?= $fetch_profile["id"];  ?>">
      <input type="hidden" name="name" placeholder="enter your name" required maxlength="20" class="box"  value="<?= $fetch_profile["name"];   ?>">
      <input type="hidden" name="email" placeholder="enter your email" required maxlength="50" class="box"  value="<?= $fetch_profile["email"]; ?>">
      <p style="font-size:medium ">HI,&nbsp;<b><?= $fetch_profile["name"];?>&nbsp;<?= $fetch_profile["sname"];   ?></b>
   <br>Feel free to contact us just by sending us your <br> suggestion/ grievance/ query ...</p>
      <input type="hidden" name="number" min="0" max="9999999999" placeholder="Enter your number" required value="<?= $fetch_profile["number"]; } ?>"  class="box">
      <textarea name="msg" class="box" placeholder="Enter your message" cols="30" rows="10"></textarea>
     
      <input type="submit" value="send message" name="send" class="btn">
   </form>
<?php
      }?>
</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>