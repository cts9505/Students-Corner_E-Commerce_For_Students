<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

// include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PG Flats</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  font-family: 'Josefin Sans', sans-serif;
}
body{
    font-family: 'Josefin Sans', sans-serif;
}
    .bod{
	/* font-family: "Poppin", sans-serif; */
	background:linear-gradient(to right,#0f82f9,#01dbdf);
	/* height: 100vh;  */
	display: flex;
	align-items: center;
	justify-content: center;
    /* margin-left:50%; */
}
.book {
	width: 450px;
	height: 635px;
	position: relative;
	transition-duration: 1s;
	perspective: 1500;
    font-family: 'Josefin Sans', sans-serif;
}
input {
	display: none;
}
.cover, .back-cover {
	background-color: #4173a5;
	width: 100%;
	height: 100%;
	border-radius: 0 15px 15px 0;
	box-shadow: 0 0 5px rgb(41, 41, 41);
	display: flex;
	align-items: center;
	justify-content: center;
	transform-origin: center left;
}
.cover {
	position: absolute;
	z-index: 4;
	transition: transform 1s;
}
.cover label {
	width: 100%;
	height: 100%;
	cursor: pointer;
}
.back-cover {
	position: relative;
	z-index: -1;
}
.page {
	position: absolute;
	background-color: white;
	width: 430px;
	height: 550px;
	border-radius: 0 15px 15px 0;
	margin-top: 10px;
	transform-origin: left;
	transform-style: preserve-3d;
	transform: rotateY(0deg);
	transition-duration: 1.5s;
}
.page img {
	width: 100%;
	height: 100%;
	border-radius: 15px 0 0 15px;
}
.front-page {
	position: absolute;
	width: 100%;
	height: 100%;
	backface-visibility: hidden;
	box-sizing: border-box;
	padding: 1rem;
    padding-top:2.5rem
}
.back-page {
	transform: rotateY(180deg);
	position: absolute;
	width: 100%;
	height: 100%;
	backface-visibility: hidden;
	z-index: 99;
}
.next, .prev {
	position: absolute;
	bottom: 1em;
	cursor: pointer;
}
.next {
	right: 1.7em;
    font-size: medium;
}
.prev {
	left: 1.7em;
    font-size: medium;
}
#page1 {
	z-index: 7;
}
#page2 {
	z-index: 6;
}
#page3 {
	z-index: 5;
}#page4 {
	z-index: 4;
}#page5 {
	z-index: 3;
}#page6 {
	z-index: 2;
}
#page7 {
	z-index: 1;
}
#checkbox-cover:checked ~ .book {
	transform: translateX(200px);
}
#checkbox-cover:checked ~ .book .cover {
	transition: transform 1.5s, z-index 0.5s 0.5s;
	transform: rotateY(-180deg);
	z-index: 1;
}
#checkbox-cover:checked ~ .book .page {
	box-shadow: 0 0 3px rgb(99, 98, 98);
}
#checkbox-page1:checked ~ .book #page1 {
	transform: rotateY(-180deg);
	z-index: 2;
}
#checkbox-page2:checked ~ .book #page2 {
	transform: rotateY(-180deg);
	z-index: 3;
}
#checkbox-page3:checked ~ .book #page3 {
	transform: rotateY(-180deg);
	z-index: 4;
}#checkbox-page4:checked ~ .book #page4 {
	transform: rotateY(-180deg);
	z-index: 5;
}#checkbox-page5:checked ~ .book #page5 {
	transform: rotateY(-180deg);
	z-index: 6;
}#checkbox-page6:checked ~ .book #page6 {
	transform: rotateY(-180deg);
	z-index:7 ;
}
p,h1,h2,h3,h4{
    /* text-align: center; */
    /* margin: 60% 1%; */
    margin-top:7.5px;
    margin-left:3.5%;
    font-size:medium;
}
h1,h2,h3,h4{
    text-align:center;
    background:linear-gradient(to right, #ff8a08, #ffb800);
    /* width:fit-content;  */
    border-radius:30px;
    padding:.2rem;
    
}
p{
    margin-left:11.5%;
    margin-bottom:0.7rem
}

</style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<div>
<div style="padding:10px;background:linear-gradient(to right,#0f82f9,#01dbdf)">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;Pg / Hostel / Flats
   </span></div></div>
<div class="bod">
    <input type="checkbox" id="checkbox-cover">
    <input type="checkbox" id="checkbox-page1">
    <input type="checkbox" id="checkbox-page2">
    <input type="checkbox" id="checkbox-page3">
    <div class="book">
         <!-- <div class="cover">
            <label for="checkbox-cover" style="text-align:center;padding:55% 1%;font-family: math;"><span style="font-size:xxx-large;" >PG & FLAT's</span><br><span style="background-color:blue;border-radius:5px;padding:2.5px;font-size:larger">Click to view the best places near Pict.</small></label>
        </div>  -->
        <div class="page" id="page1">
            <div class="front-page" >
                <p style="text-align: center; font-size:xx-larger;margin-top:32% ">
     <label for="checkbox-cover" style="text-align:center;font-family: math;"><span style="font-size:xxx-large;" >PG & FLAT's</span><br><span style="background-color:blue;border-radius:5px;padding:2.5px;font-size:large">Click <i class="fas fa-chevron-right"></i> view the best places near Pict.</small></label><br><br>
        
    <b>Disclaimer</b> : Students Corner is only an intermediary offering its platform to advertise properties of Seller for a Customer/Buyer/User coming on its Website and is not and cannot be a party to or privy to or control in any manner any transactions between the Seller and the Customer/Buyer/User.
                <br><br><i class="fa-regular fa-address-card"></i>&nbsp;Enquiries : studentscornerpict@gmail.com</p>
                <label class="next" for="checkbox-page1" style="margin: 0% 0%"><i class="fas fa-chevron-right"></i></label>
            </div>
            <div class="back-page">
                <img src="images/flat1.jpg">
                <label class="prev" for="checkbox-page1"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        
        <div class="page" id="page2">
            <div class="front-page">
                <span style="background: orangered;padding: .7rem .95rem;border-radius: 31px;margin-left: 45%;"><i class="fa-solid fa-1"></i></span><br>
                <p align="center" style="margin: 1% 0%;"><h1>Room On Cot Basis For Boys</h1>
                <h3 style="margin-top: 0.3%;" > <i class="fa-solid fa-location-dot"></i>&nbsp;Location : Near Trimurti Chowk</h3>
                <h2><i class="fa-solid fa-house"></i> Room details :</h2>
                <p><i class="fa-solid fa-key"></i> <b> Available</b> : June 2024</p>
                <p><i class="fa-regular fa-square"></i><b>  Area : </b>300 sqft</p>
                <p><i class="fa-solid fa-couch"></i><b> Furnishing : </b>Semi-Furnished</p>
                <p><i class="fa-solid fa-water"></i><b> Water : </b>Hot/Cold</p>
                
                <h2><i class="fa-solid fa-circle-exclamation"></i> Amenities : </h2>
                
                <p><i class="fa-solid fa-wifi"></i> Wifi : 50 Mbps</p>
                <p><i class="fa-solid fa-glass-water"></i> Drinking Water : 24/7 </p>
                <p><i class="fa-regular fa-lightbulb"></i> Bulb : 2</p>
                <p><i class="fa-solid fa-square-parking"></i> Bike : 1</p>
                <p><i class="fa-solid fa-broom"></i> Cleaning : Daily</p>
                <p><i class="fa-solid fa-bed"></i>  BED : 2</p>
                <p><i class="fa-solid fa-toilet"></i>&nbsp; Washroom : 1</p>
                <h2 style=""><i class="fa-solid fa-address-card"></i> Owner Details :</h2>
                <p><i class="fa-regular fa-user"></i> : Chaitanya Shinde</p>
                <p><i class="fa-solid fa-phone"></i> : 9373954169</p>
                <h1 align="center" style="background: chartreuse;font-size:1.89rem"><i class="fa-solid fa-wallet"></i> RENT : <i class="fa-solid fa-indian-rupee-sign"></i> 4500/- per month only</h1>
</p>
                <label class="next" for="checkbox-page2"><i class="fas fa-chevron-right"></i></label>
            </div>
            <div class="back-page">
                <img src="images/flat2.jpg">
                <label class="prev" for="checkbox-page2"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        
        <div class="page" id="page3">
            <div class="front-page">
                <span style="background: orangered;padding: .7rem .95rem;border-radius: 31px;margin-left: 45%;"><i class="fa-solid fa-2"></i></span><br>
                <p align="center" style="margin: 1% 0%;"><h1>Room On Cot Basis For Girls</h1>
                <h3 style="margin-top: 1%;" ><i class="fa-solid fa-location-dot"></i>&nbsp;Location : Patang Plaza</h3>
                <h2><i class="fa-solid fa-house"></i> Room details :</h2>
                <p><i class="fa-solid fa-key"></i> <b> Available</b> : June 2024</p>
                <p><i class="fa-regular fa-square"></i><b>  Area : </b>200 sqft</p>
                <p><i class="fa-solid fa-couch"></i><b> Furnishing : </b>Furnished</p>
                <p><i class="fa-solid fa-water"></i><b> Water : </b>Hot/Cold</p>
            
                <h2><i class="fa-solid fa-circle-exclamation"></i> Amenities : </h2>
                
                <p><i class="fa-solid fa-wifi"></i> Wifi : 20 Mbps</p>
                <p><i class="fa-solid fa-glass-water"></i> Drinking Water : 24/7 </p>
                <p><i class="fa-regular fa-lightbulb"></i> Bulb : 3</p>
                <p><i class="fa-solid fa-square-parking"></i> Bike : No</p>
                <p><i class="fa-solid fa-broom"></i> Cleaning : Daily</p>
                <p><i class="fa-solid fa-bed"></i>  BED : 2</p>
                <p><i class="fa-solid fa-toilet"></i>&nbsp; Washroom : 1</p>
                <h2 style=""><i class="fa-solid fa-address-card"></i> Owner Details :</h2>
                <p><i class="fa-regular fa-user"></i> : Chaitanya Patil</p>
                <p><i class="fa-solid fa-phone"></i> : 8788308212</p>
                <h1 align="center" style="background: chartreuse;font-size:1.89rem"><i class="fa-solid fa-wallet"></i> RENT : <i class="fa-solid fa-indian-rupee-sign"></i> 7500/- per month only</h1>
</p>
                <label class="next" for="checkbox-page3"><i class="fas fa-chevron-right"></i></label>
            </div>
            <div class="back-page">
                <img src="images/flat3.jpg">
                <label class="prev" for="checkbox-page3"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        
        <div class="page" id="page4">
            <div class="front-page">
                <span style="background: orangered;padding: .7rem .95rem;border-radius: 31px;margin-left: 45%;"><i class="fa-solid fa-3"></i></span><br>
                <p align="center" style="margin: 1% 0%;"><h1>Flat on Rent</h1>
                <h3 style="margin-top: 1%;" ><i class="fa-solid fa-location-dot"></i>&nbsp;Location : Near Pict college</h3>
                
                <h2><i class="fa-solid fa-house"></i> Room details :</h2>
                <p><i class="fa-solid fa-key"></i> <b> Available</b> : May 2024</p>
                <p><i class="fa-regular fa-square"></i><b>  Area : </b>1000 sqft</p>
                <p><i class="fa-solid fa-couch"></i><b> Furnishing : </b>Semi-Furnished</p>
                <p><i class="fa-solid fa-water"></i><b> Water : </b>Hot/Cold</p>
                
                <h2><i class="fa-solid fa-circle-exclamation"></i> Amenities : </h2>
                
                <p><i class="fa-solid fa-wifi"></i>Wifi : 100 Mbps</p>
                <p><i class="fa-solid fa-glass-water"></i> Drinking Water : 24/7 </p>
                <p><i class="fa-regular fa-lightbulb"></i> Bulb : 4</p>
                <p><i class="fa-solid fa-square-parking"></i> Bike : 1</p>
                <p><i class="fa-solid fa-broom"></i> Cleaning : Daily</p>
                <p><i class="fa-solid fa-bed"></i>  BED : 4</p>
                <p><i class="fa-solid fa-toilet"></i>&nbsp; Washroom : 2</p>
                <h2 style=""><i class="fa-solid fa-address-card"></i> Owner Details :</h2>
                <p><i class="fa-regular fa-user"></i> : Chaitanya Shinde</p>
                <p><i class="fa-solid fa-phone"></i> : 9373954169</p>
                <h1 align="center" style="background: chartreuse;font-size:1.89rem"><i class="fa-solid fa-wallet"></i> RENT : <i class="fa-solid fa-indian-rupee-sign"></i> 4500/- per month only</h1>
</p>
                <label></label>
            </div>
            <div class="back-page">
                <img src="2.jpg">
                <label class="prev" for="checkbox-page4"><i class="fas fa-chevron-left"></i></label>
            </div>
        </div>
        
        <!-- <div class="back-cover"></div> -->
    </div>
</div>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>