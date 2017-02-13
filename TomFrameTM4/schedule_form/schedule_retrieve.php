<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Retrieve Schedule</title>



</head>
<body>
<h1 class="heading">Schedule</h1>






<?php
// output html table of schedule table
include 'connect.php';

$sql = "SELECT * FROM schedule";
$result = mysqli_query($dbc, $sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Event Name</th><th>Date</th><th>Time</th><th>Venue</th></tr>";
    // output data of each row
	while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["eventname"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["venue"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>






</body>
</html>
