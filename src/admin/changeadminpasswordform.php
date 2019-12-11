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
		<h4><a href="admindash.php" style="float:left; margin-left:30px color:#fff; font-size:20px;">Back to Admin Dashboard</a></h4>
		<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Change Password</h1>
	</div>	
	<form action="changeadminpassword.php" method="post">
		<table align="center">
			<tr>
				<td>Old Password</td><td><input type="text" name="oldpasswd" required></td>
			</tr>
			<tr>
				<td>New Password</td><td><input type="password" name="newpasswd" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Submit"></td>
			</tr>
		</table>
	</form>