<?php
	session_start();
	
	include_once('../php_db/db_connection.php');
	include_once('admin_verify.php');
	include_once('showInventory.php');
	include_once('verify_handler.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Store Controls</title>
	<link href='../css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='../js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong'>
	<meta name='description' content="A website to shop and browse all your favorite pop culture comics, graphic novels, movies, and more. 
	From The Avengers to the Justice League, you'll find exactly what you're looking for." />
	<meta name='keywords' content='superheroes, DC comics, Marvel, Superman, Batman, The Avengers, The Walking Dead' />

</head>

<body>
	<div class='container'>	
		
		<!--Dropdown menu-->
		<?php include_once("../nav_bar.php")?>
		
		
		<!--Left Section-->
		<?php include_once("../side_bar.html")?>

		<!--Middle Section-->
		<div class="col-md-9 background"><br />
			<h1>Control Panel</h1><hr />
			<p>
			<h3><a href='add_Inventory.php?category=' >+Add item to inventory</a></h3>
			<h3><a href='http://turing.plymouth.edu/~jwong/Webstore/store/GNinventory.php'>View Graphic Novels Inventory</a></h3>
			<h3><a href='http://turing.plymouth.edu/~jwong/Webstore/store/CBinventory.php'>View Comic Books Inventory</a></h3>
			<h3><a href='http://turing.plymouth.edu/~jwong/Webstore/store/MVinventory.php'>View Movies Inventory</a></h3>
			</p>
		</div>
	
	</div>
	
	<!--Footer-->
	<div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12 background">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>

</body>

</html>