<?php

//echo"hello";



function fifadbscraper(){


$curl = curl_init();
//function scrape_futbin($player_start, $player_end){

//for ($page = $player_start; $page <= $player_end; $page++){


$url = "https://www.futbin.com/18/players?page=1&version=otw";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$items = array();

//match prices
preg_match_all('!<span class="pc_color">(.*?)<\/span><!',$result, $match1);

$items['price'] = $match1[1];

//match names
preg_match_all('!class="player_name_players_table">(.*?)<\/a>!',$result, $match1);

$items['name'] = $match1[1];


//match rating
preg_match_all('!<span class="form rating otw gold rare">(.*?)<\/span>!',$result, $match1);

$items['rating'] = $match1[1];



//match nation
preg_match_all('!<a href="\/18\/players\?page=1&version=otw&nation=\d*" data-original-title="(.*?)" data!',$result, $match1);

$items['nation'] = $match1[1];


//match club
preg_match_all('!otw&club=\d*" data-original-title="(.*?)" data!',$result, $match1);

$items['club'] = $match1[1];
//print_r($items['price']);

return $items;
}

?>