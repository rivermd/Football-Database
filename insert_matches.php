<?php
$link = mysqli_connect("localhost", "root", "", "football");

$matchID = mysqli_real_escape_string($link, $_REQUEST['matchID']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$team1 = mysqli_real_escape_string($link, $_REQUEST['team1']);
$team2 = mysqli_real_escape_string($link, $_REQUEST['team2']);
$team1Score = mysqli_real_escape_string($link, $_REQUEST['team1Score']);
$team2Score = mysqli_real_escape_string($link, $_REQUEST['team2Score']);
$extratime = mysqli_real_escape_string($link, $_REQUEST['extratime']);
$penalties = mysqli_real_escape_string($link, $_REQUEST['penalties']);
$season = mysqli_real_escape_string($link, $_REQUEST['season']);

$sql = "INSERT INTO matches (matchID, date, address, team1, team2, team1Score, team2Score, extratime, penalties, season) VALUES ('$matchID', '$date', '$address', '$team1', '$team2', '$team1Score', '$team2Score', '$extratime', '$penalties', '$season')";

if (mysqli_query($link, $sql)){
	echo '<script>alert("Match added successfully")</script>';
} else {
	echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>