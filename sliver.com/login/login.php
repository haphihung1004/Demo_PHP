<?php
/* Main page with two forms: sign up and log in */
require "./../config/database.php";
require "./../model/db.php";
require "./../model/user.php";
session_start();

 $user=new User;
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $_POST['email'];
$result = $user->getUserForEmail($email);

if ( sizeof($result) > 0  ){ // User doesn't exist

    if ( $_POST['password'] == $result[0]['password'] ) {

        $id=$result[0]['id'];
       
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        if(isset($_COOKIE['user_ID']))
            setcookie("user_ID", "", time() - 60,"/");
        
        setcookie("user_ID", $id, time() + 86400,"/");

        if($result[0]['access'] == "admin"){
            header("location: ./../admin/index.php?admin_id=".$id);
        }
        if($result[0]['access'] == "manager"){
            header("location: ./../admin/index.php?manager_id=".$id);
        }
        if($result[0]['access'] == "user")
        {
            header("location:  ./../user/index.php?user_id=".$id);
        }
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
else { // User exists
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
    
}

