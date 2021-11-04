<?php
class Comment extends Db
{
    //Lấy comment theo product id
    public function getCommentById($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM comments WHERE id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    public function getCommentByProductId($productId)
    {
        $sql = parent::$connection->prepare('SELECT * FROM comments WHERE product_id=?');
        $sql->bind_param('i', $productId);
        return parent::select($sql);
    }
    public function getCommentID($productId)
   {
        $sql=self::$connection->prepare(" SELECT * FROM users,comments
        WHERE users.id = comments.comment_user_id 
        AND    comments.product_id=?");
         $sql->bind_param('i', $productId);
        return $this->select($sql);
    }
    // Lấy tất cả Comment
    public function getAllComment()
    {
        $sql = parent::$connection->prepare('SELECT * FROM comments ');
        return parent::select($sql);
    }

    //Thêm comment
    public function addComment($productId, $commentContent, $commentRate,$comment_user_id,$comment_user_name)
    {
        $sql = parent::$connection->prepare("INSERT INTO comments (product_id, comment_content, comment_rate,comment_user_id,comment_user_name) 
        VALUES('$productId', '$commentContent', '$commentRate','$comment_user_id','$comment_user_name')");
        return $sql->execute();
    }
    public function DeleteComments($Del)
    {
       $sql=self::$connection->prepare("DELETE FROM comments Where id=$Del");
       return $sql->execute();
    }
  
   // update product
   public function UpdateComments($productId, $commentContent, $commentRate,$comment_user_id,$comment_user_name,$id)
   {
     
     $sql = self::$connection->prepare("UPDATE comments SET product_id='$productId',comment_content='$commentContent',
     comment_rate='$commentRate',comment_user_id='$comment_user_id',comment_user_name='$comment_user_name' WHERE id ='$id' ");
      return $sql->execute();
  }
}
