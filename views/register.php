<?php
session_start();

include("db.php");

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- FORMS  --> 
    <h2> REGISTER HERE! </h2>
    <form method="POST" action="register.php" >
        <input type="text" placeholder="Your name..." name="name"> <br>
        <input type="text" placeholder="Your username..." name="username"> <br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Register" name="register" class="register-btn"> <br>
        <div id="iderror" style="color:red;"><?php echo $msg; ?></div> <br>
        <p> Already registered? click here! <input type ="button" value="Login" name="login" class="loginbtn" onclick="location.href='login.php';"> <p>
    </form>
    
</body>

</html>