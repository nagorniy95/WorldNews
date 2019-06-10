<?php
/*
include('../../Database.php');
$session_id='';
$_SESSION['id']=''; 
if(empty($session_id) && empty($_SESSION['id']))
{
$url='index.php';
header("Location: $url");
//echo "<script>window.location='$url'</script>";
}
*/
?>

<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

session_unset();

$url = '../index.php';
header("Location: $url");
?>