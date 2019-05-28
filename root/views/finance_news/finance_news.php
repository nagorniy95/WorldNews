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
$dbcon = Database::getDb();
$userArticle = new Finance();
$myart = $userArticle->getAllArticle(Database::getDb());

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
  <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
  <?php
  foreach($myart as $finance){
    echo 
    "<li class= 'myArticle list-group-item'>" . 
    "<div class='IndArticle'>" . 
        "<img class='FinanceImage' src='" . $finance->image .  "' alt='Finance Photo'/>" .
        "<h2 class='financetitle'>$finance->title </h2>" . "<br/>" . 
        "<div class='financeContent'>" .
            "<p> $finance->content </p>" .
        "</div>" .
        "<p class='financeAuthor'> $finance->author </p>" .
		 "<p class='financeCategory'> $finance->category </p>" .
        "<p class='date'> $finance->date </p>" . 
    "</div>" .
    "</li>";
}

  ?>
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
