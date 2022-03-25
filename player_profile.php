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
    <title>Player information</title>
</head>
<body>

	<h1><a href = "index.php" class = "homelink">AFC WIMBLEDON DATABASE</a></h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Enter ID, First Name, Last Name, or Date of Birth to Filter Results: </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class = "button">Search</button>
										
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
                                    <th>First Name</th>
									<th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Date of Birth</th>
									<th>Height (cm)</th>
									<th>Weight (kg)</th>
									<th>Photo </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","football");
									error_reporting(E_ERROR | E_PARSE);

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "(SELECT * FROM players WHERE CONCAT(playerID,firstName,lastName, dob) LIKE '%$filtervalues%' ) ";
										
                                        $result = mysqli_query($con, $query);

                                       while($row = $result->fetch_assoc()){
									echo " <tr><td>" . $row["playerID"] . 
									" </td><td> ". $row["firstName"] . 
									" </td><td> ". $row["middleName"] . 
									" </td><td> " . $row["lastName"]. 
									" </td><td> ". $row["dob"]. 
									" </td><td> " . $row["height"]. 
									" </td><td> " . $row["weight"]. 
									" </td><td> " . '<img src="data:photoFile/jpeg;base64,'.base64_encode($row['photoFile']). '" height="200" width="180" ' . '"'."</td></tr>";

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