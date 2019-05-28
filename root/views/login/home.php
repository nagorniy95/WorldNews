<?php
include('Database.php');
include('session.php');
$userDetails=$userClass->userDetails($session_id);
?>
<h1>Welcome <?php echo $userDetails->first_name; ?> <?php echo $userDetails->lastt_name; ?></h1>

<h4><a href="logout.php">Logout</a></h4>