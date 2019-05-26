<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$s = new Category();

$sport_news = $s->getAllCategories($dbcon);

foreach ($sport_news as $sport) {
	echo "<li>" . $sport->name . "</li>";
	echo "<li>" . $sport->image . "</li>";
	echo "<li>" . $sport->description . "</li>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../libs/fullpage/fullpage.min.css">
	<script src="../../libs/jquery/jquery-3.3.1.min.js"></script>
	<script src="../../libs/fullpage/fullpage.min.js"></script>
</head>
<body>
	<div id="fullpage">
	<div class="section">
		<div id="fullpage">
		<div class="section">Some section</div>
		<div class="section">Some section</div>
		<div class="section">Some section</div>
		<div class="section">Some section</div>
	</div>
	</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
</div>
<script>
	$(document).ready(function() {
	$('#fullpage').fullpage({
		//options here
		autoScrolling:true,
		scrollHorizontally: true
	});

	//methods
	$.fn.fullpage.setAllowScrolling(false);
});
</script>
</body>
</html>