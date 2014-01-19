<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php display_zips();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<Meta name="description" content="Search Local Restaurant Menus, Daily Lunch Specials, Restaurant Coupons, Directions, and More! Search food by Cuisine, Order Takeout, Delivery, or Dine-In." />
<title>Local Restaurant Menus, Coupons, Directions, and More!</title>

<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="welcome">
<div align="right" class="top" id="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="sign_up.php">Sign Up</a></div>	
  <div class="zip_search">
    <div class="welcome_logo"></div>
    <div class="zip_searchbar">
      <div class="zip_search_title">Select Your Local Zip Code
      </div>
      <div class="zip_dropdown">
      <form action="city_page.php?zip_id=<?= $zip_id?>" method="get">
    	
        <select name="zip_id" onchange="this.form.submit()">
    	<option>Choose a zip code</option>
    	<?php 	$query = display_zips();
				while ($row = mysql_fetch_array($query)){ 
				$zip_id = $row['zip_id'];
				$zip_codes = $row['zip_codes'];
				$city = $row['city'];
					echo"<option value=\"".$zip_id."\">".$city."/".$zip_codes."</option>";
			
		}?>
    </select>
  </form></div>
      <div class="zip_blurb">Where you find what to eat in your local community.<br />
        <em>Our site is still &quot;Under Construction&quot; in some areas. Sorry for the inconvenience this has caused! Thanks again for stopping by.</em></div>
    </div>
    <div class="signup"></div>
    <div align="center" class="copyright" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
  </div>
  
</div>
</body>
</html>