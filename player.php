<!doctype html>
<style>
body{ background-image: url("https://images.adsttc.com/media/images/5eda/b8eb/b357/652a/6100/029d/large_jpg/09_2590_171122_MB144_6561.jpg?1591392437");
background-repeat: no-repeat;}



</style>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title>Player DashBoard</title>
</head>
<body>


<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();


$ID = $_POST['ID'];


$_SESSION['ID'] = $ID;
?>
	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Player Dashboard </h2>
						<h3 style="font-size:2vw" class ="sub"> Player ID Number: <?php
						echo $ID;
						?></h3> 
						
					
						
                    </div>
                    <div class="card-body" >
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
									<div class = "buttondiv">
                                    <li><a href = "player_profile_id.php" class = "button">Player Profile</a></li>
									<li><a href = "player_p_s_i_id.php" class = "button">Player Perfomance in Season</a></li>
									</div>
									<div class = "buttondiv">
									<li><a href = "player_p_m_id.php" class = "button">Player Performance in Match</a></li>	
									<li><a href = "player_info_id.php" class = "button">Player Contract information</a></li>
									</div>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>