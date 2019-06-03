<?php 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
require_once '../../views/admin-header.php'; 

$db = Database::getDb();
$f = new Finance();
$finance_news = $f->getAllArticle($db);

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
       <div class="table-wrapper">
			<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 4.5%">Id</th>
                        <th style="width: 12.5%">Title</th>						
						<th style="width: 7.5%" >Category</th>
						<th style="width: 5.5%">Author</th>
						<th style="width: 30%" colspan="2">Content</th>
                        <th style="width: 5.5%">Date</th>
						<th style="width: 5.5%">Image</th>
						<th style="width: 5.5%">Image Title</th>
                    </tr>
                </thead>
                <tbody>
	
					 
						<?php
						foreach ($finance_news as $finance) 
						  {
							 echo "<tr>" .
							"<td>" . $finance->id . "</td>" .
							"<td>" . $finance->title . "</td>" .
							"<td>" . $finance->category . "</td>" .
							"<td>" . $finance->author . "</td>" .
							"<td colspan=\"2\">" . $finance->content . "</td>" .
							"<td>" . $finance->date . "</td>" .
							"<td>" . $finance->image . "</td>" .
							"<td>" . $finance->image_title . "</td>" .
							
							 "<td>" .
						    "<form action='detailsFinance.php' method='post'>" . 
							"<input type='hidden' value='$finance->id' name='id' />" . 
							"<input type='submit' value='Details' name='details' />" .
							"</form>" .
							"</td>" .
		                    "<td>" .
						    "<form action='update_article.php' method='post'>" . 
							"<input type='hidden' value='$finance->id' name='id' />" . 
							"<input type='submit' value='Update' name='update' />" .
							"</form>" .
							"</td>" .
							"<td>".
							"<form action='delete.php' method='post'>" .
							"<input type='hidden' value='$finance->id' name='id' />".
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
			