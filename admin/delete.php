<?php include('functions/functions.php');?>
<?php connect(); ?>

<?php 

	$user_id = $_GET['user_id'];
	if(!empty($user_id)){
	$query = "DELETE FROM user WHERE user_id ='$user_id'";
	$result = mysql_query($query);
	
	echo "<h1>User Has Been Deleted <a href=\"user_admin.php\">Return To Page</a></h1>";
	}
 
 ?>



