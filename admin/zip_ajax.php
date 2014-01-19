<?php 	include'functions/functions.php';
		connect();
		all_zips_id($zip_id);
		update_zips($zip_id);
		$zip_id = clean_input($_GET['zip_id']);?>

<form method="post">
<input type="hidden" name="zip_id" value="<?=$zip_id?>">
<table width="50%" cellspacing="2" cellpadding="2" > 
<?php 
	 	$query 	= all_zips_id($zip_id); 
		while ($result = mysql_fetch_array($query)){
			$zip_id		= $result['zip_id'];
			$zip_code 	= $result['zip_codes'];
			$city	 	= $result['city'];
			$state		= $result['state'];
			$status 	= $result['status'];
			?>

  <tr>
    <td>Zip ID</td>
    <td><?= $zip_id?></td>
  </tr>
  <tr>
    <td>Zip Code</td>
    <td><input type="text" name="zip_codes" value="<?=$zip_code;?>" ></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" value="<?=$city?>"/></td>
  </tr>
  <tr>
    <td>State</td>
    <td><input type="text" name="state" value="<?=$state?>" /></td>
  </tr>
  <tr>
    <td>Status</td>
    <td>Active:<input type="checkbox" name="status" <?php if($status == 'yes') echo "checked";?> value="yes" /> Inactive<input type="checkbox" name="status" <?php if($status =='no') echo "checked";?> value="no" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update_zips" value="Update Zip Code"/></td>
  </tr>
</table></form>


<?php }?>