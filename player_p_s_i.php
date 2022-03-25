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
    <title>Player Performance</title>
</head>
<body>

	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Your Overall Performances </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
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
                                    <th>Player ID</th>
									<th>Goals</th>
									<th>Attempts</th>
									<th>Attempts on Goal</th>
									<th>Successfull Passes</th>
									<th>Failed Passes</th>
									<th>Tackles</th>
									<th>Yellow Cards</th>
									<th>Red Cards</th>
									<th>Fouls</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","football");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM playerperformances WHERE CONCAT(playerID, matchID) LIKE '%$filtervalues%' ";
                                        $query = "SELECT
										  playerID,
										  SUM(goals) AS goals,
										  SUM(attempts) AS attempts,
										  SUM(attemptsOnGoal) AS attemptsOnGoal,
										  SUM(successfulPasses) AS successfulPasses,
										  SUM(failedPasses) AS failedPasses,
										  SUM(tackles) AS tackles,
										  SUM(yellowCards) AS yellowCards,
										  SUM(redCards) AS redCards,
										  SUM(fouls) AS fouls
										FROM
										  playerperformances
										  WHERE (' ' + playerID + ' ') LIKE '%$filtervalues%'
										GROUP BY
										  playerID";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['playerID']; ?></td>
                                                    <td><?= $items['goals']; ?></td>
													<td><?= $items['attempts']; ?></td>
                                                    <td><?= $items['attemptsOnGoal']; ?></td>
                                                    <td><?= $items['successfulPasses']; ?></td>
													<td><?= $items['failedPasses']; ?></td>
													<td><?= $items['tackles']; ?></td>
													<td><?= $items['yellowCards']; ?></td>
                                                    <td><?= $items['redCards']; ?></td>
                                                    <td><?= $items['fouls']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
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