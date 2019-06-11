<?php

class User{

  public function getAllUsers($dbcon){
    $sql = "SELECT * FROM users";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		$users = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $users;
  }

  public function updateUserPrivilage($id, $user_type, $db){
    $sql = "UPDATE users
            SET user_type = :user_type
            WHERE id = :id";

    $pst = $db->prepare($sql);
    
    $pst->bindParam(':user_type', $user_type);
    $pst->bindParam(':id', $id);

    $count = $pst->execute();
    return $count;
  }
  public function deleteUser($id,$db){
		$sql = "DELETE FROM users WHERE id= :id";

		$pst = $db->prepare($sql);

		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;
	}
  public function updateUserInfo($id, $first_name, $last_name, $email, $db){
    $sql = "UPDATE users
            SET first_name = :first_name,
            last_name = :last_name,
            email = :email
            WHERE id = :id";

    $pst = $db->prepare($sql);
    	
		$pst->bindParam(':first_name', $first_name);
		$pst->bindParam(':last_name', $last_name);
    $pst->bindParam(':email', $email);
		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;    
  }
}
?>