<?php

require_once '../../model/Database.php';
require_once '../../model/User.php';

	if(isset($_POST['id'])){
		$id= $_POST['id'];
		$db = Database::getDb();

		$u = new User();
    $count = $u->deleteUser($id,$db);
		if($count){
			header('Location: login-admin.php');
		}
		else{
			echo "There is a problem on deleting this blog";
		}
	}
?>