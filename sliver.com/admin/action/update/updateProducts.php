<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});

var_dump($_POST);
$id=$_GET['id'];
$name=$_POST['name'];
$description=$_POST['Description'];
$type_ID=$_POST['type_ID'];
$manu_ID=$_POST['manu_ID'];
$price = $_POST['price'];
$target_dir = "./../../../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$fileUpload=$_FILES['fileToUpload']['name'];

//echo $description;
$products = new Products;
$addProducts=$products->UpdateProducts($id,$name,$fileUpload,$description,$manu_ID,$type_ID,$price);
header('Location: ./../../index.php');