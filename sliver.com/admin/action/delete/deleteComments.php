<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});
$pro = new Comment();
if(isset($_GET['delete']))
{
    $pro->DeleteComments($_GET['delete']);
}
header('Location: ./../../view_comments.php');
?>