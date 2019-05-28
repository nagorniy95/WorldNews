<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "Delete Crypto Article";
session_start();
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';


if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Crypto();
    $count = $c->deleteCrypto($id, $dbcon);
    if($count){
        header("Location: crypto-admin.php");
    }
}