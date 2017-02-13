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




// check if memberid is selected and alert if so
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($memberid))
	{
	$memberidErr = "Member ID must be selected";
	}	
// check if selected memberid is already present in boardgamesassigned table
$sql = mysqli_query($dbc, "SELECT * FROM boardgamesassigned WHERE memberid = '$memberid'");
$numrow = mysqli_num_rows($sql);
	if ($numrow > 0)
	{
		
		$memberidErr = "Member already has assigned Board Games";
	}	
// check if all boardgames have been selected
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
// insert into table
if ($flag == 5)
{	
	
	{
	mysqli_query($dbc,"INSERT INTO boardgamesassigned (memberid, boardgame1, boardgame2, boardgame3, boardgame4) VALUES ('$memberid', '$boardgame1', '$boardgame2', '$boardgame3', '$boardgame4')");
	echo "Board Games assigned";
	}
}
	
else 
	{
	echo "All fields must be filled out";
	}
?>
