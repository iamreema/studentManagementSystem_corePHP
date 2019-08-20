<?php
session_start();
if(isset($_SESSION['uid']))
{
	echo "Already Login";
}
else
{
	header('location:admindash.php');
}
?>

<?php
include('header.php');
include('titlehead.php');
?>

<table align="center">
<form method="POST" action="updatestudent.php">
	<tr>
		<th>Enter Student Roll No</th>
		<td><input type="number" name="rollno"></td>

		<th>Enter Student Name</th>
		<td><input type="text" name="name"></td>

		<td><input type="submit" name="search" Value="Search"></td>
	</tr>
</form>
</table>


<table border="1" colspan="2" align="center" width="50%" style="margin-top: 10px;">

				<tr style="background-color: brown;color: white;">
					<th>Sr.No.</th>				
					<th>Roll No</th>			
					<th>Name</th>				
					<th>City</th>				
					<th>Parent Contact No</th>			
					<th>Standard</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
					<?php
					include('../dbcon.php');

					if (isset($_POST['search'])) 
					{
						$rollno = $_POST['rollno'];
						$name = $_POST['name'];

						$qry = "SELECT * FROM `student` WHERE rollno = '$rollno' and name like '%$name%'";
						$run = mysqli_query($con,$qry);
						$row = mysqli_num_rows($run);

						if($row <1)
						{
							echo "Data not found";
						}
						else
						{
							$count = 0;
							while($data = mysqli_fetch_assoc($run))
							{
								$count++;
							?>
				<tr align="center">
					<td><?php echo $count; ?></td>
					<td><?php echo $data['rollno']?></td>
					<td><?php echo $data['name']?></td>
					<td><?php echo $data['city']?></td>
					<td><?php echo $data['parent']?></td>
					<td><?php echo $data['standard']?></td>
					<td><img src="../dataimg/<?php echo $data['image']?>"style="max-width: 100px;"></td>
					<td>
						<span><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></span> 
						<span><a href="deletedata.php?sid=<?php echo $data['id']; ?>">Delete</a></span>
					</td>
				</tr>
				
			<?php
		}
	}
}

?>
</table>

</body>
</html>