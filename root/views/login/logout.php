<?php
include('../../Database.php');
$session_id='';
$_SESSION['id']=''; 
if(empty($session_id) && empty($_SESSION['id']))
{
$url='../index.php';
header("Location: $url");
//echo "<script>window.location='$url'</script>";
}
?>