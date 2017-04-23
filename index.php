<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['created']))
{
  $_SESSION['created'] = time();
}
$idle = time() - $_SESSION['created'];

?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="Sense-Captcha Index Page">
	  <meta name="author" content="Nitin Kaveriappa">
    <link rel="icon" href="favicon.ico">
	<link href="css/style.css" rel="stylesheet">
    <title>Sense-Captcha</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">

    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="https://nitinkaveriappa.pro/SenseCaptcha/js/error.js"></script>
	<script src="https://nitinkaveriappa.pro/SenseCaptcha/js/sense_3_0.js"></script>

  <script>
    window.onload = function() {
      errCheck()	};
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  </head>

  <body>

    <div class="container">
      <form class="form-signin" action="submit_data.php" method="POST">
        <span id="errmsg" style="color:#F03"> </span><br/>

        <h2 class="form-signin-heading">Sense-Captcha Test1</h2><br/>
        <p>The objective of this form is to test the Sense Captcha.</p>

		    <label for="inputName" class="sr-only">Name</label>
		    <input type="text" name="Name" id="inputName" class="form-control" placeholder="Name" required autofocus><br/>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email Id" required><br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" id="inputPassword" class="form-control" placeholder="Password" required><br/>

        <button class="btn btn-lg btn-primary btn-block" type="submit" id='submit' onClick="return validate();">Submit</button>
        <button class="btn btn-lg btn-primary btn-block" type="reset">Reset</button>
        <center>
        <div id="sense-captcha">
        		<div id="sense-result"></div>
        		<img src="images/banner.svg" height="35px" width="200px">
                <div id="errorBox" class="error-Box">
					<div id="errorMsg" class="error-msg">
                    </div>
				</div>
        </div>
        </center>
      </form>

	<center>
		Hardware Values<br>
		<div id="yes">
				<span class="head">Accelerometer</span><br/>
        <span id="xlabel"></span><br/>
        <span id="ylabel"></span><br/>
        <span id="zlabel"></span><br/>
        <span id="xglabel"></span><br/>
				<span id="yglabel"></span><br/>
				<span id="zglabel"></span><br/>
				<span id="ilabel"></span><br/>
				<span id="arAlphalabel"></span><br/>
				<span id="arBetalabel"></span><br/>
				<span id="arGammalabel"></span><br/>
				<span class="head">Gyroscope</span><br/>
				<span id="alphalabel"></span><br/>
				<span id="betalabel"></span><br/>
				<span id="gammalabel"></span><br/>
        <span id="gravitylabel"></span><br/>
		</div>
    <script>
    var OSName="Unknown OS";
    if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
    if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
    if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
    if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";

    document.write('OS: '+OSName);
    </script>
    <p>&copy; Nitin Kaveriappa &amp; Paurav Surendra</p>
	</center>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
