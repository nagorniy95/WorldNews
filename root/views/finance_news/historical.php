<?php
$url = 'https://api.tradingeconomics.com/markets/historical/AAPL:US?d1=2019.06.01&d2=2019.06.05';
$headers = array(
    "Accept: application/xml",
    "Authorization: Client guest:guest"
);
$handle = curl_init(); 
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

   $data_history = curl_exec($handle);
	curl_close($handle);
//parse your data to satisfy your needs....
//showing result
	$data_history = json_decode($data_history);
?>