<!--
This programs executes the authentication process. 
-->

<?php 
session_start(); //start or resume an existing session 
include_once 'database.inc.php'; 

if (isset($_POST['loginForm'])) 
{ //checks whether user submitted the form 
     
    $username = $_POST['username']; 
    $password = $_POST['password'];  //hash("sha1", $_POST['password']) 
     
    // $sql = "SELECT *  
    //         FROM Admin 
    //         WHERE username = '$username' 
    //         AND password = '$password'";  //Not preventing SQL Injection 
             

    $sql = "SELECT *  
            FROM Admin 
            WHERE username = :username 
            AND password = :password";  //Preventing SQL Injection 
             
    $namedParameters = array(); 
    $namedParameters[':username'] = $username;                 
    $namedParameters[':password'] = $password;             
     
    $statement = $dbConn->prepare($sql);  
    $statement->execute($namedParameters); 
    $record = $statement->fetch(PDO::FETCH_ASSOC); 
     
    if (empty($record)) 
    { //wrong username or password 
        echo "Wrong username or password!"; 
    } 
    else 
    { 
        $_SESSION['username'] = $record['username']; 
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName']; 
         
        header("Location: adminHome.php");          
    } 
} 
?>