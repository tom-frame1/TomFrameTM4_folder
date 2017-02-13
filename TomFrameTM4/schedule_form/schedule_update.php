<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Update Schedule</title>
<script type="text/javascript">
/* <![CDATA[ */
function validateEventName() 
{
    var eventname = document.getElementById('eventname').value;
    if (eventname == "")
	{
    alert("Event Name must be selected");
    return false;
	}

}

function validateDate()
{
	var datevalue = document.getElementById('date').value;
	if (!datevalue) 
	{
    alert ("Date must be selected");
	return false;
}
}

function validateTime()
{
	var timevalue = document.getElementById('time').value;
	if (!timevalue) 
	{
    alert ("Time must be selected");
	return false;
}
}
	
	
function validateVenue() 
{
    var venue = document.getElementById('venue').value;
    if (venue == "")
	{
    alert("Venue must be filled out");
    return false;
	}
	
	var venueLetr = /^[a-zA-Z0-9_ ]*$/;
	if  (venue.match(venueLetr))
	{
	return true;
	}
	else
	{
	alert("Venue must be alphanumeric");
	return false;
	}
}

function validateForm() 
{
	var eventnameval = validateEventName();
	var venueval = validateVenue();
	var dateval = validateDate();
	var timeval = validateTime();
	
	if (eventnameval == "" || venueval == "" || dateval == "" || timeval == "") 
	{
	alert("All fields must be filled out");
	return false;
	}
}

/* ]]> */
</script>
</head>
<body>
<h1 class="heading">Update Schedule</h1>
<form name="updateScheduleForm" action="schedule_update_validate.php"
onsubmit="return validateForm()" method="post">

<table class="table">

<tr><td>
Select Event Name to Update: 
</td><td>
<select name="eventname" id="eventname">
	<option value="">Select...</option>
<?php
// calls eventname from schedule table for selection in drop down menu
include 'connect.php';
$sql = "SELECT eventname FROM schedule";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['eventname'] . "</option>";
}
mysqli_close($dbc);
?>

</select>


<tr><td>
Enter Updated Entries
</td><td>





<tr><td>
Date: 
</td><td>
<input type="date" id="date" size= "20" name="date">
</td></tr>

<tr><td>
Time: 
</td><td>
<input type="time" id="time" size= "20" name="time">
</td></tr>

<tr><td>
Venue: 
</td><td>
<input type="text" id="venue" size= "20" name="venue" maxlength="30">
</td></tr>

</table>

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>