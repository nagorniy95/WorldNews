<?php
require_once '../../model/Database.php';
require_once '../../model/contact.php';



	if (isset($_POST['delete'])){
	$id = $_POST['id'];
	$dbcon = Database::getDb();
    $c = new Contact();
    $count = $c->deleteContact($id, $dbcon);
    if($count){
        header("Location: messages.php");
    }
}
	
	
	



