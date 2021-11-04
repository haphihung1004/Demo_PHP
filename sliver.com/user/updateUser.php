<?php
require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});
$id=$_GET['id'];


$target_dir = "./../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["access_img"]["name"]);
move_uploaded_file($_FILES["access_img"]["tmp_name"], $target_file);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password =$_POST['password'];
$access=$_POST['access'];
$access_img=$_FILES["access_img"]["name"];

    $upLoad= new User();
    $updateUser=$upLoad->updateUser($first_name,$last_name,$email,$password,$access,$access_img,$id);
    header('Location:addcart.php');
?>
