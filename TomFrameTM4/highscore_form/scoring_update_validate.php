<?php
// include php file with database connect function
include 'connect.php';

$memberid = $_POST['memberid'];
$score = $_POST['score'];
$errors = $memberidErr = $scoreErr = "";
// turn on autocommit to ensure data is inserted into DB after query is finished
$dbc->autocommit(TRUE);
 
// escape special characters in SQL statement
$score = mysqli_real_escape_string($dbc, $score);
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
	

	

// check if score is filled out and alert if not
if(empty($score))
	{
	$scoreErr = "High Score must be filled out";
	}
else
{
	$score = test_input($score);
	if (!is_numeric($score)) 
	{
	$scoreErr = "High Score must be numeric";
	}
}
// concatenate error variables together and display
$errors = $memberidErr.$scoreErr;
if (empty($errors))
	{
	echo "No errors, ";
	}
else
	{
	echo "<strong>Errors:</strong> <br> $memberidErr </br> $scoreErr";
	return false;
	}
}

// check if variables are set and not empty
$flag = 0;
if (isset($memberid) and !empty($memberid)) $flag++;
if (isset($score) and !empty($score)) $flag++;
// update table
if ($flag == 2)
{	
	
	{
	mysqli_query($dbc, "UPDATE scoring SET score= '$score' WHERE memberid= '$memberid'");
	echo "High Score updated";
	}
}
	
else 
	{
	echo "All fields must be filled out";
	}
?>
