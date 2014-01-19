<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php display_zips();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Menu Mogul | Where You Find What To Eat!</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="welcome">
<div id="top" align="right" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="sign_up.php">Sign Up</a></div>
  <div class="zip_search">
    <div class="welcome_logo"></div>
    <div class="zip_searchbar">
      <div class="zip_search_title">Select Your Local Zip Code
      </div>
      <div class="zip_dropdown">
      <form action="city_page.php?zip_id=<?= $zip_id?>" method="get">
    	
        <select name="zip_id" onchange="this.form.submit()">
    	<option>Choose a zip code</option>
    	<?php 	$query = "SELECT * FROM zip_code ORDER BY zip_codes ASC";
				$result = mysql_query($query) or die(mysql_error()); ?>
                
    	<?php while ($row = mysql_fetch_array($result)){
				$zip_id = $row['zip_id'];
				$zip_codes = $row['zip_codes'];
				$city = $row['city'];
					echo"<option value=\"".$zip_id."\">".$city."/".$zip_codes."</option>";
			
		}?>
    </select>
  </form></div>
      <div class="zip_blurb">Menu Mogul is here to help you decide where and what to eat.</div>
    </div>
  </div>
</div>
</body>
</html>