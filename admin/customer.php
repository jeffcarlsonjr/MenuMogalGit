<?php require('includes/header.php'); ?>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area"></div>
<div id="menu_main">
  <div id="left_menu"><br /><br />
  <?php include("includes/left_nav.php"); ?>
</div>
  <div id="right_menu">
  
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
  	<tr>
    	<td>
  		<form method="post" enctype="multipart/form-data">
        <h1 align="center">Add a Restuarant</h1>
  			<table width="80%" border="0" cellspacing="4" cellpadding="4" align="center">
  <tr>
    <td>Category</td>
    <td>	<select name="id">
    			<option>Choose a Category</option>
	
			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);?>
			
			<?php	while ($row = mysql_fetch_array($result)){
					$id = $row['cat_id'];
					$cat = $row['category'];
						echo "<option value=\"".$id."\">".$cat."</option>";
						
					}?>
                </select>
	
    </td>
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
    <td>	<select name="id">
    			<option>Choose a zip code</option>
	
		<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$id = $row['zip_id'];
				$zip = $row['zip_codes'];
					echo"<option value=\"".$id."\">".$zip."</option>";
			
		}?>
        </select>
        </td>
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
    <td>Domain</td>
    <td><input type="text" name="domain" id="domain" /></td>
    </tr>
    <tr>
    <td>Image</td>
    <td><input type="file" name="pic" id="pic" /></td>
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
                </select>
	
    </td>
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
        </select>
        </td>
  </tr>
  <tr>
    <td valign="top">Menu</td>
    <td><textarea name="menu" cols="40" rows="15"></textarea><script type="text/javascript">
        CKEDITOR.replace( 'menu' );</script></td>
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
  </div>
</div>
</body>
</html>
