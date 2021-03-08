               <!-- /////// PHP FOR EDITING COMMENTS INTO "GUESTBOOK ENTRIES!"  -->

<?php 

session_start();
include("../views/db.php");



$idEdit = $_GET['id'];
$newDescription = $_GET['newDescription'];

$stm = $pdo->query("UPDATE posts SET description = '$newDescription' WHERE id=$idEdit");

if($stm->execute()) {
    header("location:../views/loggedin.php");
}

else {
    echo "Something went wrong.";
}

?>