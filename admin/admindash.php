<?php
	session_start();		
	if($_SESSION['uid'])
	{
		echo "";
	}
	else
	{
		header('location: ../login.php');
	}
?>

<?php
	include('header.php');
?>

<div class="admintittle" align="center">
	<h3><a href="../logout.php" style="float: right; margin-right: 30px; color: #FFF;">Logout</a></h3>
	<h1>Welcome to Admin Dashboard</h1>
</div>

<div class="dashboard">
	<table align="center" style="width:50%;">
		<tr>
			<td>1.</td>
			<td><a href="addstudent.php">Insert Student Details</a></td>
		</tr>
		<tr>
			<td>2.</td>
			<td><a href="updatestudent.php">Update Student Details</a></td>
		</tr>
		<tr>
			<td>3.</td>
			<td><a href="deletestudent.php">Delete Student Details</a></td>
		</tr>
	</table>
</div>

</body>
</html>