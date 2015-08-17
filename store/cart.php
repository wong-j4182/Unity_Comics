<?php
	session_start();
	
	include_once('showTables.php');	
	include_once('cart_functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong' />
	<meta name='description' content="A website to shop and browse all your favorite pop culture comics, graphic novels, movies, and more. 
	From The Avengers to the Walking Dead, you'll find exactly what you're looking for." />
	<meta name='keywords' content='superheroes, DC comics, Marvel, Superman, Batman, The Avengers, The Walking Dead' />

</head>

<body>

	<div class='container'>	
		
		<!--Dropdown menu-->
		<?php include_once("nav_bar.php")?>
		
		<!--Left Section-->
		<?php include_once("side_bar.html")?>

		<!--Middle Section-->
		<div class="col-md-9 col-lg-9 background"><br />
			<h1>My Cart</h1>
			<?php 
			//Display Cart
			if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1){
				print("<hr /><h3>Cart is empty<h3>
						<div class='col-md-12 col-lg-12'>
						<table class='table'>
							<thead>
							  <tr>
								<th>Item No.</th>
								<th>Title</th>
								<th>Format</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
							  </tr>
							</thead>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr><br />");
				
			}
			else{
				print("<h4><a href='cart.php?action=emptyCart'>Empty your Cart</a></h4><hr />");
				print("<div class='col-md-12 col-lg-12'>
						  <table class='table'>
							<thead>
							  <tr>
								<th class='text-center'>Item No.</th>
								<th class='text-center'>Cover</th>
								<th>Title</th>
								<th>Format</th>
								<th>Price</th>
								<th>Quantity</th>
								<th class='text-center'>Total Price</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>");
				$j=0;
				foreach($_SESSION['cart'] as $single_item){
					$id = $single_item['wsid'];
					$quantity = $single_item['quantity'];
					show_cart_item($id,$quantity,$db_connect,$j);
					$j++;
				}
				print("</tbody>");
			}
			print("</table><hr /><br/>
					<h3 class='pull-right'>Cart Total = $");
					echo $_SESSION['subtotal'];
			print("</h3><br /><br /><br /></div>");
			?>
		</div> 
	
	</div>
	
	<!--Footer-->
	<div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12 background">
                    <p>Copyright &copy; Created by Jeffrey Wong 2014</p>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>