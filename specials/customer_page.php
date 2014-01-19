<?php include'header.php';?>

<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>

<?php $cust = get_customer($cust_id); ?>
 <?php while ($result = mysql_fetch_array($cust)){ 
 
 		$cat_id_fk	= 	$result['cat_id_fk'];
		$name		=	$result['name'];
		$address	=	$result['address'];	
		$city		=	$result['city'];	
		$state		=	$result['state'];
		$zip_id_fk	=	$result['zip_id_fk'];	
		$phone		=	$result['phone'];
		$fax		=	$result['fax'];
		$hours		=	$result['hours'];
		$domain		=	$result['domain'];
		$pic		=	$result['pic'];
		$add_ca		=	$result['add_cat_id'];
		$add_zip	=	$result['add_zip_id'];
		$add_zip1	= 	$result['add_zip1'];
		$menu		=	$result['menu'];	
		$rating		=	$result['rating'];
		$dine		=	$result['dine_in'];
		$take		=   $result['take_out'];
		$delivery	=	$result['delivery'];
		$email		= 	$result['email'];
		$specials	= 	$result['specials'];
		}
 
 ?>
<?php customer_update($cust_id); ?>
<?php show_cats($cat_id_fk); ?>
<?php display_cats(); ?>
<?php get_customers($cust_id); ?>
<?php display_zip_id($zip_id); ?>
<?php show_login($cust_id);?>
<?php display_specials($cust_id);?>
<?php $query = display_specials($cust_id);?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center"><h2>Welcome <?=$name;?>, go ahead and update your specials!!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  <td valign="top" width="240px"><br /><br />
  <form method="post" onchange="this.form.submit()" >
  
  <table width="100%" cellpadding="2" cellspacing="2">
  <tr>
  	<td colspan="2"><h3>Update Login</h3></td>
  </tr>
  <tr>
  	<td>Username:</td><td><?=$urname?></td>
  </tr>
  <tr>
  	<td>Password:</td><td> <input type="text" name="psword" value="<?= $psword?>"/></td>
  </tr>
  <tr>
  <td><input type="submit" name="update" /></td><td></td>
  </tr></table></form>
  <br>
  <table width="100%" cellpadding="3" cellspacing="2">
  <tr>
  <td><h3>Customer Updates</h3></td>
  </tr>
  <tr>
  	<td>
  <div><a href="emails.php"><img src="../images/restaurantback/email_listbutton.png" alt="Email List" width="150" height="35" border="0" /></a></div>
  </td>
  </tr>
  <tr>
  <td>
  <div><a href="add_specials.php"><img src="../images/restaurantback/update_specialsbutton.png" alt="Update Specials" width="150" height="35" border="0" /></a></div>
  </td>
  </tr>
  <!--<tr>
  <td><div><a href="intructions.php">Instructions For Adding Specials</a></div></td>
  </tr>-->
  
  <tr>
  <td><div><a href="email_specials.php"><img src="../images/restaurantback/email_specialsbutton.png" alt="Email Specials" width="150" height="35" border="0" /></a></div></td>
  </tr>
  <tr>
  <td><div><a href="add_pics.php">Add Photos of Restaurant</a></div></td>
  </tr>
  <tr>
  <td><div><a href="edit_menu.php">Edit Menu</a></td>
  </tr>
  </table>
  </td>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td>
       
  		<form method="post" enctype="multipart/form-data">
        
        <h2>Update Restaurant</h2>
  			<table width="740px" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td>Category</td>
    <td>				<input type="hidden" value="<?=$cat_id_fk;?>" />
                       	
                        
            				
							<?php 	$query = "SELECT * FROM categories WHERE cat_id='$cat_id_fk'";
									$result = mysql_query($query) or die(mysql_error());?> 
                            <?php	while ($row = mysql_fetch_array($result)){
                                    
									$id = $row['cat_id'];
                                    $cat = $row['category'];
									echo $cat; }?>
					
    </td>
   
  </tr>
  <tr>
    <td>Restaurant</td>
    <td><?= $name?></td>
    
  </tr>
  <tr>
    <td>Address</td>
    <td><?= $address?></td>
    
  </tr>
  <tr>
    <td>City</td>
    <td><?= $city?></td>
    
  </tr>
  <tr>
    <td>State(initials)</td>
    <td><?= $state?></td>
    
  </tr>
  <tr>
    <td>Zip Code</td>
    <td>	    
    			
					<?php 	$query = "SELECT * FROM zip_code WHERE zip_id='$zip_id_fk'";
                            $result = mysql_query($query) or die(mysql_error()); ?>
                            
                    <?php while ($row = mysql_fetch_array($result)){
                            $id = $row['zip_id'];
                            $zip = $row['zip_codes'];
                            echo $zip; }?>
        </td>
    
  </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" name="phone" id="phone" value="<?= $phone?>"/></td>
    
    
   
    <tr>
    <td>Fax</td>
    <td><input type="text" name="fax" id="fax"value="<?= $fax?>" /></td>
    
    
    
    <tr>
    <td>Hours</td>
    <td><textarea cols="45" rows="3" name="hours" id="hours" value=""/><?= $hours?></textarea></td>
    
    </tr>
   
    <tr>
      <td>Dine-In</td>
    <td>Yes: <input type="checkbox" name="dine_in" <?php if($dine == 'yes')echo "checked" ;?> value="yes"  /> No: <input type="checkbox" name="dine_in" <?php if($dine == 'no') echo "checked" ;?> value="no" /></td>
    
    </tr>
  <tr>
    <td>Take-Out</td>
    <td>Yes: <input type="checkbox" name="take_out" <?php if($take == 'yes') echo "checked";?> value="yes" /> No: <input type="checkbox" name="take_out" <?php if($take == 'no') echo "checked";?> value="no" /></td>
    
  </tr>
  <tr>
    <td>Delivery</td>
    <td>Yes: <input type="checkbox" name="delivery" <?php if($delivery == 'yes') echo "checked";?> value="yes" /> No: <input type="checkbox" name="delivery" <?php if($delivery == 'no') echo "checked";?> value="no" /></td>
    
  </tr>
  <tr>
    <td>Domain</td>
    <td><textarea cols="45" rows="1" name="domain" id="domain" value="" /><?= $domain?></textarea></td>
    
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="customer_update" id="customer_update" value="Submit" /><input name="email" type="hidden" id="<?=$email?>" value="customer_update" /></td>
    
  </tr>
          </table>
  </form>
  </td>
  </tr>
  </table></div>
  </td>
  </tr>
  </table>
  
</div>
</body>
</html>
