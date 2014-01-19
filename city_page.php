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
<Meta name="description" content="Menu Mogul is a Restaurant Menu Directory Online. Each Restaurant has a profile page where you can view their Daily Specials, Coupons, and More. Delivery, Take-Out, or Dine-In." />
<title>
<?=$city;?>, <?= $state?> Restaurant Menu Guide - Lunch Specials & Coupons in <?= $state?></title>
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
.top_list1 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #999;
	height: 100px;
}
.top_title {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
}
-->
</style>
</head>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div align="right" class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"><script type="text/javascript">
		show_ban('top');
	</script>
    	</div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Kudos</div>
    <div class="buttons">Downtown</div>
    <a href="sign_up.php?zip_id=<?=$zip_id?>">
    <div class="buttons">Sign Up</div>
    </a></div>
</div>
<div id="search_area">
  <div class="search_image"><img src="images/cuisine.png" alt="" width="125" height="25" /></div>
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
            <option>Select From Cuisines</option>
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
  <div class="search_image_spec">
    <form method="post" >
      <input name="search" type="text" onclick="this.value='';" value="What are you craving?" maxlength="23" />
      <input type="submit" name="look" value="Search" />
    </form>
  </div>
</div>
<div id="display_main_area">
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
  	<td width="24%" valign="top">
    <div id="left">
    <div class="left_nav">
      <div class="top_title">Most Frequented in
        <?=$city?>
        ,
        <?=$state?>
      </div>
      <div class="top_list1">
        <?php $query = customer_update_display($zip_id); ?>
        <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
        <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
          <?=$name?>
          </a><br />
        <?php } ?>
      </div>
      <div class="top_title">Recently Added in
        <?=$city?>
        ,
        <?=$state?>
      </div>
      <div class="top_list1">
        <?php $query = customer_recent_display($zip_id);?>
        <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
        <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
          <?=$name?>
          </a><br />
        <?php } ?>
      </div>
    </div>
    <div class="left_adspace">
      	 <div class="skyscraper_left"><script type="text/javascript">
		show_ban('left');
	</script>
    	</div>
 	 </div>
     
     </td>
    <td width="65%" valign="top">
    	<div id="display_content">
    		<div class="main_ad"><img src="admin/uploads_ads/<?=$feature1?>" /></div>
    

  		<div><?php $search = clean_input($_POST['search']);?> 
             <?php search_menu($search); ?></div> 
  
  		<div id="rest"></div>
        
  		
  </td>
    <td width="11%" valign="top"><div id="right">
      <div class="skyscraper_right"><script type="text/javascript">
		show_ban('right');
	</script></div>
    </div></td>
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
