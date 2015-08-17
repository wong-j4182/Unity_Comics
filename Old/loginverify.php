<?php
	$login=$_POST['username'];
	$user_password=$_POST['password'];
	
	$db="jwong";
	$hostname="localhost";
	$user="jwong";
	$password="2Fast4u1";
	
	$db_connect=mysql_connect("localhost","jwong","2Fast4u1");
	//function user_login($login,$password){
	   //Fetch the username from the database
	   //The $login and $password I use here are examples. You should substitute this
	   //query with one that matches your needs and variables.
	   //On top of that I ASSUMED you are storing your passwords MD5 encrypted. If not,
	   //simply remove the md5() function from below.
	   $login2 = mysql_real_escape_string($login);
	   $query = "SELECT Username FROM Customers WHERE Username='$login2' AND Password='$user_password'";
	   echo $query;
	   $result = mysql_query($query,$db_connect);

	   //Check if any row was returned. If so, fetch the name from that row
	   if (mysql_num_rows($result)) {
		  $row = mysql_fetch_assoc($result);
		  $user = $row['Username'];

		  //Start your session
		  //session_start();
		  //Store the name in the session
		  $_SESSION['Username'] = $user;
		  //echo $_SESSION['Username'];
	   }
	   else {
			echo "The combination of the login and password do not match";
	   }
	//}
?>