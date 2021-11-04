<?php
class Protypes extends Db
{
//viet phuong thuc lay ra tat ca du lieu products
public function getAllProtypes()
 {
    $sql=self::$connection->prepare(" SELECT * FROM protypes ");
    return $this->select($sql);

 }
 public function getProtypesId($id)
{
    $sql=self::$connection->prepare(" SELECT *FROM protypes where type_ID=?");
    $sql->bind_param('i',$id);
    return $this->select($sql);
}

 // xoa Protypes
 public function DeleteProtypes($Del)
 {
    $sql=self::$connection->prepare("DELETE FROM protypes Where type_ID=$Del");
    return $sql->execute();
 }
 public function InsertProtypes($type_name,$images )
{
    $sql = self::$connection->prepare("INSERT INTO  protypes(type_name,type_img) VALUES('$type_name','$images')");  
    return $sql->execute();
}
public function UpdateProtypes($name,$img,$type_ID){
    if($img==NULL){
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`='$name'WHERE type_ID=$type_ID");
    }
    else{
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`='$name',`type_img`='$img' WHERE type_ID=$type_ID");
    }
    return $sql->execute();
}

}