<?php 
require_once '../../model/Database.php';
require_once '../../model/Sport.php';

if(isset($_POST['deleteSport'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Sport();
    $count = $c->deleteSport($id, $dbcon);

    if($count){
        header("Location: sport-admin.php");
    }
}
?>