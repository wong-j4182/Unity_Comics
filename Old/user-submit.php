<?php
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pnumber = ($_POST['areacode'].$_POST['phone']);
	$phone = trim($pnumber);
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$orderID = rand(0,999999);
	$CID = rand(0,999999);
	
	if(!Isset($username)||$username==""){
		print("<p>No Username has been selected<p>");
	}
	else{
		$connection = mysql_connect("localhost","jwong","2Fast4u1") or die("Fail to communicate with database");
		mysql_select_db("jwong");
		
		INSERT INTO `jwong`.`customers` (`CID`, `username`, `email`, `password`, `firstname`, `lastname`, `address`, `city`, `state`, `zipcode`, `signup`, `userlevel`) 
		VALUES (NULL, 'pancakes', 'pancakes@gmail.com', 'yesman', 'pan', 'cake', NULL, NULL, NULL, NULL, '2014-12-13 00:00:00', 'user');
		$addUser="INSERT INTO Customers(Firstname, Lastname, CID, Email, Username, Password, Phone, OrderID, Address, City, State, Zipcode)
			VALUES('$first', '$last', '$CID', '$email', '$username', '$password', '$phone', '$orderID', '$address', '$city', '$state', $zipcode)";
		$result = mysql_query($addUser);
		mysql_close($connection);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Unity Comics</title>
	<link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong'>
	<meta name='description' content="A website to shop and browse all your favorite pop culture comics, graphic novels, movies, and more. 
	From The Avengers to the Walking Dead, you'll find exactly what you're looking for." />
	<meta name='keywords' content='superheroes, DC comics, Marvel, Superman, Batman, The Avengers, The Walking Dead' />

</head>

	<body id='background'>
		<div id='banner'>
		  <table cellpadding="0" cellspacing="0" id='title' >
			<tr>
			  <td>Pop! Comics</td>
			</tr>
		  </table>
		</div>
		
		<div id='body'>
			<div id='contentbackground'>
			<?php include('menu.html') ?>
			
			  <table cellpadding="3" cellspacing="1" id='tablebody'>
				<tr>
				<!--Sidebar--> 				
				  <td id='leftsidebar'>
					
					<div>
					  <table>
						<tr>
						  <td>
							<p align="center"><font color="#FFFFFF"><b>Products</b></font></td>
						</tr>
						<tr>
						  <td><a href='http://turing.plymouth.edu/~jwong/Webstore/index.html'>Home</a></td>
						</tr>
						<tr>
						  <td>
							<a href='http://turing.plymouth.edu/~jwong/Webstore/ComicBooks.html'>Comic Books</a></td>
						</tr>
						<tr>
						  <td>
							<a href='http://turing.plymouth.edu/~jwong/Webstore/GraphicNovels.html'>Graphic Novels</a></td>
						</tr>
						<tr>
						  <td>
							<a href='http://turing.plymouth.edu/~jwong/Webstore/Movies.html'>Movies</a></td>
						</tr>
						<tr>
						  <td>Characters</td>
						</tr>
						<tr>
						  <td>Posters</td>
						</tr>
						<tr>
						  <td>Video Games</td>
						</tr>
						<tr>
						  <td>T-shirts</td>
						</tr>
					  </table>
					</div>

					<div>
					  <table>
						<tr>
						  <td>
							<p align="center"><font color="#FFFFFF"><b>Customer Help</b></font></td>
						</tr>
						<tr>
						  <td><a href='http://turing.plymouth.edu/~jwong/Webstore/AboutUs.html'>About Us</a></td>
						</tr>
						<tr>
						  <td>FAQ</td>
						</tr>
						<tr>
						  <td>Email us</td>
						</tr>
						<tr>
						  <td>Support</td>
						</tr>
					  </table>
					</div>
					
					<div id='comiclogo'>
						<img src='DCcomics.jpg' alt='DC Comics'><br />
						<img src='MarvelComics.jpg' alt='Marvel Comics'>
					</div>
				  </td>
				
				<!-- Main Content -->
				<!-- Sign-up -->
				<td>
				  <div>
				    <h2>Account Created!</h2>
						<p>
							Thank you <?= $first?> for signing up for an account on Pop! comics.
						</p>
				  </div>
				</td>
				
				<!--Right sidebar -->
				  <td id='rightsidebar'>
					<table>
						<tr>
						 <div  id='rss'>
						  <script type="text/javascript" src="http://output52.rssinclude.com/output?type=js&amp;id=933966&amp;hash=52d3039a386e1134435c6bfd4972eaeb"></script>
						 </div>
						</tr>
					</table>
				  </td>
				</tr>
				
				<tr>
				  <td width="759" height="4" colspan="3" bgcolor="#70B4D3">
					<p align="center"><b>I will put some general information and contact info on this page</b></td>
				</tr>

			  </table>
			</div>
		</div>
	</body>

</html>