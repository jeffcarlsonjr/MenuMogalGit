<?php include'admin/functions/functions.php';
	connect();
?>

<?php 	$cust_id = $_GET['cust_id'];
			$query = "SELECT domain FROM customer WHERE cust_id = '$cust_id'";
			$result = mysql_query($query);
			//echo $zip_id;	?>
			<?php 	$inc = 0;
			while ($row = mysql_fetch_array($result)){
			$domain		=	$row['domain'];}
			
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=http://$domain\">";
?>