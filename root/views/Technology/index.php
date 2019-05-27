<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Technology</title>
</head>
<body class="container">
   
<?php

// weather api
$json_url1 = "http://api.openweathermap.org/data/2.5/weather?q=Toronto,ca&APPID=f7b4f2a593d4b8147d50640fc89af764";

$json1= file_get_contents($json_url1);

$data1 = json_decode($json1, TRUE);

echo "<h2>Weather</h2>";
echo $data1['name']. "<br>";
echo $data1['main']['temp'] . " F" . "<br>";
echo $data1['weather'][0]['description'] . "<br><br>";


//news api
$json_url = "https://newsapi.org/v2/everything?q=apple&from=2019-05-09&to=2019-05-09&sortBy=popularity&apiKey=458f68f850bc4146b897905b151b4745";

$json = file_get_contents($json_url);

$data = json_decode($json, TRUE);

echo "<h2>News</h2>";

for($i=0; $i<10; $i++){
    echo "Author: " . $data['articles'][$i]['author'] . "<br>";
    echo "Title: " . $data['articles'][$i]['title']. "<br>";
    echo "<a href='" .  $data['articles'][$i]['url'] . "'> Description: " . $data['articles'][$i]['description']. "</a><br><hr>";
}
?>

</body>
</html>