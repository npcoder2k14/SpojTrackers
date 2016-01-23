<?php
ob_start("ob_gzhandler");
include('simple_html_dom.php');
$url = 'http://www.whatsmyip.org/http_compression/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); // Define target site
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Return page in string
curl_setopt($cr, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/5.0.342.3 Safari/533.2');
curl_setopt($ch, CURLOPT_ENCODING , "gzip");     
curl_setopt($ch, CURLOPT_TIMEOUT,5); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects

$return = curl_exec($ch); 
$info = curl_getinfo($ch); 
curl_close($ch); 
print_r($info);
$html = str_get_html("$return");
print_r($html);
?>
