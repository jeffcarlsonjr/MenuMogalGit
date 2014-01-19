<?php 
function connect(){
	$hostname_linked = "localhost";
	$database_linked = "rjpcreat_menu";
	$username_linked = "rjpcreat";
	$password_linked = "Weigh20079!";
	
	//$hostname_linked = "localhost";
	//$database_linked = "blue";
	//$username_linked = "root";
	//$password_linked = "starbucks";
	
	
	$connect = mysql_connect($hostname_linked,$username_linked,$password_linked);
	if (!$connect) {
		die("database connection failed: " . mysql_error());
	}
	else {
		//echo $connect . "<h2 align='center'>Your in butthead!!</h2>";
	
	}
	$db_select = mysql_select_db($database_linked,$connect);
	if (!$db_select) {
		die("database connection failed: " . mysql_error());
	}
	
	}

	
//===================================================================
// clean input
function clean_input( $value ) {
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists( "mysql_real_escape_string" );
	if( $new_enough_php ) {
		if( $magic_quotes_active ) { $value = stripslashes( $value ); }
		$value = mysql_real_escape_string( $value );
	} else {
		if( !$magic_quotes_active ) { $value = addslashes( $value ); }
	}
	return $value;
}
//===================================================================
// redirect

function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
		exit;
		}
	}

//===================================================================
// login

function checklogin() {

	if(isset($_POST['login'])){

		$username = clean_input($_POST['username']);
		$password = clean_input($_POST['password']);

		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$result = mysql_query($query) or die(mysql_error());	
		
		$rows = mysql_num_rows($result);

		if ($rows == 1){

			list($user_id) = mysql_fetch_row($result); 	
			session_start();	
			$_SESSION['userid']		= $user_id;	
			$_SESSION['username']	= $username;	

			$query = "UPDATE user SET date = NOW() WHERE username = '$username'";
			$result = mysql_query($query) or die(mysql_error());

			header('Location: admin.php');
		}else{
			header('Location: index.php?password=incorrect');
		}
	}
}


//===================================================================
function stripped($name){
   
    $strip = $name;
    $strip = str_replace (" ","", $strip);
    
    $strip = ereg_replace("[^A-Za-z0-9]", "", $strip);
    $strip = strtolower($strip);
    echo $strip;
   
    }

//===================================================================

require 'categories.php';
require 'zip_codes.php';
require 'customers.php';
require 'user.php';
require 'ads.php';
require 'script-func.php';
require 'info-func.php';
require 'sub-func.php';
require 'email-func.php';
require 'sign_up-func.php';
require 'menu-fuct.php';



?>