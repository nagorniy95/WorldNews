<?php 
session_start();
require_once '../../model/Database.php'; 
$dbcon = Database::getDb();

$username = $_SESSION["username"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

if(isset($_POST["change"])) {

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$sql = "UPDATE users SET image = '".$_FILES['fileToUpload']['name']."' WHERE username = '" . $username . "'";

$check = $dbcon->query($sql);

$url = 'welcome.php';
header("Location: $url");
}
?>