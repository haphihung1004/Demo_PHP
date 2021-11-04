
<?php
class User extends Db
{
//viet phuong thuc lay ra tat ca du lieu user
public function getAllUser()
 {
    $sql=self::$connection->prepare(" SELECT * FROM users ");
    return $this->select($sql);

 }
 
// lay du lieu theo email
public function getUserForEmail($email)
 {
    $sql=self::$connection->prepare(" SELECT * FROM users where email='$email'");
    return $this->select($sql);

 }
// lay du lieu theo id
public function getUserById($id)
 {
    $sql=self::$connection->prepare(" SELECT * FROM users where id=?");
    $sql->bind_param('i',$id);
    return $this->select($sql);

 }
 // Them account
 public function upUser($first_name,$last_name,$email,$password,$access,$access_img)
{
    $sql = self::$connection->prepare("INSERT INTO users (first_name, last_name, email, password,access,access_img) " 
    . "VALUES ('$first_name','$last_name','$email','$password','$access','$access_img')");  
    return $sql->execute();
}
// update pass theo email
public function updatePassUser($new_password,$email)
{
    $sql = self::$connection->prepare("UPDATE users SET password='$new_password' WHERE email='$email'");  
    return $sql->execute();
}
//update user
public function updateUser($first_name,$last_name,$email,$password,$access,$access_img,$id)
{
   if($access_img==NULL){
      $sql = self::$connection->prepare("UPDATE `users` SET `first_name`='$first_name',
            `last_name`='$last_name', `email`='$email' ,`password`='$password',
            `access`='$access'   WHERE id=?");
  }
  else{
   $sql = self::$connection->prepare("UPDATE `users` SET `first_name`='$first_name',
            `last_name`='$last_name', `email`='$email' ,`password`='$password',
            `access`='$access',`access_img`='$access_img'   WHERE id=?");
  }
  $sql->bind_param('i',$id);
  return $sql->execute();
}
}
?>