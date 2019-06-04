<?php
$url = 'https://api.tradingeconomics.com/ratings';
$headers = array(
    "Accept: application/xml",
    "Authorization: Client guest:guest"
);
$handle = curl_init(); 
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $data_rating = curl_exec($handle);
	curl_close($handle);
//parse your data to satisfy your needs....
//showing result
	$data_rating = json_decode($data_rating);
	//echo getType($data_rating);

?>