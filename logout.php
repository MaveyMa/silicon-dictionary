<!--
This program was created to allow administrators to logout. 
Recall that to destroy the session you must resume it first. 
After destroying the session, the administrator is sent back to the login screen.
-->

<?php 
session_start();  //starting or resuming existing session 
session_destroy();  //kills session 

header("Location: myHome.php"); 


?>