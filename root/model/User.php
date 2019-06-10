<?php

class User{

  public function getAllUsers($dbcon){
    $sql = "SELECT * FROM users";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		$users = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $users;
  }

  public function updateUser($id, $user_type, $db){
    $sql = "UPDATE users
            SET user_type = :user_type
            WHERE id = :id";

    $pst = $db->prepare($sql);
    
    $pst->bindParam(':user_type', $user_type);
    $pst->bindParam(':id', $id);

    $count = $pst->execute();
    return $count;
  }
}
?>