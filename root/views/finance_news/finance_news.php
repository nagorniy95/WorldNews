<?php 
require_once '../../views/header.php'; 
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
require_once 'event.php';
require_once 'market.php';
require_once 'rating.php';
require_once 'articles.php';
require_once 'historical.php';
require_once 'articles_api.php';

//session_start();

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


?>


<!-- PAGE CONTENT -->
<main>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-12 col-md-6 col-12">
  <!-----------------top  news-------------------->
	  <h3 style="text-align:center;"> TOP NEWS</h3>	
<?php

for($i=0; $i<6; $i++){
    echo  ' <div class="card-deck" id="top_news" style="width:16rem;margin-bottom:0px;float:left;margin-right:30px;width:250px; height:450px;">'
    . '<img class="card-img-top" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:160px;width:250px;" >'
    . '<div class="card-body" style="width:250px;" >'
        . '<p class="card-title" style="color:#C33636;">' .  $data['articles'][$i]['source']['name'] . '</p>'
    .'<p><a style="color:black;font-weight:bold;"href="'. $data['articles'][$i]['url']. '" class="card-link" > ' . $data['articles'][$i]['title'].'</a></p>'
	//. '<p style="font-size: 14px;class="card-text">' . $data['articles'][$i]['publishedAt'] . '</p>'
    . '</div>'
    . '</div>';
}

?>
  </div>
  <div class="col-sm-12 col-md-6 col-12">
  <!--------------------economic calendar-------------->
  
  <h3 class="title_fin" style="text-align:center;">ECONOMIC CALENDAR</h3>
 <div class="table_fin">
 <table  class="table table-sm  table-striped  table-hover tab-content container-fluid tab-overwrite" style="font-size:11px;"> 
  <thead class="thead">
    <tr>
	<th scope="col">Date</th>
	<th scope="col">Country</th>
	<th scope="col">Category</th>
	<th scope="col" colspan="2">Event</th>
	<!--<th scope="col" colspan="2">Source</th>-->
	<th scope="col">Previous</th>
	<th scope="col">Forecast</th>
	<th scope="col">TEForecast</th>
	<th scope="col">Ticker</th>
	<!--<th>Symbol</th>	-->
  </tr>
</thead>
  <?php
  foreach($data_event as $data_calendar)
{
	
	echo "<tr>";
		echo '<td>' . $data_calendar->Date . '</td>';
		echo '<td>' . $data_calendar->Country . '</td>';
		echo '<td>' . $data_calendar->Category . '</td>';
		echo '<td colspan="2">' . $data_calendar->Event . '</td>';
		//echo '<td colspan="2">' . $data_calendar->Source . '</td>';
		echo "<td><span id='data_column' ";
         if(( $data_calendar->Previous ) < 0){
        	 echo " class='minus' ";
         }else{ 
        	 echo " class='plus' ";
         }
         echo " >" . round( $data_calendar->Previous ,  ) . "&#37;</span></td>" ;
		
		echo "<td><span id='data_column' ";
         if(( $data_calendar->Forecast ) < 0){
        	 echo " class='minus' ";
         }else{ 
        	 echo " class='plus' ";
         }
		 echo " >" . round( $data_calendar->Forecast ,  ) . "&#37;</span></td>" ;

		echo "<td><span id='data_column' ";
         if(( $data_calendar->TEForecast ) < 0){
        	 echo " class='minus' ";
         }else{ 
        	 echo " class='plus' ";
         }
		 echo " >" . round( $data_calendar->TEForecast ,  ) . "&#37;</span></td>" ;
		echo '<td>' . $data_calendar->Ticker . '</td>';
		
		//echo '<td>' . $data_calendar->Symbol . '</td>';
		
		"</tr>";
	
}
//var_dump($data_event);

  
   
  ?>
 </table>
</div>
<div>
	<h3  style="text-align:center;margin-top:20px;">TODAY ON THE MARKET</h3>
	<table id="table-fin" class="table table-sm  table-striped  table-hover "style="font-size:11px;">
	<thead class="thead">
  <tr >
	<th>Symbol</th>
	<th>Ticker</th>
	<th>Name</th>
	<!--<th>Country</th>-->
	<!--<th>Date</th>-->
	<!--<th>Market Cap</th>-->
	<th>Importance</th>
	<th>Daily Change</th>
	<th>Percentual Change</th>
	<th>Yesterday</th>
	<th>Last Week</th>
	<th>Last Month</th>
	<th>Last Update</th>
  </tr>
  </thead>
	<?php
  foreach($data_index as $data_index)
{
	
	echo "<tr>";
		echo '<td>' . $data_index->Symbol . '</td>';
		echo '<td>' . $data_index->Ticker . '</td>';
		echo '<td>' . $data_index->Name. '</td>';
		//echo '<td>' . $data_index->Country . '</td>';
		//echo '<td>' . $data_index->Date. '</td>';
		//echo '<td>' . $data_index->Market Cap. '</td>';
		echo '<td>' . $data_index->Importance . '</td>';
		echo "<td><span id='data_column' ";
         if(( $data_index->DailyChange ) < 0){
        	 echo " class='minus' ";
         }else{ 
        	 echo " class='plus' ";
         }
         echo " >" . round( $data_index->DailyChange ,  ) . "&#37;</span></td>" ;
		
		echo "<td><span id='data_column' ";
         if(( $data_index->DailyPercentualChange ) < 0){
        	 echo " class='minus' ";
         }else{ 
        	 echo " class='plus' ";
         }
         echo " >" . round( $data_index->DailyPercentualChange , 2 ) . "&#37;</span></td>" ;
		echo '<td style="color:#58AA2C;font-weight:bold;">' . $data_index->yesterday . '</td>';
		echo '<td style="color:#58AA2C;font-weight:bold;">' . $data_index->lastWeek . '</td>';
		echo '<td style="color:#58AA2C;font-weight:bold;">' . $data_index->lastMonth . '</td>';
		echo '<td>' . $data_index->LastUpdate. '</td>';
		
		"</tr>";
	
}
//var_dump($data_index);
 
   
  ?>
 </table>
  </div>
 <!--historical-->
<div class="row">
	<div class="col-sm-12 col-3">
	<h3  style="text-align:center;margin-top:40px;">Historical</h3>
	<table id="table-fin" class="table table-sm  table-striped  table-hover "style="font-size:11px;">
	<thead class="thead">
  <tr >
	<th>Symbol</th>
	<th>Date</th>
	<th>Open</th>
	<th>High</th>
	<th>Low</th>
	<th>Close</th>
  </tr>
  </thead>
	<?php
  foreach($data_history as $data_history)
{
	
	echo "<tr>";
		echo '<td>' . $data_history->Symbol . '</td>';
		echo '<td>' . $data_history->Date . '</td>';
		echo '<td>' . $data_history->Open. '</td>';
		echo '<td style="color:#58AA2C;font-weight:bold;">' . $data_history->High . '</td>';
		echo '<td style="color:red;font-weight:bold;">' . $data_history->Low. '</td>';
		echo '<td>' . $data_history->Close . '</td>';	
		"</tr>";
	
}
//var_dump($data_index);
 
   
  ?>
 </table>
  </div>  
 </div> 
   
</div>
</div>


<h1 class="heading">FINANCE</h1>
<hr class="line">

<!----------------------------Articles--------------->
<div class="row">

  <div class="col-3 col-sm-12 col-md-3" >
  <h3 style="text-align:center;">LATEST ARTICLES</h3>
<?php
 foreach($data_article as $data_article)
 //for ($x = 0; $x < 4; $x++){
	 {
	echo
	    "<div class=\"card\" style=\"width: 26rem;border:none;\">".
			"<div class=\"card-body\">".			
			"<p><a style=\"color:black;font-weight:bold;font-size:18px;\" href=\"'$data_article->url '\" class=\"card-link\" >  $data_article->title </a></p>".
			"<p><a style=\"color:black;\" href=\"'$data_article->url'\" class=\"card-link\" >  $data_article->description </a></p>".
			//"<p> $data_article->description </p>".
			"<p> $data_article->date</p>".
			"<p style=\"color: #C33636;\"> $data_article->country</p>".
			"<p> $data_article->category </p>".	
			"<p> $data_article->symbol</p>".
			//"<p> $data_article->URL </p>".
			  
			"</div>".
			"</div>";
	
}
  
  ?>

  
  </div>
  <div class="col-6 col-md-6 col-sm-12 ">
  <?php
  foreach($myart as $finance){
    echo 
    "<div class= 'myArticle list-group-item'>" . 
    "<div class='IndArticle'>" . 
         "<img class='ArticlePhoto' src= 'images/$finance->image '.   alt='Finance Article Image' style=\"height:460px;\"/>" .
        "<h2 class='financetitle'>$finance->title </h2>" . "<br/>" . 
        "<div class='financeContent'>" .
            "<p> $finance->content </p>" .
        "</div>" .
        "<p class='financeAuthor'> Author: $finance->author </p>" .
		 "<p class='financeCategory'> Category: $finance->category </p>" .
        "<p class='date'> $finance->date </p>" . 
    "</div>" .
    "</div>";
}

  ?>
  </div>
  <!-------------------------list news--------------------------->
  <!-- nnn-->
  <div class="col-3 col-sm-12 col-md-3" >
  <h3  style="text-align:center;"> LATEST NEWS</h3>
  <?php

for($i=6; $i<12; $i++){
    echo ' <div class="media" id="latest_news" style="margin-bottom:10px;height:170px;">'
    . '<img class="media-left" src="'. $data['articles'][$i]['urlToImage'] .'" style="height:130px;width:200px;padding-top:5px;padding-left:10px; " >'
    . '<div class="media-body"  style="display:inline-block;padding-left:5px;">'
    . '<p class="card-title" style="color:#C33636;">' .  $data['articles'][$i]['source']['name'] . '</p>'
    //. '<p class="card-text">' . 'author'. ': ' . $data['articles'][$i]['author'] . '</p>'
    //. '<h6 class="card-title">' . $data['articles'][$i]['title'] . '</h6>'
     .'<p><a style="color:black;font-weight:bold;font-size:12px;"href="'. $data['articles'][$i]['url']. '" class="card-link" > ' . $data['articles'][$i]['title'].'</a></p>'
   // . '<p class="card-text">' . $data['articles'][$i]['publishedAt'] . '</p>'
    . '</div>'
    . '</div>';
}
 


?>
  
  
  
  <div >
    <h3 class="rating"  style="text-align:center;">CREDIT RATING</h3>
  </div>
 
  
  <div id="scroll_fin_articles" > 
	<table id="table_rating" class="table table-sm  table-striped  table-hover" style="font-size:11px;">
  <thead>
  <tr >
	<th>Country</th>
	<th>TE</th>
	<th>TE_Outlook</th>
	<th>SP</th>
	<th>SP_Outlook</th>
	<th>Moodys</th>
	<th>Moodys_Outlook</th>
	
  </tr>
  </thead>
  <?php
  foreach($data_rating as $data_rating)
{
	
	echo "<tr>";
		echo '<td>' . $data_rating->Country . '</td>';
			echo '<td>' . $data_rating->TE . '</td>';
		echo '<td>' . $data_rating->TE_Outlook. '</td>';
	   echo '<td>' . $data_rating->SP. '</td>';
		echo '<td>' . $data_rating->SP_Outlook . '</td>';	
		echo '<td>' . $data_rating->Moodys . '</td>';
		echo '<td>' . $data_rating->Moodys_Outlook . '</td>';
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
include '../../views/footer.php'; ?>
