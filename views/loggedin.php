<a href="Logout.php">
log out</a><br />

<?php 
session_start();

// Welcomes logged in user 
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "") {
  echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
 // echo '<h4><a href="logout.php">Logout</a></h4>';

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

<!-- <br>
<br>
<form  method="POST" action="../partials/handleComment.php">
<input type="submit" value="Submit description!" />
</form> -->


<form  method="POST" action="../partials/handleUpload.php" enctype="multipart/form-data">
Upload picture! <br>
POST description: <br>
<textarea type="text" name="description" > </textarea> <br />
<input type="file" name="imageToUpload" value="Picture" /> <br>
<input type="submit"  value="Upload">
</form>


<form action="../partials/handleRemove.php" method="GET">
    Chose description id to remove the message! <br/>
    <input type="number" name="id"> <br/>
    <input type="submit" value="Remove entry">
</form>

<form action="../partials/handleEdit.php" method="GET">
    Chose description id to update the message! <br/>
    <input type="number" name="id"> <br/>
    New message:<br><input type="text" name="newDescription">
    <input type="submit" value="Edit entry">
</form>


                 <!-- /////// PHP FOR DISPLAYING USER COMMENTS INTO WEBSITE. -->

<?php

include("db.php");

echo "<h2> Guestbook entries! </h2>";

$stm = $pdo->query("SELECT id, title, description, image, category, date, username FROM posts");


while ($row = $stm->fetch()) {
    echo $row['id'] . ": " . "Username --> " . $row['username'] . " Description ---> " . $row['description'] . " IMAGE NAME ---> " .  $row['image'] . "<br />";
} 
?>