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
<title>Retrieve High Scores</title>



</head>
<body>
<h1 class="heading">High Scores</h1>






<?php
// generate html table of scoring table
include 'connect.php';

$sql = "SELECT * FROM scoring";
$result = mysqli_query($dbc, $sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Member ID</th><th>High Score</th></tr>";
    // output data of each row
	while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["memberid"]."</td><td>".$row["score"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>





</body>
</html>
