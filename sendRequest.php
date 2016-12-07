
<?php

?>

<!DOCTYPE html>
<html>
<head>
  <title>Register, login and logout user php mysql</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/aboutUs.css">
</head>

<body ng-app="">

<div ng-include="'navBar.php'"></div>  

<div class="container text-center">
    <div class="row">

    <div class="col-lg-12 text-left">

                <h3 class="page-header">Select Department
                    <small> / Frist Step</small>
                </h3>

                <ol class="breadcrumb">                
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active"><?php echo "Disease1" ?></li>
                    <li class="active">Add information</li>
                    <li class="active">Complete</li>
                </ol>
                <br><br>
    </div>
   
    
	</div>
</div>

<div class="container">

<div class="col-lg-2">
</div>

<div class="col-lg-8 text-left">
   <div class="panel-group">  
    <div class="panel panel-danger">
      <div class="panel-heading">Thanks for Your Information</div>
      <div class="panel-body"><p> According to Your Information, Your Request Has Send to Our Doctor, Please Wait Patiently.</p>
      <p>Your Can Track Your Medical Request <a href="requestRecords.php"><strong>Here</strong></a></p>
      </div>
    </div>

  </div>
</div>

</div>

<br>
<br>

<div ng-include="'footer.html'"></div>

</body>


</html>