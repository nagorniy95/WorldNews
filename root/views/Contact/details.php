<?php
require_once '../../model/Database.php';
require_once '../../model/contact.php';
require_once '../../views/admin-header.php';

session_start();

//if (isset($_SESSION['id'])){
	
	//$id_us = $_SESSION['id'];
	$db = Database::getDb();
	$id = $_POST['id'];
	$c = new Contact();
	$count = $c->getContactById($id,$db);
	
	//var_dump($contact);



?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Contact Us</title>
</head>
<body>
	   <div class="container-fluid p-0 fill-height">
    <div class="row no-gutters">
        <div class="col-md-2">
             <div class="admin-menu-wrapper">
                    <ul>
                        <li class="bb"><a href="#">Home</a></li>
                        <li class="bb">Pages <span class="admin-right">></span>
                            <ul>
                                <li>Sport <span class="admin-right">></span>
                                    <ul>
                                        <li><a href="../../views/sport/category-admin.php" >Category</a></li>
                                        <li ><a href="sport-admin.php" >News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php">Economics</a></li>
                                <li><a href="../../views/crypto/crypto-admin.php">Crypto</a></li>
								<li><a href="../../views/contact/messages.php" class="admin-menu-active">Messages</a></li>
                            </ul>
                        </li>
                        <li><a href="#../../views/login/logout.php">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
        </div>
        <div style="margin-left:50px;"class="col-md-8">
			
			<br/>
				
				<h2><?php echo $count->name; ?></h2>
		        <?php
		        echo  "Email : " . $count->email . "<br /><br/>";
		       echo  "Subject : " . $count->subject . "<br /></br>";
		       echo  "Message: " . $count->message . "<br /><br/>";     
                ?> 
				<br/>
			<a href="https://mail.google.com/mail/" class="message" title="Message" data-toggle="tooltip"><i class="fas fa-envelope"></i></a>
        <br/>
		<br/>
		<p><a style="color: #C33636;font-size:18px;" href="../../views/finance_news/FinanceAdmin.php">Back to List</a></p>
		</div>
	</div>
 </div>

</body>
</html>

