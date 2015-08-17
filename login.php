<?php
	session_start();
	 
	include_once('php_db/db_connection.php');
	
	//User verify if theres already session
	if(isset($_SESSION['username'])){
		header('location:index.html');
		exit();
	}
	//Only true if submit button is clicked with information
	if(isset($_POST['username']) && isset($_POST['password'])){
		//Check admin credentials
		$user = preg_replace('#[^A_Za-z0-9]#i','',$_POST['username']); //Variable username of admin
		$password = preg_replace('#[^A_Za-z0-9]#i','',$_POST['password']); //Variable password of admin
		
		$query_string = "Select * FROM customers WHERE username='$user' AND password='$password' LIMIT 1";
		$query = mysqli_query($db_connect,$query_string);
		$verify = mysqli_num_rows($query);
		//stores session information
		if($verify==1){
			while($row=mysqli_fetch_array($query)){
				$storeID = $row['CID'];
				$userlevel = $row['userlevel'];
			}
			$_SESSION['CID'] = $storeID;
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['userlevel'] = $userlevel;
			header('location:index.html');
			exit();
		}
		//Incorrect credential statement
		else{
			echo "Incorrect login credentials";
			exit();
		}
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

<body>
	<div class='container'>	
		
		<!--Dropdown menu-->
		<?php include_once("nav_bar.php")?>
		
		
		<!--Left Section-->
		<?php include_once("side_bar.html")?>
		
		<!--Main Content-->
		<div class="col-sm-6 col-md-6 background">
			<p>	
				<!--Log in Form for User-->
				<form method='POST' action='login.php'>
					<fieldset class='column'>
						<legend>User Login:</legend>
						<p><strong>Username:</strong><br />
							<label><input type='search' name='username' id='username' size='15'/></label></p>
						<p><strong>Password:</strong><br />
							<label><input type='password' name='password' id='password' size='10' maxlength='12'/></label></p>
						<div><input type="submit" value="Log in"/></div>
					</fieldset>
				</form>		  
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