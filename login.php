<?php
session_start();

if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>

<h1 align="center">Admin Login</h1>
<form method="POST" action="login.php">
	<table align="center">
		<tr>
			<td>Username</td>
			<td><input type="text" name="user" required="user"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass" required="pass"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="login" value="Login"></td>
		</tr>
	</table>	
</form>

</body>
</html>




<?php

include('dbcon.php');
// include 'file';
if(isset($_POST['login']))
{
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$qry = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
	$run = mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);

	if($row <1)
	{
		?>
		<script type="text/javascript">alert('username and password not match')</script>
		<script type="text/javascript">window.open('login.php','_self')</script>
		<?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$id = $data['id'];

		$_SESSION['uid'] = $id;
		header('location:admin/admindash.php');
	}
}

?>