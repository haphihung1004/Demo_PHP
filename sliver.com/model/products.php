<?php
class Products extends Db
{
//viet phuong thuc lay ra tat ca du lieu products
public function getAllProducts()
 {
    $sql=self::$connection->prepare(" SELECT * FROM products ");
    return $this->select($sql);

 }
//lay ra san pham dua vao id
public function getProductsId($id)
{
    $sql=self::$connection->prepare(" SELECT *FROM products where ID=?");
    $sql->bind_param('i',$id);
    return $this->select($sql);
}
//lay ra san pham dua vao manu
public function getProductsManu_Id($manu)
{
    $sql=self::$connection->prepare(" SELECT *FROM products where manu_ID=?");
    $sql->bind_param('i',$manu);
    return $this->select($sql);
}

//tim kiem theo decription
public function Search($search)
{
    $sql=self::$connection->prepare(" SELECT * FROM products where name like '%$search%'");
    return $this->select($sql);
}
//phan trang
public function dislay($total_Row,$per_page){
   
   $total_Page = ceil($total_Row/$per_page);
   echo "<div style='text-align:center'>";
   for($i=0;$i<$total_Page;$i++)
   {
        echo"<a href='?page=".($i+1)."'>".($i+1)."</a>";
   }
   echo "</div>";
}
public function Trang($page,$per_page)
{
    $start=($page-1)*$per_page;
    $sql=self::$connection->prepare(" SELECT * FROM products WHERE ID LIMIT $start,$per_page ");
    return $this->select($sql);
}
//phan trang tim kiem
public function dislay1($total_Row,$per_page,$search){
   
    $total_Page = ceil($total_Row/$per_page);
    echo "<div style='text-align:center'>";
    for($i=0;$i<$total_Page;$i++)
    {
         echo"<a href='?page=".($i+1)."&key=".$search."'>".($i+1)."</a>";
    }
    echo "</div>";
 }
 public function Trang1($page,$per_page,$search)
 {
     $start=($page-1)*$per_page;
     $sql=self::$connection->prepare(" SELECT * FROM products where name like '%$search%'  LIMIT $start,$per_page ");
     return $this->select($sql);
 }
   // phan trang trong admin
   public function PerPage($page,$per_page)
{
    $start=($page-1)*$per_page;
    $sql=self::$connection->prepare(" SELECT * FROM products,manufactures, protypes 
    WHERE products.manu_ID = manufactures.manu_ID 
    AND   products.type_ID=protypes.type_ID ORDER BY ID  DESC LIMIT $start,$per_page ");
    return $this->select($sql);
}
public function TolTal()
{
    $sql=self::$connection->prepare(" SELECT * FROM products,manufactures, protypes 
    WHERE products.manu_ID = manufactures.manu_ID 
    AND   products.type_ID=protypes.type_ID ");
    return $this->select($sql);
}
  // xoa products
  public function DeleteProducts($Del)
  {
     $sql=self::$connection->prepare("DELETE FROM products Where products.ID=$Del");
     return $sql->execute();
  }
  // them product
 public function IsertProducts($name,$image,$description,$price,$type_ID,$manu_ID )
 {
     $sql = self::$connection->prepare("INSERT INTO products(name, image, description, manu_ID, type_ID, price) VALUES('$name', '$image', '$description', $manu_ID, $type_ID, $price)");  
     return $sql->execute();
 }
 // update product
 public function UpdateProducts($id,$name,$img,$desciption,$manu_ID,$type_ID,$price){
    if($img==NUll){
        $sql = self::$connection->prepare("UPDATE `products` SET `name`='$name',`description`='$desciption',`manu_ID`=$manu_ID,`type_ID`=$type_ID,`price`=$price WHERE ID = $id");
    }
    else{
        $sql = self::$connection->prepare("UPDATE `products` SET `name`='$name',`image`='$img',`description`='$desciption',`manu_ID`=$manu_ID,`type_ID`=$type_ID,`price`=$price WHERE ID = $id");
    }
    return $sql->execute();
}

}