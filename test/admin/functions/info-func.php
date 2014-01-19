<?php 
function info_upload(){
	if(isset($_POST['info_upload'])){
		
	$name 				= clean_input($_POST['name']);
	$title 				= clean_input($_POST['title']);
	$meta_keys 			= clean_input($_POST['meta_keys']);
	$meta_description 	= clean_input($_POST['meta_description']);
	$coding 			= clean_input($_POST['coding']);
	$date 				= clean_input($_POST['date']);
	
	$query = "INSERT INTO info (name,title,meta_keys,meta_description,coding,date) VALUES ('$name','$title','$meta_keys','$meta_description','$coding', NOW() )";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	
	
	return $result;
	
	
	}
	
}
//============================================================================================
function display_info(){
	
	
	$query= "SELECT * FROM info ORDER BY id";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//============================================================================================
function display_info_id($id){
	
	$id = $_GET['id'];
	$query= "SELECT * FROM info WHERE id='$id'";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//============================================================================================
function display_info_page($page_id){
	
	$page_id = $_GET['page_id'];
	$query= "SELECT * FROM info WHERE id='$page_id'";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}
//============================================================================================
function update_info($id) {
	$id = $_GET['id'];
	if(isset($_POST['update_info'])){
			
	$name 				= clean_input($_POST['name']);
	$title 				= clean_input($_POST['title']);
	$meta_keys 			= clean_input($_POST['meta_keys']);
	$meta_description 	= clean_input($_POST['meta_description']);
	$coding 			= clean_input($_POST['coding']);
	$date 				= clean_input($_POST['date']);
	
	$query = "UPDATE info SET name='$name', title='$title', meta_keys='$meta_keys', meta_description='$meta_description', coding='$coding', date= NOW() WHERE id='$id' ";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	
	}
}
?>