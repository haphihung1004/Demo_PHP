<?php
require_once './../../../config/database.php';

spl_autoload_register(function ($className) {
    require './../../../model/' . $className . '.php';
});

var_dump($_POST);
$id=$_GET['ID'];
$u =new User;
$getAllUser=$u->getUserById($_POST['comment_user_id']);
$comment_user_name=$getAllUser[0]['last_name'].'_'. $getAllUser[0]['first_name'];


$upLoad= new Comment;
$upLoad->UpdateComments($_POST['productId'],$_POST['commentContent'],$_POST['commentRate'],$_POST['comment_user_id'],$comment_user_name,$id);

header('Location: ./../../view_comments.php');