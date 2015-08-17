<?php
	session_start();
	
	include('showTables.php');
	
?>

<!DOCTYPE html>
<html>
<head>
	<link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
	<link rel='icon' type='image/png' href='http://turing.plymouth.edu/~jwong/Webstore/logo3.gif'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong'>
	<meta name='description' content="A website to shop and browse all your favorite pop culture comics, graphic novels, movies, and more. 
	From The Avengers to the Justice League, you'll find exactly what you're looking for." />
	<meta name='keywords' content='superheroes, DC comics, Marvel, Superman, Batman, The Avengers, The Walking Dead' />

</head>

<body>

	<div class='container'>	
		
		<!--Dropdown menu-->
		<?php include_once("nav_bar.php")?>
		
		<!--Left Section-->
		<?php include_once("side_bar.html")?>
		
		<!--Middle Section-->
		<div class="col-md-9 background"><br />
			<?php
				if(isset($_GET['id'])){
					$item = preg_replace('#[^A-Za-z0-9]#i','',$_GET['id']);
					display_item($item,$db_connect);
				}
				else{
					print("<h1>There is no item with that id in the store</h1>");
				}?>
			<hr />
			<h2>Reviews</h2>
			<form method='GET' action='item.php?=<?= $item?>' action='addreview'>
				<input class='btn btn-danger' type='submit' value='Add Review'/><br />
			</form><br />
			<?php
				if(isset($_GET['action']) && $_GET['action']=='addReview'){
					echo hello;
				}
				display_review($item,$db_connect);
				mysqli_close($db_connect);
			?>
		</div>	

		<!--MyCart-->
		<!--<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
				  <h4 class="panel-title"><a href='http://turing.plymouth.edu/~jwong/Webstore/cart.php'>My Cart</a></h4>
				</div>
				<div class="panel-body text-center">
					<h3>Cart Total: $<?php 
						//echo $_SESSION['subtotal'];
					?></h3>
					<h5><a href='http://turing.plymouth.edu/~jwong/Webstore/cart.php'>View Cart  </a> |
					<a href='http://turing.plymouth.edu/~jwong/Webstore/cart.php?action=emptyCart'>  Empty Cart</a></h5>
				</div>
			</div>
		</div>-->
	
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