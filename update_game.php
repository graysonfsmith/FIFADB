<?php
include('fifadbconnect.php');
$mysqli = fifadbconnect();

$name = $mysqli->escape_string($_POST["player"]);
$date = $_POST["date"];
$opponent = $mysqli->escape_string($_POST["opponent"]);
$difficulty = intval($_POST["difficulty"]);



$sql = "INSERT INTO Next_Game(Real_Player_Full_Name,Date,Opponent,Difficulty) VALUES ('$name','$date','$opponent', '$difficulty') ON DUPLICATE KEY UPDATE Date = $date, Opponent = '$opponent', Difficulty = $difficulty";

$mysqli->query($sql) or die($mysqli->error);

?>