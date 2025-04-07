<style>
     @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Josefin Sans', sans-serif;
}
.count{
   padding-left:115%
}
@media (max-width:425px) {
   .count{
      padding-left:0%;
      width:270px
   }
  }
  @media (max-width:530px) {
   .count{
      padding-left:0.2%;
      /* width:350px */
   }
  }
  @media (max-width:1164px) {
   .count{
      padding-left:0.3%;
      /* width:250px */
   }
  }
  

</style>

<footer class="footer">
   

   <section class="grid">

      <div class="box">
         <h3>Quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="shop.php"> <i class="fas fa-angle-right"></i> shop</a>
         <a href="cart.php"> <i class="fas fa-angle-right"></i> cart</a>
         <a href="orders.php"> <i class="fas fa-angle-right"></i> orders</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> contact</a>
      </div>

      <div class="box">
         <h3>Extra links</h3>
         <a href="user_profile.php"> <i class="fas fa-angle-right"></i> profile</a>
         <a href="user_login.php"> <i class="fas fa-angle-right"></i> login</a>
         <a href="user_register.php"> <i class="fas fa-angle-right"></i> register</a>
         <a href="update_user.php"> <i class="fas fa-angle-right"></i> update</a>
         <a href="verification_link.php"> <i class="fas fa-angle-right"></i> verification</a>
         
      </div>

      <div class="box">
         <h3>Follow us</h3>
         <a href="#"><i class="fab fa-github"></i>github</a>
         <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
         <a href="#"><i class="fab fa-instagram"></i>instagram</a>
         <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
         <a href="#"><i class="fab fa-twitter"></i>twitter</a>
         
      </div>
      
      <div class="box">
         <h3>Contact us</h3>
         <a href="mailto:studentscornerpict@gmail.com" style="text-transform:lowercase"><i class="fas fa-envelope"></i> studentscornerpict@gmail.com</a>
         <a href="mailto:9chaitanyashinde@gmail.com" style="text-transform:lowercase"><i class="fas fa-envelope"></i> 9chaitanyashinde@gmail.com</a>
         <a href="tel:9373954169"><i class="fas fa-phone"></i> +91 93739 54169</a>
         <a href="https://maps.app.goo.gl/tVxLXY8zxeFAieMd8"><i class="fas fa-map-marker-alt"></i> Pict,Pune - 411043 </a>
      </div>

      <a href="https://www.freecounterstat.com" title="website counter"><img class="count" src="https://counter11.optistats.ovh/private/freecounterstat.php?c=8drfh4j6eczl45l1mqjq68xld4lfge2b" border="0" title="website counter" alt="website counter"></a>
   </section>
   
   <div class="credit" style="font-size:25px; font-family: 'Josefin Sans', sans-serif;">&copy;  <?= date('Y'); ?> All rights reserved | Built by <span><a style="color:voilet" href="https://chaitanyashinde.web.app/"> Chaitanya Shinde </a> & Team with<span style="font-size :30px;color: red;">♥</span> <span> in India</span></div>
<a href="review_rating.php"><button class="btn">Review & Rating (click to view and review rating)</button></a>
</footer>
