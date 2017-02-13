<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" href="/TomFrameTM4/styles.css" type="text/css" media="screen" /> 
<title>Update An Assigned Board Game</title>
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


	



function validateBoardGame1() 
{


	var boardgame1 = document.getElementById('boardgame1').value;
    if (boardgame1 == "")
	{
    alert("Board Game 1 must be selected");
    return false;
	}
	

	
}

function validateBoardGame2() 
{

	var boardgame2 = document.getElementById('boardgame2').value;
    if (boardgame2 == "")
	{
    alert("Board Game 2 must be selected");
    return false;
	}
	
	
	
}

function validateBoardGame3() 
{
    var boardgame3 = document.getElementById('boardgame3').value;
    if (boardgame3 == "")
	{
    alert("Board Game 3 must be selected");
    return false;
	}
	
}

function validateBoardGame4() 
{
    var boardgame4 = document.getElementById('boardgame4').value;
    if (boardgame4 == "")
	{
    alert("Board Game 4 must be selected");
    return false;
	}
	
}

function validateForm() 
{
	var memberidval = validateMemberId();

	var boardgame1val = validateBoardGame1();
	var boardgame2val = validateBoardGame2();
	var boardgame3val = validateBoardGame3();
	var boardgame4val = validateBoardGame4();
	if (memberidval == "" || boardgame1val == "" || boardgame2val == "" || boardgame3val == "" || boardgame4val == "") 
	{
	alert("All fields must be filled out");
	return false;
	}
}

/* ]]> */
</script>
</head>
<body>
<h1 class="heading">Update An Assigned Board Game</h1>
<form name="assignBoardGameUpdate" action="boardgame_assign_update_validate.php"
onsubmit="return validateForm()" method="post">

<table class="table">

<tr><td>
Member ID: 
</td><td>
<select name="memberid" id="memberid">
	<option value="">Select...</option>
<?php
// calls memberid from boardgamesassigned table for selection in drop down menu
include 'connect.php';

$sql = "SELECT memberid FROM boardgamesassigned";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['memberid'] . "</option>";
}

?>
</select>

<tr><td>
Board Game 1: 
</td><td>
<select name="boardgame1" id="boardgame1">
	<option value="">Select...</option>
	<option value="None">None</option>
<?php
// calls boardgame from boardgames table for selection in drop down menu


$sql = "SELECT boardgame FROM boardgames";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['boardgame'] . "</option>";
}

?>
</select>

<tr><td>
Board Game 2: 
</td><td>
<select name="boardgame2" id="boardgame2">
	<option value="">Select...</option>
	<option value="None">None</option>
<?php
// calls boardgame from boardgames table for selection in drop down menu


$sql = "SELECT boardgame FROM boardgames";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['boardgame'] . "</option>";
}

?>
</select>

<tr><td>
Board Game 3: 
</td><td>
<select name="boardgame3" id="boardgame3">
	<option value="">Select...</option>
	<option value="None">None</option>
<?php
// calls boardgame from boardgames table for selection in drop down menu


$sql = "SELECT boardgame FROM boardgames";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['boardgame'] . "</option>";
}

?>
</select>

<tr><td>
Board Game 4: 
</td><td>
<select name="boardgame4" id="boardgame4">
	<option value="">Select...</option>
	<option value="None">None</option>
<?php

// calls boardgame from boardgames table for selection in drop down menu

$sql = "SELECT boardgame FROM boardgames";
$result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result))
{
	echo "<option>" . $row['boardgame'] . "</option>";
}

?>
</select>



</table>

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>