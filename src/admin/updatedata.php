<?php

	include('../dbcon.php');
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcon = $_POST['pcon'];
		$std = $_POST['std'];
		$id = $_POST['sid'];
		$spasswd = $_POST['spasswd'];
		
		$imagename = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$imagename");
		$qry = "UPDATE `student` SET `rollno` = '$rollno' ,`name` = '$name', `city` = '$city', `pcont` = '$pcon', `standard` = '$std', `image` = '$imagename', `spasswd` = '$spasswd' WHERE `id` = $id;";
			
		
		$qry = "UPDATE `student` SET `rollno` = '$rollno' ,`name` = '$name', `city` = '$city', `pcont` = '$pcon', `standard` = '$std', `image` = '$imagename', `spasswd` = '$spasswd' WHERE `id` = $id;";		
		
		$run = mysqli_query($con, $qry);
		
		if($run == true)
		{
			?>
			<script>
				alert('Data Updated Successfully');
				window.open('updateform.php?sid=<?php echo $id;?>','_self');
			</script>
			
			<?php 
		}

?>