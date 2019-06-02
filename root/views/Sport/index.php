<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$c = new Category();

$sport_category = $c->getAllCategories($dbcon);
include "../header.php";
 ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../libs/fullpage/jquery.fullpage.min.css">
	<script src="../../libs/jquery/jquery-3.3.1.min.js"></script>
	<script src="../../libs/fullpage/jquery.fullpage.min.js"></script>
	
</head>
<body> -->
	<style>
		.section{
			-webkit-background-size: cover;
			background-size: cover;
		}
		<?php 
		foreach ($sport_category as $sport) {
			echo "#section" . $sport->id . "{";
			echo "background-image: url(" . $sport->image . ");}";
		}
		?>
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				scrollingSpeed: 1000
			});

		});
	</script>
	<div id="fullpage">	
	<?php 
		foreach ($sport_category as $sport) {
			echo "<div class='section' id=section" . $sport->id .">";
			echo "<h2><a href='news.php'>" . $sport->name . "</a></h2>";
			echo "<p>" . $sport->description . "</p>";
			echo "</div>";
		}
	 ?>
	 </div>
</body>
</html>