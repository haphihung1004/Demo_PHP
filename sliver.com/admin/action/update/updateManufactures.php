<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});

var_dump($_POST);
$id=$_GET['ID'];
$name=$_POST['name'];
$target_dir = "./../../../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
$fileUpload=$_FILES['fileUpload']['name'];
//echo $description;
$products = new Manufactures;
$addProducts=$products->UpdateManufactures($name,$fileUpload,$id);
header('Location: ./../../view_manufactures.php');