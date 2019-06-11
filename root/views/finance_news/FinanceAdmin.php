<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../login/login.php");
}
else if( $_SESSION["user_type"] == "user") {
?>
  <script type="text/javascript">
  alert(" You are not authorized to   access this page");
  window.location.href="../login/welcome.php";
</script>
<?php
}
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
	<link rel="stylesheet" href="../../css/style.css" >
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
                                        <li ><a href="../../views/sport/sport-admin.php" >News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php"class="admin-menu-active">Economics</a></li>
                                <li><a href="../../views/crypto/">Crypto</a></li>
								<li><a href="../../views/contact/messages.php">Messages</a></li>
                            </ul>
                        </li>
                        <li><a href="../../views/login/logout.php">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="col-md-8">
            <div class="form-wrapper">
            <h1 class="admin-form-title">ECONOMIC NEWS</h1>
           <br/>
		   <h3><a href="../../views/finance_news/add_article.php" style="color:#C33636;">Create New Article</a></h3>
			<table class="table table-striped table-hover "style="font-size:11px;">
                <thead>
                    <tr>
                        <th style="width: 4.5%">Id</th>
                        <th style="width: 12.5%">Title</th>						
						<th style="width: 7.5%">Category</th>
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
		</div>
		   
	
</body>
</html>
		


