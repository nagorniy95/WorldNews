<?php
//require_once '.php';
require_once '../../model/Database.php';
require_once '../../model/contact.php';
require_once '../../views/admin-header.php';


$dbcon = Database::getDb();
$c = new Contact();
$contacts = $c->getAllContacts($dbcon);
  
?>

<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css" >
	<link rel="stylesheet" href="../../css/sport.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                                        <li ><a href="../../views/sport/sport-admin.php">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php">Economics</a></li>
                                <li><a href="../../views/crypto/crypto-admin.php">Crypto</a></li>
								<li><a href="../../views/contact/messages.php" class="admin-menu-active">Messages</a></li>
                            </ul>
                        </li>
                        <li><a href="../../views/login/logout.php">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="col-md-8">
			<h2 style="margin-left:30px;">MESSAGES</h2>
			<br/>
			<table class="table table-striped table-hover" style="margin-left:30px;" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>						
						<th>Email</th>
						<th>Subject</th>
                        <th>Message</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
	
					 
						<?php
						foreach($contacts as $contact)
						  {
							 echo "<tr>" .
							"<td>" . $contact->id . "</td>" .
							"<td>" . $contact->name . "</td>" .
							"<td>" . $contact->email . "</td>" .
							"<td>" . $contact->subject . "</td>" .
							"<td>" . $contact->message . "</td>" .
							
							
							 "<td>" .
						    "<form action='details.php' method='post'>" . 
							"<input type='hidden' value='$contact->id' name='id' />" . 
							"<input type='submit' value='Details' name='details' />" .
							"</form>" .
							"</td>" .
		                    "<td><a href=\"https://mail.google.com/mail/\" class=\"message\" title=\"Message\"data-toggle=\"tooltip\"><i class=\"fas fa-envelope icon\" style=\"font-size:30px;\"></i></a></td>" .
							"<td>".
							"<form action='delete.php' method='post'>" .
							"<input type='hidden' value='$contact->id' name='id' />".
							"<input type='submit' value='Delete' name='delete' class=\"btn btn-danger\" onclick=\"return confirm('Are you sure to delete?')\" />".
							"</form></td>
							</tr>";
						  }
?>

</tbody>
</table>
</div>   
</div>	
</div>				
</body>

</html>