                   <!-- /////// PHP FOR REMOVING COMMENTS BY ID INTO WEBSITE. -->

<?php 
session_start();
include("../views/db.php");


$idRemove = $_GET['id'];
$stm = $pdo->query("DELETE FROM posts WHERE id=$idRemove");

if($stm->execute()) {
    header("location:../views/loggedin.php");
}
else {
    echo "Det gick fel!";
}
?>