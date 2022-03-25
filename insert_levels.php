<?php
	$con = mysqli_connect("localhost","root","","football");
    $sql = "SELECT * FROM players";
    $all_ids = mysqli_query($con,$sql);
   
    if(isset($_POST['submit']))
    {
		$levelID = mysqli_real_escape_string($con,$_POST['levelID']);
        $playerID = mysqli_real_escape_string($con,$_POST['playerID']);
        $level = mysqli_real_escape_string($con,$_POST['level']);
		$startDate = mysqli_real_escape_string($con,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($con,$_POST['endDate']);
		$salary = mysqli_real_escape_string($con,$_POST['salary']);
		$addInfo = mysqli_real_escape_string($con,$_POST['addInfo']);
		$hobbies = mysqli_real_escape_string($con,$_POST['hobbies']);
		$jobEdu = mysqli_real_escape_string($con,$_POST['jobEdu']);
		$institute = mysqli_real_escape_string($con,$_POST['institute']);
		$expenses = mysqli_real_escape_string($con,$_POST['expenses']);
         
		 
        $sql_insert = "INSERT INTO levels (levelID, playerID, level, startDate, endDate, salary, addInfo, hobbies, jobEdu, institute, expenses) VALUES ('$levelID', '$playerID', '$level', '$startDate', '$endDate', '$salary', '$addInfo', '$hobbies', '$jobEdu', '$institute', '$expenses')";
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Level added successfully")</script>';
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
		<label>Level ID:</label>
        <input type="int" name="levelID" required><br>
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
        <label>Level:</label>
        <input type="text" name="level" required><br>
		<label>Start Date:</label>
        <input type="datetime" name="startDate" required><br>
		<label>End Date:</label>
        <input type="datetime" name="endDate" required><br>
		<label>Salary:</label>
        <input type="float" name="salary" required><br>
		<label>Add Information:</label>
        <input type="text" name="addInfo" required><br>
		<label>Hobbies:</label>
        <input type="text" name="hobbies" required><br>
		<label>Job Education:</label>
        <input type="text" name="jobEdu" required><br>
		<label>Institute:</label>
        <input type="text" name="institute" required><br>
		<label>Expenses:</label>
        <input type="float" name="expenses" required><br>
		<br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>