<?php 

    include("../views/db.php");
    session_start();

    $deleteID = $_GET['id'];

    $stm = $pdo->prepare("DELETE FROM comments WHERE id=$deleteID");


    if($stm->execute()) {
        header("location: ../main.php");
    }


?>