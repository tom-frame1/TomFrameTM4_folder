<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Add Player High Score</title>
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

function validateScore() 
{
    var score = document.getElementById('score').value;
    if (score == "")
	{
    alert("Board Game must be filled out");
    return false;
	}
	
	var scoreNum = /^[0-9]{1,10}$/;
	if(score.match(scoreNum))
	{
	return true;
	}
	else
	{
	alert("High Score must contain numbers only with a maximum of 10 digits");
	return false;
	}
}


function validateForm() 
{
	var memberidval = validateMemberId();
	var scoreval = validateScore();
	if (memberidval == "" || scoreval == "") 
	{
	alert("All fields must be filled out");
	return false;
	}
}

/* ]]> */
</script>
</head>
<body>
<h1 class="heading">Add Player High Score</h1>
<form name="newHighScoreForm" action="scoring_form_validate.php"
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
High Score: 
</td><td>
<input type="text" id="score" size= "10" name="score" maxlength="10">
</td></tr>

</table>

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>