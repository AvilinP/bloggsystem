<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php

    // Koppling till databas
    $dsn = "mysql:host=localhost;dbname=database";
    $user = "root";
    $password = "";
    $pdo = new PDO($dsn, $user, $password);

   ?> 


    <!-- FORMS  --> 
    <h2> REGISTER HERE! </h2>
    <form method="POST" action="handleRegister.php">
        <input type="text" placeholder="Your name..." name="name"> <br>
        <input type="text" placeholder="Your username..." name="username"> <br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Register" class="register-btn">
    </form>
    
</body>

</html>