<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Retrieve A Board Game</title>

<script type="text/javascript">
/* <![CDATA[ */
function validateMemberId() 
{
    var memberid = document.getElementById('memberid').value;
    if (memberid == "")
	{
    alert("Member ID must be selected");
    return false;
	}
}

/* ]]> */
</script>

</head>
<body>
<h1 class="heading">Retrieve A Board Game</h1>
<form name="retrieveBoardGameForm" action="retrieve_boardgame_validate.php" onsubmit="return validateMemberId()" method="post">

<table class="table">

<tr><td>
Select a Member ID to retrieve their Board Game:
</td><td>

<select name="memberid" id="memberid">
	<option value="">Select...</option>
<?php
// calls memberid, firstname from players table for selection in drop down menu
include 'connect.php';
$sql = "SELECT memberid, firstname FROM players";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['memberid'] . " : " . $row['firstname'] . "</option>";
}
mysqli_close($dbc);
?>

</select>
</table>
<input type="submit" name="submit" value="Submit">
</form>




</body>
</html>
