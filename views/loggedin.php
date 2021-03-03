

<?php 
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
  echo '<h4><a href="logout.php">logout</a></h4>';
} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
  die();
}



?>

<br>
<br>
<form  method="POST" action="../partials/handleComment.php">
Comment: <br>
<textarea type="text" name="comment" > </textarea> <br />
<input type="submit" value="Submit comment!" />
</form>

<form action="../partials/handleRemove.php" method="GET">
    Chose comment id to remove the message! <br/>
    <input type="number" name="id"> <br/>
    <input type="submit" value="Remove entry">
</form>

<form action="handleEdit.php" method="GET">
    Chose comment id to update the message! <br/>
    <input type="number" name="id"> <br/>
    New message:<input type="text" name="newComment">
    <input type="submit" value="Edit entry">
</form>


                 <!-- /////// PHP FOR DISPLAYING USER COMMENTS INTO WEBSITE. -->

<?php

include("db.php");

echo "<h2> Guestbook entries! </h2>";

$stm = $pdo->query("SELECT id, username, comment FROM comments");


while ($row = $stm->fetch()) {
    echo $row['id'] . ": " . "Username --> " . $row['username'] . " Comment ---> " . $row['comment'] . "<br />";
} 
?>