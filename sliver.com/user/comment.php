<?php

require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});
$input = json_decode(file_get_contents('php://input'), true);


$u =new User;
if(isset($_COOKIE['user_ID'])){
    
    $getAllUser=$u->getUserById($_COOKIE['user_ID']);
    $comment_user_name= $getAllUser[0]['last_name'].'_'.$getAllUser[0]['first_name'];
}

$productId = $input['productId'];
$comment_user_id = $_COOKIE['user_ID'];

$commentContent = $input['commentContent'];
$commentRate = $input['commentRate'];
$firstTime = $input['firstTime'];

$commentModel = new Comment;
if (!$firstTime) {
    $result = $commentModel->addComment($productId, $commentContent, $commentRate,$comment_user_id,$comment_user_name);
}
$items = $commentModel->getCommentID($productId);
echo json_encode($items);

