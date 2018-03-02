<?php
function printDefaultMenuUponFirstTimeVisiting() 
{
    global $dbConn;
	$sql = "SELECT * FROM Word ORDER BY word DESC";
	$stmt = $dbConn->prepare($sql);
	$stmt->execute();
	echo "<table  cellpadding='0' cellspacing='0' style='width: 100%'>";
	echo "<th> Word</th>";
	$popupID = 0;
	while ($row=$stmt->fetch())
	{
		echo "<tr>";
			echo "<td><a class='button' href='#popup" . $popupID . "'>" . $row['word'] . "</a></td>";
			 
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

function printDefaultMenuUponFirstTimeVisitingAdmin() 
{
    global $dbConn;
	$sql = "SELECT * FROM Word ORDER BY word DESC";
	$stmt = $dbConn->prepare($sql);
	$stmt->execute();
	echo "<table  cellpadding='0' cellspacing='0' style='width: 100%'>";
	echo "<th> Word</th>";
	$popupID = 0;
	while ($row=$stmt->fetch())
	{
		echo "<tr>";
			echo "<td><a class='button' href='#popup" . $popupID . "'>" . $row['word'] . "</a></td>";
			 
	        echo "<td> <form action=updateWord.php>";
	        echo "<input type='hidden' name='wordId' value='".$row['wordId'] . "'/>";
	        echo "<input type='submit' value='Update'/></form> </td>";
	        
	        echo "<td> <form action=deleteWord.php>";
	        echo "<input type='hidden' name='wordId' value='".$row['wordId'] . "'/>";
	        echo "<input type='submit' value='Delete'/></form> </td>";
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

function checkWordType() 
{
	global $usedWHERE;
	global $sql;
	$category = $_POST["category"];
	if ($category != "All" ) //A CATEGORY IS SELECTED
	{
		if (!$usedWHERE)
		{
			$sql = $sql . " WHERE categoryId = '$category'";   
			$usedWHERE = true;
		}
		else
		{
			$sql = $sql . " AND categoryId = '$category'";   
		}
	}
}

function checkSort() 
{
	global $usedWHERE;
	global $sql;
	$sort = $_POST["sort"];
	
    if($sort == "ABC")
    {
        $sql = $sql . " ORDER BY word ASC";
    }
    //Word Names Z to A
    else if($sort == "CBA")
    {
        $sql = $sql . " ORDER BY word DESC";
    }
    else
    {
    	return;
    }
}

function checkSearch()
{
	global $usedWHERE;
	global $sql;
	$wordSearch = $_POST["wordSearch"];
	if ($wordSearch != null) //A KEYWORD IS BEING SEARCHED
	{
		if (!$usedWHERE)
		{
			$sql = $sql . " WHERE word LIKE '%{$wordSearch}%'";   
			$usedWHERE = true;
		}
		else
		{
			$sql = $sql . " AND word LIKE '%{$wordSearch}%'";   
		}
	}
}

?>