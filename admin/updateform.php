<?php
	session_start();		
	if($_SESSION['uid']){
		echo "Already login";
	}else{
		header('location: ../login.php');
	}
?>
<?php
	include('header.php');
	include('titlehead.php');
	include('../dbcon.php');

	$sid = $_GET['sid'];
	// echo 'Hello'.$sid;
	// print_r($con) ;
	$qry = "SELECT * FROM `student` where id = ".$sid."";
	$run = mysqli_query($con,$qry);
	$data = mysqli_fetch_assoc($run);
	// echo 'Hello'.$data;
?>

<form method="POST" action="updatedata.php" enctype="multipart/form-data" >
	<table border="1" colspan="2" align="center" width="50%" style="margin-top: 10px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" value="<?php echo $data['rollno'];?>"></td>
			
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value="<?php echo $data['name'];?>" ></td>
			
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value="<?php echo $data['city'];?>" ></td>
			
		</tr>	
		<tr>
			<th>Parent Contact No.</th>
			<td><input type="text" name="pcon" value="<?php echo $data['parent'];?>" ></td>
			
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="text" name="std" value="<?php echo $data['standard'];?>" ></td>
			
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" ></td>
			<input type="hidden" name="sid" value="<?php echo $data['id'];?>">
			
		</tr>	
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>