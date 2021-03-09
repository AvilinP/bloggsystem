<?php

include("../views/db.php");
session_start();


 $stm = $pdo->prepare("INSERT INTO comments (id, comment, username) VALUES(:id_IN, :comment_IN, :username_IN)");

$stm->bindParam(":id_IN", $_GET['id']);
$stm->bindParam(":comment_IN", $_POST['comment']);
$stm->bindParam(":user_IN", $_SESSION['sess_user_name']);

if($stm->execute()) {
    header("location:main.php");

} 

?>