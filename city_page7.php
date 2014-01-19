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
<title>Menu Mogul| Welcome To <?=$city;?>, <?= $state?> </title>
<base href="http://www.menumogul.com/" />
<!--<script type="text/javascript" src="javascript/ban.min.js"></script>-->
<script type="text/javascript" src="javascript/menujava.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style type="text/css">
<!--
#displayarea {
	width: 1002px;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	height: 100%;
	border-top-width: 1px;
	border-top-style: groove;
	border-top-color: #AE292E;
}
.skyscraper_rt {
	height: 466px;
	width: 88px;
	margin-top: 10px;
	border: 1px dashed #CCC;
	float: right;
	margin-right: 15px;
	margin-bottom: 10px;
}
.skyscraper_lft {
	height: 223px;
	width: 198px;
	margin-top: 12px;
	margin-left: 15px;
	border: 1px dashed #CCC;
}
.feature {
	height: 225px;
	width: 625px;
	margin-top: 10px;
	border: 1px dashed #CCC;
	padding: 2px;
	margin-left: 10px;
	float: left;
}
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}

#display_main_area {
	float: none;
	width: 1002px;
	margin-top: 0px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 1px;
	border-right-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-left-style: solid;
	border-top-color: #990000;
	border-right-color: #990000;
	border-left-color: #990000;
}
a:active {
	color: #FFF;
}
.leftspace {
	float: left;
	width: 240px;
	margin-top: 5px;
}
.toplistarea {
	background-color: #FFF;
	height: 240px;
	width: 240px;
	-moz-border-radius: 25px 10px / 10px 25px;
    border-radius: 25px 10px / 10px 25px;
}
.top_list1 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #999;
	height: 100px;
	padding-right: 10px;
	padding-left: 10px;
}
.top_title {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
}
.rightspace {
	background-color: #FFF;
	float: right;
	width: 757px;
	margin-top: 5px;
	-moz-border-radius: 25px 10px / 10px 25px;
	border-radius: 25px 10px / 10px 25px;
}
.results {
	float: left;
}
-->
</style>
<link href="css/stylesheet2.css" rel="stylesheet" type="text/css" />
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
    <div class="buttons">Critique</div>
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
  <div class="search_image_spec">
    <form method="post" >
      <input name="search" type="text" onclick="this.value='';" value="What are you craving?" maxlength="23" />
      <input type="submit" name="look" value="Search" />
    </form>
  
  </div>
</div>
<div id="displayarea">
  <div class="leftspace">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" scope="col">&nbsp;</td>
      </tr>
    </table>
  </div>
  <div class="rightspace">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" scope="col"><div class="feature">Content for  class "feature" Goes Here</div></td>
        <td valign="top" scope="col"><div class="skyscraper_rt">Content </div></td>
      </tr>
    </table>
  </div>
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
