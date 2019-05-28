<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

if (isset($_GET['id'])){
	
	$id = $_GET['id'];
	$dbcon = Database::getDb();
	
	$fin = new Finance();
	$count = $fin->getFinanceById($id,$dbcon);
	
	
}



?>

	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<div class="bg-mattBlackLight my-2 p-3">
				
				<h1><?php echo $count->title; ?></h1>
		        <?php
		        echo  "category : " . $count->category . "<br /><br/>";
		       echo  "author : " . $count->author . "<br /></br>";
		       echo  "content: " . $count->content . "<br /><br/>";   
               echo  "fin_date: " . $count->fin_date . "<br /><br/>"; 
               echo  "image: " . $count->image . "<br /><br/>";     			   
                ?> 
				
		<br/>
		<a  class="link" href="financeAdmin.php" >Back to Contact List</a>
		</div>
	</div>
 </div>
</div> 