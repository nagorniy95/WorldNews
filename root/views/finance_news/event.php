<?php
$url = 'https://api.tradingeconomics.com/calendar';
$headers = array(
    "Accept: application/xml",
    "Authorization: Client guest:guest"
);
$handle = curl_init(); 
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $data_event = curl_exec($handle);
	curl_close($handle);
//parse your data to satisfy your needs....
//showing result


	
//echo ($data_event);


?>

