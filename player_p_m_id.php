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
    <title>Players Performance in Match</title>
</head>
<body>
	
	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
		<div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Filter by Match ID: </h2>
                    </div>	
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class ="button">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Player Performance in Match</h2>
						
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
                                    <th>Match ID</th>
									<th>Match Type</th>
									
									<th>Played in Match</th>
									<th>Time Benched</th>
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
								if(isset($_GET['search'])){
								mysqli_select_db($db, $db_database);
								$filtervalues = $_GET['search'];

								$sql ="
								SELECT
  playerID,
  matchID AS matchID,
  matchType AS matchType,
  playedInMatch AS playedInMatch,
  timeBenched AS timeBenched
FROM
  playerperformances
  
WHERE
playerID = '$ID' AND CONCAT(matchID) LIKE '%$filtervalues%'
										"
;
												
								$result = mysqli_query($db, $sql);
								
								while($row = $result->fetch_assoc()){
									echo 
									" <tr><td>" . $row["playerID"] .
									" </td><td> ". $row["matchID"] .
									" </td><td> ". $row["matchType"] .
									
									" </td><td> ". $row["playedInMatch"].
									" </td><td> ". $row["timeBenched"].
									"</td></tr>";

								}}

								mysqli_close($db);
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
			
			<div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Type</th>
									<th>Event Time</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								
								$db_host = "localhost";
								$db_username = "root";
								$db_password = "";
								$db_database = "football";
								$ID = $_SESSION['ID'];

								$db = mysqli_connect($db_host, $db_username, $db_password);
								if(isset($_GET['search'])){
								mysqli_select_db($db, $db_database);
								$filtervalues = $_GET['search'];

								$sql ="
								SELECT
  *
FROM
  events
  
WHERE
playerID = '$ID' AND CONCAT(matchID) LIKE  '%$filtervalues%' 
										"
;
												
								$result = mysqli_query($db, $sql);
								
								while($row = $result->fetch_assoc()){
									echo 
									" <tr><td>" . $row["eventID"] .
									" </td><td> ". $row["eventType"] .
									" </td><td> ". $row["eventTime"] .
									"</td></tr>";

								}}

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