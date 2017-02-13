<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Retrieve Assigned Board Games</title>
</head>
<body>
<h1 class="heading">Retrieve Assigned Board Games</h1>


<?php
// include php file with database connect function
include 'connect.php';

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
// generate html table of boardgamesassigned table filtered to memberid selected
$sql = "SELECT * FROM boardgamesassigned WHERE memberid = '$memberid'";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		
        echo "Board Games assigned: " . $row["boardgame1"]. ", " . $row["boardgame2"].  ", " . $row["boardgame3"].  ", " . $row["boardgame4"]."<br>";
    }
} else {
    echo "Member ID must be selected";
}


	




// close DB connection
mysqli_close($dbc);
?>
</body>
</html>
