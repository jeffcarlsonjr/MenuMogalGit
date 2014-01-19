<?php 

//============================================================
// Add email from contact us page

	function add_contact_email(){
		
		if(isset($_POST['email'])){
		$name 		= clean_input($_POST['name']);
		$email 		= clean_input($_POST['email']);
		$comment 	= clean_input($_POST['comment']);
		$date 		= clean_input($_POST['date']);
	
		$query = "INSERT INTO contact_us (name, email, comment, date) VALUES ('$name','$email','$comment', NOW() )";
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		
		return $result;
		}
	}
?>