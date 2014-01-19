<?php session_start();?>
<?php include'functions/functions.php';
		connect();?>
<?php $zip_id = $_GET['zip_id']; ?>        


<table width="100%" cellspacing="0" cellpadding="0" >
  
  	<tr>
    	<th>Category</th>
        <th>Name</th>
        <th>City</th>
        <th>Edit</th>
   </tr>     
<input type="hidden" name="zip_id" value="<?=$zip_id?>"/>
<?php
	
	$query = get_cat_zip($zip_id);
	while ($result = mysql_fetch_array($query)){
		$cust_id = $result['cust_id'];
		$name = $result['name'];
		$cat  = $result['category'];
		$city = $result['city']; 
		?>
		
		

  <tr>
    <td align="center"><?= $cat ?></td>
    <td align="center"><?= $name ?></td>
    <td align="center"><?= $city ?></td>
    <td align="center"><a href="update_customer.php?cust_id=<?= $cust_id?>"><input type="submit" value="Edit" id="<?= $cust_id;?>" /></a></td>
  </tr>		
		


<?php } ?>
</table>