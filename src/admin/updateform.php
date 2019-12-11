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
	include('../dbcon.php');
	
	$sid = $_GET['sid'];
	
	$sql="SELECT * FROM `student` WHERE `id`='$sid'";
	$run=mysqli_query($con, $sql);
	
	$data=mysqli_fetch_assoc($run);
?>
<form method="post" action="updatedata.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width:500px; margin-top:40px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" value=<?php echo $data['rollno']; ?> required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value=<?php echo $data['name']; ?> required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value=<?php echo $data['city']; ?> required></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" value=<?php echo $data['pcont']; ?> required></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="std" value=<?php echo $data['standard']; ?> required></td>
			<?php /*<td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px; padding-left:30px;" /></td> 
			<td><input type="file" name="simg" required></td> */ ?>
		</tr>
		<tr>
			<th rowspan="2">Image</th>
			<td align="center"><img src="../dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px; padding-left:30px;" /></td>
		</tr>
		<tr>
			<td align="center"><input type="file" name="simg" required></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="spasswd" value=<?php echo $data['spasswd']; ?> required</td>
		</tr>
		<tr>
			<td colspan="2" align="center"> 
			<input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
			
			<input type="submit" name="submit" value="Submit">
			
			</td>
		</tr>
	</table>
</form>
</body>
</html> 