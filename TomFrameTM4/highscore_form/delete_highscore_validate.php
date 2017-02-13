<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Delete A Player High Score</title>
</head>
<body>
<h1 class="heading">Delete A Player High Score</h1>

<?php
// include php file with database connect function
include 'connect.php';
// check if memberid is set and delete selection from table if so
if(isset($_POST['memberid'])){


$memberid = $_POST['memberid'];

$sql = "DELETE FROM scoring WHERE memberid = '$memberid'";
$result = mysqli_query($dbc, $sql);

if ($result === TRUE) {
    echo "High Score deleted";
}





	




}
// close DB connection
mysqli_close($dbc);
?>
</body>
</html>
