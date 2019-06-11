<?php
$page_title = "Technology";
include dirname( __FILE__) . "../../header.php";
?>
<!-- 
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Technology</title>
</head> -->
<div class="container">
   <div class="row">
   <?php

//news api
$json_url = "https://newsapi.org/v2/everything?q=apple&from=2019-06-09&to=2019-06-09&sortBy=popularity&apiKey=458f68f850bc4146b897905b151b4745";

$json = file_get_contents($json_url);

$data = json_decode($json, TRUE);

for($i=0; $i<9; $i++){
    echo "<div class='col-md-4'>";
    echo "<div class='tech-img-wrapper'>";
    echo "<img class='tech-img img-responsive' src='" . $data['articles'][$i]['urlToImage']. "'> " . "</img>";
    echo "</div>";
    echo "<p class = 'tech-bold'>" . $data['articles'][$i]['title'] . "</p>";
    echo "<a class='tech-a' href='" .  $data['articles'][$i]['url'] . "'> " . $data['articles'][$i]['description']. "</a><br>";
    echo "Author: " . $data['articles'][$i]['author'] . "<br><hr>";
    echo "</div>";
}
?>
</div>
   </div>
<?php
    include dirname( __FILE__) . "../../footer.php";
?>