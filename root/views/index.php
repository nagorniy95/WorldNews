<?php
session_start();
// Page title
$page_title = "World News";
// ============================================================================== HEADER 
include "header.php";

// For crypto news API
$json_url = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
// get JSON data
$json = file_get_contents($json_url);
// convert json to array format
$data = json_decode($json);

?>
<div class="container-fluid my-carousel-container">
	<div class="owl-carousel">
	    <div class="item">
	    	<?php
				for ($x = 0; $x < 1; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 1; $x < 2; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 2; $x < 3; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 3; $x < 4; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 4; $x < 5; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 5; $x < 6; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 6; $x < 7; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 7; $x < 8; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	    <div class="item">
	    	<?php
				for ($x = 8; $x < 9; $x++) {
				    echo "<div class=''>";
				    	echo "<div class='crypto_article'>";
				       		echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
				       		echo "<br>";
				        	echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
				    	echo "</div>";
				    echo "</div>";
				}
	    	?>
	    </div>
	</div>
</div> <!-- end container fluid -->
<div class="container">
	<?php
	// ============================================ Technology NEWS ========================
	// =====================================================================================
	//news api
	$json_url = "https://newsapi.org/v2/everything?q=apple&from=2019-05-09&to=2019-05-09&sortBy=popularity&apiKey=458f68f850bc4146b897905b151b4745";
	$json = file_get_contents($json_url);
	$data = json_decode($json, TRUE);

	echo "<h2 class='uppercase'>Techno News</h2>";
	echo "<hr class='red_line'>";

	echo "<div class='row'>";
		echo "<div class='col-md-8'>";
		for($i=0; $i<1; $i++){
			echo "<div class='home_techno_block home_techno_block_main'>";
			    echo "<img src='" . $data['articles'][$i]['urlToImage'] . "' /><br>";
			    echo "<h4 class='uppercase'>" . $data['articles'][$i]['title'] . "</h4><br>";
			    echo "<p>" . $data['articles'][$i]['content'] . "</p>";
			    echo "<a href='" .  $data['articles'][$i]['url'] . "'>Read more...</a><br>";
		    echo "</div>";
		}
		echo "<hr>";
		for($i=1; $i<2; $i++){
			echo "<div class='home_techno_block home_techno_block_main'>";
			    // echo "<img src='" . $data['articles'][$i]['urlToImage'] . "' /><br>";
			    echo "<h4 class='uppercase'>" . $data['articles'][$i]['title'] . "</h4><br>";
			    echo "<p>" . $data['articles'][$i]['content'] . "</p>";
			    echo "<a href='" .  $data['articles'][$i]['url'] . "'>Read more...</a><br>";
		    echo "</div>";
		}
		echo "<hr>";
		for($i=2; $i<3; $i++){
			echo "<div class='home_techno_block home_techno_block_main'>";
			    // echo "<img src='" . $data['articles'][$i]['urlToImage'] . "' /><br>";
			    echo "<h4 class='uppercase'>" . $data['articles'][$i]['title'] . "</h4><br>";
			    echo "<p>" . $data['articles'][$i]['content'] . "</p>";
			    echo "<a href='" .  $data['articles'][$i]['url'] . "'>Read more...</a><br>";
		    echo "</div>";
		}
		echo "</div>";
		echo "<div class='col-md-4'>";
		for($i=4; $i<9; $i++){
			echo "<div class='home_techno_block'>";
			    echo "<img src='" . $data['articles'][$i]['urlToImage'] . "' /><br>";
			    echo "<h6><a href='" .  $data['articles'][$i]['url'] . "'>" . $data['articles'][$i]['title']. "</a></h6><br>";
		    echo "</div>";
		}
		echo "</div>";
	echo "</div>";
	?>
</div> <!-- end container-->

<?php
// ============================================================================== FOOTER
include "footer.php";
?>

