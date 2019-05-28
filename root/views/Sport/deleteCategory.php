<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

if(isset($_POST['deleteCategory'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Category();
    $count = $c->deleteCategory($id, $dbcon);

    if($count){
        header("Location: index-admin.php");
    }
}
?>
