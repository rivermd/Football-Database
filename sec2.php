<!doctype html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title>Security Checker</title>
</head>
<body>

<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

<?php
$pass = $_POST['pass'];
$redirect_location = "index.php";
if ($pass == '1234' ) {
  $redirect_location = "insert.php";
} else {
  $redirect_location = "authoPass2.html";
}
header("Location:".$redirect_location); 
die();
?>

    

    
</body>
</html>