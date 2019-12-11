<?php

	include('../dbcon.php');
		
		$sid = $_GET['sid'];
		$bid = $_GET['bid'];
		$myadd = $_GET['myadd'];
		
		$sqry = "SELECT `no_of_issued_books` FROM `student` WHERE `id` = $sid;";
		$srun = mysqli_query($con, $sqry);
		if($srun == true)
		{
			$studentdata = mysqli_fetch_assoc($srun);
			if($no_of_issued_books = $studentdata['no_of_issued_books'] < 2)
			{
				$bqry = "SELECT `stock` FROM `books` WHERE `id` = $bid;";
				$brun = mysqli_query($con, $bqry);
				if($brun == true)
				{
					$bookdata = mysqli_fetch_assoc($brun);
					if($stock = $bookdata['stock'] > 0)
					{
						$no_of_issued_books = $studentdata['no_of_issued_books'];
						if($no_of_issued_books < 2 && $stock > 0)
						{
							$bqry = "UPDATE `books` SET stock = stock - 1 WHERE `id` = $bid;";
							$brun = mysqli_query($con, $bqry);
							
							$sqry = "UPDATE `student` SET no_of_issued_books = no_of_issued_books + 1 WHERE `id` = $sid;";
							$srun = mysqli_query($con, $sqry);
							
							$sid = $_GET['sid'];
							$bid = $_GET['bid'];
							$ibbhqry = "INSERT INTO `issued_books_and_bookholder`(`bid`, `sid`) VALUES ($bid,$sid)";
							$run = mysqli_query($con, $ibbhqry);
							
							?><script>
								alert('Book Issued Successfully');
								window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
							</script><?php
						}
						else
						{
							?><script>
								alert('Book issue failed.');
								window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
							</script><?php
						}
					}
					else
					{
						?><script>
							alert('Book is out of stock');
							window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
						</script><?php
					}
				}
				else	
				{
					?><script>
						alert('Book query failed.');
						window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
					</script><?php
				}
			}
			else
			{
				?><script>
					alert('You can\'t issue more than two books.');
					window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
				</script><?php
			}
		}
		else
		{
			?><script>
			alert('Student query failed.');
			window.open('<?php echo $myadd;?>?sid=<?php echo $sid ?>','_self');
			</script><?php
		}
?>