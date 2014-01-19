<?php

//==================================================================
// add customers

function add_cust(){
	if (isset($_POST['add_cust'])){
	$target = "uploads/";
	$target = $target . basename($_FILES['uploadedfile']['name']);
	
	$cat_id		= 	clean_input($_POST['cat_id']);
	$name		=	clean_input($_POST['name']);
	$address	=	clean_input($_POST['address']);	
	$city		=	clean_input($_POST['city']);	
	$state		=	clean_input($_POST['state']);
	$zip_id_fk	=	clean_input($_POST['zip_id']);	
	$phone		=	clean_input($_POST['phone']);
	$fax		=	clean_input($_POST['fax']);
	$hours		=	clean_input($_POST['hours']);
	$domain		=	clean_input($_POST['domain']);
	$pic		=	clean_input($_FILES['uploadedfile']['name']);
	$add_ca		=	clean_input($_POST['add_cat_id']);
	$add_zip	=	clean_input($_POST['add_zip_id']);
	$menu		=	clean_input($_POST['menu']);	
	$rating		=	clean_input($_POST['rating']);
	$date		=	clean_input($_POST['date']);
	
	$query 		= "INSERT INTO customer (cat_id_fk, name, address, city, state, zip_id_fk ,phone,fax, hours, domain, pic, add_cat_id, add_zip_id, menu, rating, date) 
					VALUES ('$cat_id','$name','$address','$city','$state','$zip_id_fk','$phone','$fax','$hours','$domain','$pic','$add_ca','$add_zip','$menu','$rating', NOW() )";
	$result		= mysql_query($query) or die(mysql_error());
	
	if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target))
	{
		//redirect_to('admin.php');
		
		}
		
		else {
		
		//Gives and error if its not
		echo "Sorry, there was a problem uploading your file.";
		}
	
	return $result;
	}
	
	}
//==================================================================
// display customers	
function display_customer($zip_id){
	
	$zip_id = clean_input($_POST['zip_id']);
	
	$query = "SELECT * FROM customer WHERE zip_id_fk = '$zip_id'";
	$result = mysql_query($query) or die (mysql_error());
	
	return $result;
	
	}
//==================================================================
// display customers cust_id	
function get_customers($cust_id){
	
	$cust_id = $_GET['cust_id'];
	
	$query = "SELECT * FROM customer WHERE cust_id = '$cust_id'";
	$result = mysql_query($query) or die (mysql_error());
	
	return $result;
	
	}

//==================================================================
// display customers cust_id	
function get_customer($cust_id){
	
	//$cust_id = $_GET['cust_id'];
	
	$query = "SELECT * FROM customer WHERE cust_id = '$cust_id'";
	$result = mysql_query($query) or die (mysql_error());
	
	return $result;
	
	}

//==================================================================
// update customers and menus
function customer_update($cust_id){
	
	
	if(isset($_POST['customer_update'])){
	
	
	$cat_id_ifk	= 	clean_input($_POST['cat_id_fk']);
	$name		=	clean_input($_POST['name']);
	$address	=	clean_input($_POST['address']);	
	$city		=	clean_input($_POST['city']);	
	$state		=	clean_input($_POST['state']);
	$zip_id_fk	=	clean_input($_POST['zip_id']);	
	$phone		=	clean_input($_POST['phone']);
	$fax		=	clean_input($_POST['fax']);
	$hours		=	clean_input($_POST['hours']);
	$domain		=	clean_input($_POST['domain']);
	$add_ca		=	clean_input($_POST['add_cat_id']);
	$add_zip	=	clean_input($_POST['add_zip_id']);
	$add_zip1	=	clean_input($_POST['add_zip1']);
	$menu		=	clean_input($_POST['menu']);
	$dine		= 	clean_input($_POST['dine_in']);
	$take		= 	clean_input($_POST['take_out']);
	$delivery	= 	clean_input($_POST['delivery']);
	$update1	= 	clean_input($_POST['update1']);
	$specials	=	clean_input($_POST['specials']);
	$email 		= 	clean_input($_POST['email']);
	
	//$rating		=	clean_input($_POST['rating']);	
	
	$query = "UPDATE customer SET ";
	if (!empty($cat_id_fk)) {$query .= "cat_id_fk='$cat_id_fk', ";}
	if (!empty($name)) {$query .= "name ='$name', ";}
	if (!empty($address)) {$query .= "address='$address', ";}
	if (!empty($city)) {$query .= "city='$city', ";}
	if (!empty($state)) {$query .= "state='$state', ";}
	if (!empty($zip_id_fk)) {$query .= "zip_id_fk='$zip_id_fk', ";}
	if (!empty($phone)) {$query .= "phone='$phone', ";}
	if (!empty($fax)) {$query .= "fax='$fax', ";}
	if (!empty($hours)) {$query .= "hours='$hours', ";}
	if (!empty($domain)) {$query .= "domain='$domain', ";}
	if (!empty($pic)) {$query .= "pic='$pic', ";}
	if (!empty($add_ca)) {$query .= "add_cat_id='$add_ca', ";}
	if (!empty($add_zip)) {$query .= "add_zip_id='$add_zip', ";}
	if (!empty($add_zip1)) {$query .= "add_zip1='$add_zip1', ";}
	if (!empty($dine)) {$query .= "dine_in='$dine', ";}
	if (!empty($take)) {$query .= "take_out='$take', ";}
	if (!empty($delivery)) {$query .= "delivery='$delivery', ";}
	if (!empty($menu)) {$query .= "menu='$menu', ";}
	if (!empty($email)) {$query .= "email='$email', ";}
	if (!empty($specials)) {$query .= "specials='$specials', ";}
	
	//if (!empty($rating)) {$query .= "rating='$rating' ";}
	$query .= "update1=NOW() ";
	$query .= "WHERE cust_id = '$cust_id'";
	//echo $query;
	$result = mysql_query($query) or die (mysql_error());
	
	
	return $result;
	}
}
//==================================================================
// display cats on city page.
	function customer_cat_display($zip_id,$cat_id){
		
		$zip_id = $_GET['zip_id'];
		$cat_id = $_GET['cat_id'];
		$query = "SELECT * FROM customer WHERE zip_id_fk = '$zip_id' AND cat_id_fk= '$cat_id' ORDER BY name ASC";
		$result = mysql_query($query) or die (mysql_error());
				
				
	return $result;
	}

//==================================================================
// display restaurants on city page.

function get_cat_zip($zip_id){
	$zip_id = $_GET['zip_id'];
	
	$query = "SELECT DISTINCT customer.zip_id_fk, customer.cat_id_fk, customer.cust_id, customer.name, customer.city, categories.cat_id, categories.category FROM customer INNER JOIN categories ON customer.cat_id_fk=categories.cat_id WHERE customer.zip_id_fk='$zip_id' ";
	//$query = "SELECT * FROM categories WHERE cat_id = '$cat_id_fk' ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}

//==================================================================
// display restaurants by update.

function customer_update_display($zip_id){
	$zip_id = $_GET['zip_id'];
	
	$query = "SELECT name, cust_id FROM customer WHERE zip_id_fk ='$zip_id' ORDER BY update1 DESC LIMIT 5 ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//==================================================================
// display recent restaurants.

function customer_recent_display($zip_id){
	$zip_id = $_GET['zip_id'];
	
	$query = "SELECT name, cust_id FROM customer WHERE zip_id_fk ='$zip_id' ORDER BY date DESC LIMIT 5 ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}

//==================================================================
// show login
	function show_user_login($cust_id){
		$cust_id = clean_input($_GET['cust_id']);
		$query = "SELECT * FROM cust_login WHERE cust_id_fk='$cust_id' ";
		$result = mysql_query($query) or die(mysql_error());
		
		return $result;
	}

//==================================================================
// add a login for restaurants 
	
	function cust_login($cust_id){
		
		if(isset($_POST['password'])){
		$cust_id = clean_input($_GET['cust_id']);
		$urname = clean_input($_POST['urname']);
		$psword = clean_input($_POST['psword']);
		$date   = clean_input($_POST['date']);
		
		
			
		$query = "INSERT INTO cust_login (cust_id_fk,urname, psword, date) VALUES ('$cust_id','$urname','$psword',NOW()) ";
		$result = mysql_query($query) or die (mysql_error());
		
		return $result;
			
			}
		
		
		}
//===================================================================
// show restaurant login

	function show_login($user_id){
	
	$user_id = clean_input($_SESSION['user_id']);
	$query = "SELECT * FROM cust_login WHERE user_id='$user_id'";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	}
	
//==================================================================
// update a login for restaurants 
	
	function update_login($cust_id){
		
		if(isset($_POST['update'])){
		//$cust_id = clean_input($_POST['cust_id_fk']);
		$urname = clean_input($_POST['urname']);
		$psword = clean_input($_POST['psword']);
		$date   = clean_input($_POST['date']);
			
		$query = "UPDATE cust_login SET urname='$urname', psword='$psword', date=NOW() WHERE cust_id_fk ='$cust_id' ";
		$result = mysql_query($query) or die (mysql_error());
		
		return $result;
			
			}
		
		
		}
//===================================================================
// login

function login() {

	if(isset($_POST['login'])){
		$urname = clean_input($_POST['urname']);
		$psword = clean_input($_POST['psword']);

		$query = "SELECT * FROM cust_login WHERE urname = '$urname' AND psword = '$psword'";
		$result = mysql_query($query) or die(mysql_error());	
		
		$rows = mysql_num_rows($result);

		if ($rows == 1){
			
			list($user_id) = mysql_fetch_row($result); 	
			session_start();	
			$_SESSION['user_id']		= $user_id;	
			$_SESSION['urname']			= $urname;
			$cust_id = $_GET['cust_id_fk'];
			
			$query = "UPDATE cust_login SET date = NOW() WHERE urname = '$urname'";
			
			$result = mysql_query($query) or die(mysql_error());
			
			//$query1 = "SELECT cust_id_fk FROM cust_login WHERE urname = '$urname' AND psword = '$psword'";
			//$result1 = mysql_query($query1) or die(mysql_error());
			//while ($row = mysql_fetch_array($result1)){
				
				//$cust_id = $row['cust_id_fk'];
				//}
			
			header('Location: customer_page.php');
		}else{
			header('Location: index.php?password=incorrect');
		}
	}
}

//===================================================================
// add specails

function add_specials($cust_id){
	
	if(isset($_POST['add_specials'])){
		$user_id 		= clean_input($_POST['cust_id']);
		$food	 		= clean_input($_POST['food']);
		$price	 		= clean_input($_POST['price']);
		$description	= clean_input($_POST['description']);
		
		$query = "INSERT INTO specials (cust_id_fk,food,price,description) VALUES ('$user_id','$food','$price','$description')";
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		}
		
		$query1 = "UPDATE customer SET update1= NOW() WHERE cust_id='$user_id' ";
		//echo $query1;
		$result1 = mysql_query($query1) or die(mysql_error());
		
		return  $result;
	
	
}
//===================================================================
// display specials
function display_specials($cust_id){
	
	$query = "SELECT * FROM specials WHERE cust_id_fk='$cust_id'";
	$result = mysql_query($query) or die(mysql_error());
		return  $result;
			
	}
	
//===================================================================
// display specials enabled
function display_specials_enable($user_id,$enable){
	
	$query = "SELECT * FROM specials WHERE cust_id_fk='$user_id' AND enable='enable'";
	$result = mysql_query($query) or die(mysql_error());
		return  $result;
			
	}
	
//===================================================================
// display specials
function update_specials($special_id){
	$special_id = clean_input($_GET['special_id']);
	if(isset($_POST['update_specials'])){
		$food	 		= clean_input($_POST['food']);
		$price	 		= clean_input($_POST['price']);
		$description	= clean_input($_POST['description']);
		$enable			= clean_input($_POST['enabled']);
		
		$query = "UPDATE specials SET food='$food', price='$price', description='$description', enable='$enable' WHERE special_id='$special_id'";
		echo $query;
		//$result = mysql_query($query) or die(mysql_error());
		return  $result;
	
	
	}
	
	}
	
//===================================================================
// display specials for email

function email_specials($cust_id){
	$query1 = "SELECT name FROM customer WHERE cust_id='$cust_id'";
	$result1 = $result = mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($result1)){
		$name = $row1['name'];
		
	$query = "SELECT * FROM specials WHERE cust_id_fk='$cust_id'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result)){
		$special_id = $result['special_id'];
		$food = $row['food'];
		$price = $row['price'];
		$description = $row['description']; 
		echo
            "<table width=\"100%\" align=\"center\">
				
			<tr>
        	  	<td width=\"95%\">$food <i>$description</i></td>
                <td align=\"right\">$price</td>	
            </tr>
            </table>";
 		//return $result;
 }  	
}
}
//===================================================================
// upload images for restaurants

function add_pics($cust_id){
	if (isset($_POST['add_pics'])){
	$target = "../admin/uploads/";
	$target = $target . basename($_FILES['uploadedfile']['name']);

	$pic =	clean_input($_FILES['uploadedfile']['name']);
	//$cust_id	= clean_input($_GET['cust_id']);
	
	$query = "INSERT INTO pics (cust_id_fk,pics) VALUES ('$cust_id','$pic') ";
	$result = mysql_query($query) or die(mysql_error());
	if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target))
	{
		//redirect_to('admin.php');
		}
		else {
		//Gives and error if its not
		echo "Sorry, there was a problem uploading your file.";
		}
	return $result;
	}
}


//===================================================================
// get specials id from customer id
function get_id($cust_id){
	
	$query = "SELECT * FROM specials WHERE cust_id_fk='$cust_id'";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//===================================================================
// show images for restaurants
function show_image($cust_id){
	
	   $a = 0;
		echo "<table width='200px'><tr>";
		$query = "SELECT pics, pic_id FROM pics WHERE cust_id_fk = '$cust_id'";
		$result = mysql_query($query) or die(mysql_error());
		while ($path = mysql_fetch_array($result)){
			   $id = $path['pic_id'];
		  if($a > 3)
		  {
			$a = 0;
			echo "</tr><tr>";
		  } //Display each record.?>
		  
		  <td><a href="admin/uploads/<?=$path[0]?>" class="highslide" onclick="return hs.expand(this)" title="Click to enlarge"><img src='admin/uploads/<?=$path[0] ?>' width='50px' height='50px' border="0"></a><br /></td>
		
	<?php  $a++;
		}
		
		echo '</tr></table>';
		
	}

?>
