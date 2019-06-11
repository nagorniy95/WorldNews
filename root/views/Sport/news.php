<?php 
session_start();
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
		color: #C33636;
	}
</style>
<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>
<?php 
	if($_GET['id'] == 23){
		echo '<div class="container">
  				<div class="row">
    				<div class="col-12">
      					<h2>Football</h2>
      					<ul class="football-menu">
        					<li><a id="PL" href="#">Premier league</a></li>
        					<li><a id="LG" href="#">Ligue 1</a></li>
        					<li><a id="BL" href="#">Bundesliga</a></li>
      					</ul>
      					<div class="last-matches">
        					<table class="tmatches">
        					  	<thead>
        					    	<tr>
        					      		<td>Round</td>
        					      		<td>Home team</td>
        					      		<td>Final score</td>
        					      		<td>Away team</td>
        					    	</tr>
        					  	</thead>
        					  	<tbody id="table-content"></tbody>
        					</table>
				      	</div>
				    </div>
				  </div>
				</div>';
		echo 	"<script>".
				"$(document).ready(function(){
      				$.ajax({
          				url: 'API/getPremier.php',
          				success: function(data){
            				$('#table-content').html(data);
          				}
        			});
    			});
    			$('#PL').click(function(){
      				$.ajax({
          				url: 'API/getPremier.php',
          				success: function(data){
            				$('#table-content').html(data);
          				}
        			});
    			});
    			//---France--------
    			$('#LG').click(function(){
      				$.ajax({
          				url: 'API/getLiga.php',
          				success: function(data){
            				$('#table-content').html(data);
          				}
        			});
    			});
   				//----Bundesliga
   				$('#BL').click(function(){
   				  	$.ajax({
   				      	url: 'API/getBundesliga.php',
   				      	success: function(data){
   				        	$('#table-content').html(data);
   				      	}
   				    });
   				});
    			</script>";

}
if($_GET['id'] == 24){
	echo 	'<div class="container">
 			 	<div class="row">
    				<div class="col-12">
      					<div id="basketball">
       						<h2>Basketball</h2>
        					<div class="last-matches">
        						<table class="tmatches">
          							<thead>
            							<tr>
              								<td>Division</td>
              								<td>Home team</td>
              								<td>Final score</td>
              								<td>Away team</td>
            							</tr>
          							</thead>
          							<tbody id="table-B-content"></tbody>
        						</table>
      						</div>
      					</div>
    				</div>
  				</div>
			</div>';
	echo 	"<script>
				$(document).ready(function(){
      				$.ajax({
          				url: 'API/basketball.php',
          				success: function(data){
            				$('#table-B-content').html(data);
          				}
        			});
    			});
			</script>";
}
 ?>
 <div class="container">
 	<h1 class="sportnews-title"> News</h1>
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