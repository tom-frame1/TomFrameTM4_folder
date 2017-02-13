<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Delete Assigned Board Games</title>
</head>
<body>
<h1 class="heading">Delete Assigned Board Games</h1>

<?php
// include php file with database connect function
include 'connect.php';

// check if memberid is selected
if(isset($_POST['memberid'])){


$memberid = $_POST['memberid'];

$sql = "DELETE FROM boardgamesassigned WHERE memberid = '$memberid'";
$result = mysqli_query($dbc, $sql);

if ($result === TRUE) {
    echo "Assigned Board Game deleted";
}




	




}
//close DB connection
mysqli_close($dbc);
?>
</body>
</html>
