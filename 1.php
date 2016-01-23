<?php
include('simple_html_dom.php');
//include('proxy.php');
$url1="http://www.spoj.com/users/npcoder2k14/";
//  $html1 = file_get_html($url1,false,$cxt);
echo $url1;
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,$url1);
curl_setopt ($ch, CURLOPT_HEADER, true);
curl_setopt ($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
//curl_setopt($ch,CURLOPT_PROXY,$proxy);
//curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);
$str = curl_exec($ch);
curl_close($ch);
echo  "hi fuck";
//$html1= str_get_html($str);
echo $str;
//print_r($html1);
echo  "hi fuck dasjhgjg";
 ?>
