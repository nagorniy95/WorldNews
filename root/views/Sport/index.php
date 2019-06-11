<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$c = new Category();

$sport_category = $c->getAllCategories($dbcon);
$page_title = 'Sport';
include dirname( __FILE__) . "../../header.php";
 ?>
	<style>
		.section{
			-webkit-background-size: cover;
			background-size: cover;
		}
		#header{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 999;
			width: 100%;
		}
		.section{
			padding-top: 200px;
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
				scrollingSpeed: 1000,
				// anchors:['firstSlide', 'secondSlide', '3rdSlide'],
				anchors:[
					<?php 
					$i = 0;
					foreach ($sport_category as $sport) {
						$i++;
						echo "'" . $i . "slide',";
					}
				 ?>
				],
				
				menu: '#sport-menu'
			});

		});
	</script>
	<ul id="sport-menu">
		<?php 
		$i=0;
			foreach ($sport_category as $sport) {
				$i++;
				echo "<li data-menuanchor='" . $i . "slide'>";
				echo "<a href='#" . $i . "slide'>" . $sport->name . "</a>"; 
			}
	 	?>
	 </ul>
	<div id="fullpage">	
	<?php 
		foreach ($sport_category as $sport) {
			echo "<div class='section' id=section" . $sport->id .">";
			echo "<div class='category-content'>";
			echo "<h2><a href=news.php?id=" . $sport->id . ">" . $sport->name . "</a></h2>";
			echo "<p>" . $sport->description . "</p>";
			echo "</div>";
			echo $i++;
			echo "</div>";


		}
	 ?>
	 </div>
</body>
</html>