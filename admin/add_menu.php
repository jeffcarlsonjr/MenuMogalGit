<?php require('includes/header.php'); ?>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div class="menu_area">This Area Is Set For Navigation</div>
</div>
<div id="search_area"></div>
<div id="main_area">
  <div class="left_nav"><br /><br />
  <?php include("includes/left_nav.php"); ?>
</div>
  <div class="main_content">
  <table width="100%" align="center">
  	<tr>
    	<td>
  		<form method="post">
        <h1 align="center">Add a Menu</h1>
  			<table width="80%" border="0" cellspacing="4" cellpadding="4" align="center">
  <tr><?php add_cust();?>
    <td>Category</td>
    <td>	<select name="id">
    			<option>Choose a Category</option>

			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);
			?>
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
    <td><input type="text" name="zip_code" id="zip_code" /></td>
  </tr>
  <tr>
    <td>Hours</td>
    <td><input type="text" name="hours" id="hours" /></td>
  </tr>
  <tr>
    <td>Keywords</td>
    <td><input type="text" name="keywords" id="keywords" /></td>
  </tr>
   <tr>
    <td>Rating from 1-5</td>
    <td><input type="text" name="rating" id="rating" /></td>
  </tr>
  <tr>
    <td valign="top">Menu</td>
    <td><textarea name="menu" cols="20" rows="15"></textarea><script type="text/javascript">
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
