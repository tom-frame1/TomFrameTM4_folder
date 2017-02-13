<?php
// include php file with database connect function
include 'connect.php';

$eventname = $_POST['eventname'];
$venue = $_POST['venue'];
$date = $_POST['date'];
$time = $_POST['time'];
$errors = $eventnameErr = $venueErr = $dateErr = $timeErr = "";
// turn on autocommit to ensure data is inserted into DB after query is finished
$dbc->autocommit(TRUE);
 
// escape special characters in SQL statement
$eventname = mysqli_real_escape_string($dbc, $eventname);
$date = mysqli_real_escape_string($dbc, $date);
$time = mysqli_real_escape_string($dbc, $time);
$venue = mysqli_real_escape_string($dbc, $venue);

// function to convert special characters to HTML entries, strip unnecessary characters and remove backslashes
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
// check if eventname is filled out and alphanumeric and alert if not
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($eventname))
	{
	$eventnameErr = "Event Name must be filled out";
	}
else
	{
	$eventname = test_input($eventname);
	if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$eventname))
		{
		$eventnameErr = "Board Game must be alphanumeric";
		}
		
	}
	

// check if venue is filled out and alphanumeric and alert if not
if(empty($venue))
	{
	$venueErr = "Venue must be filled out";
	}
else
	{
	$venue = test_input($venue);
	if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$venue))
		{
		$venueErr = "Venue must be alphanumeric";
		}
		
	}
	
// check if date is selected and alert if not
if(empty($date))
	{
	$dateErr = "Date must be selected";
	}
else
	{
	$date = test_input($date);
	}
// check if time is selected and alert if not
	if(empty($time))
	{
	$timeErr = "Time must be selected";
	}
else
	{
	$time = test_input($time);
	}
// concatenate error variables together and display
$errors = $eventnameErr.$venueErr.$dateErr.$timeErr;
if (empty($errors))
	{
	echo "No errors, ";
	}
else
	{
	echo "<strong>Errors:</strong> <br> $eventnameErr </br> $venueErr </br> $dateErr </br> $timeErr";
	return false;
	}
}

// insert into table
$flag = 0;
if (isset($eventname) and !empty($eventname)) $flag++;
if (isset($venue) and !empty($venue)) $flag++;
if (isset($date) and !empty($date)) $flag++;
if (isset($time) and !empty($time)) $flag++;

if ($flag == 4)
{	
	
	{
	mysqli_query($dbc,"INSERT INTO schedule (eventname, date, time, venue) VALUES ('$eventname', '$date', '$time', '$venue')");
	echo "New Schedule Event added";
	}
}
	
else 
	{
	echo "All fields must be filled out";
	}
?>
