<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Delete A Schedule Event</title>

<script type="text/javascript">
/* <![CDATA[ */
function validateEventname() 
{
    var eventname = document.getElementById('eventname').value;
    if (eventname == "")
	{
    alert("Event Name must be selected");
    return false;
	}
}




/* ]]> */
</script>

</head>
<body>
<h1 class="heading">Delete A Schedule Event</h1>
<form name="deleteScheduleForm" action="delete_schedule_validate.php" onsubmit="return validateEventname()" method="post">

<table class="table">

<tr><td>
Select an Event to Delete:
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
	echo "<option>" . $row['eventname'] ."</option>";
}
mysqli_close($dbc);
?>

</select>




</table>
<input type="submit" name="submit" value="Submit">
</form>




</body>
</html>
