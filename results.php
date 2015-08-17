<?php
	session_start();
	include('showTables.php');
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unity Comics</title>
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
		<div class="col-md-9 background col-centered row-fluid"><br />
			<?php
			if(empty($_GET['search'])){
				print("<p><h1>You did not enter a search word. Please try again</h1></p>");
			}
			else{
				$search = $_GET['search'];
				show_search($search,$db_connect);
			}?>
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
