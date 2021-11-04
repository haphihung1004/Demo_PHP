<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});
$target_dir = "./../../../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["access_img"]["name"]);
var_dump($_FILES['access_img']);
if (move_uploaded_file($_FILES["access_img"]["tmp_name"], $target_file)) 
{
    echo "The file ". basename( $_FILES["access_img"]["name"]). " has been uploaded.";
} 
else 
{
    echo "Sorry, there was an error uploading your file.";
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password =$_POST['password'];
$access=$_POST['access'];
$access_img=$_FILES["access_img"]["name"];

    $upLoad= new User();
    $addUser=$upLoad->upUser($first_name,$last_name,$email,$password,$access,$access_img );
    header('Location:./../../view_user.php');
?>
