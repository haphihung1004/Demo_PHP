<?php

/* Main page with two forms: sign up and log in */
require "./../config/database.php";
require "./../model/db.php";
require "./../model/user.php";

$user=new User;

// Escape all $_POST variables to protect against SQL injections
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
//$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password =$_POST['password'];

$access="user";

$target_dir = "./../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["access_img"]["name"]);
if (move_uploaded_file($_FILES["access_img"]["tmp_name"], $target_file)) 
{
    echo "The file ". basename( $_FILES["access_img"]["name"]). " has been uploaded.";
} 
else 
{
    echo "Sorry, there was an error uploading your file.";
}
$access_img=$_FILES["access_img"]["name"];
var_dump($access_img);
// Check if user with that email already exists
$result = $user->getUserForEmail($email);

// We know user email exists if the rows returned are more than 0
if ( !isset($result) ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $addUser=$user->upUser($first_name,$last_name,$email,$password,$access,$access_img );
   
    // Add user to the database
    if ( !isset($addUser) ){

        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
    else {
        $_SESSION['logged_in'] = true; 
        header("location: profile.php"); 
    }

}