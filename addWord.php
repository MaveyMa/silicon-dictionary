<?php

if (isset($_GET['addForm'])) {  //admin submitted form to add product
    
  include_once 'database.inc.php';

  $sql = "INSERT INTO Word ( word, tldr, definition, categoryId) 
          VALUES ( :word, :tldr, :definition, :categoryId)";
          
  $namedParameters = array();
  $namedParameters[':word'] = $_GET['word'];
  $namedParameters[':tldr'] = $_GET['tldr'];
  $namedParameters[':definition'] = $_GET['definition'];
  $namedParameters[':categoryId'] = $_GET['categoryId'];
   
  $statement = $dbConn->prepare($sql);
  $statement->execute($namedParameters);    
      
  echo "Record has been added!";    
}
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
		<h2>Admin Add Word</h2>
	</div>
	<!--WELCOME MESSAGE LOG IN-->
	<div class="post filterSection">
    <form>
        Word Name: <input type="text" name="word" /> <br />
        TL;DR: <textarea rows="2" cols="20" name="tldr"></textarea><br />
        Description: <textarea rows="4" cols="20" name="definition"></textarea><br />
        Category: <select name="categoryId">
            				<option value=11>Types of Jobs</option>
            				<option value=22>Specific Roles</option>
            				<option value=33>Areas of Research</option>
            				<option value=44>Miscellaneous</option>
                  </select>
        <br />
        <br>
        <input type="submit" value="Add Word" name="addForm" /> <br><br>
    </form>
    
    <form action="adminHome.php">
      <input type="submit" value="Back to Admin Home" />
    </form>
	</div> <!--END POST-->
	<!--FOOTER ITEMS-->
	<div class="site-footer">
		<p><a href="adminHome.php">Home</a> | 
		<a href="https://docs.google.com/document/d/1EWCfSZHeFdF2zSPvcyDRDpIwZW3Gn3M27bsdZm7Vbxk/edit?usp=sharing" target="_blank">About</a> | 
		<a href="https://twitter.com/MaveyMa" target="_blank">Contact</a> | 
		<a href="logout.php">Logout</a> </p>
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