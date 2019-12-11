<?php

	include('../dbcon.php');
		$bookname = $_POST['bname'];
		$authername = $_POST['aname'];
		$stock = $_POST['stock'];
		$id = $_POST['sid'];
		
		$qry = "UPDATE `books` SET `bookname` = '$bookname', `authername` = '$authername', `stock` = '$stock' WHERE `id` = $id;";
			
		$run = mysqli_query($con, $qry);
		
		if($run == true)
		{
			?>
			<script>
				alert('Data Updated Successfully');
				window.open('updatebookform.php?sid=<?php echo $id;?>','_self');
			</script>
			
			<?php 
		}

?>