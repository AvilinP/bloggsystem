               <!-- /////// PHP FOR EDITING COMMENTS INTO "GUESTBOOK ENTRIES!"  -->

<?php 

session_start();
include("../views/db.php");



$idEdit = $_GET['id'];
$newComment = $_GET['newComment'];

$stm = $pdo->query("UPDATE comments SET comment = '$newComment' WHERE id=$idEdit");

if($stm->execute()) {
    header("location:../views/loggedin.php");
}

else {
    echo "Something went wrong.";
}

?>