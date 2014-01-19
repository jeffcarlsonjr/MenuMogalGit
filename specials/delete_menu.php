<?php include'header.php';?>
<?php 

	$special_id = $_GET['special_id'];
	if(!empty($user_id)){
	$query = "DELETE FROM specials WHERE special_id ='$special_id'";
	$result = mysql_query($query);
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://www.menumogul.com/specials/add_specials.php\">";
	}
 
 ?>



