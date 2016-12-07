<?php 

require 'symtest.php';?>

<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">

<style>
.error {color: #FF0000;}
</style>

<title>Quant University</title>
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
                <h3 class="page-header">Select Department
                    <small> / Frist Step</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active"><?php echo "Disease1" ?></li>
                    <li class="active">Add information</li>
                    <li class="active">Auto Results</li>
                </ol>
        </div>
        <!-- /.row -->

        <!-- Content Row -->

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


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
<p><span class="error">* Required Information</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
   <div class="control-group form-group">
      <div class="controls">
         <label>Name:</label>
         <input type="text" class="form-control" name="name">
         <span class="error">* <?php echo $nameErr;?></span>
      </div>
   </div>

   <div class="control-group form-group">
      <div class="controls">
         <label>Email Address:</label>
         <input type="text" class="form-control" name="email">
         <span class="error">* <?php echo $emailErr;?></span>
      </div>
   </div>

   <div class="control-group form-group">
      <div class="controls">
         <label>comment:</label>
         <textarea class="form-control"  name="comment" rows="3" cols="100"></textarea>        
      </div>
   </div>

   <input class="btn btn-primary" type="submit" name="submit" value="Submit" > 
</form>


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

$bodyContent = '<h1>Welcome to visit IHGS</h1><br>';

$bodyContent .= '<h3>The drugs are:</h3> echo .$last_id' ;

$bodyContent .= '<p>drug1</p>';
$bodyContent .= '<p>drug2</p>';
$bodyContent .= '<p>drug3</p>';


$bodyContent .= '<br><h4>Best Regards,</h4>';
$bodyContent .= '<h4>IHGS</h4>';


// $bodyContent .= '<p>drug2<p>';

// $bodyContent .= '<p>http://www.slideshare.net/QuantUniversity/missing-data-handling</p>';

// $bodyContent .= '<p>http://www.slideshare.net/QuantUniversity/missing-data-handling</p>';

$mail->Subject = 'Your Auto Priscription is Ready by IHGS';
$mail->Body    = $bodyContent;


if(!$mail->send()) {
    echo 'Please Waiting for the Results.<br>';
    echo 'Note: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<br>The Link has been sent to: ' . $email;
}

     echo '<br>The Link has been sent to: ';

?>
<!--  <br> The Link you needed is send to the email address: <?php echo $email; ?> 。
 -->

</div>



<!-- <?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?> -->

<!-- Footer -->
        <!-- <footer>      
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer> -->

    </div>
<div ng-include="'footer.html'"></div>

</body>
</html>