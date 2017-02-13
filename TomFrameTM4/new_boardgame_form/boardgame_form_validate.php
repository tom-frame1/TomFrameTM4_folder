<?php
// include php file with database connect function
include 'connect.php';

$memberid = $_POST['memberid'];
$boardgame = $_POST['boardgame'];
$errors = $memberidErr = $boardgameErr = "";
// turn on autocommit to ensure data is inserted into DB after query is finished
$dbc->autocommit(TRUE);
 
// escape special characters in SQL statement
$boardgame = mysqli_real_escape_string($dbc, $boardgame);
// function to convert special characters to HTML entries, strip unnecessary characters and remove backslashes
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
// check if memberid is selected and alert if not
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($memberid))
	{
	$memberidErr = "Member ID must be selected";
	}	
// check if selected memberid is already present in boardgames table
$sql = mysqli_query($dbc, "SELECT * FROM boardgames WHERE memberid = '$memberid'");
$numrow = mysqli_num_rows($sql);
	if ($numrow > 0)
	{
		
		$memberidErr = "Member already has associated Board Game";
	}	

	

// check if boardgame field has been filled out, if so check that it is alphanumeric only
if(empty($boardgame))
	{
	$boardgameErr = "Board Game must be filled out";
	}
else
	{
	$boardgame = test_input($boardgame);
	if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$boardgame))
		{
		$boardgameErr = "Board Game must be alphanumeric";
		}
		
	}

// concatenate error variables together and display
$errors = $memberidErr.$boardgameErr;
if (empty($errors))
	{
	echo "No errors, ";
	}
else
	{
	echo "<strong>Errors:</strong> <br> $memberidErr </br> $boardgameErr";
	return false;
	}
}

// check if variables are set and not empty
$flag = 0;
if (isset($memberid) and !empty($memberid)) $flag++;
if (isset($boardgame) and !empty($boardgame)) $flag++;
// insert into table
if ($flag == 2)
{	
	
	{
	mysqli_query($dbc,"INSERT INTO boardgames (memberid, boardgame) VALUES ('$memberid', '$boardgame')");
	echo "New Board Game added";
	}
}
	
else 
	{
	echo "All fields must be filled out";
	}
?>
