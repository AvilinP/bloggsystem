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
<?php

// Connection to db
include("db.php");


if(isset($_POST['register'])) { 
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
}

// Verify required input fields when register
if(empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["password"] )){

    // Error message on register.php 
    echo "All fields are required to register! </ br>";
    
    // If all inputs are filled, else checks username before register in db    
    } else {

        $username = $_POST['username'];

        $stmt = $pdo->prepare("SELECT username FROM users WHERE username=:username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->rowCount();

            if($count > 0){
                echo "Username already taken";

            // If everything is ok, the new user i registered into db    
            } else {

                $sql = "INSERT INTO users (name, username, password) VALUES(:name_IN, :username_IN, :password_IN) ";
                $stm = $pdo->prepare($sql);
                $stm->bindParam(':name_IN', $name);
                $stm->bindParam(':username_IN', $username);
                $stm->bindParam(':password_IN', $password);

                    if($stm->execute()) {
                        header("location:login.php");
                    }
                }   
        }
        

?>


    <!-- FORMS  --> 
    <h2> REGISTER HERE! </h2>
    <form method="POST" action="register.php" >
        <input type="text" placeholder="Your name..." name="name"> <br>
        <input type="text" placeholder="Your username..." name="username"> <br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Register" name="register" class="register-btn"> <br>
        <p> Already registered? click here! <input type ="button" value="Login" name="login" class="loginbtn" onclick="location.href='login.php';"> <p>
    </form>
    
</body>

</html>