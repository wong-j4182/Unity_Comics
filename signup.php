<?php
	session_start();	

	include_once("php_db/db_connection.php");
	
	//User verify if theres already session
	if(isset($_SESSION['username'])){
		header('location:index.html');
		exit();
	}
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unity Comics</title>
	<link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
	<link rel='icon' type='image/png' href='http://turing.plymouth.edu/~jwong/Webstore/logo3.gif'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src='js/main.js' type='text/javascript'></script>
	<script src='js/signup.js' type='text/javascript'></script>
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
		<div class="col-md-9 background">
			<?php	
			$signupform= "<h2>Signup for an account</h2><br />
					<form method='POST' action='signup.php'>
						<fieldset class='column'>
							<legend>User Signup:</legend>
							<p><strong>First name:</strong><span style='padding-left: 76px;'><strong>Last name:</strong></span><br />
								<label><input type='search' name='first' id='first' size='15' placeholder='ex. Bruce'/></label>
								<label><input type='search' name='last' id='last' size='15' placeholder='ex. Wayne'/></label></p>
							<p><strong>Username:</strong><br />
								<label><input type='text' name='username' id='username' maxlength='16 'size='15' placeholder='ex. username123'/></label>(Must be 15 characters or less)
								<span id='unamestatus'></span></p>
							<p><strong>Email:</strong><br />
								<label><input type='search' name='email' id='email' maxlength='75' size='30' placeholder='ex. username@domain.com'/></label></p>
							<p><strong>Password:</strong><br />
								<label><input type='password' id='password' name='password' size='12' maxlength='15'/></label> (Must be between 6 & 12 characters)</p>
							<p><strong>Confirm Password:</strong><br />
								<label><input type='password' id='confirm' name='confirm' size='12' maxlength='15'/></label></p>
							
							<div><input type='submit' value='Create Account'/></div>
						</fieldset>
					</form>";
			
			if(!isset($_POST['username'])){
				echo $signupform;
			}
			else if(isset($_POST['username'])){
				if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
					$username = mysqli_real_escape_string($db_connect,$_POST['username']);
					$email = mysqli_real_escape_string($db_connect,$_POST['email']);
					$password = mysqli_real_escape_string($db_connect,$_POST['password']);
					$confirm = mysqli_real_escape_string($db_connect,$_POST['confirm']);
					$firstname = mysqli_real_escape_string($db_connect,$_POST['firstname']);
					$lastname = mysqli_real_escape_string($db_connect,$_POST['lastname']);
					
					echo $email;
					echo $password;
					echo $confirm;
					echo $firstname;
					echo $lastname;
					if(strcmp($password,$confirm) != 0){
						print("<br /><h3>*Password fields do not match up.</h3><br />$signupform");
					
					}
					
					
				}
				else{
					print("<br /><h3>*You did not fill out all the fields</h3><br />$signupform");

				}
			}
			?>
			<p>
			 
			</p>
		</div>
	</div>
	
	<!--<p><strong>Phone Number:</strong><br />
						<label><input type='search' name='areacode' size='8' maxlength='3' placeholder='Area Code'/></label>
						<label><input type='search' name='phone' size='13' maxlength='7' placeholder='Phone Number'/></label></p>
					<p><strong>Address:</strong><br />
						<label><input type='search' name='address' size='20'/></label></p>
					<p><strong>City:</strong><br />
						<label><input type='search' name='city' size='20'/></label></p>
					<p><strong>State:</strong><br />
						<select name='state'>
						<option selected='selected'> </option>
							<option>AL</option><option>AK</option><option>AZ</option><option>AR</option><option>CA</option>
							<option>CO</option><option>CT</option><option>DE</option><option>FL</option><option>GA</option>
							<option>HI</option><option>ID</option><option>IL</option><option>IN</option><option>IA</option>
							<option>KS</option><option>KY</option><option>LA</option><option>ME</option><option>MD</option>
							<option>MA</option><option>MI</option><option>MN</option><option>MS</option><option>MO</option>
							<option>MT</option><option>NE</option><option>NV</option><option>NH</option><option>NJ</option>
							<option>NM</option><option>NY</option><option>NC</option><option>ND</option><option>OH</option>
							<option>OK</option><option>OR</option><option>PA</option><option>RI</option><option>SC</option>
							<option>SD</option><option>TN</option><option>TX</option><option>UT</option><option>VT</option>
							<option>VA</option><option>WA</option><option>WV</option><option>WI</option><option>WY</option>
						</select></p>
					<p><strong>Zipcode:</strong><br />
						<label><input type='search' name='zipcode' size='8' maxlength='5' placeholder='ex. 03101'/></label></p>-->
	
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