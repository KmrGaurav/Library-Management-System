<?php

	include('../dbcon.php');
	
	$id=$_REQUEST['sid'];
	$myadd = $_REQUEST['myadd'];
	
	$qry = "DELETE FROM `books` WHERE `id`='$id';";
		
	$run = mysqli_query($con, $qry);
		
	if($run == true)
	{
		?>
		<script>
			alert('Data Deleted Successfully');
			window.open('<?php echo $myadd; ?>','_self');
		</script>
		<?php
	}

?>