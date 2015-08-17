<?php
	require("php_db/db_connection.php");

//Create table for customers	
$create_customersDB = "CREATE TABLE IF NOT EXISTS customers (
					CID INT(11) NOT NULL AUTO_INCREMENT,
					username VARCHAR(16) NOT NULL,
					email VARCHAR(255) NOT NULL,
					password VARCHAR(255) NOT NULL,
					firstname VARCHAR(255) NULL,
					lastname VARCHAR(255) NULL,
					address VARCHAR(255) NULL,
					city VARCHAR(255) NULL,
					state VARCHAR(2) NULL,
					zipcode VARCHAR(5) NULL,
					signup DATETIME NOT NULL,
					userlevel ENUM('admin','store','user') NOT NULL DEFAULT 'user',
					PRIMARY KEY (CID),
					UNIQUE KEY username (username,email)
				)";		 
$query = mysqli_query($db_connect, $create_customersDB);

if($query === TRUE){
	echo "SUCCESS!";
}
else{
	echo "Failed to create table";
}
/////////////////////////////////////////////////////////////
//Table for Security Questions
$create_useroptions = "CREATE TABLE IF NOT EXISTS userQuestions ( 
					CID INT(11) NOT NULL,
					username VARCHAR(16) NOT NULL,
					question VARCHAR(255) NULL,
					answer VARCHAR(255) NULL,
					PRIMARY KEY (CID),
					UNIQUE KEY username (username) 
                )"; 
$query = mysqli_query($db_connect, $create_useroptionsDB);

if($query === TRUE){
	echo "SUCCESS!";
}
else{
	echo "Failed to create table";
}

///////////////////////////////////////////////////////////////
//Create Admin Tables
$create_admin = "CREATE TABLE admin(
			CID int(11) NOT NULL AUTO_INCREMENT,
			username VARCHAR(16) NOT NULL,
			email VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			last_login DATETIME NOT NULL,
			PRIMARY KEY(CID),
			UNIQUE KEY username(username);
			)";
$query = mysqli_query($db_connect, $create_adminDB);

if($query === TRUE){
	echo "SUCCESS!";
}
else{
	echo "Failed to create table";
}
//////////////////////////////////////////////////////////////
//Create Transactions Tables
$create_transactions = "CREATE TABLE transactions(
					CID int(11) NOT NULL,
					WSID VARCHAR(10) NOT NULL,
					email VARCHAR(255) NOT NULL, 
					username VARCHAR(16) NOT NULL,
					firstname VARCHAR(255) NOT NULL,
					lastname VARCHAR(255) NOT NULL,
					address VARCHAR(255) NOT NULL,
					city VARCHAR(255) NOT NULL,
					state VARCHAR(2) NOT NULL,
					zipcode VARCHAR(5) NOT NULL,
					payment VARCHAR(255) NOT NULL,
					txn_id VARCHAR(255) NOT NULL,
					PRIMARY KEY(CID),
					UNIQUE KEY txn_id(txn_id)
					)";
$query = mysqli_query($db_connect, $create_transactionDB);

if($query === TRUE){
	echo "SUCCESS!";
}
else{
	echo "Failed to create table";
}
///////////////////////////////////////////////////////////////
//Create Reviews table
$create_reviews = "CREATE TABLE reviews(
				review_id int(11)NOT NULL AUTO_INCREMENT,
				WSID VARCHAR(10) NOT NULL,
				rating VARCHAR(1) NOT NULL,
				review_text VARCHAR(250) NOT NULL,
				CID VARCHAR(11) NOT NULL,
				review_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (review_id),
				KEY 'review_date' ('review_date'),
				KEY 'WSID' ('WSID')
				)";
$query = mysqli_query($db_connect, $create_transactions);

if($query === TRUE){
	echo "SUCCESS!";
}
else{
	echo "Failed to create table"; 
}

?>