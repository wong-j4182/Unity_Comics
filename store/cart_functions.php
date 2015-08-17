<?php
	
	//Adding to cart
	$subtotal = 0;
	$inCart = FALSE;
	
	//Error checking for if $_POST['wsid'] has value
	if(isset($_POST['wsid'])){
		$wsid=$_POST['wsid'];
		
		//If cart empty
		if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1){
			$_SESSION['cart']=array(0 => array('wsid'=>$wsid,'quantity'=>1));
		}
		//If cart has items
		else{
			$i=0;
			//Check array for item
			foreach($_SESSION['cart'] as $single_item){

				while(list($id,$value)=each($single_item)){
					//If item found in $_SESSION['cart'] array
					if($id=='wsid' && $value==$wsid){
						//$single_item['quantity'] +1 if found
						array_splice($_SESSION['cart'],$i,1,array(array('wsid'=>$wsid,'quantity'=>$single_item['quantity']+1)));
						$inCart=TRUE;
					}
				}
			$i++;	
			}
			//If not in array
			if($inCart==FALSE){
				//Puts new item entry into array
				array_push($_SESSION['cart'],array('wsid'=>$wsid,'quantity'=>1)); //add item
			}
		}
	//Fixes issues for double posting on refresh
	//and redirecting to cart on BACK button click
	header('location:cart.php');
	}
	//Empty the cart if link clicked
	if(isset($_GET['action']) && $_GET['action']=='emptyCart'){
		unset($_SESSION['cart']);
		$subtotal_format = number_format('0', 2);
		$_SESSION['subtotal'] = $subtotal_format;
	}
	//print_r($_SESSION['cart']);
	//Delete single item
	if(isset($_POST['removeItem']) && ($_POST['removeItem'])!=""){
		$index = $_POST['removeItem'];
		//If 1 item or less in cart, then unset cart session
		if(count($_SESSION['cart']) <= 1){
			unset($_SESSION['cart']);
			$subtotal_format = number_format('0', 2);
			$_SESSION['subtotal'] = $subtotal_format;
		}
		//Remove item in cart of index $item_remove
		else{
			unset($_SESSION['cart'][$index]);
			//Reorganize items in the cart array
			sort($_SESSION['cart']);
		}
	header('location:cart.php');
	}
	//Show the item in the cart
	function show_cart_item($wsid,$quantity,$connection,$cartNum){
		$product_id = $wsid[0].$wsid[1];
		global $subtotal;

		//Graphic Novels Table
		if(strcmp($product_id, 'GN')==0){
			$query_string = "Select * FROM GraphicNovels WHERE WSID='$wsid' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$publisher = $row['Publisher'];
					$format = $row['Format'];
					$year = $row['Year'];
					$condition = $row['Condition'];
					$isbn = $row['ISBN'];
					$wsid = $row['WSID'];
					$pic = str_replace(array(" ",":",'#','/'),array("_",""," ",""), $name);
				}
			}
		}
		//Comic Book Table
		else if(strcmp($product_id, 'CB') == 0){
			$query_string = "Select * FROM ComicBooks WHERE WSID='$wsid' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$publisher = $row['Publisher'];
					$format = "N/A";
					$year = $row['Year'];
					$wsid = $row['WSID'];
					$pic = str_replace(array(" ",":",'#','/'),array("_","","",""), $name);
				}
			}
		}
		//Movie Table
		else if(strcmp($product_id, 'MV') == 0){
			$query_string = "Select * FROM Movies WHERE WSID='$wsid' LIMIT 1";
			$result = mysqli_query($connection,$query_string);
			$itemlist = mysqli_num_rows($result);
			if($itemlist > 0){
				while($row = mysqli_fetch_array($result)){
					$name = $row['Name'];
					$price = $row['Price'];
					$info = $row['Info'];
					$format = $row['Format'];
					$studio = $row['Studio'];
					$wsid = $row['WSID'];
					$pic = str_replace(array(" ",":",'#','/'),array("_",""," ",""), $name);
				}
			}
		}
		$product_id = $wsid[0].$wsid[1];
		if(strcmp($product_id, 'MV')==0){
			$cover_id = "moviecovers";
		}
		else{
			$cover_id = "covers";
		}
		$Num=$cartNum + 1;
		$totalprice = $price * $quantity;
		$subtotal = $totalprice + $subtotal;
		$subtotal_format = number_format($subtotal, 2);
		$_SESSION['subtotal']=$subtotal_format; 
		print("<tr>
				<td class='text-center'>$Num</td>
				<td class='text-center'><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'><img src='$cover_id/$pic.jpg' width='80' height='110' alt='cover art'></a></td>
                <td><a href='http://turing.plymouth.edu/~jwong/Webstore/item.php?id=$wsid' alt='$name'>$name</a></td>
				<td>$format</td>
                <td class='text-center'>$price</td>
				<td class='text-center'>$quantity</td>
				<td class='text-center'>$totalprice</td>
				<td><form method='POST' action='cart.php'>
						<input name='delete$wsid' type='submit' value='Remove' />
						<input name='removeItem' type='hidden' value='$cartNum'>
					</form>
				</td>
				</tr>");
	}
?>