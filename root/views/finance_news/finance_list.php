<?php 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

$db = Database::getDb();
$f = new Finance();
$finance_news = $f->getAllArticle($db);

?>
 
 <div class="content">
    <div class="container">
       <div class="table-wrapper">
            <div class="panel-body">
			<h2>Financial News</h2>
			</div>
			<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>						
						<th>Category</th>
						<th>Author</th>
						<th>Content</th>
                        <th>Date</th>
						<th>Image</th>
						<th>Image Title</th>
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
							"<td>" . $finance->content . "</td>" .
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