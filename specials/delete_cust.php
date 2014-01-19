<?php session_start();?>
<?php require"functions/functions.php";
		connect();
?>
<? $cust_id = clean_input($_GET['cust_id']); ?>
<?php 
	$addr_id = clean_input($_GET['addr_id']);
	if(isset($addr_id)){
	$query = "DELETE FROM cust_addresses WHERE addr_id = '$addr_id'";
	$result = mysql_query($query);

	redirect_to("customers.php?action=edit&cust_id=".$cust_id."");
}
?>