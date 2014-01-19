<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<h1>Welcome to the search section</h1>
<?php 
	$zip_id = clean_input($_GET['zip_id']);
	$search = clean_input($_GET['search']);
	
	$query = "SELECT * FROM menu INNER JOIN customer ON customer.zip_id_fk='$zip_id' WHERE customer.cust_id=menu.cust_id_fk AND menu.food LIKE '%$search%' ";
	//$query = "SELECT * FROM menu WHERE food LIKE '%$search%' ";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($result)){
		$food = $row['food'];
		
		
		echo $food;
	}
?>