<?php 

$dsn = "mysql:host=localhost;dbname=database";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8mb4', 'root', '');

?>