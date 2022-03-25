<?php
	$con = mysqli_connect("localhost","root","","football");
    $sql = "SELECT * FROM players";
    $all_ids = mysqli_query($con,$sql);
   
    if(isset($_POST['submit']))
    {
		$teamRecordID = mysqli_real_escape_string($con,$_POST['teamRecordID']);
        $playerID = mysqli_real_escape_string($con,$_POST['playerID']);
        $teamName = mysqli_real_escape_string($con,$_POST['teamName']);
		$startDate = mysqli_real_escape_string($con,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($con,$_POST['endDate']);
		$address = mysqli_real_escape_string($con,$_POST['address']);
         
		 
        $sql_insert = "INSERT INTO teams (teamRecordID, playerID, teamName, startDate, endDate, address) VALUES ('$teamRecordID', '$playerID', '$teamName', '$startDate', '$endDate', '$address')";
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Team added successfully")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
body{ background-image: url("https://images.adsttc.com/media/images/5eda/b8eb/b357/652a/6100/029d/large_jpg/09_2590_171122_MB144_6561.jpg?1591392437");
background-repeat: no-repeat;}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href="mystyle.css">
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<title>Add Position Form</title>
</head>
<body>
<h1><a href = "index.php" class = "homelink">AWC WIMBLEDON DATABASE</a></h1>
<h2>Add Team</h2>

    <form method="POST">
        <label>Team Record ID:</label>
        <input type="int" name="teamRecordID" required><br>
	    <label>Player ID:</label>
		<select name="playerID">
			<?php 
                while ($id = mysqli_fetch_array(
                        $all_ids,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $id["playerID"];
                ?>">
                    <?php echo $id["playerID"];
                    ?>
                </option>
            <?php 
                endwhile; 
            ?>
		</select><br>
        <label>Team Name:</label>
        <input type="text" name="teamName" required><br>
		<label>Start Date:</label>
        <input type="datetime" name="startDate" required><br>
		<label>End Date:</label>
        <input type="datetime" name="endDate" required><br>
		<label>Address:</label>
        <input type="text" name="address" required><br>
		<br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>