<?php
require_once '../../model/Database.php';
require_once '../../model/contact.php';


if (isset($_GET['id'])){
	
	$id = $_GET['id'];
	$dbcon = Database::getDb();
	
	$c = new Contact();
	$count = $c->getContactById($id,$dbcon);
	
	//var_dump($contact);
}


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/finance.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Contact Us</title>
</head>
<body>
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<div class="bg-mattBlackLight my-2 p-3">
				
				<h1><?php echo $count->name; ?></h1>
		        <?php
		        echo  "Email : " . $count->email . "<br /><br/>";
		       echo  "Subject : " . $count->subject . "<br /></br>";
		       echo  "Message: " . $count->message . "<br /><br/>";     
                ?> 
				<br/>
			<a href="https://mail.google.com/mail/" class="message" title="Message" data-toggle="tooltip"><i class="fas fa-envelope"></i></a>
        <br/>
		<br/>
		<a  class="link" href="messages.php" >Back to Contact List</a>
		</div>
	</div>
 </div>
</div> 
</body>
</html>

