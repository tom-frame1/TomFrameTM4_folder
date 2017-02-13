<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="StyleSheet" href="styles.css" type="text/css" media="screen" /> 
<title>Update An Assigned Board Game</title>
</head>
<body>
<h1 class="heading">Update An Assigned Board Game</h1>

<?php
// include php file with database connect function
include 'connect.php';

$memberid = $_POST['memberid'];
$boardgame1 = $_POST['boardgame1'];
$boardgame2 = $_POST['boardgame2'];
$boardgame3 = $_POST['boardgame3'];
$boardgame4 = $_POST['boardgame4'];

$errors = $memberidErr = $boardgameErr1 = $boardgameErr2 = $boardgameErr3 = $boardgameErr4 = "";
// turn on autocommit to ensure data is inserted into DB after query is finished
$dbc->autocommit(TRUE);




// check if each memberid + each boardgame is selected and alert if not
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($memberid))
	{
	$memberidErr = "Member ID must be selected";
	}	

if(empty($boardgame1))
	{
	$boardgameErr1 = "Board Game 1 must be selected";
	}

if(empty($boardgame2))
	{
	$boardgameErr2 = "Board Game 2 must be selected";
	}
	
if(empty($boardgame3))
	{
	$boardgameErr3 = "Board Game 3 must be selected";
	}
	
if(empty($boardgame4))
	{
	$boardgameErr4 = "Board Game 4 must be selected";
	}
// concatenate error variables together and display
$errors = $memberidErr.$boardgameErr1.$boardgameErr2.$boardgameErr3.$boardgameErr4;
if (empty($errors))
	{
	echo "No errors, ";
	}
else
	{
	echo "<strong>Errors:</strong> <br> $memberidErr </br> $boardgameErr1 </br> $boardgameErr2 </br> $boardgameErr3 </br> $boardgameErr4";
	return false;
	}

}

	
	
// check if variables are set and not empty
$flag = 0;
if (isset($memberid) and !empty($memberid)) $flag++;
if (isset($boardgame1) and !empty($boardgame1)) $flag++;
if (isset($boardgame2) and !empty($boardgame2)) $flag++;
if (isset($boardgame3) and !empty($boardgame3)) $flag++;
if (isset($boardgame4) and !empty($boardgame4)) $flag++;
// update table
if ($flag == 5)
{	
	
	{
	mysqli_query($dbc, "UPDATE boardgamesassigned SET boardgame1= '$boardgame1' WHERE memberid= '$memberid'");
	mysqli_query($dbc, "UPDATE boardgamesassigned SET boardgame2= '$boardgame2' WHERE memberid= '$memberid'");
	mysqli_query($dbc, "UPDATE boardgamesassigned SET boardgame3= '$boardgame3' WHERE memberid= '$memberid'");
	mysqli_query($dbc, "UPDATE boardgamesassigned SET boardgame4= '$boardgame4' WHERE memberid= '$memberid'");
	echo "Board Games assigned";
	}
}
	
else 
	{
	echo "All fields must be filled out";
	}
// close DB connection
mysqli_close($dbc);
?>
</body>
</html>