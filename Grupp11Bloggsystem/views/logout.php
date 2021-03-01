<?php     
session_start();  
session_destroy();  // destroy and end session for user
header("location:login.php");  // to get back to the login page when logged out
?>