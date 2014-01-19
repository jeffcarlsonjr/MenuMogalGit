<?php
//===================================================================
// add categories

function add_cat(){
	if (isset($_POST['add_cat'])){
	$category = clean_input($_POST['category']);
	
	$query = "INSERT INTO categories (category) VALUES ('$category')";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
	}
	
//==================================================================
// display categories

function display_cats(){
	
	$query = "SELECT * FROM categories ORDER BY category ASC";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//==================================================================
// display categories by id

function show_cats($cat_id_fk){
	
	
	$query = "SELECT * FROM categories WHERE cat_id = '$cat_id_fk' ";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//==================================================================
// get categorys of displayed zips

function cat_by_zip($zip_id){
	$zip_id = $_GET['zip_id'];
	
	$query = "SELECT DISTINCT customer.zip_id_fk, customer.cat_id_fk,categories.cat_id,categories.category FROM customer INNER JOIN categories ON customer.cat_id_fk=categories.cat_id WHERE customer.zip_id_fk='$zip_id' ";
	//$query = "SELECT * FROM categories WHERE cat_id = '$cat_id_fk' ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}

?>
