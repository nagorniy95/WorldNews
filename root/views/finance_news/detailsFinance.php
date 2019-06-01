<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

session_start();

	//if (isset($_SESSION['id'])){
	
	//$id_user = $_SESSION['id'];
	$db = Database::getDb();
	$id = $_POST['id'];
	$f = new Finance();
	$finance = $f->getArticleById($id,$db);
	



?>

	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<div class="bg-mattBlackLight my-2 p-3">
				
				<h1><?php echo $finance->title; ?></h1>
		        <?php
		       echo  "Category : " . $finance->category . "<br /><br/>";
		       echo  "Author : " . $finance->author . "<br /></br>";
		       echo  "Content: " . $finance->content . "<br /><br/>";   
               echo  "Date: " . $finance->date . "<br /><br/>";  
			   echo  "Image Title: " . $finance->image_title . "<br /><br/>";  
               echo  "Image: " . $finance->image . "<br /><br/>";     			   
                ?> 
				
		<br/>
		<a  class="link" href="financeAdmin.php" >Back to Contact List</a>
		</div>
	</div>
 </div>
</div> 