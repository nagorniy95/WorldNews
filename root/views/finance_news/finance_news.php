<?php 
require_once '../../views/header.php'; 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
require_once 'event.php';
require_once 'market.php';
require_once 'rating.php';
require_once 'articles.php';

session_start();

//top news
$API = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=df9979ebd8de4540ba9e6b1233d4ea75";
$json = file_get_contents ($API);
$data = json_decode($json, true);

//list of news
$API_a = "https://newsapi.org/v2/everything?q=apple&from=2019-05-24&to=2019-05-24&sortBy=popularity&apiKey=df9979ebd8de4540ba9e6b1233d4ea75";
$json = file_get_contents ($API_a);
$data_a = json_decode($json, true);


//article
$dbcon = Database::getDb();
$userArticle = new Finance();
$myart = $userArticle->getAllArticle(Database::getDb());

//article api


?>


<!-- PAGE CONTENT -->
<main>
<div class="container">
<div class="row row-no-gutters">
  <div class="col-xs-6">
  <!-----------------top  news-------------------->
	  <h2> Top News</h2>	
<?php

for($i=0; $i<4; $i++){
    echo '<div class="card-deck col-md-6 " >'
    .  ' <div class="card" style="margin-bottom:10px;float:left;width:280px;height:380px;">'
    . '<img class="card-img-top" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:160px;width:280px;" >'
    . '<div class="card-body" style="display:inline-block;" >'
    . '<p style="font-size:16px" class="card-title">' .  $data['articles'][$i]['source']['name'] . '</p>'
    . '<p style="font-size:16px">' . 'author'. ': ' . $data['articles'][$i]['author'] . '</p>'
    . '<p style="font-size:16px; font-weight:bold">' . $data['articles'][$i]['title'] . '</p>'
    //. '<p class="card-text">' . $data['articles'][$i]['description'] . '</p>' 
    .'<p><a href="'. $data['articles'][$i]['url']. '" class="card-link" > Website</a></p>'
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
 
 <table id="table_calendar" style="font-size:10px;">
  <tr >
	<th>Date</th>
	<th>Country</th>
	<th>Category</th>
	<th>Event</th>
	<th>Source</th>
	<th>Previous</th>
	<th>Forecast</th>
	<th>TEForecast</th>
	<th>Ticker</th>
	<!--<th>Symbol</th>	-->
  </tr>
  <?php
  foreach($data_event as $data_calendar)
{
	
	echo "<tr>";
		echo '<td>' . $data_calendar->Date . '</td>';
		echo '<td>' . $data_calendar->Country . '</td>';
		echo '<td>' . $data_calendar->Category . '</td>';
		echo '<td>' . $data_calendar->Event . '</td>';
		echo '<td>' . $data_calendar->Source . '</td>';
		echo '<td>' . $data_calendar->Previous . '</td>';
		echo '<td>' . $data_calendar->Forecast . '</td>';
		echo '<td>' . $data_calendar->TEForecast . '</td>';
		echo '<td>' . $data_calendar->Ticker . '</td>';
		//echo '<td>' . $data_calendar->Symbol . '</td>';
		
		"</tr>";
	
}
//var_dump($data_event);

  
   
  ?>
 </table>

<div>
	<h2>Today on the Market</h2>
	<table id="table_market" style="font-size:10px;">
  <tr >
	<th>Symbol</th>
	<th>Ticker</th>
	<th>Name</th>
	<th>Country</th>
	<th>Date</th>
	<th>Market Cap</th>
	<th>Importance</th>
	<th>Daily Change</th>
	<th>Percentual Change</th>
	<th>Yesterday</th>
	<th>Last Week</th>
	<th>Last Update</th>
  </tr>
	<?php
  foreach($data_index as $data_index)
{
	
	echo "<tr>";
		echo '<td>' . $data_index->Symbol . '</td>';
		echo '<td>' . $data_index->Ticker . '</td>';
		echo '<td>' . $data_index->Name. '</td>';
		echo '<td>' . $data_index->Country . '</td>';
		echo '<td>' . $data_index->Date. '</td>';
		//echo '<td>' . $data_index->Market Cap. '</td>';
		echo '<td>' . $data_index->Importance . '</td>';
		echo '<td>' . $data_index->DailyChange . '</td>';
		echo '<td>' . $data_index->DailyPercentualChange . '</td>';
		echo '<td>' . $data_index->yesterday . '</td>';
		echo '<td>' . $data_index->lastWeek . '</td>';
		echo '<td>' . $data_index->lastMonth . '</td>';
		echo '<td>' . $data_index->LastUpdate. '</td>';
		
		"</tr>";
	
}
//var_dump($data_index);
 
   
  ?>
 </table>
</div>
  </div>
</div>
<h1>Finance</h1>
<hr>

<!----------------------------Article--------------->
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  <?php
  foreach($myart as $finance){
    echo 
    "<li class= 'myArticle list-group-item'>" . 
    "<div class='IndArticle'>" . 
         "<img class='ArticlePhoto' src= 'images/$finance->image '.   alt='Finance Article Image' style=\"height:320px;\"/>" .
        "<h2 class='financetitle'>$finance->title </h2>" . "<br/>" . 
        "<div class='financeContent'>" .
            "<p> $finance->content </p>" .
        "</div>" .
        "<p class='financeAuthor'> Author: $finance->author </p>" .
		 "<p class='financeCategory'> Category: $finance->category </p>" .
        "<p class='date'> $finance->date </p>" . 
    "</div>" .
    "</li>";
}

  ?>
  </div>
 
  <!-------------------------list news--------------------------->
  <h2> Latest News</h2>
  <div class="col-xs-6 col-md-4" >
  <?php

for($i=4; $i<8; $i++){
    echo '<div class="card" style="margin=0;" >'
    .  ' <div class="card" style="margin-bottom:10px;">'
    . '<img class="card-img-top" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:150px;width:250px;padding-top:5px;padding-left:10px;" >'
    . '<div class="card-body"  style="display:inline-block;">'
    . '<h6 class="card-title" style="color:#546A30;">' .  $data['articles'][$i]['source']['name'] . '</h6>'
    . '<h6 class="card-title">' . 'author'. ': ' . $data['articles'][$i]['author'] . '</h6>'
    . '<h6 class="card-title">' . $data['articles'][$i]['title'] . '</h6>'
    .'<p><a href="'. $data['articles'][$i]['url']. '" class="card-link" > Website</a></p>'
    . '<p class="card-text">' . $data['articles'][$i]['publishedAt'] . '</p>'
    . '</div>'
    . '</div>'
 . '</div>';
}
 


?>
  
  </div>
  
  <div class="col-xs-6 col-md-4">
    <h2>Credit Rating</h2>
  </div>
  
  <div class="row">
  
  <div class="col-xs-6 col-md-4" id="scroll_fin_articles" >
 
<table id="table_rating" style="font-size:10px;">
  <tr >
	<th>Country</th>
	<th>TE</th>
	<th>TE_Outlook</th>
	<th>SP_Outlook</th>
	
  </tr>
  <?php
  foreach($data_rating as $data_rating)
{
	
	echo "<tr>";
		echo '<td>' . $data_rating->Country . '</td>';
			echo '<td>' . $data_rating->TE . '</td>';
		echo '<td>' . $data_rating->TE_Outlook. '</td>';
		echo '<td>' . $data_rating->SP_Outlook . '</td>';
		
		
		"</tr>";
	
}
//var_dump($data_rating);

  
   
  ?>
 </table>
 
 </div>
 </div>
  </div>

</div>					
</main>	
<!-- CONTAINER -->
<?php 
//include 'footer.php'; ?>
