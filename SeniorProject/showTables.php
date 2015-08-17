<?php
	include_once("php_db/db_connection.php");
	
	//Show products on Home Page
	function display_Products_table($tablenameGN,$connection){
		$query_stringGN = "SELECT * FROM $tablenameGN LIMIT 0,9";
		$resultGN = mysqli_query($connection,$query_stringGN);
		$itemlist = mysqli_num_rows($resultGN);
		if($itemlist > 0){
			while($row=mysqli_fetch_array($resultGN)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$picGN = str_replace(array(" ",":","#",'/'),array("_","","",'/'), $name);
				print("<div class='col-sm-4 col-lg-4 col-md-4'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$picGN.jpg' width='210' height='265' alt='cover art'></a>
					   <div class='caption'>
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					   </form>");
				print("</div></div></div>");		
			}
		}
	}
	//Display Graphic Novels products
	function display_GN_table($tablename,$connection){
		$query_string = "SELECT * FROM $tablename ";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":","#",'/'),array("_","","",""), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form>");
				print("</div></div></div>");
			}
		}
	}
	//Display Comic Book products
	function display_CB_table($tablename,$connection){
		$query_string = "SELECT * FROM $tablename ";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",'/'), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					   </form>");
				print("</div></div></div>");
			}
		}
	}
	//Display Movies products
	function display_MV_table($tablename,$connection){
		$query_string = "SELECT * FROM $tablename ORDER BY Name";
		$result = mysqli_query($connection,$query_string);
		$column_count = mysqli_num_fields($result);
		
		while($row=mysqli_fetch_array($result)){
			$name = $row['Name'];
			$price = $row['Price'];
			$studio = $row['Studio'];
			$wsid = $row['WSID'];
			$info = $row['Info'];
			$summary = substr($info,0,60);
			//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
			$pic = str_replace(array(" ",":","#","/"),array("_","","",""), $name);
			print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='moviecovers/$pic.jpg' width='200' height='265' alt='Movie art'></a>
                   <div class='caption'>           
                   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
				   <h4>$$price</h4>
				   <h5>Studio: $studio</h5>
				   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
				   </form>");
            print("</div></div></div>");
		}
	}
	//Display results from search
	function show_search($id,$connection){
		$search_query = "SELECT * FROM GraphicNovels WHERE Name LIKE '%$id%' UNION ALL SELECT * FROM Movies WHERE Name LIKE '%$id%' UNION ALL SELECT * FROM ComicBooks Where Name LIKE '%$id%'";
		$search_result = mysqli_query($connection, $search_query);
		
		$count=mysqli_num_rows($search_result);
		if($count<1){
			print("<p><h1>No results found for '$id'</h1></p>");
		}
		else{
			print("<p><h1>$count results found for '$id'</h1></p><hr />
			<div class='row'><br />");
			while($row=mysqli_fetch_array($search_result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$product_id = $wsid[0].$wsid[1];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",''), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'>
					<a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>");
					if(strcmp($product_id, 'MV')==0){
						$cover_id = "moviecovers";
					}
					else{
						$cover_id = "covers";
					}
					print("<img src='$cover_id/$pic.jpg' width='200' height='265' alt='$name' /></a><div class='caption'>           
					<h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$$name'>$name</a></h4>
					<h4>$$price</h4>
					<p>$summary...</p>
					<form id='addtocart' name='button' method='POST' action='cart.php'>
					<input type='hidden' name='wsid' id='wsid' value='$wsid'>
					<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					</form>");
				print("</div></div></div>");
			}
		}
		print("</div>");
	}
	//Show the featured product
	function featured_product($connection){
		$query_string = "SELECT * FROM ComicBooks WHERE Name='Superman Futures End #1'";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row = mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",''), $name);
				print("<div class='thumbnail'>
					   <a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='180' height='200' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					   </form>");
				print("</div></div>");
			}
		}
	}
	//Display a single item
	function display_item($title,$connection){
		$product_id = $title[0].$title[1];
		print("<div class='row'>");
		//Graphic Novels Table
		if(strcmp($product_id, 'GN')==0){
			$query_string = "SELECT * FROM GraphicNovels WHERE WSID='$title' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$publisher = $row['Publisher'];
					$format = $row['Format'];
					$year = $row['Year'];
					$condition = $row['Condition'];
					$isbn = $row['ISBN'];
					$wsid = $row['WSID'];
					//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
					$pic = str_replace(array(" ",":",'#','/'),array("_",""," ",""), $name);
					print("<div class='col-md-5'><img src='covers/$pic.jpg' width='290' height='500' alt='$name Cover Art' />
					</div>
					<div class='col-md-6'>
						<h1>$name<h1>
						<h2>Price: $$price</h2>
						<form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form><br />
						<h4>Publisher: $publisher</4>
						<h4>Format: $format</h4>
						<h4>Year: $year</h4>
						<h4>ISBN: $isbn</h4><br /><p>Description: <br/>$info</p>
					</div>
					<title>$name</title>");
				}
			}
		}
		//Comic Book Table
		else if(strcmp($product_id, 'CB') == 0){
			$query_string = "SELECT * FROM ComicBooks WHERE WSID='$title' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$publisher = $row['Publisher'];
					$year = $row['Year'];
					$wsid = $row['WSID'];
					//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
					$pic = str_replace(array(" ",":",'#','/'),array("_","","",""), $name);
					print("<div class='col-md-5'><img src='covers/$pic.jpg' width='290' height='500' alt='$name Cover Art' />
					</div>
					<div class='col-md-6'>
						<h1>$name<h1>
						<h2>Price: $$price</h2>
						<form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form><br />
						<h4>Publisher: $publisher</4>
						<h4>Year: $year</h4><br />
						<p>Description: <br/>$info</p>
					</div>
					<title>$name</title>");
				}
			}
		}
		//Movie Table
		else if(strcmp($product_id, 'MV') == 0){
			$query_string = "SELECT * FROM Movies WHERE WSID='$title' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$format = $row['Format'];
					$studio = $row['Studio'];
					$wsid = $row['WSID'];
					//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
					$pic = str_replace(array(" ",":",'#','/'),array("_",""," ",""), $name);
					print("<div class='col-md-5'><img src='moviecovers/$pic.jpg' width='290' height='500' alt='$name Cover Art' />
					</div>
					<div class='col-md-6'>
						<h1>$name<h1>
						<h2>Price: $$price</h2>
						<form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form><br />
						<h4>Studio: $studio</h4>
						<h4>Format: $format</h4>
						<p>Description: <br/>$info</p>
					</div>
					<title>$name</title>");
				}
			}
		}
		print("</div>");
	}
	//Show reviews
	function display_review($title,$connection){
		$review_query = "SELECT * FROM reviews WHERE WSID='$title'";
		$review = mysqli_query($connection,$review_query);			
		$reviewlist = mysqli_num_rows($review);		
		print("<div class='row'>");
			if($reviewlist<1){
				print("<div class='col-md-12'><h4>There are no reviews for this item</h4></div>");
			}
			else{
				while($reviewrow = mysqli_fetch_array($review)){
					$text = $reviewrow['review_text'];
					$cid = $reviewrow['CID'];
					$rating = $reviewrow['rating'];
					$empty = 5-$rating;
					$date = date($reviewrow['review_date']);
							$reviewer_query = "SELECT * FROM customers WHERE CID='$cid'";
							$reviewer = mysqli_query($connection,$reviewer_query);
							while($reviewerrow = mysqli_fetch_array($reviewer)){
								$user= $reviewerrow['username'];
							}
					print("<div class='col-md-12'>
							<div class='panel panel-danger'>
								<div class='panel-heading'>
								  <h3 class='panel-title'>Review by $user</h3>
								</div>
								<div class='panel-body'>");
								for($i=0;$i<$rating;$i++){
									print("<span class='glyphicon glyphicon-star'></span>");
								}
								for($j=0;$j<$empty;$j++){
									print("<span class='glyphicon glyphicon-star-empty'></span>");
								}
								print("<span class='pull-right'>$date</span><hr />
								<p>$text</p>
								</div>
							</div>
							</div>");
				}
			}
			print("</div>");
	}
	//Display Comic Book Results by Publisher
	function show_search1($publisher,$connection){
		$search_query = "SELECT * FROM GraphicNovels WHERE Publisher='$id' UNION ALL SELECT * FROM ComicBooks Where Name LIKE '%$id%' UNION ALL SELECT * FROM Movies Where Name LIKE '%$id%'";
		$search_result = mysqli_query($connection,$search_query);

		$count=mysqli_num_rows($search_result);
		if($count<1){
			print("<p><h1>No results found for '$id'</h1></p>");
		}
		else{
			print("<p><h1>$count search results found for '$id'</h1></p><hr />
			<div class='row'><br />");
			while($row=mysqli_fetch_array($search_result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$product_id = $wsid[0].$wsid[1];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",''), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'>
						<a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>");
						if(strcmp($product_id, 'MV')==0){
							$cover_id = "moviecovers";
						}
						else{
							$cover_id = "covers";
						}
						print("<img src='$cover_id/$pic.jpg' width='200' height='265' alt='$name' /></a><div class='caption'>           
						<h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$pic' alt='$$name'>$name</a></h4>
						<h4>$$price</h4>
						<p>$summary...</p>
						<form id='addtocart' name='button' method='POST' action='cart.php'>
						<input type='hidden' name='wsid' id='wsid' value='$wsid'>
						<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form>");
				print("</div></div></div>");
			}
		}
		print("</div>");
	}
	//Display civil war page
	function civil_war($connection){
		$search_query = "SELECT * FROM GraphicNovels WHERE Name='Civil War' UNION ALL SELECT * FROM GraphicNovels WHERE Name LIKE '%Iron Man%' UNION ALL SELECT * FROM GraphicNovels WHERE Name LIKE '%Captain America%'";
		$search_result = mysqli_query($connection,$search_query);

		$count=mysqli_num_rows($search_result);
		print("<p><div class='row'><br />");
			while($row=mysqli_fetch_array($search_result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$product_id = $wsid[0].$wsid[1];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",''), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'>
					<a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>");
					if(strcmp($product_id, 'MV')==0){
						$cover_id = "moviecovers";
					}
					else{
						$cover_id = "covers";
					}
					print("<img src='$cover_id/$pic.jpg' width='200' height='265' alt='$name' /></a><div class='caption'>           
					<h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$$name'>$name</a></h4>
					<h4>$$price</h4>
					<p>$summary...</p>
					<form id='addtocart' name='button' method='POST' action='cart.php'>
					<input type='hidden' name='wsid' id='wsid' value='$wsid'>
					<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					</form>");
				print("</div></div></div>");
			}
		print("</div>");
	}
	//Display Marvel Comic Book products
	function marvel_page($tablename,$connection){
		$query_string = "SELECT * FROM $tablename WHERE Publisher='Marvel'";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$publisher = $row['Publisher'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",'/'), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					   </form>");
				print("</div></div></div>");
			}
		}
	}
	//DC Comics page
	function DC_page($tablename,$connection){
		$query_string = "SELECT * FROM $tablename WHERE Publisher='DC Comics'";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$publisher = $row['Publisher'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":",'#','/'),array("_","","",'/'), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
					   </form>");
				print("</div></div></div>");
			}
		}
	}
	//Display Graphic Novels products
	function marvelGN_page($tablename,$connection){
		$query_string = "SELECT * FROM $tablename WHERE Publisher='Marvel'";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":","#",'/'),array("_","","",""), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form>");
				print("</div></div></div>");
			}
		}
	}
	//Display Graphic Novels products
	function DC_ComicsGN_page($tablename,$connection){
		$query_string = "SELECT * FROM $tablename WHERE Publisher='DC Comics'";
		$result = mysqli_query($connection,$query_string);
		$itemlist = mysqli_num_rows($result);
		
		if($itemlist > 0){
			while($row=mysqli_fetch_array($result)){
				$name = $row['Name'];
				$price = $row['Price'];
				$wsid = $row['WSID'];
				$info = $row['Info'];
				$summary = substr($info,0,60);
				//Alter $name string to get rid of ':','#','/' characters and replace " " spaces with an underscore to match the cover pictures in folder
				$pic = str_replace(array(" ",":","#",'/'),array("_","","",""), $name);
				print("<div class='col-sm-3 col-lg-3 col-md-3'><div class='thumbnail'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='covers/$pic.jpg' width='200' height='265' alt='cover art'></a>
					   <div class='caption'>           
					   <h4><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></h4>
					   <h4>$$price</h4>
					   <p>$summary...</p>
					   <form id='addtocart' name='button' method='POST' action='cart.php'>
							<input type='hidden' name='wsid' id='wsid' value='$wsid'>
							<input class='btn btn-primary' type='submit' name='button' id='button' value='Add to Cart' /><br />
						</form>");
				print("</div></div></div>");
			}
		}
	}
?>