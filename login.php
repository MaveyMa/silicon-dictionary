<!--
This file contains the HTML Form that allows administrators to authenticate. 


-->
<?php
    include_once 'myFunctions.php';
    include_once 'database.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Silicon Dictionary</title>
  <meta charset="utf-8">
  <!--FAVICON shared computer by Mushu from the Noun Project -->
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
</head>
    
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 site" style="width: 630px;">
  <!--BANNER TITLE-->
	<div class="site-title">
		<h2>Admin Log In</h2>
	</div>
	<!--WELCOME MESSAGE LOG IN-->
	<div class="post filterSection">
	  <p><h4>Only administrators beyond this point.</h4></p>
              
    <form method="post" action="loginProcess.php">
      Username: <input type="text" name="username" /> <br />
      Password: <input type="password" name="password" /> <br />
      <input type="submit" value="Login" name="loginForm" />
    </form>
	</div> <!--END POST-->
	<!--FOOTER ITEMS-->
	<div class="site-footer">
		<p><a href="myHome.php">Home</a> | 
		<a href="https://docs.google.com/document/d/1EWCfSZHeFdF2zSPvcyDRDpIwZW3Gn3M27bsdZm7Vbxk/edit?usp=sharing" target="_blank">About</a> | 
		<a href="https://twitter.com/MaveyMa" target="_blank">Contact</a> | 
		<a href="login.php">Admin</a> </p>
	</div>
	
</div> <!--/col-md-6 -->
</div> <!--/row -->
</div> <!--/container -->
  <!--===================== Bootstrap core JavaScript ==================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
  <script>
      $.backstretch("assets/img/bg01.jpg", {speed: 500});
  </script>
</body>
</html>
