<?php
$url = 'https://api.tradingeconomics.com/articles';
$headers = array(
    "Accept: application/xml",
    "Authorization: Client guest:guest"
);
$handle = curl_init(); 
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $data_article = curl_exec($handle);
	curl_close($handle);
//parse your data to satisfy your needs....
//showing result
	$data_article = json_decode($data_article);
	//echo getType($data_article);

?>