<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student Management System</h1>

<form method="POST" action="index.php">
<table style="width:30%;" align="center" border="1">
	<tr>
		<td colspan="2">Student Information</td>
	</tr>
	<tr >
		<td align="left">Choose Standard</td>
		<td>
			<select name="std">
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
				<option value="6">6th</option>
			</select>
		</td>
	</tr>
	<tr>
		<td  align="left">Enter Rollno</td>
		<td><input type="text" name="rollno" required="rollno"></td>
	</tr>
	<tr align="center">
		<td colspan="2"><input type="submit" name="submit" value="Show Info"></td>
	</tr>
</table>
</form>

<?php

if (isset($_POST['submit'])) 
{
	$std = $_POST['std'];
	$rollno = $_POST['rollno'];

	include('dbcon.php');
	include('function.php');

	showdetails($std,$rollno);
}

?>

</body>
</html>