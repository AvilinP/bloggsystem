<?php
session_start();
include '../db.php';
$postId = $_SESSION['postId'];


$pdo_stm = $pdo->prepare("DELETE from comments where commentID=" . $_GET['id']);
$pdo_stm->execute();
header("location:main.php?id=$postId");

?>