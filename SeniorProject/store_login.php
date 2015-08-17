<?php
	session_start();
	
	include_once('../php_db/db_connection.php');

	//Store admin verify if theres already session
	if(isset($_SESSION['username']) && isset($_SESSION['admin'])){
		header('location:../store/index.php');
		exit();
	}
	//Only true if submit button is clicked with information
	if(isset($_POST['username']) && isset($_POST['password'])){
		//Check admin credentials
		$admin = preg_replace('#[^A_Za-z0-9]#i','',$_POST['username']); //Variable username of admin
		$password = preg_replace('#[^A_Za-z0-9]#i','',$_POST['password']); //Variable password of admin
		$userlevel = 'admin';
		
		$query_string = "Select * FROM admin WHERE username='$admin' AND password='$password' LIMIT 1";
		$query_string2 = "Select * FROM customers WHERE username ='$admin' AND password='$password' AND userlevel='$userlevel' LIMIT 1";
		$query = mysqli_query($db_connect,$query_string);
		$query2 = mysqli_query($db_connect,$query_string2);
		$verify = mysqli_num_rows($query);
		$verify2 = mysqli_num_rows($query2);
		//stores session information
		if($verify==1 && $verify2==1){
			while($row=mysqli_fetch_array($query)){
				$storeID = $row['CID'];
			}
			$_SESSION['CID'] = $storeID;
			$_SESSION['admin'] = $admin;
			$_SESSION['username'] = $admin;
			$_SESSION['password'] = $password;
			$subtotal_format = number_format('0', 2);
			$_SESSION['subtotal'] = $subtotal_format;
			header('location:../store/index.php');
		}
		//Incorrect credential statement
		else{
			echo "Incorrect login info";
		}
	}
	//header('location:../store/store_login.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unity Comics - Store Login</title>
	<link href='../css/bootstrap.css' type='text/css' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='../js/bootstrap.js' type='text/javascript'></script>
	
	<meta charset='utf-8' />
	<meta name='author' content='Jeffrey Wong'>
	<meta name='description' content="A website to shop and browse all your favorite pop culture comics, graphic novels, movies, and more. 
	From The Avengers to the Walking Dead, you'll find exactly what you're looking for." />
	<meta name='keywords' content='superheroes, DC comics, Marvel, Superman, Batman, The Avengers, The Walking Dead' />

</head>

<body>
	<div class='container'>	
		
		<!--Dropdown menu-->
		<?php include_once("../nav_bar.php")?>
		
		<!--Left Section-->
		<?php include_once("../side_bar.html")?>
		
		<!--Main Content-->
		<div class="col-sm-6 col-md-6 background">
			<p>	
				<!--Log in Form for Admin-->
				<form method='POST' action='store_login.php'>
					<fieldset class='column'>
						<legend>Admin Login:</legend>
						<p><strong>Username:</strong><br />
							<label><input type='search' name='username' id='username' size='15'/></label></p>
						<p><strong>Password:</strong><br />
							<label><input type='password' name='password' id='password' size='10' maxlength='12'/></label></p>
						<div><input type="submit" value="Log in"/></div>
					</fieldset>
				</form>		  
			</p>
		</div>
	
		<!--Right Section-->
		<!--<div class="col-md-3">
			<script type="text/javascript" src="http://output52.rssinclude.com/output?type=js&amp;id=933966&amp;hash=52d3039a386e1134435c6bfd4972eaeb"></script>
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