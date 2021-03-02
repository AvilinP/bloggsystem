              <!-- /////// PHP FOR HANDLING COMMENTS INTO "GUESTBOOK ENTRIES!"  -->

<?php 
session_start();
include("../views/db.php");



$username = $_SESSION['sess_user_name'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments(username, comment) VALUES(:username_IN, :comment_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':username_IN',$username);
$stm->bindParam(':comment_IN',$comment);

if($stm->execute()) {
    header("location:../views/loggedin.php");
}
else {
    echo "Det gick fel!";
}

?>