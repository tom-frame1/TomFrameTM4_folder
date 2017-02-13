<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Delete A Schedule Event</title>
</head>
<body>
<h1 class="heading">Delete A Schedule Event</h1>

<?php
// include php file with database connect function
include 'connect.php';
// check if eventname is set then delete selected entry
if(isset($_POST['eventname'])){


$eventname = $_POST['eventname'];

$sql = "DELETE FROM schedule WHERE eventname = '$eventname'";
$result = mysqli_query($dbc, $sql);

if ($result === TRUE) {
    echo "Event deleted";
}





	




}
// close DB connection
mysqli_close($dbc);
?>
</body>
</html>
