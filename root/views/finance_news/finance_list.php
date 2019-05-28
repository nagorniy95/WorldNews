<?php 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
$dbcon = Database::getDb();
$f = new Finance();
$finance_news = $f->getAllArticle($dbcon);

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
							"<td>" . $finance->fin_date . "</td>" .
							"<td>" . $finance->image . "</td>" .
							
							 "<td>" .
						    "<form action='detailsFinance.php' method='post'>" . 
							"<input type='hidden' value='$finance->id' name='id' />" . 
							"<input type='submit' value='Details' name='details' />" .
							"</form>" .
							"</td>" .
		                    "<td>" .
						    "<form action='updateFinance.php' method='post'>" . 
							"<input type='hidden' value='$finance->id' name='id' />" . 
							"<input type='submit' value='Update' name='update' />" .
							"</form>" .
							"</td>" .
							"<td>".
							"<form action='delete.php' method='post'>" .
							"<input type='hidden' value='$finance->id' name='id' />".
							"<input type='submit' value='Delete' name='delete' />".
							"</form></td>
						</tr>";
						  }
?>

</tbody>
</table>

            
			
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <!--<li class="page-item "><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>-->
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
		
    </div>     
			</div>