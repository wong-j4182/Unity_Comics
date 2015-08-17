<?php
function add_item($category){
	$GN = strcmp($category,'GN');
	$CB = strcmp($category,'CB');
	$MV = strcmp($category,'MV');
	if(strcmp($category,'')==0){
		print("<tr></tr>");
	}
	/*else if($statement==1){
		print("<tr><h3>Your item has been successfully added to the inventory</h3></tr>");
		header('location:http://turing.plymouth.edu/~jwong/Webstore/store/add_Inventory.php?category=');
		print("<tr><h3>Your item has been successfully added to the inventory</h3></tr>");
	}*/
	else{	
		if($GN==0 || $CB==0){ 
			$distributor="<tr><td>	 
							 <div class='row'>
								<label class='col-sm-2'>Publisher:</label>
								<div class='col-sm-3'>
									<select name='publisher' id='publisher'>
									 <option value='Marvel'>Marvel</option>
									 <option value='DC Comics'>DC Comics</option>
									</select>
								</div>
							 </div></td>
						</tr>";
			$year="<tr><td>
					 <div class='row'>
						<label class='col-sm-2'>Year:</label>
						<div class='col-sm-2'>
							<select name='year' id='year'>";
							for($i=1920;$i<=2014;$i++){
								$year.="<option value='".$i."'>".$i."</option>";
								if($i==2014){
									$year.="<option selected='selected'>".$i."</option>";
								}
							}
			$year.="</select></div>
					 </div></td>
					</tr>";
				if($GN==0 && $CB!=0){
				$category='Add a Graphic Novel';
					$format="<tr><td>
							 <div class='row'>
								<label class='col-sm-2'>Format:</label>
								<div class='col-sm-2'>
									<select name='format' id='format'>
									 <option value='Hardcover'>Hardcover</option>
									 <option value='Paperback'>Paperback</option>
									</select></div></div></td>
							</tr>";
					$isbn="<tr><td>
							 <div class='row'>
								<label class='col-sm-2'>ISBN:</label>
								<div class='col-sm-4'><input class='form-control' name='isbn' id='isbn' maxlength='13'></div>
							 </div></td>
						</tr>";		
				}
				else{
					$category='Add a Comic Book';
				}
		}
		else if($MV==0){
			$category='Add a movie';
			$format="<tr><td>
					 <div class='row'>
						<label class='col-sm-2'>Format:</label>
						<div class='col-sm-2'>
							<select name='format' id='format'>
							 <option value='Blu-ray'>Blu-ray</option>
							 <option value='DVD'>DVD</option>
							</select></div></div></td>
					</tr>";
					
			$distributor="<tr><td>	 
							 <div class='row'>
								<label class='col-sm-2'>Studio:</label>
								<div class='col-sm-3'>
									<select name='studio' id='studio'>
									 <option value='Marvel Studios'>Marvel Studios</option>
									 <option value='Warner Bros.'>Warner Bros.</option>
									</select>
								</div>
							 </div></td>
						</tr>";
		}
		print("<p><h3><u>$category</u></h3>
			<tr><td><div class='row'>
					<label class='col-sm-2'>Item name:</label>
					<div class='col-sm-6'><input name='itemname' id='itemname' class='form-control' /></div>
				 </div></td></tr>
			<tr><td>
				 <div class='row'>
					<label class='col-sm-2'>Price:</label>
					<div class='col-sm-2'><input name='price' id='price' class='form-control'></div>
				 </div></td>
			</tr>
			<tr><td>
				 <div class='row'>
					<label class='col-sm-2'>Condition:</label>
					<div class='col-sm-2'>
						<select name='condition' id='condition'>
						 <option value='New'>New</option>
						 <option value='Used'>Used</option>
						</select></div></div>
				 </div></td>
			</tr>");
		if($GN==0 || $CB==0){
			print("$distributor $year");
			if($GN==0){
				print("$format $isbn");
			}
		}
		else if($MV==0){
			print("$format $distributor");
		}
		print("<tr><td>
				 <div class='row'>
					<label class='col-sm-2'>Info:</label>
					<div class='col-sm-6'><textarea name='info' id='info' class='form-control' maxlength='500'></textarea></div>
				 </div>
			</td></tr>
			<tr></table>
			<input class='btn btn-default' name='button' type='submit' value='Add Item' /></tr></p>
			");
	}
}
?>