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
    <title>Player Performance in Season</title>
</head>
<body>

	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>
	
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
						<h2>Player Overall Performance</h2>
                        
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
								//settype($ID , "integer");
								//echo " ".gettype($ID) ;
								

								$db = mysqli_connect($db_host, $db_username, $db_password);
								mysqli_select_db($db, $db_database);

								$sql ="SELECT
  playerID
FROM
  playerperformances
WHERE
  playerID = '$ID'
GROUP BY
  playerID
"
;
												
								$result = mysqli_query($db, $sql);
								
								while($row = $result->fetch_assoc()){
									echo " <tr><td>" . $row["playerID"] . 
									"</td></tr>";

								}

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
                                    
                                    <th>Event Type</th>
									<th>Event Count</th>
									
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
								mysqli_select_db($db, $db_database);

								$sql ="
								SELECT
  COUNT(eventType) AS eventType,
  eventType AS eventName
FROM
  events
WHERE
  playerID = '$ID'
GROUP BY
  eventType

										"
;
												
								$result = mysqli_query($db, $sql);
								
								while($row = $result->fetch_assoc()){
									echo 
									" <tr><td>" . $row["eventName"] .
									" </td><td> ". $row["eventType"] .
									
									"</td></tr>";

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