<?php
include("../views/db.php");
session_start();

$upload_dir = "../uploads/";
$target_file = $upload_dir . basename($_FILES['imageToUpload']['name']);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


$username = $_SESSION['sess_user_name'];
$description = $_POST['description'];




if(isset($_POST['submit'])) {

    $check = getimagesize($_FILES['imageToUpload']['tmp_name']);

    if($check == false) {
        echo "The file is not an image!";
        die;
    }

}

if(file_exists($target_file)) {
    echo "The file already exists!";
    die;

}

if($_FILES['imageToUpload']['size']> 1000000) {
    echo "File is too big, please select a supported under 1MB..";
    die;
}

if($fileType != "png" && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg") {
    echo "Filetype not supported";
    die;
}

if(move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file)) {

    $sql = "INSERT INTO posts(username, description, image) VALUES(:username_IN, :description_IN, :image_IN)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username_IN',$username);
    $stmt->bindParam(':description_IN',$description);
    $stmt->bindParam(':image_IN',$target_file );
    
        if($stmt->execute()) {

        
        echo "Uploaded sucessfully!<br>"; 
        echo "Go to <a href='../main.php'>Mainpage<a/><br>";
        echo "Or upload <a href='../views/loggedin.php'>Another one?<a/>";
    }

    else{
        echo "Error";
    }

} 

else{
    echo "Error";
}

?>