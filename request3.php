
<!DOCTYPE html>
<html lang="en">
<head>

    <title>
        Request
    </title>

   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head >
<body ng-app="">

<div ng-include="'navBar.php'"></div>

<div class="container">
 <div class="col-lg-12 text-left">
                <h3 class="page-header">Select Department
                    <small> / Frist Step</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active"><?php echo "Disease1" ?></li>
                    <li class="active">Add information</li>
                </ol>
    </div>

    <?php include 'symptoms.php';?>

    </div>

    
<br>
<br>
    <div ng-include="'footer.html'"></div>

</body>

</html>