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
?>
<?php
	include('../dbcon.php');
	$errors = array();
	if (isset($_POST['submit'])) 
	{
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcon = $_POST['pcon'];
		$std = $_POST['std'];
		// Easy way to upload image
		$image = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$image");

		if(empty($rollno))
		{
			$errors[0] = 'Roll no is required';
		}
		if(empty($name))
		{
			$errors[1] = 'Name is required';
		}
		if(empty($city))
		{
			$errors[2] = 'City is required';
		}
		if(empty($pcon))
		{
			$errors[3] = 'Parent Contact No is required';
		}
		if(empty($std))
		{
			$errors[4] = 'Standard is required';
		}
		if(empty($image))
		{
			$errors[5] = 'Image is required';
		}
		// $info = pathinfo($_FILES['simg']['name']);
		// $ext = $info['extension']; // get the extension of the file
		// $newname = "newname.".$ext; 
		// $target = '../image/'.$newname;
		// move_uploaded_file( $_FILES['simg']['tmp_name'], $target);


		$qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `parent`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std','$image')";
		$run = mysqli_query($con,$qry);
		if ($run == true) 
		{
			?>
				<script type="text/javascript">alert('Data Inserted Successfully!')</script>
			<?php
		}
	}
?>
<form method="POST" action="addstudent.php" enctype="multipart/form-data" >
	<table border="1" align="center" width="50%">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" placeholder="Enter Roll No"></td>
			<h1 style="color:red"><?php if(!empty($errors[0])){echo $errors[0];}?></h1>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter Full Name" ></td>
			<h1 style="color:red"><?php if(!empty($errors[1])){echo $errors[1];}?></h1>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" ></td>
			<h1 style="color:red"><?php if(!empty($errors[2])){echo $errors[2];}?></h1>
		</tr>	
		<tr>
			<th>Parent Contact No.</th>
			<td><input type="text" name="pcon" placeholder="Enter Parent Contact No." ></td>
			<h1 style="color:red"><?php if(!empty($errors[3])){echo $errors[3];}?></h1>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="text" name="std" placeholder="Enter Standard" ></td>
			<h1 style="color:red"><?php if(!empty($errors[4])){echo $errors[4];}?></h1>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" placeholder="Enter Image" ></td>
			<h1 style="color:red"><?php if(!empty($errors[5])){echo $errors[5];}?></h1>
		</tr>	
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>