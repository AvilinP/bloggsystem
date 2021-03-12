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

        // if you're a loggedin admin or user
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

                    
                // Shows posts from loggedin.php logged in users and admins
                $stm = $pdo->query("SELECT * FROM posts");
                while($row = $stm->fetch()) {

                    // shows blog posts
                    echo '<div id="main-blog-posts"> <img src="bloggsystem/' . $row['image'] . '" height=200 /><br />';
                    echo '<p id="main-blog-posts-p">' . $row['description'] . '</p>'; 

                    
                    ?>

                        <!-- comment form -->
                        <form method="POST" action="partials/handleComments.php?id=<?=$row['id']?>" id="main-comments-form">
                            <b>What do you think <?=$_SESSION['sess_name']?>? </b><br>
                            <textarea name="comment" rows="6" cols="30"></textarea> <br>
                            <input type="submit" value="Submit your thoughts">


                        </form>

                            <section id= main-comments-div>

                            <?php 

                            // shows comments for logged in user and admin
                            $comments_stm = $pdo->query("SELECT comment, username FROM comments WHERE img_id=".$row['id']);
                            while($comment = $comments_stm->fetch()) {

                                    echo '<p id="main-comments-p">' . 'Username: ' . $comment['username'] . '<br><br>';
                                    echo '<i>' . $comment['comment'] . '</i></p>';

                                        // if you're admin, it shows a delete btn
                                        if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){ ?> 
                                            <form method="POST" action="partials/deleteComment.php?id=<?=$row['id']?>">
                                            <?=var_dump($row);
                                            exit;?>
                                                <input type="submit" value="Delete">
                                            </form>
                               <?php             
                                }

                            }

     


                    // closes div for posts and comments 
                    echo '</div>';

                }

                                        
            ?>

                            </section>  

        </div>

    </div>
    
</body>
</html>
