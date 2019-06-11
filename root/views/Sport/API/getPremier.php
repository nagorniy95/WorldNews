<?php
require_once '../API/unirest-php/src/Unirest.php';
Unirest\Request::verifyPeer(false);
$response = Unirest\Request::get("https://api-football-v1.p.rapidapi.com/v2/fixtures/league/2",
  array(
    "X-RapidAPI-Host" => "api-football-v1.p.rapidapi.com",
    "X-RapidAPI-Key" => "7e52b7d143msh4f4db63440c9db6p167464jsn2b7e2476f1a4"
  )
);
$pl = json_encode($response);
$PLO = json_decode($pl);

$england = json_decode($PLO->raw_body, true);

$lmatches = $england['api']['fixtures'];
$lmatchesCount = count($lmatches); 

for ($i=$lmatchesCount-1; $i > 0; $i--) { 
  if (json_encode($lmatches[$i]['score']) !== 'null') {
    echo "<tr>";
    echo "<td class='light'>" . json_encode($lmatches[$i]['round']) . "</td>";
    echo "<td class='dark'>" . json_encode($lmatches[$i]['homeTeam']['team_name']) . "</td>";
    echo "<td class='light'>" . json_encode($lmatches[$i]['score']['fulltime']) . "</td>";
    echo "<td class='dark'>" . json_encode($lmatches[$i]['awayTeam']['team_name']) . "</td>";
    echo "</tr>";
  }
}
?>