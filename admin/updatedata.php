<?php
		include('../dbcon.php');
		$id = $_POST['sid'];
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcon = $_POST['pcon'];
		$std = $_POST['std'];
		// Easy way to upload image
		$image = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$image");	


		$qry = "UPDATE `student` SET `rollno`='$rollno',`name`='$name',`city`='$city',`parent`='$pcon',`standard`='$std',`image`='$image' WHERE id = ".$id."";
		$run = mysqli_query($con,$qry);
		if ($run == true) 
		{
			?>
				<script type="text/javascript">
					alert('Data Updated Successfully!')
					window.open('updateform.php?sid=<?php echo $id?>','_self')
				</script>
			<?php
		}
	


?>