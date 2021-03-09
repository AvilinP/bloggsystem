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

        <?php

        // if you're loggedin admin or user
        if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "")
        {
            echo '<p id="blog-welcome-p">Welcome '.$_SESSION['sess_name'] . ' ' . '<a href="views/logout.php">- logout</a> </p>';

            if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
                echo '<p id="blog-welcome-p"> <a href="views/loggedin.php"> Create new post </a></p>';
            }
        
        ?>
    
    </nav>

<div id="main-page-container">

    <div id="main-blog-posts-container"> 

    <?php

        } else { 
        
            echo '<p id="blog-welcome-p"> You\'re not logged in. Please log in/register ' . ' ' . '<a href="views/register.php">- here</a> </p>';
            die();
        }
            // Shows posts from loggedin.php
            $stm = $pdo->query("SELECT image, description FROM posts");
            while($row = $stm->fetch()) {
                echo '<div id="main-blog-posts"> <img src="../bloggsystem' . $row['image'] . '" height=200 /><br />';
                echo '<p id="main-blog-posts-p">' . $row['description'] . '</p>' . '</div>';
            }
        ?>
    </div>

</div>




?> 

<form method="post" action="partials/handleComments2.php?id=<?=$row['id']?>"> <br />
<b><?=$_SESSION['sess_user_name'] ?><br /><br /> 
<textarea name="comment" rows="5" columns="100"></textarea><br /><br />
<input type="submit" value="send comment!" /><br /><br />
</form>

<?php
echo "<p><h2>Kommentarer: </h2></p>";

$stm = $pdo->query("SELECT comment, username FROM comments WHERE id=".$row['id']);

while($comment = $stm->fetch()) {
  echo "<p><b>". $comment['user'] ."</b><br />";
  echo $comment['comment'] ."</p>";
}

$stm = $pdo->query("SELECT image FROM posts");
    while($row = $stm->fetch()) {
        echo '<img src="../bloggsystem' . $row['image'] . '" height=300 /><br />';
    }


?>
    </div>

</body>
</html>
