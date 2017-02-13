<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Add New Board Game</title>
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

function validateBoardGame() 
{
    var boardgame = document.getElementById('boardgame').value;
    if (boardgame == "")
	{
    alert("Board Game must be filled out");
    return false;
	}
	
	var boardgameLetr = /^[a-zA-Z0-9_ ]*$/;
	if  (boardgame.match(boardgameLetr))
	{
	return true;
	}
	else
	{
	alert("Board Game must be alphanumeric");
	return false;
	}
}

function validateForm() 
{
	var memberidval = validateMemberId();
	var boardgameval = validateBoardGame();
	if (memberidval == "" || boardgameval == "") 
	{
	alert("All fields must be filled out");
	return false;
	}
}

/* ]]> */
</script>
</head>
<body>
<h1 class="heading">Add A New Board Game</h1>
<form name="newBoardGameForm" action="boardgame_form_validate.php"
onsubmit="return validateForm()" method="post">

<table class="table">

<tr><td>
Member ID: 
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

?>
</select>

<tr><td>
Board Game: 
</td><td>
<input type="text" id="boardgame" size= "20" name="boardgame" maxlength="30">
</td></tr>

</table>

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>