<?php
//==================================================================
// input zip

function add_zip_code(){
	if (isset($_POST['add_zip_code'])){
	$zip_code = clean_input($_POST['zip_codes']);
	$city = clean_input($_POST['city']);
	$state = clean_input($_POST['state']);
	$date = clean_input($_POST['date']);
	$status = clean_input($_POST['status']);
	$query = "INSERT INTO zip_code (zip_codes, city, state, status, date) VALUES ('$zip_code','$city','$state','$status', 'NOW()') ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	}
}

//==================================================================
// display zips

function display_zips(){
	
	$query = "SELECT * FROM zip_code WHERE status='yes' ORDER BY zip_id ASC";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
	
//==================================================================
// display zips active and inactive

function all_zips(){
	
	$query = "SELECT * FROM zip_code ORDER BY zip_id ASC";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//==================================================================
// display zips active and inactive by zip id
function all_zips_id($zip_id){
	
	$query = "SELECT * FROM zip_code WHERE zip_id='$zip_id' ORDER BY zip_id ASC";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//==================================================================
// search zips
function display_zip_code($zip_codes){
	$zip_codes = $_GET['zip_codes'];
	
	$query = "SELECT * FROM zip_code WHERE status='yes' AND zip_codes = '$zip_codes' ";
	$result = mysql_query($query) or die(mysql_error());
		
	return $result;
	}
//==================================================================
// search zips
function display_zip_id($zip_id){
	//$zip_id = $_GET['zip_id'];
	
	$query = "SELECT * FROM zip_code WHERE status='yes' AND zip_id = '$zip_id' ";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
		
	return $result;
	}
//==================================================================
// update zips
function update_zips($zip_id){
	$zip_id = clean_input($_POST['zip_id']);
	
	if(isset($_POST['update_zips'])){
	$zip_code = clean_input($_POST['zip_codes']);
	$city = clean_input($_POST['city']);
	$state = clean_input($_POST['state']);
 	$status = clean_input($_POST['status']);
	$date = clean_input($_POST['date']);
	
	$query = "UPDATE zip_code SET zip_codes= '$zip_code', city= '$city', state= '$state' , status='$status', date='NOW()' WHERE zip_id= '$zip_id' ";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
}

?>