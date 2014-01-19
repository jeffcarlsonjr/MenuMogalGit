<?php 
	function add_sub($cust_id){
		$cust_id = $_GET['cust_id'];
		
		if(isset($_POST['add_sub'])){
		$cust_id	=	clean_input($_POST['cust_id']);
		$name		=	clean_input($_POST['name']);
		$email		=	clean_input($_POST['email']);
		$date	 	=	clean_input($_POST['date']);
		
		$query = "INSERT INTO subscribe (cust_id_fk, name, email, date) VALUES ('$cust_id','$name','$email', NOW() ) ";
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		
		return $result;
		}
		}
//================================================================================================================================

	function show_sub($cust_id){
		
		//$cust_id = clean_input($_GET['cust_id']);
		$query = "SELECT * FROM subscribe WHERE cust_id_fk='$cust_id' ORDER BY date DESC ";
		$result = mysql_query($query) or die(mysql_error());
		
		return $result; 
		
		}

//================================================================================================================================
	function delete_sub($cust_id){
		
		$id = clean_input($_GET['id']);
		$query = "DELECT * FROM subscribe WHERE id='id' ";
		$result = mysql_query($query) or die(mysql_error());
		
		return $result;
		}
?>