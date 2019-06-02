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





include dirname( __FILE__) . "../../header.php";
 ?>
 <!-- body -->

 <div class="container">
 	<div class="row">
 		<?php 
 		foreach ($sport as $sport) {
 			echo "<div class='col-md-4'>" . $sport->title . "</div>";
 		}
 			
 		 ?>
 	</div>
 </div>