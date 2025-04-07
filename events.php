<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events In PICT</title>   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  
}

body {
    /* font-family: 'Poppins',sans-serif; */
  --color: rgba(30, 30, 30);
  --bgColor: rgba(245, 245, 245);
  min-height: 100vh;
  display: grid;
  align-content: center;
  gap: 1rem;
  /* padding: 2rem; */
  font-family: "Poppins", sans-serif;
  color: var(--color);
  background: var(--bgColor);
}

h1 {
  text-align: center;
}
p{
    color:black;
}
ul {
  --col-gap: 2rem;
  --row-gap: 2rem;
  --line-w: 0.25rem;
  display: grid;
  grid-template-columns: var(--line-w) 1fr;
  grid-auto-columns: max-content;
  column-gap: var(--col-gap);
  list-style: none;
  width: min(90rem, 90%);
  margin-inline: auto;
  letter-spacing:1px
}

/* line */
ul::before {
  content: "";
  grid-column: 1;
  grid-row: 1 / span 20;
  background: rgb(225, 225, 225);
  border-radius: calc(var(--line-w) / 2);
}

/* columns*/

/* row gaps */
ul li:not(:last-child) {
  margin-bottom: var(--row-gap);
}

/* card */
ul li {
  grid-column: 2;
  --inlineP: 1.5rem;
  margin-inline: var(--inlineP);
  grid-row: span 2;
  display: grid;
  grid-template-rows: min-content min-content min-content;
}

/* date */
ul li .date {
  --dateH: 3rem;
  height: var(--dateH);
  margin-inline: calc(var(--inlineP) * -1);

  text-align: center;
  background-color: var(--accent-color);

  color: white;
  font-size: 1.25rem;
  font-weight: 700;

  display: grid;
  place-content: center;
  position: relative;

  border-radius: calc(var(--dateH) / 2) 0 0 calc(var(--dateH) / 2);
}

/* date flap */
ul li .date::before {
  content: "";
  width: var(--inlineP);
  aspect-ratio: 1;
  background: var(--accent-color);
  background-image: linear-gradient(rgba(0, 0, 0, 0.2) 100%, transparent);
  position: absolute;
  top: 100%;

  clip-path: polygon(0 0, 100% 0, 0 100%);
  right: 0;
}

/* circle */
ul li .date::after {
  content: "";
  position: absolute;
  width: 2rem;
  aspect-ratio: 1;
  background: var(--bgColor);
  border: 0.3rem solid var(--accent-color);
  border-radius: 50%;
  top: 50%;

  transform: translate(50%, -50%);
  right: calc(100% + var(--col-gap) + var(--line-w) / 2);
}

/* title descr */
ul li .title,
ul li .descr {
  background: var(--bgColor);
  position: relative;
  padding-inline: 1.5rem;
  
}
ul li .title {
  overflow: hidden;
  padding-block-start: 1.5rem;
  padding-block-end: 1rem;
  font-weight: 650;
    font-size: medium;
}
ul li .descr {
  padding-block-end: 1.5rem;
  font-weight: 400;
  font-size: small;
  font-family: monospace;
}

/* shadows */
ul li .title::before,
ul li .descr::before {
  content: "";
  position: absolute;
  width: 90%;
  height: 0.5rem;
  background: rgba(0, 0, 0, 0.5);
  left: 50%;
  border-radius: 50%;
  filter: blur(4px);
  transform: translate(-50%, 50%);
}
ul li .title::before {
  bottom: calc(100% + 0.125rem);
}

ul li .descr::before {
  z-index: -1;
  bottom: 0.25rem;
}

@media (min-width: 500rem) {
  ul {
    grid-template-columns: 1fr var(--line-w) 1fr;
  }
  ul::before {
    grid-column: 2;
  }
  ul li:nth-child(odd) {
    grid-column: 1;
  }
  ul li:nth-child(even) {
    grid-column: 3;
  }

  /* start second card */
  ul li:nth-child(2) {
    grid-row: 2/4;
  }

  ul li:nth-child(odd) .date::before {
    clip-path: polygon(0 0, 100% 0, 100% 100%);
    left: 0;
  }

  ul li:nth-child(odd) .date::after {
    transform: translate(-50%, -50%);
    left: calc(100% + var(--col-gap) + var(--line-w) / 2);
  }
  ul li:nth-child(odd) .date {
    border-radius: 0 calc(var(--dateH) / 2) calc(var(--dateH) / 2) 0;
  }
}

.credits {
  margin-top: 1rem;
  text-align: right;
}
.credits a {
  color: var(--color);
}

.button_slide {
  color: #000;
  text-align:center;
  /* background-color:green; */
  border: 2px solid var(--accent-color);
  border-radius: 0px;
  padding: 10px 30px;
  display: inline-block;
  font-family: "Lucida Console", Monaco, monospace;
  font-size: 14px;
  letter-spacing: 1px;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 var(--accent-color);
  -webkit-transition: ease-out 0.8s;
  -moz-transition: ease-out 0.9s;
  transition: ease-out 0.9s;
  font-variant-caps: small-caps;
}


.slide_right:hover {
  box-shadow: inset 400px 0 0 0 var(--accent-color);
}

#outer {
  width: 364px;
  margin: 50px auto 0 auto;
  text-align: center;
}
#but{
    text-align:center;
}
</style>
<body>
   
<?php include 'components/user_header.php'; ?>
<div class="fix">
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"><a href="home.php">&nbsp;Home&nbsp;</a></i><i class="fa-solid fa-chevron-right"><a href="clubs.php">&nbsp;Clubs&nbsp;</a></i><i class="fa-solid fa-chevron-right"></i>&nbsp;Events
   </span></div>
<div style="display:flex;gap:1.5rem;place-content: center;" align="center">
<a ><button class="delete-btn" style="    background: dodgerblue;">Completed</button></a>
<a href="#active"><button class="option-btn" style="background-color: green;">ON Going</button></a>
<a href="#upcoming"><button class="option-btn" style="    background: var(--orange)">UP coming</button></a>
</div></div>
<ul>
    <li style="--accent-color:#ff6400">
        <div class="date" id="finished">27th, 28th & 29th October, 2023</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">PULZION - Tech & Treat</div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px"> Pulzion is the annual flagship event organized by PICT ACM Student Chapter (PASC). Pulzion consists of multiple events in technical as well as non-technical domains including coding competitions, mock placement interviews, business management-based events, design and development based contests and quizzing events. It is one of the most anticipated events taking place at PICT. This year, Pulzion is going global to encourage students of varied backgrounds to participate and compete. With sincerity, dedication and high aspirations, our chapter hopes to add value to our college and the community.
         <p align="end" style="    cursor: pointer;"><a href="https://pulzion.co.in/" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://pulzion.co.in/register" target="_blank">Register Now !</a> </div></p></div>
    </li>
    <li style="--accent-color:#ff0000">
        <div class="date">31st January, 2024</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">Blood Donation Drive </div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Hello Everyone!! 👋 
            We are thrilled to announce our next Mega Event: Blood Donation Drive 🩸 
            
             Welcome to a life-saving initiative ! 
            PICT NSS × PICTOREAL proudly presents our Blood Donation Drive.
            
             Saving Lives: It's in Your Blood. 
            Join us in saving lives! 🤝 Our Blood Donation Drive is happening on January 31. Your participation can be the difference between life and death for someone in need. Every donation is a step towards building a healthier and stronger community.
            
            
            <p align="end" style="    cursor: pointer;"><a href="https://www.pictoreal.in/Gallery/blood_donation.html" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://www.pictoreal.in/Gallery/blood_donation.html" target="_blank">Register Now !</a> </div></p></div>
    </li>
    <li style="--accent-color:#d9d418">
        <div class="date">23rd February, 2024- DAY 1</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">Pics-o-reel </div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Let your imagination flow and bring your artistic vision to life through the beauty of traditional art. This category welcomes artists to express their creativity on various surfaces, whether canvas or paper. Utilise diverse techniques, from the richness of oil and acrylic to the simplicity of pencil or charcoal.
            <p align="end" style="    cursor: pointer;"><a href="https://www.pictofest.in/individual/1" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://www.pictofest.in/login" target="_blank">Register Now !</a> </div></p></div>
    </li>
    <li style="--accent-color:#e66451">
        <div class="date">24th February, 2024- DAY 2</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">Taare Zameen Par </div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Join our free-spirited live painting event alongside fellow students and teachers under the open sky! Just grab your paints – we've got the drawing sheets covered. Let your artistic spirit soar, and create in the vibrant energy of the outdoors. It's a canvas for everyone, so come and be part of the frenzy!
            <p align="end" style="    cursor: pointer;"><a href="https://www.pictofest.in/individual/13" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://www.pictofest.in/login" target="_blank">Register Now !</a> </div></p></div>
    </li>
    <li style="--accent-color:#8fda20">
        <div class="date">2nd March, 2024</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;"id="active">Tree Conservation Activity </div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Greetings from PICT NSS,😇
            Where knowledge meets compassion,💫 PICT NSS club brings an opportunity for you to contribute to society and to improve your leadership skills.🌟
            
            The essence of NSS is captured in its motto, "Not Me But You," ❤ promotes selflessness and collective action for the greater good.
            Initiative is about conserving an abundance of trees to enhance environmental welfare. 
            Eco-champions, do join us....😊
            
            <p align="end" style="    cursor: pointer;"><a href="https://nsspict.netlify.app/" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://chat.whatsapp.com/FjXcmmXOmV4IhLrN8Rnfck" target="_blank">Register Now !</a> </div></p></div>
    </li>
    
    <li style="--accent-color:#a7d1ff" id="active">
        <div class="date">5TH APRIL, 2024 - DAY 1</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">PRADNYA - Competitive Programming</div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">PRADNYA is a one of a kind programming event meticulously forged by our finest, catering to rookies and veterans alike, from all over the world. This Contest puts the programmer’s logical thinking and Problem solving skills to the test using programming languages, which guarantees to appraise their skills as a programmer.
        <p align="end" style="    cursor: pointer;"><a href="https://pictinc.org/event-details/pradnya" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a href="https://pictinc.org/register/events/pradnya" target="_blank" style="color:black;font-weight:600;">Register Now ! </a> </div></p></div>
        
    </li>
    <li style="--accent-color:#77a9e8">
        <div class="date">6TH APRIL, 2024 - DAY 2</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">IMPETUS - International Level Project Exhibition and Competition</div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Impetus is an intercollegiate international level competition and has been attracting corporate giants for not only sponsorship but also in terms of time and guidance to the participants. Industries such as eQ Technologic, Microsoft, IEEE, ACM, CSI, were closely associated with this event. During the 3 day event, first year, second year and third year students from various colleges across India and abroad showcase their projects in domains like
🔹Application Development
🔹 Communication, Networking, Security
🔹 Pattern Recognition, Artificial Intelligence
🔹 VLSI, IoT, Remote Sensing
🔹 Blockchain, Cloud Computing
🔹Others
        <p align="end" style="cursor: pointer;"><a href="https://pictinc.org/event-details/impetus" target="_blank" style="color:black;">Know More ...</a> </p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a href="https://pictinc.org/event-details/impetus  " target="_blank" style="color:black;font-weight:600;">Register Now !</a>  </div></p></div>
    </li>
    <li style="--accent-color:#ffae12">
        <div class="date">7TH APRIL, 2024 - DAY 3</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">CONCEPTS - The grand project exhibition for final year student</div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px" id="upcoming">Concepts is an inter-collegiate international-level competition and has been attracting corporate giants for not only sponsorship but also for guiding and mentoring the participants for their Quality products/projects and providing on spot job offers & internships. It offers Patent registration fees for Innovative and Patentable projects. During the 3 day event, Final Year students from various colleges across India and abroad showcase their projects.
        <p align="end" style="cursor: pointer;" ><a href="https://pictinc.org/event-details/concepts" style="color:black;" target="_blank">Know More ...</a></p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://pictinc.org/event-details/concepts" target="_blank">Register Now !</a> </div></p></div>
    </li>
    <div id="upcoming"></div>
    <li style="--accent-color:#7c81b1">
        <div class="date" >Upcoming....</div>
        <div class="title" style="background-color:#e2e3e1;border-style:outset;">Credenz </div>
        <div class="descr"style="background-color:#e2e3e1;padding-top:6px">Credenz is the annual technical festival organised by the PICT IEEE Student Branch. Started in 2004, with a view to elicit the best out of each and every one, it has grown to become one of the finest technical events in Pune. Credenz aims not only to infuse a competitive spirit among participants, but also widen their horizons in the ever-changing field of technology via myriad seminars and workshops.
            Participants get a chance to discover their talents and thrive in numerous events like Clash, B Plan, RoboLIGA, WebWeaver, Pixelate, Cretronix, Paper Presentation and DataWiz. This is a unique chance for the students to go beyond the traditional spheres of academics and make the most of their potential. This spirit of learning and discovery has inspired the PICT IEEE Student Branch to present Credenz , a podium for you to nurture and cultivate your talents.
        <p align="end" style="cursor: pointer;" ><a href="https://www.pictieee.in/events" style="color:black;" target="_blank">Know More ...</a></p>
        <p align="center"><div id="but" align="center" class="button_slide slide_right"><a style="color:black;font-weight:600;" href="https://www.pictieee.in/events" target="_blank">Register Now !</a> </div></p></div>
    </li>
    
</ul>

<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>

</body>
</html>
    
</body>
</html>