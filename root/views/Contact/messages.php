<?php
//require_once '.php';
require_once '../../model/Database.php';
require_once '../../model/contact.php';

$dbcon = Database::getDb();
$c = new Contact();
$contacts = $c->getAllContacts($dbcon);
  
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
</head>
<body>
<div class="content">
	
    <div class="container">
       <div class="row">
            <div class="col-sm-8">
			<h2>Messages</h2>
			</div>
			<table class="table table-striped table-hover">
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
							
							
							"<td><a href=\"details.php?id=$contact->id\" class=\"details\" title=\"Details\" data-toggle=\"tooltip\"><i class=\"fas fa-info\"></i></a></td>" .
							"<td><a href=\"https://mail.google.com/mail/\" class=\"message\" title=\"Message\"data-toggle=\"tooltip\"><i class=\"fas fa-envelope icon\"></i></a></td>" .
							
							
							"<td><form action='delete.php' method='post'>" .
							"<input type='hidden' value='$contact->id' name='id' />".
							"<input type='submit' value='Delete' name='delete' />".
							"</form></td>
							</tr>";
						  }
?>

</tbody>
</table>
</div>
    </div>     
	
				
</body>

</html>