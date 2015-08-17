<?php
	session_start();
	
	unset($_SESSION['CID']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['userlevel']);
	unset($_SESSION['cart']);
	unset($_SESSION['admin']);
	$subtotal_format = number_format('0', 2);
	$_SESSION['subtotal'] = $subtotal_format;
	header('location:../index.html');
	exit();
?>