<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		header('location:admindash.php');
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
	
	<div class="adminlogin" align="center">
		<h4><a href="../index.php" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Home</a></h4>
		<h1>Admin Login</h1>
	</div>
	
	<form method="post" action="login.php" enctype="multipart/form-data">
		<div class="imgcontainer">
			<img src="admin_login_avatar.png" alt="Avatar" class="avatar">
		</div>
		
		<div class="container" style ="width:30%;margin-left: 34%;">
	
			<input type="text" name="uname" placeholder="Enter user name" required>
			
			
			<input type="password" name="pass" placeholder="Password" required>
			
			<button type="submit" name="login" value="Login">Login</button>
			
		</div>
	</form>
		
</body>
</html>

<?php

include('../dbcon.php');

if(isset($_POST['login']))
{
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	
	$qry = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
	$run = mysqli_query($con, $qry);
	$row = mysqli_num_rows($run);
	if($row < 1)
	{
		?>
		<script>
			alert('Username or Password not matched !!');
			window.open('login.php', '_self');
		</script>
		<?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		
		$id = $data['id'];
		
		$_SESSION['uid'] = $id;
		header('location:admindash.php');
	}
}

?>