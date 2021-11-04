<?php 
/* Reset your password form, sends reset.php password link */
require "./../config/database.php";
require "./../model/db.php";
require "./../model/user.php";
session_start();
$user=new User;
// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $_POST['email'];
    $result = $user->getUserForEmail($email);

    if ( sizeof($result) > 0  ) // User doesn't exist
    { 
      header("location: reset.php?email=".$email);
    }
    else {
      $_SESSION['message'] = "User with that email doesn't exist!";
      header("location: error.php");
     
  }
}
?>