<?php
function showdetails($std,$rollno)
{
	include('dbcon.php');
	$qry = "SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standard`='$std'";
	$run = mysqli_query($con,$qry);

	if(mysqli_num_rows($run) > 0)
	{
		$data = mysqli_fetch_assoc($run);	
		?>
		<table border="1" style="width: 50%;margin-top: 20px;" align="center" >
			<tr>
				<th colspan="3">Student Details</th>
			</tr>
			<tr>
				<td rowspan="5"><img src="dataimg/<?php echo $data['image'];?>" style="max-width: 150px;max-height: 120px;"/></td>
				<th>RollNo</th>
				<td><?php echo $data['rollno'];?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data['name'];?></td>
			</tr>
			<tr>
				<th>Standard</th>
				<td><?php echo $data['standard'];?></td>
			</tr>
			<tr>
				<th>Parents Contact No</th>
				<td><?php echo $data['parent'];?></td>
			</tr>
		</table>
		<?php
	}
	else
	{
		echo "<script>alert('No records Found')</script>";
	}
}


?>