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
<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width:70%; margin-top:40px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" placeholder="Enter Roll No" required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter Full Nmae" required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" required></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" placeholder="Enter the contact no of parents" required></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="std" placeholder="Enter Standard" required></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="spasswd" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"> <input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php 
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcon = $_POST['pcon'];
		$std = $_POST['std'];
		$imagename = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		$spasswd = $_POST['spasswd'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry="INSERT INTO `student` (`rollno`, `name`, `city`, `pcont`, `standard`, `image`, `spasswd`) VALUES ('$rollno', '$name', '$city', '$pcon', '$std', '$imagename', '$spasswd');";
		//$qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$rollno', '$name', '$city', '$pcon', '$std', '$imagename')";
		//$qry = "INSERT INTO `student` (`rollno`, `name`, `city`, `pcont`, `standard`) VALUES ('$rollno', '$name', '$city', '$pcon', '1');";
		
		$run = mysqli_query($con, $qry);
		
		if($run == true)
		{
			?>
			<script>
				alert('Data Inserted Successfully');
			</script>
			<?php
		}
	}
?>