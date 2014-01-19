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
  <div class="menu_area"><a href="city_page.php?zip_id=<?=$zip_id?>">
    <div class="buttons">Home</div>
  </a>
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
  			
            
    		<form action="results.php?cat_id=<?=$cat_id?>&zip_id=<?=$zip_id?>" method="get">
            <input type="hidden" name="zip_id" value="<?=$zip_id?>" />
            <select name="cat_id" id="cat_id" onchange="this.form.submit()">
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
    		
    

  		<div><?php $search = clean_input($_POST['search']);?> 
             <?php search_menu($search); ?></div> 
  		<div id="rest"></div>
  		<div>
        <?php 

$zip_id = clean_input($_GET['zip_id']);
$cat_id = clean_input($_GET['cat_id']);

//$zip_id = clean_input($_GET['zip_id']);

//$query = "SELECT DISTINCT customer.zip_id_fk, customer.cat_id_fk, customer.cust_id, categories.cat_id, categories.category 
			//FROM customer INNER JOIN categories ON customer.cat_id_fk=categories.cat_id WHERE customer.zip_id_fk='$zip_id' ";
 
		$query = "SELECT * FROM customer WHERE zip_id_fk = '$zip_id' AND cat_id_fk = '$cat_id' ";
		//echo $query;
		$result = mysql_query($query); ?>
         <table width="100%" cellspacing="2" cellpadding="3">
<?php		$inc = 0;
			while ($row = mysql_fetch_array($result)){
			$cat_id_fk	=	$row['cat_id_fk'];	
			$cust_id	=	$row['cust_id'];
			$name		=	$row['name'];
			$address	=	$row['address'];	
			$city		=	$row['city'];	
			$state		=	$row['state'];
			$zip_id_fk	=	$row['zip_id_fk'];	
			$phone		=	$row['phone'];
			$fax		=	$row['fax'];
			$hours		=	$row['hours'];
			$domain		=	$row['domain'];
			$pic		=	$row['pic'];
			$add_ca		=	$row['add_cat_id'];
			$add_zip	=	$row['add_zip_id'];
			$add_zip1	=   $row['add_zip1'];
			$menu		=	$row['menu'];
				?>


    <tr>
      <td align="left" width="100px"><a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/">
      <img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" align="left" width="125px"><a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/"><?=$name?></a></td><td class="address" align="left" width="100px"><?=$address?></td><td class="address" align="left" width="75px"><?=$city?></td>
    </tr>
	<?php $inc++;?>
    
    <?php } ?>



     
     
<?php 		$query1 = "SELECT * FROM customer WHERE add_zip_id = '$zip_id'  AND cat_id_fk='$cat_id' ";
			//echo $query;
			$result1 = mysql_query($query1); ?>
         <table width="100%" cellspacing="2" cellpadding="3">
<?php		$inc = 0;
			while ($row1 = mysql_fetch_array($result1)){
			$cat_id_fk1=	$row1['cat_id_fk'];	
			$cust_id1	=	$row1['cust_id'];
			$name1		=	$row1['name'];
			$address1	=	$row1['address'];	
			$city1		=	$row1['city'];	
			$state1		=	$row1['state'];
			$zip_id_fk1	=	$row1['zip_id_fk'];	
			$phone1		=	$row1['phone'];
			$fax1		=	$row1['fax'];
			$hours1		=	$row1['hours'];
			$domain1	=	$row1['domain'];
			$pic1		=	$row1['pic'];
			$add_ca		=	$row1['add_cat_id'];
			$add_zip1 	=	$row1['add_zip_id'];
			$add_zip11	=   $row1['add_zip1'];
			$menu1		=	$row1['menu']; 	
			?> 
    
    <tr>
      <td align="left" width="100px"><a href="menu/<?=stripped($name1)?>/<?=$cust_id1?>/<?=$zip_id?>/"><img src="<?php echo "admin/uploads/".$pic1.""; ?>" alt="<?=$name1?>" title="<?=$name1?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" align="left" width="125"><a href="menu/<?=stripped($name1)?>/<?=$cust_id1?>/<?=$zip_id?>/"><?=$name1?></a></td><td class="address" align="left" width="100px"><?=$address1?></td><td class="address" align="left" width="75px"><?=$city1?></td>
    </tr>  
     <?php $inc++;?> 
     <?php }?>
     
<?php 		$query2 = "SELECT * FROM customer WHERE add_zip1 = '$zip_id'  AND cat_id_fk='$cat_id' ";
			$query2 .=
			//echo $query;
			$result2 = mysql_query($query2); ?>
         <table width="600" border="0" cellpadding="0" cellspacing="0">
<?php		$inc = 0;
			while ($row1 = mysql_fetch_array($result1)){
			$cat_id_fk2 =	$row2['cat_id_fk'];	
			$cust_id2	=	$row2['cust_id'];
			$name2		=	$row2['name'];
			$address2	=	$row2['address'];	
			$city2		=	$row2['city'];	
			$state2		=	$row2['state'];
			$zip_id_fk2	=	$row2['zip_id_fk'];	
			$phone2		=	$row2['phone'];
			$fax2		=	$row2['fax'];
			$hours2		=	$row2['hours'];
			$domain2	=	$row2['domain'];
			$pic2		=	$row2['pic'];
			$add_ca2	=	$row2['add_cat_id'];
			$add_zip2 	=	$row2['add_zip_id'];
			$add_zip12	=   $row2['add_zip1'];
			$menu2		=	$row2['menu']; 	
			?> 
    
    <tr>
      <td width="100px"><a href="menu/<?=stripped($name2)?>/<?=$cust_id2?>/<?=$zip_id?>/"><img src="<?php echo "admin/uploads/".$pic2.""; ?>" alt="<?=$name2?>" title="<?=$name2?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" width="125px"><a href="menu/<?=stripped($name2)?>/<?=$cust_id2?>/<?=$zip_id?>/"><?=$name2?></a></td><td class="address" align="left" width="100px"><?=$address2?></td><td class="address" width="75px"><?=$city2?></td>
    </tr>  
     <?php $inc++;?> 
     <? } ?>
       
 
</table>
        </div>
        
  		
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
