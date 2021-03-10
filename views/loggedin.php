<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG PAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<nav id="blog-nav">
        <img id="blog-nav-logo" src="../uploads/Millhouse_logo.png" alt="Millhouse Logo">
        <a href="Logout.php" style="color: red;">
log out</a><br />
        <?php 
session_start();

// Welcomes logged in user 
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id']  != "") {
  echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
 // echo '<h4><a href="logout.php">Logout</a></h4>';

  // Checks if they have an admin role
  if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
      echo "You're logged in as admin" . "<br/>" . "<br/>" . " - <a href='../main.php'>Blog Page</a>" . "<br/>" . "<br/>";
  }

  else { 
    echo "You don't have admin rights. Please log in/register again <a href='register.php'>here</a>";
    die();
  }
}



?>
        
    </nav>

<div id="visiblePost">

<form id="upload" method="POST" action="../partials/handleUpload.php" enctype="multipart/form-data">
Admin Upload Picture & Description! <br>
<textarea type="text" name="description" > </textarea> <br />
<input id ="greenBtn" type="file" name="imageToUpload" value="Picture" /> <br>
<input id="greenBtn" type="submit"  value="Upload"><br><br>
</form>
<br>

<form id="remove" action="../partials/handleRemove.php" method="GET">
    Choose description id to remove the admin post! <br/>
    <input type="number" name="id"> <br/>
    <input id ="greenBtn" type="submit" value="Remove entry"><br><br>
</form>
<br>
<form id="edit" action="../partials/handleEdit.php" method="GET">
    Choose description id and write new description to update the admin description! <br/>
    <input type="number" name="id"> <br/>
    New message:<br><input type="text" name="newDescription">
    <br><input id="greenBtn" type="submit" value="Edit entry">
</form>


                 <!-- /////// PHP FOR DISPLAYING USER COMMENTS INTO WEBSITE. -->

<?php

include("db.php");

echo "<h2> Posts from mainpage! </h2>";

$stm = $pdo->query("SELECT id, title, description, image, category, date, username FROM posts");


while ($row = $stm->fetch()) {
    echo $row['id'] . ": " . "Username --> " . $row['username'] . " Description ---> " . $row['description'] . " IMAGE NAME ---> " .  $row['image'] . "<br />";
} 
?>

</div>

</body>
</html>