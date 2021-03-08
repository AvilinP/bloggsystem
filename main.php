<?php

// Connection to db
include("views/db.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG PAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <nav id="blog-nav">

        <img id="blog-nav-logo" src="uploads/Millhouse_logo.png" alt="Millhouse Logo">

        <a id="blog-nav-a" href="views/register.php">Register/Login</a>

    
    </nav>


    
<?php

// if you're loggedin admin or user
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "")
{
    echo '<h3 id="blog-welcome-h3">Welcome '.$_SESSION['sess_name'].'</h3>';
    echo '<h4><a href="views/logout.php">Logout</a></h4>';

    // Shows posts from loggedin.php
    $stm = $pdo->query("SELECT id, username, comment FROM comments");
    while($row = $stm->fetch()) 
        echo $row['username'] . " " . $row['comment'] . "<br />";

   } else { 
   
        echo "You're not logged in. Please log in/register <a href='views/register.php'>here</a>";
        die();
   
}


$stm = $pdo->query("SELECT image, description FROM posts");
    while($row = $stm->fetch()) {
        echo '<img src="../bloggsystem' . $row['image'] . '" height=300 /><br />';
        echo $row['description'];
    }


?>

</body>
</html>
