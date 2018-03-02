<?php

    include_once 'database.inc.php';
    
    $sql = "DELETE FROM Word WHERE wordId = :wordId";
    $namedParameters['wordId'] =  $_GET['wordId'];
    
    $statement = $dbConn->prepare($sql);
    $statement->execute($namedParameters);  
    
    //redirect back to products.php as if you had just clicked a delete button
    header("Location: adminHome.php");
?>