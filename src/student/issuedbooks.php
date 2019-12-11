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
		<h4><a href="studentdashboard.php?sid=<?php echo $sid; ?>" style="float:left; margin-left:30px; color:#fff; font-size:20px;">Back</a></h4>
		<h4><a href="slogout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;">Logout</a></h4>
		<h1>Issued Books</h1>
	</div>
	<table align="center" width="80%" border="1" style="margin-top:10px;">
		<tr style="background-color:#000; color:#fff;">
			<th>No</th>
			<th>Book Name</th>
			<th>Auther Name</th>
			<th>Related Department</th>
		</tr>
		<?php
		
			include('../dbcon.php');
			
			$sql = "SELECT * FROM `books` WHERE 1";
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
					</tr>
					
					<?php
				}
			}
		
	?>
	</table>
</body>
</html>