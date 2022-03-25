<?php
$link = mysqli_connect("localhost", "root", "", "football");

$playerID = mysqli_real_escape_string($link, $_REQUEST['playerID']);
$firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
$middleName = mysqli_real_escape_string($link, $_REQUEST['middleName']);
$lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$height = mysqli_real_escape_string($link, $_REQUEST['height']);
$weight = mysqli_real_escape_string($link, $_REQUEST['weight']);
$photoFile = mysqli_real_escape_string($link, $_REQUEST['photoFile']);

$sql = "INSERT INTO players (playerID, firstName, middleName, lastName, dob, height, weight, photoFile) VALUES ('$playerID', '$firstName', '$middleName', '$lastName', '$dob', '$height', '$weight', '$photoFile')";

if (mysqli_query($link, $sql)){
	echo '<script>alert("Player added successfully")</script>';
} else {
	echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>