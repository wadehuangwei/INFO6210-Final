<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Request
    </title>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="selfD.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>

<body style="background-color: #f0f0f5;" ng-app="">


<div ng-include="'navBar.php'"></div>

<div class="container">
<div class="col-lg-12 text-left">
                <h3 class="page-header">Select Department
                    <small> / Frist Step</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active">Select Department</li>
                </ol>

                <br>
    </div>
    </div>
<!-- <h2>Please C hoose the Department</h2>
 -->
<div ng-include="'selfD.php'"></div>

<div>
<!-- <div ng-include="'footer.html'"></div>




</body>

</html>