<?php
function qPost($url,$p){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['HTTP_HOST'].$url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $p);
    $out = curl_exec($curl);
    $out = json_decode($out);
    curl_close($curl);    
    return $out;
}

?>