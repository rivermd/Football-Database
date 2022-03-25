<?php
    $con = mysqli_connect("localhost","root","","football");
    $sql = "SELECT * FROM players";
    $all_ids = mysqli_query($con,$sql);
   
    if(isset($_POST['submit']))
    {
		$positionID = mysqli_real_escape_string($con,$_POST['positionID']);
        $playerID = mysqli_real_escape_string($con,$_POST['playerID']);
        $position = mysqli_real_escape_string($con,$_POST['position']);
		$startDate = mysqli_real_escape_string($con,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($con,$_POST['endDate']);
         
		 
        $sql_insert = "INSERT INTO positions (positionID, playerID, position, startDate, endDate) VALUES ('$positionID', '$playerID', '$position', '$startDate', '$endDate')";
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Position added successfully")</script>';
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
        <label>Position ID:</label>
        <input type="int" name="positionID" required><br>
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
        <label>Position:</label>
        <input type="text" name="position" required><br>
		<label>Start Date:</label>
        <input type="datetime" name="startDate" required><br>
		<label>End Date:</label>
        <input type="datetime" name="endDate" required><br>
		<br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>