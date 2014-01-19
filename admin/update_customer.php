<?php require('includes/header.php'); ?>
<?php $cust_id = $_GET['cust_id']; ?>
<?php customer_update($cust_id); ?>
<?php show_cats($cat_id_fk); ?>
<?php display_cats(); ?>
<?php get_customers($cust_id); ?>
<?php display_zip_id($zip_id); ?>
<?php cust_login($cust_id);?>
<?php update_login($cust_id);?>
<?php show_user_login($cust_id);?>
<?php $query = show_user_login($cust_id);?>
<?php  while($result = mysql_fetch_array($query)){
		
		$urname = $result['urname'];
		$password = $result['psword'];
	
	}?>

<?php $cust = get_customers($cust_id); ?>
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
		
		} 
 
 ?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
  <table width="100%">
  <tr><?php if(!empty($urname)){?>
  	<td valign="top" width="240px"><br /><br />
      <form method="post">
      <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
      <table width="100%" cellpadding="2" cellspacing="2">
      <tr>
        <td colspan="2"><h3>Update Login</h3></td>
      </tr>
      <tr>
        
        <td>Username:</td>
        <td><input type="text" name="urname" value="<?=$urname?>" /></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td> <input type="text" name="psword" value="<?=$password?>"/></td>
      </tr>
      <tr>
      <td><input type="submit" name="update" /></td><td></td>
      </tr>
      </table></form>
  	</td>
    <?php }?>
  
  
  <?php if(empty($urname)){?>
  <?php if ($_POST["password"]<>'') { 
			$ToEmail = $_POST['email'];
			$EmailSubject = "Welcome to Menu Mogul"; 
			$mailheader = "From: \"admin@menumogul.com\"\r\n"; 
			$mailheader .= "Reply-To: \"admin@menumogul.com\"\r\n"; 
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			$MESSAGE_BODY = "Thank you for signing up with Menu Mogul. This email is to guide you to your Menu Mogul Account where you can upload<br>daily specials and email them to your customers.<br> "; 
			$MESSAGE_BODY .= "Your username and password are as follow<br>";
			$MESSAGE_BODY .= "Username: ".$_POST["urname"]."<br>";
			$MESSAGE_BODY .= "Password: ".$_POST["psword"]."<br>"; 
			$MESSAGE_BODY .= "Please go to <a href=\"http://www.menumogul.com/specials.php\">Menu Mogul</a> to login in to your page.<br>"; 
			$MESSAGE_BODY .= "You will find instructions on how to use set up your page so you can start sending out your specials today!";
			mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ('Failure'); 
  }?>
            
  <td valign="top" width="240px"><br /><br />
      <form method="post">
      <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
      <table width="100%" cellpadding="2" cellspacing="2">
      <tr>
        <td colspan="2"><h3>Create Login</h3></td>
      </tr>
      <tr>
       
        <td>Username:</td>
        <td><input type="text" name="urname" /></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td> <input type="text" name="psword"/></td>
      </tr>
      <tr>
      <td><input type="submit" name="password" /></td><td></td>
      </tr>
      </table></form>
  </td>
  <?php } ?>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td>
  		<form method="post" enctype="multipart/form-data">
        <h2>Update Restaurant</h2>
  			<table width="740px" border="0" cellspacing="4" cellpadding="4" align="center">
  <tr>
    <td>Category</td>
    <td>				<input type="hidden" value="<?=$cat_id_fk;?>" />
                       	<select name="cat_id">
                        <option>Edit Category</option>
            				
							<?php 	$query = "SELECT * FROM categories";
									$result = mysql_query($query) or die(mysql_error());?> 
                            <?php	while ($row = mysql_fetch_array($result)){
                                    
									$id = $row['cat_id'];
                                    $cat = $row['category'];
									if($id == $cat_id_fk){
                                    	echo "<option value=\"".$id."\" selected >".$cat."</option>";}
									if($id != $cat_id_fk){	
										echo "<option value=\"".$id."\">".$cat."</option>";}
								
								 
                                        
                                    }?>
                                </select>    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" id="name" value="<?= $name?>"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="address" id="address" style="size:100px;" value="<?= $address?>" /></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" id="city" value="<?= $city?>"/></td>
  </tr>
  <tr>
    <td>State(initials)</td>
    <td><input type="text" name="state" id="state" value="<?= $state?>"/></td>
  </tr>
  <tr>
    <td>Zip Code</td>
    <td>	    
    			<input type="hidden" value="<?=$zip_id_fk?>" />
    			<select name="zip_id">
    			<option>Edit zip code</option>
	
					<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
                            $result = mysql_query($query) or die(mysql_error()); ?>
                            
                    <?php while ($row = mysql_fetch_array($result)){
                            $id = $row['zip_id'];
                            $zip = $row['zip_codes'];
                            if($id == $zip_id_fk){
								echo "<option value=\"".$id."\" selected >".$zip."</option>";}
							if($id != $zip_id_fk){	
								echo "<option value=\"".$id."\">".$zip."</option>";}
                    }?>
        		</select>        </td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" name="phone" id="phone" value="<?= $phone?>"/></td>
    <tr>
    <td>Fax</td>
    <td><input type="text" name="fax" id="fax"value="<?= $fax?>" /></td>
    <tr>
    <td>Hours</td>
    <td><input type="text" name="hours" id="hours" value="<?= $hours?>"/></td>
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
    <td><input type="text" name="domain" id="domain" value="<?= $domain?>" /></td>
    </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="text" name="email" value="<?=$email?>" /></td>
  </tr>
  
    <tr>
    <td>Image</td>
    <td><img src="<?php echo "uploads/".$pic.""?>" width="100px" height="100px" /><input type="file" name="uploadedfile" id="uploadedfile" value="<?= $pic?>" /></td>
    </tr>
    <tr>
    <td>Additional Category</td>
    <td>	<input type="hidden" value="<?=$add_ca?>" />
    		<select name="add_cat_id">
    			<option>Choose a Category</option>
	
			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);?>
			
			<?php	while ($row = mysql_fetch_array($result)){
					$id = $row['cat_id'];
					$cat = $row['category'];
					if($id == $add_ca){
						echo "<option value=\"".$id."\" selected >".$cat."</option>";}
					if($id != $add_ca){	
						echo "<option value=\"".$id."\">".$cat."</option>";}
						
					}?>
                </select>    </td>
    </tr>
   <tr>
    <td>Additional Zip Code</td>
    <td>	<input type="hidden" value="<?=$add_zip?>" />
    		<select name="add_zip_id">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
				if($id == $add_zip){
					echo "<option value=\"".$id."\" selected >".$zip."</option>";}
				if($id != $add_zip){	
					echo "<option value=\"".$id."\">".$zip."</option>";}
			
		}?>
        </select>        </td>
   </tr>
   <tr>
    <td>Additional Zip Code</td>
    <td>	<input type="hidden" value="<?=$add_zip1?>" />
    		<select name="add_zip1">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
				if($id == $add_zip1){
					echo "<option value=\"".$id."\" selected >".$zip."</option>";}
				if($id != $add_zip1){	
					echo "<option value=\"".$id."\">".$zip."</option>";}
			
		}?>
        </select>        </td>
   </tr>
  <tr>
    <td><a href="menu.php?cust_id=<?=$cust_id?>">Add/Edit Menu</a></td>
    <td><input type="submit" name="customer_update" id="customer_update" value="Submit" /></td>
  </tr>
          </table>
  </form>
  </td>
  </tr>
  </table></div>
  </td>
  </tr>
  </table>
  <br />
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
