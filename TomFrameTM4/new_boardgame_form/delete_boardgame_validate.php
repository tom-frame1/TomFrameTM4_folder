<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Delete A Board Game</title>
</head>
<body>
<h1 class="heading">Delete A Board Game</h1>

<?php
// include php file with database connect function
include 'connect.php';
// check if variables are set, if so delete memberid selected from boardgames table
if(isset($_POST['memberid'])){


$memberid = $_POST['memberid'];

$sql = "DELETE FROM boardgames WHERE memberid = '$memberid'";
$result = mysqli_query($dbc, $sql);

if ($result === TRUE) {
    echo "Board Game deleted";
}
else

{
	echo "Cannot delete, Member has these Board Games assigned. Please delete assigned Board Games first";
}




	



// close DB connection
}
mysqli_close($dbc);
?>
</body>
</html>
