<?php  
require_once '../../model/Database.php';
require_once '../../model/Category.php';
require_once '../../model/Sport.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();
    $s = new Sport();

    $sport = $s->getSportById($id, $dbcon);

}
include dirname( __FILE__) . "../../header.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php 
			echo "<h1>" . $sport->title . "</h1>";
			echo "<img src=" . $sport->image . ">";
			echo "<p>" . $sport->author . "</p>";
			echo "<p>" . $sport->date . "</p>";
			echo "<p>" . $sport->content . "</p>";
			 ?>
		</div>
	</div>
</div>