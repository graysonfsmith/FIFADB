<?php

include('fifadbscraper.php');
include('fifadbconnect.php');
$mysqli = fifadbconnect();
$data = fifadbscraper();


for($i = 0; $i < 22; $i++){

	$name = $mysqli->escape_string($data['name'][$i]);
	$club = $mysqli->escape_string($data['club'][$i]);
	$nation = $mysqli->escape_string($data['nation'][$i]);

	$rating = intval($data['rating'][$i]);



	if(strpos($data['price'][$i], 'K')){
		str_replace('K', '', $data['price'][$i]);
		$price = (floatval($data['price'][$i]) * 1000);
	}
	else if(strpos($data['price'][$i], 'M')){
		str_replace('M', '', $data['price'][$i]);
		$price = (floatval($data['price'][$i]) * 1000000);
	}

	$sql = "INSERT INTO player_item (Price,Rating,Real_Player_Full_Name) VALUES ('$price','$rating','$name') ON DUPLICATE KEY UPDATE Price = $price, Rating = $rating";

	$mysqli->query($sql) or die($mysqli->error);

}
echo "Player items updated!";

return $mysqli;



?>