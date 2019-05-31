<?php
session_start();
// Page title
$page_title = "World News";
// ============================================================================== HEADER 
include "header.php";
?>
<link rel="stylesheet" href="../libs/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="../libs/owlcarousel/owl.theme.default.min.css">
<script src="../libs/jquery/jquery.min.js"></script>
<script src="../libs/owlcarousel/owl.carousel.min.js"></script>

<div class="owl-carousel owl-theme">
    <div class="item"><h4>1</h4></div>
    <div class="item"><h4>2</h4></div>
    <div class="item"><h4>3</h4></div>
    <div class="item"><h4>4</h4></div>
    <div class="item"><h4>5</h4></div>
    <div class="item"><h4>6</h4></div>
    <div class="item"><h4>7</h4></div>
    <div class="item"><h4>8</h4></div>
    <div class="item"><h4>9</h4></div>
    <div class="item"><h4>10</h4></div>
    <div class="item"><h4>11</h4></div>
    <div class="item"><h4>12</h4></div>
</div>

<script>
	$(document).ready(function(){
	  $('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	})
	});
</script>
<?php
// ============================================ Crypto NEWS ============================
// =====================================================================================
// API URL
$json_url = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
// get JSON data
$json = file_get_contents($json_url);
// convert json to array format
$data = json_decode($json);

echo "<h2><span class='underline'>Latest Crypto News<span></h2>";
echo "<div class='row'>";
for ($x = 0; $x < 3; $x++) {
    echo "<div class='col-md-4 col-sm-6 col-12'><div class='article col-8 justify-content-center'>";
        echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
        echo "<h4> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h4>";
    echo "</div></div>";
}
echo "</div>";
echo "<hr>";

// ============================================ Technology NEWS ========================
// =====================================================================================
//news api
$json_url = "https://newsapi.org/v2/everything?q=apple&from=2019-05-09&to=2019-05-09&sortBy=popularity&apiKey=458f68f850bc4146b897905b151b4745";

$json = file_get_contents($json_url);

$data = json_decode($json, TRUE);

echo "<h2>News</h2>";

for($i=0; $i<4; $i++){
    echo "Author: " . $data['articles'][$i]['author'] . "<br>";
    echo "Title: " . $data['articles'][$i]['title']. "<br>";
    echo "<a href='" .  $data['articles'][$i]['url'] . "'> Description: " . $data['articles'][$i]['description']. "</a><br><hr>";
}







// ============================================================================== FOOTER
include "footer.php";

