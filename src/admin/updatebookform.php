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
	
	include('../dbcon.php');
	
	$sid = $_GET['sid'];
	
	$sql="SELECT * FROM `books` WHERE `id`='$sid'";
	$run=mysqli_query($con, $sql);
	
	$data=mysqli_fetch_assoc($run);
?>

	<div class="updatebook" align="center">
		<a href="admindash.php" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Back to dashboard</a>
		<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Update Book Form</h1>
	</div>

	<form method="post" action="updatebookdata.php" enctype="multipart/form-data">
		<table align="center" border="1" style="width:500px; margin-top:40px;">
			<tr>
				<th>Book Name</th>
				<td><input type="text" name="bname" value=<?php echo $data['bookname']; ?> required></td>
			</tr>
			<tr>
				<th>Author Name</th>
				<td><input type="text" name="aname" value=<?php echo $data['authername']; ?> required></td>
			</tr>
			<tr>
				<th align="left">Select Related Department</th>
				<td>
					<select name="relateddpt" required>
						<option value="<?php echo $data['relateddpt']; ?>"       ><?php echo $data['relateddpt']; ?></option>
						<option value="Biotechnology"                            >Biotechnology</option>
						<option value="Chemical Engineering"                     >Chemical Engineering</option>
						<option value="Civil Engineering"                        >Civil Engineering</option>
						<option value="Computer Science and Engineering"         >Computer Science and Engineering</option>
						<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
						<option value="Electrical Engineering"                   >Electrical Engineering</option>
						<option value="Industrial and Production Engineering"    >Industrial and Production Engineering</option>
						<option value="Information Technology"                   >Information Technology</option>
						<option value="Instrumentation and Control Engineering"  >Instrumentation and Control Engineering</option>
						<option value="Mechanical Engineering"                   >Mechanical Engineering</option>
						<option value="Mining Engineering"                       >Mining Engineering</option>
						<option value="Textile Engineering"                      >Textile Engineering</option>
						<option value="Others"                                   >Others</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>No of books</th>
				<td><input type="number" name="stock" value=<?php echo $data['stock']; ?> required></td>
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