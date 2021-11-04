<?php
class Manufactures extends Db
{
//viet phuong thuc lay ra tat ca du lieu products
public function getAllManufactures()
 {
    $sql=self::$connection->prepare(" SELECT * FROM manufactures ");
    return $this->select($sql);

 }

 public function getManufacturesId($id)
{
    $sql=self::$connection->prepare(" SELECT *FROM manufactures where manu_ID=?");
    $sql->bind_param('i',$id);
    return $this->select($sql);
}
// xoa Manufactures
public function DeleteManufactures($Del)
{
   $sql=self::$connection->prepare("DELETE FROM manufactures Where manu_ID=$Del");
   return $sql->execute();
}
public function InsertManufactures($manu_name,$images )
{
    $sql = self::$connection->prepare("INSERT INTO  manufactures(manu_name,manu_img) VALUES('$manu_name','$images')");  
    return $sql->execute();
}
public function UpdateManufactures($manu_name,$images,$manu_ID )
{
    if($images==NUll){
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`='$manu_name' WHERE manu_ID=$manu_ID");
    }
    else{
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`='$manu_name',`manu_img`='$images' WHERE manu_ID=$manu_ID");
    }
    return $sql->execute();
   
}
}