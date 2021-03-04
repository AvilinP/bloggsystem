<?php
// Connection to db
include("views/db.php");
session_start();

// if you're loggedin admin or user
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "")
{
    echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
    echo '<h4><a href="logout.php">Logout</a></h4>';

    // Shows posts from loggedin.php
    $stm = $pdo->query("SELECT id, username, comment FROM comments");
    while($row = $stm->fetch()) 
        echo $row['username'] . " " . $row['comment'] . "<br />";

   } else { 
   
        echo "You're not logged in. Please log in/register <a href='views/register.php'>here</a>";
        die();
   
}

?>
