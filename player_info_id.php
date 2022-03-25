<!doctype html>
<html lang="en">
<style>
body{ background-image: url("https://images.adsttc.com/media/images/5eda/b8eb/b357/652a/6100/029d/large_jpg/09_2590_171122_MB144_6561.jpg?1591392437");
background-repeat: no-repeat;}



</style>
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title>Players Contract Information</title>
</head>
<body>

	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
						<h2>Player Contract Information</h2>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Player ID</th>
									<th>Level</th>
                                    <th>Start Date</th>
									<th>End Date</th>
                                    <th>Salary</th>
                                    <th>Address Info</th>
									<th>Hobbies</th>
									<th>Job Education</th>
									<th>Institute</th>
									<th>Expenses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								session_start();
								$db_host = "localhost";
								$db_username = "root";
								$db_password = "";
								$db_database = "football";
								$ID = $_SESSION['ID'];

								$db = mysqli_connect($db_host, $db_username, $db_password);
								mysqli_select_db($db, $db_database);

								$sql ="SELECT
  playerID,
  level AS level,
  startDate AS startDate,
  endDate AS endDate,
  salary AS salary,
  addinfo AS addinfo,
  hobbies AS hobbies,
  jobEdu AS jobEdu,
  institute AS institute,
  expenses AS expenses
FROM
  levels
WHERE
  playerID = '$ID' "
;
												
								$result = mysqli_query($db, $sql);
								
								while($row = $result->fetch_assoc()){
									echo " <tr><td>" . $row["playerID"] .
									" </td><td> ". $row["level"] .
									" </td><td> ". $row["startDate"] .
									" </td><td> ". $row["endDate"] .
									" </td><td> ". $row["salary"] .
									" </td><td> ". $row["addinfo"] .
									" </td><td> " . $row["hobbies"].
									" </td><td> ". $row["jobEdu"].
									" </td><td> " . $row["institute"].
									" </td><td> " . $row["expenses"]. "</td></tr>";

								}

								mysqli_close($db);
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>