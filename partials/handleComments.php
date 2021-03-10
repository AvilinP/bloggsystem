<?php 

include("../views/db.php");
session_start();

$stm = $pdo->prepare("INSERT INTO comments (img_id, comment, username) VALUES(:img_id_IN, :comment_IN, :username_IN)"); 

$stm->bindParam(":img_id_IN", $_GET['id']);
$stm->bindParam(":comment_IN", $_POST['comment']);
$stm->bindParam(":username_IN", $_SESSION['sess_user_name']);

if($stm->execute()) {
    header("location: ../main.php");
}

?>