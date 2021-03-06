<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body id="register-body">




<?php

// Connection to db
include("db.php");


if(isset($_POST['register'])) { 
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = "95uygajk/&&%%1415043343agaeehlrieieiengvn##";
    $password = md5($password.$salt);

}

// Verify required input fields when register
if(empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["password"] )){

    // Error message on register.php 
    echo '<p class="register-form-p"> All fields are required to register! </p> </ br>';
    
    // If all inputs are filled, else checks username before register in db    
    } else {

        $username = $_POST['username'];

        $stmt = $pdo->prepare("SELECT username FROM users WHERE username=:username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->rowCount();

            if($count > 0){
                echo '<p class="register-form-p">Username already taken </p> </ br>';

            // If everything is ok, the new user is registered into db    
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

    <div id="register-form">
    
        <h2 class="register-form-h2"> REGISTER HERE! </h2>
        <form method="POST" action="register.php" class="register-form-inputs">
            Name:<br>
            <input type="text" placeholder="Your name..." name="name"> <br>
            Username:<br>
            <input type="text" placeholder="Your username..." name="username"> <br>
            Password:<br>
            <input type="password" placeholder="Your password..." name="password"> <br>
            <input type="submit" value="Register" name="register" class="register-btn"> <br>
            </form>

            <p> Already registered? click here! <input type ="button" value="Login" name="login" class="loginbtn" onclick="location.href='login.php';"> <p>
 

    </div>


</body>

</html>