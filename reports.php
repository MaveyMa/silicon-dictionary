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
<div class="col-md-6 col-md-offset-3 site" style="width: 900px;margin-left: 12%;">
  <!--BANNER TITLE-->
	<div class="site-title">
		<h2>Admin Reports</h2>
	</div>
	<!--WELCOME MESSAGE LOG IN-->
	<div class="post filterSection">
    <?php
        
        include_once 'database.inc.php';
        
        $sql = "SELECT COUNT(1), w.categoryId, c.category, c.categoryId 
                FROM Word w
                INNER JOIN Category c
                    ON w.categoryId = c.categoryId
                GROUP BY category";
        
        $statement = $dbConn->prepare($sql);
        $statement->execute(); 
      
        echo "<table width='500'>";

    	echo "<h3>Silicon Dictionary Composition</h3>";
    	echo "<tr>";
            echo "<td><b>Category</b></td>";
            echo "<td><b>Number of Words</b></td>";
        echo "</tr>";
    	while ($row=$statement->fetch())
    	{
    		echo "<tr>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['COUNT(1)'] . "</td>";
            echo "</tr>";
    	}
        echo "</table><br><br>";     
        
        $sql = "SELECT COUNT(1)
                FROM Word w";
        
        $statement = $dbConn->prepare($sql);
        $statement->execute(); 
      
        echo "<table width='500'>";

    	echo "<h3>Total Words in Silicon Dictionary</h3>";
    	while ($row=$statement->fetch())
    	{
    		echo "<tr>";
                echo "<td>Sum: </td>";
                echo "<td>" . $row['COUNT(1)'] . "</td>";
            echo "</tr>";
    	}
        echo "</table><br><br>";       
    
    ?>
    
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