<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php cat_by_zip($cust_id_fk);?>
<?php get_cat_zip($zip_id); ?>
<?php $zip_id = $_GET['zip_id'];?>
<?php show_ads($zip_id);?>
<?php script($zip_id); ?>
<?php display_zip_id($zip_id);?>
<?php $query = display_zip_id($zip_id);
	  while ($result = mysql_fetch_array($query)){
		  $city = $result['city'];
		  $state = $result['state']; }	?>

<?php $query = show_ads($zip_id);
		while ($result = mysql_fetch_array($query)){
			$feature1 = $result['feature1'];
			}?>          
		 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul| Welcome To <?=$city;?>, <?= $state?> </title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<base href="http://www.menumogul.com/" />
<!--<script type="text/javascript" src="javascript/ban.min.js"></script>-->
<script type="text/javascript" src="javascript/menujava.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style type="text/css">
<!--
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:active {
	color: #FFF;
}
-->
</style>
</head>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div align="right" class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"></div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <div class="buttons"><a href="sign_up.php?zip_id=<?=$zip_id?>">Sign Up</a></div>
  </div>
</div>
<div id="search_area">
  <div class="search_cuisine">
  <script type="text/javascript"> 
  function showCats(str)
		{
		if (str=="<?php $cat_id = clean_input($_GET['cat_id']);?>")
		  {
		  document.getElementById("rest").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("rest").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","cust_ajax.php?zip_id=<?=$zip_id?>&cat_id="+str,true);
		xmlhttp.send();
		}
</script>
    		<form>
            <input type="hidden" name="zip_id" value="<?=$zip_id?>" />
            <select name="cat_id" id="cat_id"  onchange="showCats(this.value)">
            <option>Select For Cuisines</option>
          <?php $inc = 0;
		  		$zip_id = $_GET['zip_id'];
				$query = cat_by_zip($zip_id);?>
		  <?php 
                while ($row = mysql_fetch_array($query)){
					$cat_id = $row['cat_id'];
					$category = $row['category'];
					echo "<option value=\"".$cat_id."\" >".$category."</option>";
				
				$inc++;}?>
          	 </select>
    		</form>
  </div>
  <div class="search_specific"><img src="images/entree.png" width="125" height="25" /></div>
  <div class="search_image"><img src="images/cuisine.png" width="125" height="25" /></div>
  <div class="search_image_spec">
    <form method="post" >
      <input type="text" name="search"/>
      <input type="submit" name="look" value="Search" />
    </form>
  </div>
</div>
<div id="display_main_area">
  <table width="100%">
  <tr>
  	<td valign="top">
    <div id="left">
    	<div class="left_nav"></div>
    		<div class="left_adspace">
      	 <div class="skyscraper_left"><script type="text/javascript">
		show_ban('left');
	</script>
    	</div>
 	 </div>
     
     </td>
    <td valign="top">
    	<div id="display_content">
    		<div class="main_ad"><img src="admin/uploads_ads/<?=$feature1?>" /></div>
    
  </div> 
  		<div><?php $search = clean_input($_POST['search']);?> 
             <?php search_menu($search); ?></div> 
  
  		<div id="rest"></div>
        
  		
  </td>
    <td valign="top">
    	<div id="right">
    <div class="skyscraper_right"><script type="text/javascript">
		show_ban('right');
	</script></div></div></td>
  </tr>
 </table>
</div>
<?php include'footer.php';?>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20964627-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>
