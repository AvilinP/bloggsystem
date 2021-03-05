<?php
// Connection to db
include("views/db.php");
session_start();

// if you're loggedin admin or user
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "")
{
    echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
    echo '<h4><a href="views/logout.php">Logout</a></h4>';

    // Shows posts from loggedin.php
    $stm = $pdo->query("SELECT id, username, comment FROM comments");
    while($row = $stm->fetch()) 
        echo $row['username'] . " " . $row['comment'] . "<br />";

   } else { 
   
        echo "You're not logged in. Please log in/register <a href='views/register.php'>here</a>";
        die();
   
}





?> 

<form method="post" action="partials/handleComments2.php?id=<?=$row['id']?>"> <br />
<b><?=$_SESSION['sess_user_name'] ?><br /><br /> 
<textarea name="comment" rows="10"></textarea><br /><br />
<input type="submit" value="send comment!" /><br /><br />
</form>

<?php
echo "<p><h2>Kommentarer: </h2></p>";

$stm = $pdo->query("SELECT comment, username FROM comments WHERE id=".$row['id']);

while($comment = $stm->fetch()) {
  echo "<p><b>". $comment['user'] ."</b><br />";
  echo $comment['comment'] ."</p>";
}
?>