<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});
$pro = new Protypes();
if(isset($_GET['delete']))
{
    $pro->DeleteProtypes($_GET['delete']);
}
header('Location:./../../view_protypes.php');
?>
