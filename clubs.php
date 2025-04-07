<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
//    header('location:user_login.php?msg=Please Login to View all wishlist product from your account .');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs In Pict</title>
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body{
    background-color: #eff6f0;;

}
.info-box {
    background-color: #fff;
    border-radius: 10px; /* Curved borders */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 20px auto; /* Center the box */
    padding: 20px;
    width:500px;
    text-align: center;
   
    
}
.btn{
    display: block;
   
   margin-top: 1rem;
   border-radius: .5rem;
   padding:1rem 1rem;
   font-size: 1.2rem;
   
   color:rgb(0, 0, 0);
   cursor: pointer;
   text-align: center;
}
.btn{
    background-color:rgb(0, 187, 255);
    
 }
 .btn:hover{
    transform: scale(1.01);
    background-color: rgb(54, 54, 157);
 }


.info-image {
    width: 100%; /* Make the image responsive */
    height: auto;
    object-fit: cover; /* Ensure the image covers the area without stretching */
}

.info-text {
    margin-top: 20px;
}

.info-text h3 {
    margin-bottom: 10px;
}
    </style>
    
</head>
<?php include './components/user_header.php'?>
<body><div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"><a href="home.php">&nbsp;Home&nbsp;</a></i><i class="fa-solid fa-chevron-right"><a href="clubs.php">&nbsp;Clubs&nbsp;</a></i>
   </span></div>
    <div class="info-box">
    
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT3d1SkTZ1e78Zb-iFKms6C89mHEEVTV3gpLJfpf6N9YYLdLkgJ" alt="Image Description" class="info-image">
        <div class="info-text">
            <h3>Art Circle</h3>
            <p>Art Circle is PICT's cultural group which consists of Music, Acting, Dance, Sets and Crafts, Lights, Fine Arts and lots more. To express as I see it, it is a family away from family. A group of around 80-100 artists and theater enthusiasts who love to learn and bring out their creativity in all the ways possible.

                Art Circle organizes and performs in all the cultural events of the institution. The main aim though is to represent the institute in 2 major inter-collegiate drama competitions - the prestigious Purushottam Karandak and the ever dashing Firodia Karandak. These competitions are known to be the breeding grounds for artists and need skillful blending of acting, music, dance, sets and lights to create an impact.
                
                I joined Art Circle when I was a sophomore, as a singer. That was when I started exploring art in the real sense. With time increased my capacity and voracity to fondly manage academics and Art Circle simultaneously, as both gave me what I wanted - joy. Toady, I find myself extremely lucky to be leading this group.
                
                This year was historic and way too special for all of us. We won the 51st Purushottam Karandak. Yes, we won the distinguished Purushottam Karandak! Along with it, we won many other prizes. That's not all! We further went on to win the 2nd prize in Purushottam Mahakarandak (state-level drama competition where winners from each division compete). Here are a few pics of the team and the prizes:
                </p>
            <a href="https://pictartcircle.onrender.com/"target="_main" class="btn">More Details</a>
        </div>
    </div>
    <div class="info-box">
        <img src="https://www.pictoreal.in/assets/img/odysseyLogo.png" alt="Image Description" class="info-image">
        <div class="info-text">
            <h3>PICTOREAL</h3>
            <p>PICTOREAL is a group of high-spirited and effervescent individuals. It is one of the most sought-after non-technical clubs at Pune Institute of Computer Technology (PICT). It has published 24 vibrant magazines so far, all of them portraying the remarkable contributions of its members.

                The chief objective being the publication of the annual magazine, PICTOREAL also organizes several diverse events all around the year. These events contribute towards nurturing one’s pragmatic skills like public speaking, confidence, event management in addition to expression of thoughts, visuals, and photography in a lucid yet creative manner.
                
                Here in PICTOREAL, we believe in giving back to the society. To promote this culture in PICT, multiple events like blood donation and money donation drives are conducted. PICT-O-SOCIAL, a subgroup in PICTOREAL, benevolently organizes activities like orphanage visits, old-age home visits and career counselling sessions to help students indulge in social interactions.</p>
                <a href="https://www.pictoreal.in/"target="_main" class="btn">More Details</a>
        </div>
    </div>
    <div class="info-box">
        <img src="https://pict.acm.org/static/logo-61e5ab630d7c60480cb27df8e79abd63.png" alt="Image Description" class="info-image">
        <div class="info-text">
            <h3>PASC</h3>
            <p>PICT ACM Student Chapter(PASC),a student chapter organization subsidiary of the Association for Computing Machinery(ACM), consists of highly motivated students, ready to learn and help each other bring the best out of them.PASC began in 2011,with the perspective of fostering technical and non-technical qualities in an individual and helping them to shape their future.</p>
            <a href="https://pict.acm.org/"target="_main" class="btn">More Details</a>
        </div>
    </div>
    <div class="info-box">
        <img src="http://mun.pict.edu/assets/Logo.png" alt="Image Description" class="info-image">
        <div class="info-text">
            <h3>PICT-MUN CLUB</h3>
            <p>The PICT MUN Club, established in 2016, consists of a group of inquisitive students who are passionate about social, political, and economic issues that elude the future of our world. PICT MUN strongly believes in the important role of dialogue and discussion in solving any problem and hence always abides by its motto - 'Think.Discuss.Prosper'. PICT MUN organizes an annual MUN conference and various public speaking events like extempore, Intra-MUN, Open MIC, Group discussion, and Debate to engage the youth, who are the torchbearers of the future, in stimulating conversations. This encourages them to discuss and debate on important issues and find a common ground to agree on, thus promoting a sense of individuality as well as collectivism and helping them understand the universal principle of tolerance. PICT-MUN Club's newsletter, The Inquisitor, is published monthly by an in-house team of amazing writers, graphic designers, and researchers.</p>
            <a href="http://mun.pict.edu/"target="_main" class="btn">More Details</a>
        </div>
    </div>
    
    
</body>
</html>