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
	<div class="addbook" align="center">
		<a href="admindash.php" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Back to dashboard</a>
		<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Add Book</h1>
	</div>
	<form action="addbook.php" method="post">
		<table align="center">
			<tr>
				<td>Book Name</td><td><input type="text" name="bname" placeholder="Enter Book Name" required></td>
			</tr>
			<tr>
				<td>Author Name</td><td><input type="text" name="aname" placeholder="Enter Author Name" required></td>
			</tr>
			<tr>
				<td align="left">Select Related Department</td>
				<td>
					<select name="relateddpt" required>
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
				<td>No of books</td><td><input type="number" name="stock" value="1" min="1" style="width:40px;" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Add Book(s)"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	include('../dbcon.php');

	if(isset($_POST['submit']))
	{
		$bookname = $_POST['bname'];
		$authername = $_POST['aname'];
		$relatedbranch = $_POST['relateddpt'];
		$stock = $_POST['stock'];
		
		$qry = "INSERT INTO `books`(`bookname`, `authername`, `relateddpt`, `stock`) VALUES ('$bookname', '$authername', '$relatedbranch', '$stock')";
		$run = mysqli_query($con, $qry);
		
		if($run == true)
		{
			?>
			<script>
				alert('Book Inserted Successfully');
			</script>
			<?php
		}
		else
		{
			?>
			<script>
				alert('Book is not Inserted');
			</script>
			<?php	
		}
	}
?>