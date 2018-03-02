<!--

-->
<?php
	session_start(); 
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
<div class="col-md-6 col-md-offset-3 site" style="width: 900px;margin-left: 12%;">
    <!--BANNER TITLE-->
	<div class="site-title">
		<h2>Breaking tech lingo barriers</h2>
	</div>
	<!--WELCOME MESSAGE-->
	<div class="post filterSection">
	  <strong> Welcome <?=$_SESSION['adminName']?>! </strong> <br>
	  <form action="addWord.php">
        <input type="submit" value="Add New Word" />    
     </form>
      <br>
     <form action="reports.php">
        <input type="submit" value="Reports" />    
     </form>
     <br>
	 <!--START FILTER FORM-->
	<form action="adminHome.php?show=true" method="post" name="filter">
	<table cellpadding="0" cellspacing="0" style="width: 100%">
	<tr>
		<td>
			<b>Category: </b>
			<select name="category">-->
				<option value="All">All</option>
				<option value=11>Types of Jobs</option>
				<option value=22>Specific Roles</option>
				<option value=33>Areas of Research</option>
				<option value=44>Miscellaneous</option>
			</select> <br><br>
		</td>
		<td>
			<b>Search: </b><input type="text" name="wordSearch"> <br>
		</td>
	</tr>
	<tr>
		<td>
			<label><input type="radio" name="sort" value="ABC"><b> Words A to Z</b></label><br>
			<label><input type="radio" name="sort" value="CBA"><b> Words Z to A</b></label>
		</td>
		<td>
			<input class="button" type="submit" value="Search">
		</td>
	</tr>
	</table>
	</form> <br><br>
	
	
	<!--DISPLAY DEFAULT MENU-->
	<div class="displayMenu">
		<?php
			// DEFAULT; USER HAS NOT FILTERED YET
			if (empty($_GET["show"])) 
			{
				printDefaultMenuUponFirstTimeVisitingAdmin();
			}
			if ($_GET["show"]=="true")
			{
				$sql = "SELECT * FROM Word";
				$usedWHERE = false;
				checkWordType();
				checkSort();
				checkSearch();
				//FINISHED CONSTRUCTING THE SQL STATEMENT FROM FILTERS, SO DISPLAY NOW
				
				//======
				//UNCOMMENT ME IF YOU WANT TO SEE THE SQL STATEMENT
				//echo $sql;
				//======
				
				$stmt = $dbConn->prepare($sql);
	            $stmt->execute();
			    echo "<table  cellpadding='0' cellspacing='0' style='width: 100%'>";
				echo "<th> Name</th>";
				$popupID = 0;
			while ($row=$stmt->fetch())
			{
				echo "<tr>";
					echo "<td><a class='button' href='#popup" . $popupID . "'>" . $row['word'] . "</a></td>";
					
			        echo "<td> <form action=updateWord.php>";
			        echo "<input type='hidden' name='wordId' value='".$row['wordId'] . "'/>";
			        echo "<input class='button' type='submit' value='Update'/></form> </td>";
			        
			        echo "<td> <form action=deleteWord.php>";
			        echo "<input type='hidden' name='wordId' value='".$row['wordId'] . "'/>";
			        echo "<input class='button' type='submit' value='Delete'/></form> </td>";
		        echo "</tr>";
		        
		        echo "<div id='popup" . $popupID . "' class='overlay'>
					<div class='popup'>
						<h2>" . $row['word'] . "</h2>
						<a class='close' href='#'>&times;</a>
						<div class='content'>
							" . $row['tldr'] . " <br>
							" . $row['definition'] . "
						</div>
					</div>
				</div>";
				$popupID++;
			}
				echo "</table>";
			}
		?>
	</div>
	<!--END DEFAULT DISPLAY MENU-->
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
