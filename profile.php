<?php
	session_start();
	include_once("php_db/db_connection.php");
	
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
	<link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='UTF-8' />
	<meta name='author' content='Jeffrey Wong'>
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
		<div class="col-md-9 background"><br />
			<h1><?php echo $_SESSION['username'];?>'s  Profile</h1><hr />
		</div>
	
		<!--Right Section-->
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