<?php 

function add_user(){
	if(isset($_POST['add_user'])){
		
		$username = clean_input($_POST['username']);
		$password = clean_input($_POST['password']);
		$date     = clean_input($_POST['date']);
		
		$query = "INSERT INTO user (username, password, date) VALUES ('$username','$password', NOW() )";
		$result = mysql_query($query) or die (mysql_error());
			
		return $result; 
		
		}
	
	}

//===================================================================
// display user

function display_user($id){
	
	$query = "SELECT * FROM user ORDER BY id";
	$result = mysql_query($query) or die (mysql_error());
			
	return $result; 
	
	}
//===================================================================
// update user

function delete_user($user_id){
	$user_id = $_SESSION['user_id'];
	
	$query = "DELETE FROM user WHERE user_id ='$user_id'";
	$result = mysql_query($query) or die (mysql_error());
			
	return $result; 
	redirect_to("user_admin.php");

}

?>