<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashnoard</title>
	<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="admin-panel">
					<ul>
						<li id="sport-cat">Sport Categories</li>
						<li id="sport-news">Sport News</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="admin-content" id="admin-content">
					
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#sport-cat').click(function(){
				$('#sport-cat').css('background-color', 'red');
				$.ajax({
					url: 'views/Sport/category-admin.php',
					success: function(data){
						$('#admin-content').html(data);
					}
				});
			});
			$('#sport-news').click(function(){
				$('#sport-news').css('background-color', 'red');
				$.ajax({
					url: 'views/Sport/sport-admin.php',
					success: function(data){
						$('#admin-content').html(data);
					}
				});
			});
		});
	</script>
</body>
</html>