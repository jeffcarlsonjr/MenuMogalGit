<?php

//==================================================================
// add customers

function add_cust(){
	if (isset($_POST['add_cust'])){
	$target = "admin/uploads/";
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
// update customers and menus
function update_customer($cust_id){
	$cust_id = $_GET['cust_id'];
	
	if(isset($_POST['update_customer'])){
	$target = "admin/uploads/";
	$target = $target . basename($_FILES['uploadedfile']['name']);
	
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
	$pic		=	clean_input($_FILES['uploadedfile']['name']);
	$add_ca		=	clean_input($_POST['add_cat_id']);
	$add_zip	=	clean_input($_POST['add_zip_id']);
	$menu		=	clean_input($_POST['menu']);
	$date		=   clean_input($_POST['date']);
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
	if (!empty($add_ca)) {$query .= "add_ca='$add_ca', ";}
	if (!empty($add_zip)) {$query .= "add_zip='$add_zip', ";}
	if (!empty($menu)) {$query .= "menu='$menu', ";}

//if (!empty($rating)) {$query .= "rating='$rating' ";}
	$query .= "date=NOW()";
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
	
	$query = "SELECT DISTINCT customer.zip_id_fk, customer.cat_id_fk, customer.cust_id, categories.cat_id, categories.category FROM customer INNER JOIN categories ON customer.cat_id_fk=categories.cat_id WHERE customer.zip_id_fk='$zip_id' ";
	//$query = "SELECT * FROM categories WHERE cat_id = '$cat_id_fk' ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}




?>