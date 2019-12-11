<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		?>
		<script>
			alert('You have to logout !!');
			window.open('admin/admindash.php', '_self');
		</script>
		<?php
	}
	if(isset($_SESSION['studentid']))
	{
		?>
		<script>
			alert('You have to logout !!');
			window.open('student/studentdashboard.php', '_self');
		</script>
		<?php
	}

?>

<?php 
	include('student/header.php');
	
?>

	<ul>
		<a href="admin/login.php" style="float:right; margin-right:70px; color:#fff; font-size:20px;">Admin</a>
	</ul>
	
	<div class="studentlogin" align="center">
		<h1>Welcome to Library</h1>
	</div>
	
	<form method="post" action="index.php" enctype="multipart/form-data">
		<div class="imgcontainer">
			<img src="student_login_avatar.png" alt="Avatar" class="avatar">
		</div>
		
		<div class="container" style ="width:30%;margin-left: 34%;">
			
			<input type="text" name="rollno" placeholder="Enter Roll No" required>
			
			
			<input type="password" name="spasswd" placeholder="Password" required>
			
			<button type="submit" name="slogin" value="Login">Login</button>
			
		</div>
	</form>

</body>
</html>

<?php

include('dbcon.php');

if(isset($_POST['slogin']))
{
	$rollno = $_POST['rollno'];
	$password = $_POST['spasswd'];
	
	$qry = "SELECT * FROM `student` WHERE `rollno`='$rollno' AND `spasswd`='$password'";
	$run = mysqli_query($con, $qry);
	$row = mysqli_num_rows($run);
	if($row < 1)
	{
		?>
		<script>
			alert('Username or Password not matched !!');
			window.open('index.php', '_self');
		</script>
		<?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$id = $data['id'];
		
		$_SESSION['studentid'] = $id;
		?>
		<script>
			window.open('student/studentdashboard.php?sid=<?php echo $id; ?>','_self');
		</script>
			
		<?php 
		
	}
}

?>