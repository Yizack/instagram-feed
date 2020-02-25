<?php
require 'config.php';

function request($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $request = curl_exec($curl);
    curl_close($curl);
    $request = json_decode($request, true);
    return $request;
}

function refreshToken(){
    global $token;
    global $site;

    $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=$token";
    
    date_default_timezone_set("America/Panama");
    $date = date("Y-m-d H:i:s");
    $date_json = request("$site/update.json")["update"];
    
    if(strtotime($date) - strtotime($date_json) > 86400){
        request($url);
        $array = array('update' => $date);
        $fp = fopen('update.json', 'w');
        fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
        fclose($fp);
    }
}

function instagramFeed(){
    global $token;
    $url = "https://graph.instagram.com/me/media?fields=username,permalink,timestamp,caption&access_token=$token";
    return request($url)["data"];
}

function fontawesome(){
    global $fontawesome;
    return $fontawesome;
}

?>