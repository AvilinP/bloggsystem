<?php 

include("../views/db.php");
session_start();

$idRemove = $_GET['id'];

$stm = $pdo->prepare("DELETE FROM comments WHERE img_id=$idRemove");


if($stm->execute()) {
    header("location: ../main.php");
}

?>