<?php 
	session_start();
	
	include_once('admin_verify.php');
	include_once('showInventory.php');
	include_once('verify_handler.php');
	include_once('add_Inventory_handler.php');
	
	$category = $_GET['category'];
	if(isset($category)){

		if(isset($_POST['itemname'])){
			$itemname = mysqli_real_escape_string($db_connect,$_POST['itemname']);
			$price = mysqli_real_escape_string($db_connect,$_POST['price']);
			$condition = mysqli_real_escape_string($db_connect,$_POST['condition']);
			$info = mysqli_real_escape_string($db_connect,$_POST['info']);
			
			if(strcmp($category,'CB')==0){
				$publisher = mysqli_real_escape_string($db_connect,$_POST['publisher']);
				$year = mysqli_real_escape_string($db_connect,$_POST['year']);
				
				$query_string="SELECT Name FROM ComicBooks WHERE Name='$itemname' LIMIT 1";
				$query_string2="SELECT * FROM ComicBooks";
				$match = mysqli_query($db_connect,$query_string);
				$quantity = mysqli_query($db_connect,$query_string2);
				$name_match = mysqli_num_rows($match);
				$number=mysqli_num_rows($quantity);
				$storeid= 'CB'.($number+1);
				if($name_match >0){
					$message = "This item is already in the database.";
					exit();
				}
				$insert = mysqli_query($db_connect, "INSERT INTO `jwong`.`ComicBooks` (`Name`, `Price`, `Condition`, `Year`, `Quantity`, `Info`, `Publisher`, `Restock`, `WSID`) 
				VALUES ('$itemname', '$price', '$condition', '$year', '10', '$info', '$publisher', '1', '$storeid');");
				$message = "This item has been added to inventory";

			}
			else if(strcmp($category,'GN')==0){
				$publisher = mysqli_real_escape_string($db_connect,$_POST['publisher']);
				$year = mysqli_real_escape_string($db_connect,$_POST['year']);
				$format = mysqli_real_escape_string($db_connect,$_POST['format']);
				$isbn = mysqli_real_escape_string($db_connect,$_POST['isbn']);
				
				//$query_string="SELECT Name FROM GraphicNovels WHERE Name='$itemname' LIMIT 1";
				$query_string2="SELECT * FROM GraphicNovels";
				$match = mysqli_query($db_connect,$query_string);
				$quantity = mysqli_query($db_connect,$query_string2);
				//$name_match = mysqli_num_rows($match);
				$number=mysqli_num_rows($quantity);
				$storeid='GN0000'.($number+1);
				if($name_match >0){
					$message = "This item is already in the database.";
					exit();
				}
				$insert = mysqli_query($db_connect, "INSERT INTO `jwong`.`GraphicNovels` (`Name`, `Price`, `Format`, `Condition`, `Year`, `Quantity`, `Info`, `Publisher`, `OrderID`, `ISBN`, `WSID`) 
				VALUES ('$itemname', '$price', '$format', '$condition', '$year', '15', '$info', '$publisher', '1', '$isbn', '$storeid');");
				//$pic = str_replace(array(" ",":",'#','/'),array("_","","",'/'), $itemname);
				//move_uploaded_file($_FILES['fileField']['tmp_name'],"../covers/$pic.jpg");
			}
			else if(strcmp($category,'MV')==0){
				$format = mysqli_real_escape_string($db_connect,$_POST['format']);
				$studio = mysqli_real_escape_string($db_connect,$_POST['studio']);
				
				$query_string="SELECT Name FROM ComicBooks WHERE Name='$itemname' LIMIT 1";
				$query_string2="SELECT * FROM Movies";
				$match = mysqli_query($db_connect,$query_string);
				$quantity = mysqli_query($db_connect,$query_string2);
				$name_match = mysqli_num_rows($match);
				$number=mysqli_num_rows($quantity);
				$storeid='MV0000'.($number+1);
				if($name_match >0){
					$message = "This item is already in the database.";
					exit();
				}
				$insert=mysqli_query($db_connect,"INSERT INTO `jwong`.`Movies` (`Name`, `Price`, `Format`, `Condition`, `Quantity`, `Info`, `Studio`, `Restock`,`ImageID`,`OrderID`,`WSID`) 
				VALUES ('$itemname', '$price', '$format', '$condition', '10', '$info', '$studio', '1', 'Null', '12', '$storeid');");
				//echo $format;
				//echo $studio;
			}
		//$query_string=mysqli_query()
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Inventory</title>
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
		<div class="col-md-8 background"><br />
			<h5><a href='index.php'>Back</a></h5>
			<p><h1>Add an item to inventory</h1></p><hr />
			<p><h3>Select Category:</h3><form method='GET' action='add_Inventory.php?category='>
											<select name='category'>
													<option value='' selected='selected'>Choose Category</option>
													<option value='CB'>Comic Book</option>
													<option value='GN'>Graphic Novel</option>
													<option value='MV'>Movie</option>
											</select>
											<input type='submit' value='Select' />
										</form>
			</p>
			<div class='control-group'>
				<form class='form-horizontal' method='POST' action='add_Inventory.php?category=<?= $category?>' name='addItem' id='addItem' enctype='multi/form-data'> 
					<table class='table'>
						<?php
							if(isset($_POST['itemname'])){
								$itemname= $_POST['itemname'];
								print("<h3>$itemname has been added to the inventory<h3>");
								$category='';
							}
							else{
								add_item($category);
							}
						?>
					</table>
				</form><br />
				
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