<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 
  <style>
    
#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
  background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}

section {
  padding-top:70px;  
    padding-bottom:50px; 
    min-height:calc(100% - 1px);
}

#section1 {
  background-color: #d9d9d9;
   color:#595959;
}
  
#section2 {
  background-color: #e6e6e6;
    color:#595959;
}
  </style>

</head>

<body ng-app="">
<script>
$(document).ready( function() {
    $('#myCarousel').carousel({
    interval:   4000
  });
  
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');    
  }).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
      var count = $('.nav').children().length -1;
      var current = $('.nav li.active');
      current.removeClass('active').next().addClass('active');
      var id = parseInt(current.data('slide-to'));
      if(count == id) {
        $('.nav li').first().addClass('active');  
      }
    }
    clickEvent = false;
  });
});
</script>
<!-- <a href='healthRecords.php'>Health Record</a></br>
<a href='requestRecords.php'>My Medical Requests</a></br>
<a href='request.php'>Initiate a Medical Request</a></br>
 -->
<div ng-include="'navBar.php'"></div>

<div class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="c1.jpg">
           <div class="carousel-caption">
           <h3>Health Record</h3>
            <h3><a href="healthRecords.php"  class="label label-primary" >Find More</a></h3>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="c2.jpg">
           <div class="carousel-caption">
           <h3>My Medical Requests</h3>
             <h3><a href="requestRecords.php"  class="label label-primary" >Find More</a></h3>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="c1.jpg">
           <div class="carousel-caption">
           <h3>Initiate a Medical Request</h3>
          <h3><a href="request.php"  class="label label-primary" >Find More</a></h3>

            </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="c2.jpg">
           <div class="carousel-caption">
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->

      <ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="login.php"> Health Record<small>Lorem ipsum dolor sit</small></a>
          <hide ></hide></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href='healthRecordPage.php'>My Medical Requests<small>Lorem ipsum dolor sit</small></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#">Initiate a Medical Request<small>Lorem ipsum dolor sit</small></a></li>
          <li data-target="#myCarousel" data-slide-to="3"><a href="#">Services<small>Lorem ipsum dolor sit</small></a></li>
        </ul>


    </div><!-- End Carousel -->
<br>
<br>

<section class="container-fluid" id="section2">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>What is IHGS?</h1>
        <br>
    <p class="lead">Bootstrap is a free collection of tools for creating websites and web applications. It contains HTML and CSS-based design templates for typography, forms, buttons, navigation and other interface components, as well as optional JavaScript extensions. It is the No.1 project on GitHub with 65,000+ stars and 23,800 forks (as of March 2014) [1] and has been used by NASA and MSNBC, among many others..</p>
        <br> 
        <i style="font-size:120px" class="fa fa-camera fa-5x"></i>
    </div>
  </div>
</section>

<section class="container-fluid" id="section1">
      <h1 class="text-center v-center">Sectionalize.</h1>
     <br>
    <div class="container">
      <div class="row">
          <div class="col-sm-3">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-2 text-center"><h3>Robust</h3><p>There is other content and snippets of details or features that can be placed here..</p><i class="fa fa-cog fa-5x"></i></div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1 text-center"><h3>Simple</h3><p>You may also want to create content that compells users to scroll down more..</p><i class="fa fa-user fa-5x"></i></div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="row">
              <div class="col-sm-10 text-center"><h3>Clean</h3><p>In the first 30 seconds of a user's visit to your site they decide if they're going to stay..</p><i class="fa fa-mobile fa-5x"></i></div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="row">
              <div class="col-sm-10 text-center"><h3>Clean</h3><p>In the first 30 seconds of a user's visit to your site they decide if they're going to stay..</p><i class="fa fa-mobile fa-5x"></i></div>
            </div>
          </div>
      </div><!--/row-->
    <div class="row"><br></div>
  </div><!--/container-->
</section>

<br>
<br>

<!-- <footer id="footer">
  <div class="container">
    <div class="row">    
      <div class="col-xs-6 col-sm-6 col-md-3 column">          
          <h4>Information</h4>
          <ul class="nav">
            <li><a href="about-us.html">Products</a></li>
            <li><a href="about-us.html">Services</a></li>
            <li><a href="about-us.html">Benefits</a></li>
            <li><a href="elements.html">Developers</a></li>
          </ul> 
        </div>
      <div class="col-xs-6 col-md-3 column">          
          <h4>Follow Us</h4>
          <ul class="nav">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Google+</a></li>
            <li><a href="#">Pinterest</a></li>
          </ul> 
      </div>
      <div class="col-xs-6 col-md-3 column">          
          <h4>Contact Us</h4>
          <ul class="nav">
            <li><a href="#">Email</a></li>
            <li><a href="#">Headquarters</a></li>
            <li><a href="#">Management</a></li>
            <li><a href="#">Support</a></li>
          </ul> 
      </div>
      <div class="col-xs-6 col-md-3 column">          
          <h4>Customer Service</h4>
          <ul class="nav">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Delivery Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul> 
      </div>
    </div>
  </div>
</footer> -->

</div>

<div ng-include="'footer.html'"></div>


</body>
</html>

