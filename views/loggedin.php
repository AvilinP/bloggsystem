<a href="Logout.php">
log out</a><br />

<?php 
session_start();

// Welcomes logged in user 
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "") {
  echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
  echo '<h4><a href="logout.php">Logout</a></h4>';

  // Checks if they have an admin role
  if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
      echo "You're logged in as admin";
  }

  else { 
    echo "You don't have admin rights. Please log in/register again <a href='register.php'>here</a>";
    die();
  }
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

<form action="../partials/handleEdit.php" method="GET">
    Chose comment id to update the message! <br/>
    <input type="number" name="id"> <br/>
    New message:<br><input type="text" name="newComment">
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