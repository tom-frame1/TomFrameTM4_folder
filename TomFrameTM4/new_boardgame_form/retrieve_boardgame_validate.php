<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Retrieve A Board Game</title>
</head>
<body>
<h1 class="heading">Retrieve A Board Game</h1>

<?php
// include php file with database connect function
include 'connect.php';
// check if variable is set and not empty
if(isset($_POST['memberid'])){


$memberid = $_POST['memberid'];
// turn on autocommit to ensure data is inserted into DB after query is finished
$dbc->autocommit(TRUE);
// check if memberid is selected and alert if so
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($memberid))
	{
	echo "Member ID must be selected";
	}	
}
}
// show html table of boardgames table filtered to memberid selected
$sql = "SELECT * FROM boardgames WHERE memberid = '$memberid'";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		
        echo "Board Game: " . $row["boardgame"]. "<br>";
    }
} else {
    echo "Member ID must be selected";
}


	




// close DB connection
mysqli_close($dbc);
?>
</body>
</html>
