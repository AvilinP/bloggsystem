<?php
$dsn = "mysql:host=localhost;dbname=database";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];


    $sql = "INSERT INTO users(username, password,name) VALUES(:username_IN, :password_IN, :name_IN)";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':username_IN',$username);
    $stm->bindParam(':password_IN',$password);
    $stm->bindParam(':name_IN',$name);

    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
     
        $stmt = $pdo->prepare("SELECT username FROM users WHERE username=:username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->fetchColumn();
     
        if($count > 0){
            $msg ="Användarnamnet är redan taget, välj ett annat..";
        }
     
        else if($stm->execute()) {
            header("location:login.php");
        }
      
     }





?>