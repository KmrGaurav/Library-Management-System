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

	<div class="admintitle" align="center">
		<h4><a href="../index.php" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Home</a></h4>
		<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Welcome to Admin Dashboard</h1>
	</div>
	

	<div class="admindashboard">
		<div style="left;" id="rcorners1">
			<a href="addstudent.php">Insert Student Information</a></br>
			<a href="updatestudent.php">Update Student Information</a></br>
			<a href="deletestudent.php">Delete Student Information</a></br>
			<a href="studentdb.php">View Student Database</a></br>
		</div>
		<div align="right" id="rcorners2">
			<a href="addbook.php">Add Book Information</a></br>
			<a href="updatebook.php">Update Book Information</a></br>
			<a href="removebook.php">Remove Book Information</a>
		<div>
	</div>

</body>
</html>