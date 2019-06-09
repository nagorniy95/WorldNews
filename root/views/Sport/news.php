<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';
require_once '../../model/Sport.php';


$dbcon = Database::getDb();
$s = new Sport();

if(isset($_GET['id'])){
	$category = $_GET['id'];
	$sport  = $s->getAllSportByCategory($dbcon, $category);
}
$page_title = 'News';




include dirname( __FILE__) . "../../header.php";
 ?>
 <!-- body -->
<style>
	
	.thumbnail-text{
		height: 45px;
		overflow: hidden;
	}
</style>
 <div class="container">
 	<div class="row">
 		<?php 
 		foreach ($sport as $sport) {
 			echo "<div class='col-md-4'>";
 			echo "<img class='img-responsive' src =" . $sport->image . ">";
 			echo "<a href=details-news.php?id=" . $sport->id . " class='thumbnail-text'>" . $sport->title . "</a>";
 			echo "</div>";
 		}
 			
 		 ?>
 	</div>
 </div>
<?php 
	include dirname( __FILE__) . "../../footer.php";

?>