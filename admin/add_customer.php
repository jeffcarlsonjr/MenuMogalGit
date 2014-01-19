<?php require('includes/header.php'); ?>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%">
<tr>
  
 <td> <div id="right_menu">
  
  <!--Name:
Address:
Phone:
Fax:
Hours of Operation:
Domain:

Also

Image:
Associated Zip Codes:
Associated Categories:

--->
  <table width="100%" align="center">
  	<tr><?php  add_cust(); ?>
    	<td>
  		<form method="post" enctype="multipart/form-data" onSubmit="return add_user_validate();" >
        <h2>Add a Restuarant</h2>
  			<table width="740px" border="0" cellspacing="4" cellpadding="4" align="center">
  <tr>
    <td>Category</td>
    <td>	<select name="cat_id">
    			<option>Choose a Category</option>
	
			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);?>
			
			<?php	while ($row = mysql_fetch_array($result)){
					$id = $row['cat_id'];
					$cat = $row['category'];
						echo "<option value=\"".$id."\">".$cat."</option>";
						
					}?>
                </select>    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" id="name" /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="address" id="address" style="size:100px;" /></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" id="city" /></td>
  </tr>
  <tr>
    <td>State(initials)</td>
    <td><input type="text" name="state" id="state" /></td>
  </tr>
  <tr>
    <td>Zip Code</td>
    <td>	<select name="zip_id">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
					echo"<option value=\"".$id."\">".$zip."</option>";
			
		}?>
        </select>        </td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" name="phone" id="phone" /></td>
    <tr>
    <td>Fax</td>
    <td><input type="text" name="fax" id="fax" /></td>
  <tr>
    <td>Hours</td>
    <td><input type="text" name="hours" id="hours" /></td>
  </tr>
  <tr>
    <td>Dine-In</td>
    <td>Yes: <input type="checkbox" name="dine_in" value="yes" /> No: <input type="checkbox" name="dine_in" value="no" /></td>
  </tr>
  <tr>
    <td>Take-Out</td>
    <td>Yes: <input type="checkbox" name="take_out" value="yes" /> No: <input type="checkbox" name="take_out" value="no" /></td>
  </tr>
  <tr>
    <td>Delivery</td>
    <td>Yes: <input type="checkbox" name="delivery" value="yes" /> No: <input type="checkbox" name="delivery" value="no" /></td>
  </tr>
  <tr>
    <td>Domain</td>
    <td><input type="text" name="domain" id="domain" /></td>
    </tr>
  <tr>
    <td>Email Address</td>
    <td><input  type="text" name="email" id="email " /></td>
  </tr>
  
    <tr>
    <td>Image</td>
    <td><input type="file" name="uploadedfile" id="uploadedfile" /></td>
    </tr>
    <tr>
    <td>Additional Category</td>
    <td>	<select name="add_cat_id">
    			<option>Choose a Category</option>
	
			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);?>
			
			<?php	while ($row = mysql_fetch_array($result)){
					$id = $row['cat_id'];
					$cat = $row['category'];
						echo "<option value=\"".$id."\">".$cat."</option>";
						
					}?>
                </select>    </td>
  </tr>
   <tr>
    <td>Additional Zip Code</td>
    <td>	<select name="add_zip_id">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
					echo"<option value=\"".$id."\">".$zip."</option>";
			
		}?>
        </select>        </td>
  </tr>
   <tr>
     <td>Additional Zip Code</td>
     <td><select name="add_zip1">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
					echo"<option value=\"".$id."\">".$zip."</option>";
			
		}?>
        </select></td>
   </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="add_cust" id="add_cust" value="Submit" /></td>
  </tr>
          </table>
  </form>
  </td>
  </tr>
  </table>
  </div></td></tr></table>
  <br />
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
<br />
</body>
</html>
