<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location:login.php');
	}
	if(isset($_SESSION['studentid']))
	{
		?>
		<script>
			alert('You have to logout !!');
			window.open('../student/studentdashboard.php', '_self');
		</script>
		<?php
	}

?>

<?php
	include('header.php');
	include('titlehead.php');
?>

<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr style="background-color:#000; color:#fff;">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php

	include('../dbcon.php');
		
	$sql = "SELECT * FROM `student` WHERE 1";
	$run=mysqli_query($con, $sql);
		
	if(mysqli_num_rows($run) < 1)
	{
		echo "<tr><td colspan='5'>No records found</td></tr>";
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
				
			<tr align="center">
			<td><?php echo $count; ?></td>
			<td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['rollno']; ?></td>
			<td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
			<td><a href="deleteform.php?sid=<?php echo $data['id']; ?>&myadd=<?php echo "studentdb.php"; ?>">Delete</a></td>
			</tr>
				
			<?php
		}
	}
?>
</table>