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


<link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center"><h2>Welcome <?=$name;?>, go ahead and update your specials!!</h2></div>
<div id="menu_main">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td><div class="customer_button"><img src="../images/customer_page/dailyspecials.png" width="165" height="58" alt="Daily Specials" /></div></td>
      <td><div class="customer_button"><img src="../images/customer_page/sendemail.png" width="165" height="58" alt="Send Email" /></div></td>
      <td><div class="customer_button"><img src="../images/customer_page/photos.png" width="165" height="58" alt="Photos" /></div></td>
      <td><div class="customer_button"><img src="../images/customer_page/editprofile.png" width="165" height="58" alt="Edit Profile" /></div></td>
      <td><div class="customer_button"><img src="../images/customer_page/editmenu.png" width="165" height="58" alt="Edit Menu" /></div></td>
      <td><div class="customer_button"><img src="../images/customer_page/emaillist.png" width="165" height="58" alt="Edit Email List" /></div></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td colspan="5"><div id="right_menu">
        <table width="100%" align="center">
          <tr>
            <td><form method="post" enctype="multipart/form-data">
              <h2>Update Restaurant</h2>
              <table width="740px" border="0" cellspacing="2" cellpadding="2" align="center">
                <tr>
                  <td>Category</td>
                  <td><input type="hidden" value="<?=$cat_id_fk;?>" />
                    <?php 	$query = "SELECT * FROM categories WHERE cat_id='$cat_id_fk'";
									$result = mysql_query($query) or die(mysql_error());?>
                    <?php	while ($row = mysql_fetch_array($result)){
                                    
									$id = $row['cat_id'];
                                    $cat = $row['category'];
									echo $cat; }?></td>
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
                  <td><?php 	$query = "SELECT * FROM zip_code WHERE zip_id='$zip_id_fk'";
                            $result = mysql_query($query) or die(mysql_error()); ?>
                    <?php while ($row = mysql_fetch_array($result)){
                            $id = $row['zip_id'];
                            $zip = $row['zip_codes'];
                            echo $zip; }?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><input type="text" name="phone" id="phone" value="<?= $phone?>"/></td>
                </tr>
                <tr>
                  <td>Fax</td>
                  <td><input type="text" name="fax" id="fax"value="<?= $fax?>" /></td>
                </tr>
                <tr>
    <td>Hours</td>
    <td><textarea cols="45" rows="3" name="hours" id="hours" value=""/><?= $hours?></textarea></td>
                </tr>
                <tr>
                  <td>Dine-In</td>
                  <td>Yes:
                    <input type="checkbox" name="dine_in" <?php if($dine == 'yes')echo "checked" ;?> value="yes"  />
                    No:
                    <input type="checkbox" name="dine_in" <?php if($dine == 'no') echo "checked" ;?> value="no" /></td>
                </tr>
                <tr>
                  <td>Take-Out</td>
                  <td>Yes:
                    <input type="checkbox" name="take_out" <?php if($take == 'yes') echo "checked";?> value="yes" />
                    No:
                    <input type="checkbox" name="take_out" <?php if($take == 'no') echo "checked";?> value="no" /></td>
                </tr>
                <tr>
                  <td>Delivery</td>
                  <td>Yes:
                    <input type="checkbox" name="delivery" <?php if($delivery == 'yes') echo "checked";?> value="yes" />
                    No:
                    <input type="checkbox" name="delivery" <?php if($delivery == 'no') echo "checked";?> value="no" /></td>
                </tr>
                <tr>
                  <td>Domain</td>
                  <td><textarea cols="45" rows="1" name="domain" id="domain" value="" /></textarea>
                    <?= $domain?>
                    </textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="customer_update" id="customer_update" value="Submit" />
                    <input name="email" type="hidden" id="<?=$email?>" value="customer_update" /></td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
