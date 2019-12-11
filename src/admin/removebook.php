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
?>
	<div class="removebook" align="center">
		<a href="admindash.php" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Back to dashboard</a>
		<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Remove Book</h1>
	</div>
	
	<table align="center">
	<form action="removebook.php" method="post">
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
			<th>Remove</th>
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
						<td><a href="removebookform.php?sid=<?php echo $data['id']; ?>&myadd=<?php echo "removebook.php"; ?>">Remove</a></td>
					</tr>
					
					<?php
				}
			}
		}
	?>
	</table>
