<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {  
    }
#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
  background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}

footer {
      background-color: #f2f2f2;
      padding: 25px;
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
<body>
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

<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>


<div class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="c1.jpg">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="c2.jpg">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="c1.jpg">
           <div class="carousel-caption">
            <h3>Hello</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="c2.jpg">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->

<a href='healthRecords.php'>Health Record</a></br>
<a href='requestRecords.php'>My Medical Requests</a></br>
<a href='request.php'>Initiate a Medical Request</a></br>
      <ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="healthRecordPage.php">Health Record Page<small>Lorem ipsum dolor sit</small></a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href='healthRecordPage.php'>Initiate a request<small>Lorem ipsum dolor sit</small></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#">Portfolio<small>Lorem ipsum dolor sit</small></a></li>
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
<br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  </form>
</footer>

</div>


</body>
</html>

