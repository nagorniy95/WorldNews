<!-- Author: Artem Nahornyi; n01261269; -->
<?php
session_start();
$page_title = "Cryptocurencies";
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';

$dbcon = Database::getDb();
$c = new Crypto();
$mynews = $c->getAllCrypto(Database::getDb());


// To connect API form coinmarketcap
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
    'start' => '1',
    'limit' => '10',
    'convert'=> 'USD',
];

$headers = [
    'Accepts: application/json',
    'X-CMC_PRO_API_KEY: 3d9f735c-7119-4ffe-9af5-6c6183a90373'
];
$qs = http_build_query($parameters);
$request = "{$url}?{$qs}"; // create the request URL

$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers 
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
$jsonObject = json_decode($response);
?>

<!-- =============================== Cryptocurencies Table =============================== -->
<!-- ===================================================================================== -->
<div class="container">
    <h2 class="coinm_h2">Top 10 Cryptocurrencies by Market Capitalization</h2>
    <table id="coinm_table">
      <tr>
        <th>&#35;</th>
        <th>Name</th>
        <th class="mobile_remove">Market Cap</th>
        <th>Price</th>
        <th class="mobile_remove">Circulating Supply</th>
        <th>Change(24h)</th>
        <th class="mobile_380_remove">Change(7d)</th>
      </tr>
    <?php 
    // Loop through the Object to get table data from API
    for ($x = 0; $x < 10; $x++) {
        echo "<tr>";
            echo "<td>" . ($x + 1) . "</td>";
            echo "<td class='symbol' title='" . $jsonObject->data[$x]->symbol .  "'>" . $jsonObject->data[$x]->name . "</td>";
            echo "<td class='mobile_remove'>&#36;" . number_format($jsonObject->data[$x]->quote->USD->market_cap) . "</td>";
            echo "<td>&#36;" . round( ( $jsonObject->data[$x]->quote->USD->price ), 2 ) . "</td>";
            echo "<td class='mobile_remove'>" . number_format($jsonObject->data[$x]->circulating_supply) . "</td>";

            // 24 hours
            echo "<td><span id='color' ";
        	    if(( $jsonObject->data[$x]->quote->USD->percent_change_24h) < 0){
        	    	echo " class='red' ";
        	    }else{ 
        	    	echo " class='green' ";
        	    }
            echo " >" . round( $jsonObject->data[$x]->quote->USD->percent_change_24h, 2 ) . "&#37;</span></td>" ;

            // 7 days
            echo "<td class='mobile_380_remove'><span id='color' ";
                if(( $jsonObject->data[$x]->quote->USD->percent_change_7d) < 0){
                    echo " class='red' ";
                }else{ 
                    echo " class='green' ";
                }
           echo " >" . round( $jsonObject->data[$x]->quote->USD->percent_change_7d, 2 ) . "&#37;</span></td>" ;
       echo "</tr>";
    } 
    curl_close($curl); // Close request
    ?>
    </table>
    <br>
    <!-- ========================== WorldCryptocurencies API NEWS ============================ -->
    <!-- ===================================================================================== -->
    <?php
    // API URL
    $json_url = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
    // get JSON data
    $json = file_get_contents($json_url);
    // convert json to array format
    $data = json_decode($json);

    echo "<h2><span class='underline'>News<span></h2>";
    echo "<hr class='red_line'>";
    echo "<div class='row justify-content-md-center'>";
    for ($x = 0; $x < 3; $x++) {
        echo "<div class='col-md-4 col-sm-12 col-12'><div class='article'>";
            echo "<img src=' " . $data->Data[$x]->imageurl  . " ' >";
            echo "<h5> <a href=' " . $data->Data[$x]->url  . " ' target='_blank' > " . $data->Data[$x]->title . "</a></h5>";
        echo "</div></div>";
    }
    echo "</div>";
    ?>
    <hr>

    <!-- ==================================== Author NEWS ==================================== -->
    <!-- ===================================================================================== -->
        <div class="row justify-content-md-center">
            <?php for($i=0; $i < 3; $i++){ ?>
            <div class='col-md-4 col-sm-12 col-12'>
                <div class="article">
                    <img class="crypto_news_image" src="images/<?php echo $mynews[$i]->file; ?>">
                    <h5><a href="cryptoArticle.php?id=<?php echo $mynews[$i]->id; ?>"><?php echo $mynews[$i]->title; ?></a></h5>
                </div>
            </div>
            <?php }; ?>
        </div>
</div><!-- end container -->

<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>



