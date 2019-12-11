<?php

	include('../dbcon.php');
	$oldpassword = $_POST['oldpasswd'];
	$newpassword = $_POST['newpasswd'];
	
	$qry = "UPDATE `admin` SET `password`=[value-3] WHERE 1";
?>