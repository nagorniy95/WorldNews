<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$s = new Category();

$sport_news = $s->getAllCategories($dbcon);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../libs/fullpage/jquery.fullpage.min.css">
	<script src="../../libs/jquery/jquery-3.3.1.min.js"></script>
	<script src="../../libs/fullpage/jquery.fullpage.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				scrollingSpeed: 1000
			});

		});
	</script>
</head>
<body>
	<div id="fullpage">	
	<?php 
		foreach ($sport_news as $sport) {
			echo "<div class='section'>";
			echo "<h2>" . $sport->name . "</h2>";
			echo "<p>" . $sport->image . "</p>";
			echo "<p>" . $sport->description . "</p>";
			echo "</div>";
		}
	 ?>
	 </div>
</body>
</html>