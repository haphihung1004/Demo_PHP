<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});
$pro = new Manufactures();
if(isset($_GET['delete']))
{
    $pro->DeleteManufactures($_GET['delete']);
}
header('Location: ./../../view_manufactures.php');
?>