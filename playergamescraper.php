<?php

//echo"hello";

$curl = curl_init();

//function scrape_futbin($player_start, $player_end){

//for ($page = $player_start; $page <= $player_end; $page++){


$url = "https://www.futbin.com/18/players?page=1&version=otw";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$items = array();
