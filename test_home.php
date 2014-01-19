<?php include("functions/functions.php");?>
<?php connect(); ?>
<?php display_zips();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"  />
</head>

<body>
<div id="TOP_HEADER"></div>
<div id="home">
<br />
<table width="75%" cellspacing="2" cellpadding="3" align="center">
  <tr>
    <td align="center"><img src="images/background.png" width="450" height="251" alt="Menu Mogul" /></td>
  </tr>
  <tr>
    <td align="center"><h3>Choose the zip code of your area.</h3></td>
  </tr>
  <tr>
    <td align="center">
    <?php $query = display_zips();?>
    <?php while ($result = mysql_fetch_array($query)){
			$zip_id = $result['zip_id'];
			$zip_code = $result['zip_code'];
		
		?>
    <form action="display_by_zip.php?zip_id=<?= $zip_id?>" method="get">
    <select name="display zip" onselect="this.form.submit()">
    <option>Choose a zip code</option>
    	
	<?php echo"<option value=\"".$zip_id."\">".$zip_code."</option>"; }?>
    </select>
    </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>