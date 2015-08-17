<?php
	//Check if user admin is in database
	//Prevents false accounts from accesssing
	
	//Filter everything except numbers and letters
	$storeID = preg_replace('#[^0-9]#i','',$_SESSION['CID']); //Session variable CID of admin
	$admin = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION['username']); //Session variable username of admin
	$password = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION['password']); //Session variable password of admin
	
	$query_string = "Select * FROM admin WHERE CID='$storeID' AND username='$admin' AND password='$password'";
	$query = mysqli_query($db_connect,$query_string);
	$verify = mysqli_num_rows($query);
	
	if($verify==0){
		echo "There is no record of this user in database";
		exit();
	}
?>
