<?php 	
	session_start();
	
	include_once('admin_verify.php');
	include_once('showInventory.php');
	include_once('verify_handler.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Movies - Inventory</title>
	<link href='../css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='../js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong' />
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
		<div class="col-md-8 background"><br />
			<h5><a href='index.php'>Back</a></h5>
			<p><h1>Movies Inventory</h1></p><hr />
			<h3><a href='add_Inventory.php?category=' >+Add item to inventory</a></h3>
			<div class='row'>
				<?php
					show_GN_Inventory("Movies", $db_connect);
					mysqli_close($db_connect);
				?>
			</div>
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