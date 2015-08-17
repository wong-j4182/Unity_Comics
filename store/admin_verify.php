<?php
	//Store admin verify if theres already session
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin'])){
		header('location:../store/store_login.php');
		exit();
	}
?>