<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php

session_start();
// it will redirect to login page if we dont have the login or register information in a session.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../views/login.php");
    exit;
}

$page_title = "Delete Crypto Article";
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