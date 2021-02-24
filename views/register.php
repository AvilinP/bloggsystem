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

    // Visa meddelande från databasen
    echo "<h2>TEST!</h2><br />";
    $stm = $pdo->query("SELECT id, name, username, password FROM users");?>

    <?php while ($row = $stm->fetch()) { ?>
    <div>
        <?php $row['id']?>
        <?php echo $row['name']?>
        <?php echo $row['username']?>
        <?php echo $row['password']?>
    </div>

    <?php } ?> 


    <!-- FORMS  --> 
    <h2> REGISTER HERE! </h2>
    <form method="POST" action="login.php">
        <input type="text" placeholder="Your name..." name="name"> <br>
        <input type="text" placeholder="Your username..." name="username"> <br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Register" class="register-btn">
    </form>
    
    <!-- 
    <h2> LOG IN MY FRIEND! </h2>
    <form method="POST" action="handleLogin.php">
        <input type="text" placeholder="Your user name..." name="name"> <br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Log in" class="login-btn">
    </form>
    --> 

    

</body>

</html>