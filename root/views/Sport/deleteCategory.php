<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

if(isset($_POST['Delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Category();
    $count = $c->deleteCategory($id, $dbcon);

    if($count){
        header("Location: category-admin.php");
    }
}
?>
