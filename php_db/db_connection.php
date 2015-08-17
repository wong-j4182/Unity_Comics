<?php
	//Script to connect to database
	$db_connect=mysqli_connect("localhost","jwong","2Fast4u1","jwong");
	
	if(mysqli_connect_errno()){
		echo "Failed to connect to Database: " . mysqli_connect_error();
		exit();
	}
?>