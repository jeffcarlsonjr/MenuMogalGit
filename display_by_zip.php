<?php include("functions/functions.php");?>
<?php connect(); ?>
<?php display_zips();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul |Welcome To <?=$row['city'];?> </title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div id="top_ad">
    <div class="leaderboard"><img src="images/ad_space/468x60.gif" width="468" height="60" /></div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <div class="buttons">Sign Up</div>
  </div>
</div>
<div id="search_area">
  <div class="search_cuisine">
    <form method="get" action="display_cuisine.php?cat_id=<?= $id ?>">
      <select name="cat_id" onchange="this.form.submit()">
    			<option>Choose a Category</option>
	
			<?php 	$cat = "SELECT * FROM categories ORDER BY category ASC"; 
					$result = mysql_query($cat);?>
			
			<?php	while ($row = mysql_fetch_array($result)){
					$id = $row['cat_id'];
					$cat = $row['category'];
						echo "<option value=\"".$id."\">".$cat."</option>";
						
					}?>
                </select>
                </form>
  </div>
  <div class="search_specific"><img src="images/entree.png" width="125" height="25" /></div>
  <div class="search_image"><img src="images/cuisine.png" width="125" height="25" alt="Cuisine | Menu Mogul where you find what to eat" /></div>
  <div class="search_image_spec">
    <form id="entree2" name="entree" method="post" action="">
      <label for="search_keyword2"></label>
      <input type="text" name="search_keyword2" id="search_keyword2" />
      <input type="submit" name="Search2" id="Search2" value="Search" />
    </form>
  </div>
</div>
<div id="display_main_area">
  <table width="100%">
  <tr>
  	<td valign="top">
    <div id="left">
    	<div class="left_nav"><img src="images/advancedsearch.png" width="125" height="25" alt="Advance Search Menu Mogul Where You Find What To Ear" /></div>
    		<div class="left_adspace">
      	<div class="skyscraper_left"><img src="images/ad_space/200x225.gif" alt="" width="200" height="225" /></div>
    	</div>
 	 </div></td>
    <td valign="top">
    	<div id="display_content">
    		<div class="menu_top">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td>
			<?php 	$zip_id = $_GET['zip_id'];
			$query = "SELECT * FROM customer WHERE zip_id_fk = '$zip_id'";
			$result = mysql_query($query);
			//echo $zip_id;	?>
      <?php 	$inc = 0;
			while ($row = mysql_fetch_array($result)){
			$cust_id	=	$row['cust_id'];
			$name		=	$row['name'];
			$address	=	$row['address'];	
			$city		=	$row['city'];	
			$state		=	$row['state'];
			$zip_id_fk	=	$row['zip_id'];	
			$phone		=	$row['phone'];
			$fax		=	$row['fax'];
			$hours		=	$row['hours'];
			$domain		=	$row['domain'];
			$pic		=	$row['pic'];
			$add_ca		=	$row['add_cat_id'];
			$add_zip	=	$row['add_zip_id'];
			$menu		=	$row['menu'];	
		
	
	?>
      <div class="image_place"><a href="menu.php?cust_id=<?=$cust_id?>"><img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" 
      							name="image_place" width="200" height="200" id="image_place" style="background-color: #CCCCCC" /></a></div>
      <div class="menu_right">
        <div class="title">
          <a href="menu.php?cust_id=<?=$cust_id?>"><?=$name?></a>
        </div>
        <div class="address">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><?=$address?></td>
            </tr>
            <tr>
              <td><?=$phone?></td>
            </tr>
            <tr>
              <td><?=$city?></td>
            </tr>
            <tr>
              <td><?=$hours?></td>
            </tr>
            <tr>
              <td><?=$domain?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php $inc++; }?></td>
              </tr>
            </table>
            </div>
    
  </div> </td>
    <td valign="top">
    	<div id="right"><img src="images/ad_space/youradhere_right_side.png" alt="" width="100" height="500" /></div></td>
  </tr>
 </table>
</div>
<div id="footer">
  <div id="footer_container">
    <div class="footer">
      <div class="footer_title">About</div>
      About Menu Mogul<br />
    Blog<br />
    Terms Of Service<br />
    Privacy Policy
    </div>
    <div class="footer">
      <div class="footer_title">Help</div>
      F.A.Q.'s<br />
      Contact Us<br />
    </div>
    <div class="footer">
      <div class="footer_title">More</div>
      Carreers<br />
      Advertising<br />
      Menu Mogul App
    </div>
    <div class="footer">
      <div class="footer_title">Languages</div>
  </div></div>
</div>
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
