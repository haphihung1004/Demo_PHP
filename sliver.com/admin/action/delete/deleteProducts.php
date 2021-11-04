<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});

$pro = new Products();
if(isset($_GET['delete']))
{
    $pro->DeleteProducts($_GET['delete']);
}
header('Location: ./../../index.php');
?>