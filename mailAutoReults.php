<?php require 'symtest.php';?>

<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">

<style>
.error {color: #FF0000;}
</style>

<title>IHGS</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>
<body ng-app=""> 

<div ng-include="'navBar.php'"></div>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="col-lg-12 text-left">
                <h3 class="page-header">Auto Prescription
                    <small> / Complete</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active">Secton 1</li>
                    <li class="active">Add symptoms</li>
                    <li class="active">Auto Prescription</li>
                </ol>
        </div>
        <!-- /.row -->

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

$output2= $_SESSION['output'];
$outputdes= $_SESSION['description'];
$outputdrug= $_SESSION['outputDrug'];
$username= $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      } else {
         $name = test_input($_POST["name"]);
         // 检测名字是否只包含字母跟空格
         if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         $nameErr = "Only Letter and Space Allowed"; 
         }
     }
   
   if (empty($_POST["email"])) {
      $emailErr = "Email is required";
   } else {
      $email = test_input($_POST["email"]);
      // 检测邮箱是否合法
      if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
         $emailErr = "Invalide Email Address"; 
      }
   }

   if (empty($_POST["comment"])) {
      $comment = "";
   } else {
      $comment = test_input($_POST["comment"]);
   }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<div class="col-md-3">

</div>
<div class="col-md-6">
<div class="panel-group">  
    <div class="panel panel-primary">
      <div class="panel-heading">Your Auto Prescription is Ready</div>
      <div class="panel-body">

    
<p><span class="error">* Required Information</span></p>

<form style="padding: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   

   <div class="control-group form-group">
      <div class="controls">
         <label>Email Address:</label>
         <input type="text" class="form-control" name="email">
         <span class="error">* <?php echo $emailErr;?></span>
      </div>
   </div>


   <input class="btn btn-primary" type="submit" name="submit" value="Submit" > 
</form>
      </div>

    </div>

</div>


<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $addressTo = $_POST["email"];
$addressTo = $email;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'wentingsu.qu@gmail.com';          // SMTP username
$mail->Password = 'Aawenting.su'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('wentingsu.qu@gmail.com', 'IHGS');
$mail->addReplyTo('wentingsu.qu@gmail.com', 'IHGS');
$mail->addAddress($addressTo,"thanks");  // Add a recipient

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h2>Welcome to visit IHGS</h2><br>';
$bodyContent .= '<h4>Dear ' .$username. ',</h4>' ;

$bodyContent .= '<h3>The Symptoms You Just Chosen are:</h3>' ;
$bodyContent .=  $outputdes;

$bodyContent .= '<h3>The drugs we recommended are:</h3>' ;
$bodyContent .= $outputdrug;

$bodyContent .= '<br><h4>Best Regards,</h4><h4>IHGS</h4>';
// $bodyContent .= '';

$mail->Subject = 'Your Auto Priscription is Ready by IHGS';
$mail->Body    = $bodyContent;


if(!$mail->send()) {
    echo 'Please Waiting for the Results.<br>';
    echo 'Note: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<br>The Link has been sent to: ' . $email. '<br>';
}
     // echo  "<br>" . $output2 . " ";
     // echo  "<br>" . $outputdes . " ";
     // echo  "<br>" . $outputdrug . " ";

?>

</div>
</div>

<div ng-include="'footer.html'"></div>

</body>
</html>