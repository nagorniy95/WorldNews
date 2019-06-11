 class='light'<?php 
require_once '../API/unirest-php/src/Unirest.php';
Unirest\Request::verifyPeer(false);
$response = Unirest\Request::get("https://free-nba.p.rapidapi.com/games?Seasons=1&page=0&per_page=25",
  array(
    "X-RapidAPI-Host" => "free-nba.p.rapidapi.com",
    "X-RapidAPI-Key" => "f2e2df38ecmshb5d647b3b175079p138171jsnede445a651a1"
  )
);

$Basket = json_encode($response);
$Basket = json_decode($Basket);
$Basket = json_decode($Basket->raw_body);
$bMatches = $Basket->data;
// var_dump($bMatches[1]);
$matchesBCount = count($bMatches);
for ($i=0; $i < $matchesBCount; $i++) { 
	echo "<tr>";
	echo "<td class='light'>" . $bMatches[$i]->home_team->division . "</td>";
	echo "<td class='dark'>" . $bMatches[$i]->home_team->full_name . "</td>";
	echo "<td class='light'>" . $bMatches[$i]->home_team_score . " : " . $bMatches[$i]->visitor_team_score . "</td>";
	echo "<td class='dark'>" . $bMatches[$i]->visitor_team->full_name . "</td>";
	echo "</tr>";
}
 ?>