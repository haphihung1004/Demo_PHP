<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});
$target_dir = "./../../../assets/public_user/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
var_dump($_FILES['fileToUpload']);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
{
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} 
else 
{
    echo "Sorry, there was an error uploading your file.";
}
    $upLoad= new Products();
        $upLoad->IsertProducts($_POST['name'],$_FILES["fileToUpload"]["name"],$_POST['description'],$_POST['price'],$_POST['type_ID'],$_POST['manu_ID']);
    header('Location: ./../../index.php');
?>
