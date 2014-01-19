<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php cat_by_zip($cust_id_fk);?>
<?php get_cat_zip($zip_id); ?>
<?php $zip_id = $_GET['zip_id'];?>
<?php script($zip_id); ?>
<?php $page_id = $_GET['page_id'];?>
<?php  display_info_page($page_id);?>

<?php
	$query = display_info_page($page_id);
	while ($result = mysql_fetch_array($query)){
			
		$name 	= $result['name'];
		$meta 	= $result['meta_description'];
		$key	= $result['meta_keys'];
		$coding = $result['coding'];
		$title	= $result['title'];
		
		}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul |Welcome To <?=$title?> </title>
<meta name="keywords" content="<?=$key?>" />
<meta name="description" content="<?=$meta?>" />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="javascript/ban.min.js"></script>-->
<script type="text/javascript" src="javascript/menujava.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

</head>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div align="right" class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"></div>
  </div>
  <div class="menu_area"><a href="city_page.php?zip_id=<?=$zip_id?>">
    <div class="buttons">Home</div>
  </a>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <a href="sign_up.php?zip_id=<?=$zip_id?>"><div class="buttons">Sign Up</div></a></div>
</div>
<div id="search_area"></div>
<div id="display_main_area">
  <div id="market-wrap">
    <div id="market-right"></div>
    <div id="market-left">
      <div id="market-headline">Local Market</div>
      <div id="market-info">Mom &amp; Pop's need no worry, promote your business or service to consumers who live, work, and frequent restaurants in your area.</div>
      <div id="learnmore-btn"><a href="info_page.php?zip_id=<?=$zip_id?>&amp;page_id=7"><img src="images/learn-more-btn.png" alt="Menu Mogul - Where You Find What To Eat!" width="162" height="53" border="0" /></a></div>
    </div>
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
