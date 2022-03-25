<?php
	$con = mysqli_connect("localhost","root","","football");
    $sql = "SELECT * FROM players";
	$sql2 = "SELECT * FROM matches";
    $all_ids = mysqli_query($con,$sql);
	$all_ids2 = mysqli_query($con,$sql2);
   
    if(isset($_POST['submit']))
    {
		$eventID = mysqli_real_escape_string($con,$_POST['eventID']);
        $playerID = mysqli_real_escape_string($con,$_POST['playerID']);
        $matchID = mysqli_real_escape_string($con,$_POST['matchID']);
		$eventType = mysqli_real_escape_string($con,$_POST['eventType']);
		$eventTime = mysqli_real_escape_string($con,$_POST['eventTime']);
         
		 
        $sql_insert = "INSERT INTO events (eventID, playerID, matchID, eventType, eventTime) VALUES ('$eventID', '$playerID', '$matchID', '$eventType', '$eventTime')";
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Event added successfully")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<style>
body{ background-image: url("https://images.adsttc.com/media/images/5eda/b8eb/b357/652a/6100/029d/large_jpg/09_2590_171122_MB144_6561.jpg?1591392437");
background-repeat: no-repeat;}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href="mystyle.css">
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<body>
<h1><a href = "index.php" class = "homelink">AWC WIMBLEDON DATABASE</a></h1>

    <form method="POST">
		<label>Event ID:</label>
        <input type="int" name="eventID" required><br>
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
		<label>Match ID:</label>
		<select name="matchID">
			<?php 
                while ($id = mysqli_fetch_array(
                        $all_ids2,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $id["matchID"];
                ?>">
                    <?php echo $id["matchID"];
                    ?>
                </option>
            <?php 
                endwhile; 
            ?>
		</select><br>
		<label>Event Type:</label>
        <input type="text" name="eventType" required><br>
		<label>Time of Event:</label>
        <input type="time" name="eventTime" required><br>
		<br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>