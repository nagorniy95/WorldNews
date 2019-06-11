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
$page_title = $sport->title;
include dirname( __FILE__) . "../../header.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="sport-title"><?php echo  $sport->title; ?></h1>
			<div class="img-wrapper">
				<?php echo "<img class='img-responsive' src=" . $sport->image . ">"; ?>
			</div>
			<p class="sport-author"><?php echo  $sport->author; ?> <span class="sport-date"> <?php echo $sport->date ?> </span></p>
			<p class="sport-content"><?php echo $sport->content ?></p>
		</div>
	</div>
</div>
<?php 
include dirname( __FILE__) . "../../footer.php";
 ?>