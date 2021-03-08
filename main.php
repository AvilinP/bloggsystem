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

        <!-- <a id="blog-nav-a" href="views/register.php">Register/Login</a> -->

        <?php

        // if you're loggedin admin or user
        if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "")
        {
            echo '<p id="blog-welcome-p">Welcome '.$_SESSION['sess_name'] . ' ' . '<a href="views/logout.php">- logout</a> </p>';
           // echo '<h4><a href="views/logout.php">Logout</a></h4>';
        
        ?>
    
    </nav>


    <div id="main-blog-posts"> 

    <?php

            // Shows posts from loggedin.php
            $stm = $pdo->query("SELECT id, username, comment FROM comments");
            while($row = $stm->fetch()) 
                echo $row['username'] . " " . $row['comment'] . "<br />";

        } else { 
        
            echo '<p id="blog-welcome-p"> You\'re not logged in. Please log in/register ' . ' ' . '<a href="views/register.php">- here</a> </p>';
            die();
        }

        $stm = $pdo->query("SELECT image FROM posts");
            while($row = $stm->fetch()) {
                echo '<img src="../bloggsystem' . $row['image'] . '" height=300 /><br />';
            }

        ?>

    </div>

</body>
</html>
