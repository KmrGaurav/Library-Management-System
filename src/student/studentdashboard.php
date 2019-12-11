<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		header('location:../admin/admindash.php');
	}
	
	if(isset($_SESSION['studentid']))
	{
		echo "";
	}
	else
	{
		?>
		<script>
			alert('You have to logout !!');
			window.open('studentdashboard.php', '_self');
		</script>
		<?php
	}

?>

<?php
	include('header.php');
	$sid = $_GET['sid'];
?>
	<div class="studentdashboard" align="center">
		<h4><a href="slogout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Student Dashboard</h1>
	</div>

	<table align="center">
		<form action="studentdashboard.php?sid=<?php echo $sid; ?>" method="post">
			<tr>
				<th>Book Name</th>
				<td><input type="text" name="bname" placeholder="Enter Book Name" /></td>
				<th>Auther Name</th>
				<td><input type="text" name="aname" placeholder="Enter Auther Name" /></td>
				<th>Related Department</th>
				<td>
					<select name="relateddpt">
						<option value=""                                         >Select Department(optional)</option>
						<option value="Biotechnology"                            >Biotechnology</option>
						<option value="Chemical Engineering"                     >Chemical Engineering</option>
			\			<option value="Civil Engineering"                        >Civil Engineering</option>
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
				<td colspan="2"><input type="submit" name="submit" value="Search"</td>
			</tr>
		</form>
	</table>

	<table align="center" width="80%" border="1" style="margin-top:10px;">
		<tr style="background-color:#000; color:#fff;">
			<th>No</th>
			<th>Book Name</th>
			<th>Auther Name</th>
			<th>Related Department</th>
			<th>No of books</th>
			<th>Issue</th>
		</tr>
		<?php
		if(isset($_POST['submit']))
		{
			include('../dbcon.php');
			
			
			$bookname = $_POST['bname'];
			$authername = $_POST['aname'];
			$relateddpt = $_POST['relateddpt'];
			
			$sql = "SELECT * FROM `books` WHERE `bookname` LIKE '%$bookname%' AND `authername` LIKE '%$authername%' AND `relateddpt` LIKE '%$relateddpt%'";
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
						<td><?php echo $data['bookname']; ?></td>
						<td><?php echo $data['authername']; ?></td>
						<td><?php echo $data['relateddpt']; ?></td>
						<td><?php echo $data['stock']; ?></td>
						<td><a href="issuebook.php?bid=<?php echo $data['id']; ?>&sid=<?php echo $sid; ?>&myadd=<?php echo "studentdashboard.php"; ?>">Issue</a></td>
					</tr>
					
					<?php
				}
			}
		}
	?>
	</table>
	
	<div class="studentdashboard" align="center">
		<h1><a href="issuedbooks.php?sid=<?php echo $sid; ?>" style="color:#fff; font-size:40px;">Issued Books</a></h1>
	</div>
	
</body>
</html>