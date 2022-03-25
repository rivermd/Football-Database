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
    <title>Player Performance in Match</title>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_WARNING); 
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();


$NUM = $_POST['NUM'];


$_SESSION['NUM'] = $NUM;
?>
	
	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Player ID</th>
                                    <th>Match ID</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								error_reporting(E_ERROR | E_PARSE);
								
									
                                    $con = mysqli_connect("localhost","root","","football");
									//$ID = $_SESSION['ID'];

                                    
									
									$NUM = $_SESSION['NUM'];
									
									$query = "SELECT * FROM playerperformances WHERE CONCAT(playerID) LIKE '$NUM'   ";
									$query_run = mysqli_query($con, $query);

									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $items)
										{
											?>
											<tr>
												<td><?= $items['playerID']; ?></td>
												<td><?= $items['matchID']; ?></td>
												
											</tr>
											<?php
										}
									}
									else
									{
										?>
											<tr>
												<td colspan="4" class="norecord">No Record Found</td>
											</tr>
										<?php
									}
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			
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
                                        <input type="text" name="searchy" required value="<?php if(isset($_GET['searchy'])){echo $_GET['searchy']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search again</button>
                                    </div>
                                </form>
								

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
									
                                    <th>Event ID</th>
                                    <th>Event Type</th>
									<th>Event Time</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								error_reporting(E_ERROR | E_PARSE);
                                    $con = mysqli_connect("localhost","root","","football");

                                    
									if(isset($_GET['searchy']))
                                    {
                                        $filtervaluesy = $_GET['searchy'];
										
                                        $query = "SELECT 

eventID,
eventType,
eventTime										FROM events WHERE CONCAT(matchID) LIKE '%$filtervaluesy%'  ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    
													<td><?= $items['eventID']; ?></td>
                                                    <td><?= $items['eventType']; ?></td>
													<td><?= $items['eventTime']; ?></td>
													
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4" class="norecord">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
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