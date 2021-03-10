              <!-- /////// PHP FOR HANDLING COMMENTS INTO "BLOGPOSTS"  -->
<?php

session_start();
include("../views/db.php");



$username = $_SESSION['sess_user_name'];
$description = $_POST['description'];

$sql = "INSERT INTO posts(username, description) VALUES(:username_IN, :description_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':username_IN',$username);
$stm->bindParam(':description_IN',$description);

if($stm->execute()) {
    header("location:../views/loggedin.php");
}
else {
    echo "Something went wrong!";
}

?>
