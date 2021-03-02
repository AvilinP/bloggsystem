  <?php

    // Koppling till databas
    session_start();
     include("db.php");


    $msg ="";
    if(isset($_POST['loginBtn'])){
    $username= trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username != "" & $password != "" ){
        try {
            $query = "SELECT * FROM `users` where `username` =:username_IN and `password`=:password_IN";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username_IN', $username);
            $stmt->bindValue('password_IN', $password);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch();

            
                if($count == 1 && !empty($row)) {
                    $_SESSION['sess_user_id'] = $row['id'];
                    $_SESSION['sess_user_name'] = $row['username'];
                    $_SESSION['sess_name'] = $row['name'];
                    header("location:loggedin.php");
                }
                else {
                   echo $msg = "Invalid username or password!";
                }
    }
        catch(PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
       
    }
    else {
       echo $msg = "Both fields are required!";
    }
}
?>

    <!-- FORMS  --> 

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


    <form name="User" method="POST" action="login.php" align="center">
    <h2> LOG IN HERE! </h2>
        Username:<br>
        <input type="text" placeholder="Your username..." name="username"> <br>
        Password:<br>
        <input type="password" placeholder="Your password..." name="password"> <br>
        <input type="submit" value="Login" name="loginBtn" >
        <div id="iderror" style="color:red;"><?php echo $msg; ?></div> <br>
    </form>
    
</body>

</html>