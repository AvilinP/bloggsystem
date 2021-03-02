<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and register</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<?php

$dsn = "mysql:host=localhost;dbname=database";
$user = "root";
$password = "";

$pdo = new PDO($dsn, $user, $password); 

print_r($_POST);

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$salt = "naljeyueybhjgd998175698(&%())gasifauishfuia";
$password = md5($password.$salt);

die();

$sql = "INSERT INTO users (name, username, password) VALUES(:name_IN, :username_IN, :password_IN) ";
$stm = $pdo->prepare($sql);
$stm->bindParam(':name_IN', $name);
$stm->bindParam(':username_IN', $username);
$stm->bindParam(':password_IN', $password);

if($stm->execute()) {
   header("location:login.php");
} else {
    echo "Något gick fel!";
}



?>


 
</body>

</html>