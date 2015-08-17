<?php 
	include_once("../php_db/db_connection.php");
	
	if(mysqli_connect_errno()){
		echo "Failed to connect to Database: " . mysqli_connect_error();
		exit();
	}
	//Show Graphic Novels Inventory Table
	function show_GN_Inventory($tablename,$connection){
		$query_string = "Select Name,Price,WSID,Quantity FROM $tablename ORDER BY WSID";
		$result = mysqli_query($connection,$query_string);
		$row_count = mysqli_num_rows($result);
		if($row_count>0){
			print("<div class='col-md-9'>
					<table class='table table-striped'>
					<thead>
					  <tr>
						<th>WSID</th>
						<th>Title</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Restock</th>
					  </tr>
					</thead>          
				   <tbody>");
			while($row=mysqli_fetch_array($result)){
				$title = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$quantity = $row['Quantity'];
				print("<tr>
						<td>$wsid</td>
						<td>$title</td>
						<td>$price</td>
						<td>$quantity</td>");
					if($quantity<=1){		
						print("<td>Yes</td>");
					}
					else{
						print("<td></td>");
					}
					print("</tr>");
			}
			print("</tbody></table></div>");
		}
		else{
			print("<h3>There are no items to list</h3>");
		}
	}
	//Show Comic Books Inventory Table
	function show_CB_Inventory($tablename,$connection){
		$query_string = "Select Name,Price,WSID,Quantity,Restock FROM $tablename ORDER BY WSID";
		$result = mysqli_query($connection,$query_string);
		$row_count = mysqli_num_rows($result);
		if($row_count>0){
			print("<div class='col-md-9'>
					<table class='table table-striped'>
					<thead>
					  <tr>
						<th>WSID</th>
						<th>Title</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Restock</th>
					  </tr>
					</thead>          
				   <tbody>");
			while($row=mysqli_fetch_array($result)){
				$title = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$quantity = $row['Quantity'];
				$restock = $row['Restock'];
				print("<tr>
						<td>$wsid</td>
						<td>$title</td>
						<td>$price</td>
						<td>$quantity</td>");
					if($quantity<=1){		
						print("<td>Yes</td>");
					}
					else{
						print("<td></td>");
					}
					print("</tr>");
			}
			print("</tbody></table></div>");
		}
		else{
			print("<h3>There are no items to list</h3>");
		}
	}
	//Show Movies Inventory Table
	function show_MV_Inventory($tablename,$connection){
		$query_string = "Select Name,Price,WSID,Quantity FROM $tablename ORDER BY WSID";
		$result = mysqli_query($connection,$query_string);
		$row_count = mysqli_num_rows($result);
		if($row_count>0){
			print("<div class='col-md-9'>
					<table class='table table-striped'>
					<thead>
					  <tr>
						<th>WSID</th>
						<th>Title</th>
						<th>Price</th>
						<th>Quantity</th>
					  </tr>
					</thead>          
				   <tbody>");
			while($row=mysqli_fetch_array($result)){
				$title = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$quantity = $row['Quantity'];
				print("<tr>
						<td>$wsid</td>
						<td>$title</td>
						<td>$price</td>
						<td>$quantity</td>");
					if($quantity<=1){		
						print("<td>Yes</td>");
					}
					else{
						print("<td></td>");
					}
					print("</tr>");
			}
			print("</tbody></table></div>");
		}
		else{
			print("<h3>There are no items to list</h3>");
		}
	}
?>	
