<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';
require_once '../../model/Sport.php';

$dbcon = Database::getDb();
$s = new Sport();
$c = new Category();
$category = $c->getAllCategories($dbcon);
if(isset($_GET['id'])){
	$category = $_GET['id'];
	$sport  = $s->getAllSportByCategory($dbcon, $category);
}





include dirname( __FILE__) . "../../header.php";
 ?>
 <!-- body -->
<style>
	.img-responsive{
		display: block;
		width: 100%;
		height: auto;
	}
	.thumbnail-text{
		height: 45px;
		overflow: hidden;
	}
</style>
 <div class="container">
 	<div class="row">
 		<?php 
 		foreach ($sport as $sport) {
 			echo "<div class='col-md-4'>" . $sport->title;
 			echo "<img class='img-responsive' src =" . $sport->image . ">";
 			echo "<p class='thumbnail-text'>" . $sport->content . "</p>";
 			echo "</div>";
 		}
 			
 		 ?>
 	</div>
 </div>