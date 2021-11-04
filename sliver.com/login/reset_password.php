<?php
/* Password reset process, updates database with new user password */
require "./../config/database.php";
require "./../model/db.php";
require "./../model/user.php";

$user=new User;
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

       // $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
    
       $new_password = $_POST['newpassword'];
        $email = $_POST['email'];
     
        
        $result = $user->updatePassUser($new_password,$email );

        if ( sizeof($result) >0 ) {

            $_SESSION['message'] = "Your password has been reset successfully!";
            header("location: success.php");    

        }
        else{
            $_SESSION['message'] = "Update Error , Try again!";
            header("location: error.php"); 
        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: error.php");    
    }

}
?>