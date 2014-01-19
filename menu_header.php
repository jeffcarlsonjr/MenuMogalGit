<?php include("admin/functions/functions.php");?>
<?php connect();?>
<?php $cust_id = $_GET['cust_id'];?>
<?php add_sub($cust_id); ?>
<?php display_menu($cust_id);?>
<?php display_subject_id($type);?>
<?php $query = "SELECT name,zip_id_fk FROM customer WHERE cust_id = '$cust_id'";
	  $result = mysql_query($query); 	
		while ($row = mysql_fetch_array($result)){
			$name		=	$row['name'];
			$zip_id_fk  =   $row['zip_id_fk'];}?>
            
<?php $zip_id = $zip_id_fk; ?>
<?php //show_ads($zip_id); ?>
<?php script($zip_id); ?>     
<?php $query = display_zip_id($zip_id_fk);
	  while ($result = mysql_fetch_array($query)){
		  $city = $result['city']; 
		  $state = $result['state']; }	?>
<?php $query = "SELECT address FROM customer WHERE cust_id='$cust_id' ";
	  $result = mysql_query($query);
	  while($row = mysql_fetch_array($result)){
		  $address = $row['address']; }?> 
		          
		

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.menumogul.com/" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>Welcome To <?=$name?> in <?=$city;?>, <?=$state?> | Menu Mogul </title>
<meta content="keywords"  />
<meta name="description" content="<?=$name?>'s is a restaurant located at <?=$address?> in <?=$city?>, <?=$state?>."  />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<style type="text/css">
<!--
.style1 {color: #ffffff}
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:active {
	color: #FFF;
}
#table{
	
width:750px;
min-height:400px;

	
	}
-->
</style></head>

<body>
