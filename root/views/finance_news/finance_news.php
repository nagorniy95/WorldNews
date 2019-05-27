<?php 
require_once '../../views/header.php'; 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

session_start();

//top news
$API = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=df9979ebd8de4540ba9e6b1233d4ea75";
$json = file_get_contents ($API);
$data = json_decode($json, true);

//list of news
$API_a = "https://newsapi.org/v2/everything?q=apple&from=2019-05-24&to=2019-05-24&sortBy=popularity&apiKey=df9979ebd8de4540ba9e6b1233d4ea75";
$json = file_get_contents ($API_a);
$data_a = json_decode($json, true);

//stock

//event

?>


<!-- PAGE CONTENT -->
<main>
<div class="container">
<div class="row row-no-gutters">
  <div class="col-xs-6">
  <!-----------------top  news-------------------->
		
<?php

for($i=0; $i<4; $i++){
    echo '<div class="card-deck col-md-6 " >'
    .  ' <div class="card" style="margin-bottom:10px;float:left;width:280px;height:380px;">'
    . '<img class="card-img-top" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:150px;width:280px;" >'
    . '<div class="card-body" style="display:inline-block;" >'
    . '<p style="font-size:16px" class="card-title">' .  $data['articles'][$i]['source']['name'] . '</p>'
    . '<p style="font-size:16px">' . 'author'. ': ' . $data['articles'][$i]['author'] . '</p>'
    . '<p style="font-size:16px; font-weight:bold">' . $data['articles'][$i]['title'] . '</p>'
    //. '<p class="card-text">' . $data['articles'][$i]['description'] . '</p>' 
    .'<p style="font-size:14px;"><a href="http://'. $data['articles'][$i]['url']. '" class="card-link" > Website</a></p>'
    . '<p style="font-size: 14px;class="card-text">' . $data['articles'][$i]['publishedAt'] . '</p>'
    . '</div>'
    . '</div>'
 . '</div>';
}

?>
  </div>
  <div class="col-xs-6">
  <!--------------------economic calendar-------------->
  
  <h3 class="title_chart">Economic Calendar</h3>
 
<?php
	require_once 'event.php';
	//$API_calendar = 'https://api.tradingeconomics.com/calendar';
	
	//$json = file_get_contents ($API_calendar);
    //$data_event = json_decode($json, true);
?>
 <table id="table_calendar">
  <tr >
	<th>Date</th>
	<th>Country</th>
	<th>Category</th>
	<th>Event</th>
	<th>Source</th>
	<th>Prev Forecast</th>
	<th>TEForecast</th>
	<th>Ticker</th>
	<th>Symbol</th>	
  </tr>
  <?php
    //for ($i=0; $i<15; $i++){
		//echo '<tr>';
		//echo '<td>' .($i +1) . '</td>';
		//echo '<td>' . $data_event->[$i]->date . '</td>';
	//}
  ?>
 </table>

  </div>
</div>
<h1>Finance</h1>
<hr>

<!----------------------------Article--------------->
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  
  <img class="finance_image" src="">
  
  <h2>Article Title</h2>
  <p class="content">
  
  Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
  <h4>Author:</h4>
  <p>Category:</p>
  <p>Date: </p>
  
  </div>
  
  <!-------------------------list news--------------------------->
  <h2> Top Stories</h2>
  <div class="col-xs-6 col-md-4" id="scroll_fin_articles">
  <?php

for($i=4; $i<14; $i++){
    echo '<div class="card" style="margin=0;" >'
    .  ' <div class="card" style="margin-bottom:10px;">'
    . '<img class="card-img-top" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:150px;width:250px;padding-top:5px;padding-left:10px;" >'
    . '<div class="card-body"  style="display:inline-block;">'
    . '<h6 class="card-title" style="color:#546A30;">' .  $data['articles'][$i]['source']['name'] . '</h6>'
    . '<h6 class="card-title">' . 'author'. ': ' . $data['articles'][$i]['author'] . '</h6>'
    . '<h6 class="card-title">' . $data['articles'][$i]['title'] . '</h6>'
    .'<p><a href="http://'. $data['articles'][$i]['url']. '" class="card-link" > Website</a></p>'
    . '<p class="card-text">' . $data['articles'][$i]['publishedAt'] . '</p>'
    . '</div>'
    . '</div>'
 . '</div>';
}
    


?>
  
  </div>
  </div>
</div>					
</main>	
<!-- CONTAINER -->
<?php 
//include 'footer.php'; ?>
