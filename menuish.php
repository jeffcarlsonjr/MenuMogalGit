<?php include("admin/functions/functions.php");?>
<?php connect();?>
<?php $zip_id = $_GET['zip_id']?>
<?php show_ads($zip_id); ?>
<?php script($zip_id); ?>
<?php add_sub($cust_id); ?>
<?php display_menu($cust_id);?>
<?php display_subject_id($type);?>
<?php $query = display_zip_id($zip_id);
	  while ($result = mysql_fetch_array($query)){
		  $city = $result['city']; 
		  $state = $result['state']; }	?>
		 
          
<?php 	$cust_id = $_GET['cust_id'];
		$query = "SELECT name FROM customer WHERE cust_id = '$cust_id'";
		$result = mysql_query($query);
		//echo $zip_id;	?>
<?php 	
		while ($row = mysql_fetch_array($result)){
			$name		=	$row['name'];}
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul | Welcome To <?=$name?> in <?=$city;?>, <?=$state?> </title>
<meta content="keywords"  />
<meta content="description"  />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="javascript/menujava.js"></script>
<style type="text/css">
<!--
.style1 {color: #ffffff}
-->
</style></head>

<body>
<div id="TOP_HEADER">
  <a onclick="javasciript: history.go(-1)"><div class="logo"></div></a>
  <div class="top"><span class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></span></div>
  <div id="top_ad">
    <div class="leaderboard"><script type="text/javascript">
		show_ban('top');
	  </script></div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <div class="buttons"><a href="sign_up.php">Sign Up</a></div>
  </div>
</div>
<div id="search_area">
  <div class="search_area">
    <div class="craving">I'm Craving</div>
    <div class="craving_search">
    <form id="entree" name="entree" method="post" action="">
        <label for="label"></label>
        <input name="search_keyword" type="text" id="label" size="16" />
        <input type="submit" name="Search" id="Search" value="Search" />
      </form>
    </div>
  </div>
</div>
<!-- Please do not change this area!! -->
<div id="display_main_area">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><div id="left">
    		<div class="left_nav">Join <b><?=$name?>'s</b> email list and get specials emailed daily<br/>
            
            <form method="post" name="add_sub">
            <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
            <div>Name: <input type="text" name="name" /></div>
            <div>Email: <input type="email" name="email" /></div>
            <div><input type="submit" name="add_sub" value="Submit" /></div>
            </form>
            
            </div>
    			<div class="left_adspace">
                    <div class="skyscraper_left">
						<script type="text/javascript">
                            show_ban('left');
                        </script>
                	</div>
    			</div>
 			 </div>
           </td>
    <!-- Menu Area Made to expand with the page  -->       
    <td valign="top"><div class="menu_top">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"><!-- Call the customer from City Page -->
						<?php 	$cust_id = $_GET['cust_id'];
                        $query = "SELECT * FROM customer WHERE cust_id = '$cust_id'";
                        $result = mysql_query($query);
                        //echo $zip_id;	?>
                        <?php 	$inc = 0;
                        while ($row = mysql_fetch_array($result)){
                    
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
						$dine_in		=	$row['dine_in'];
						$take_out		=	$row['take_out'];
						$delivery		=	$row['delivery'];
						$specials		= 	$row['specials']
						
						?>
                    
      				<div class="image_place">
                        
                            <img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="200" height="200" id="image_place" style="background-color: #CCCCCC" />
                        
                    </div>
                  <div class="menu_right">
                    <div class="title">
                      <?=$name?>
                    </div>
                    <div class="address">
                      <table width="100%" cellspacing="0" cellpadding="0">
                       
                        <tr>
                          	<td><?=$address?></td>
                        </tr>
                        <tr>
                          	<td><?=$city?></td>
                        </tr>
                        <tr>
                          	<td><?=$phone?></td>
                        </tr>
                        <?php if($dine_in == 'yes'){?>
                        <tr>
                          	<td>Dine In</td>
                        </tr>
                        <?php }?>
                        <?php if($take_out == 'yes'){?>
                        <tr>
                          	<td>Take Out</td>
                        </tr>
                        <?php } ?>
                        <?php if($delivery == 'yes'){?>
                        <tr>
                          	<td>We Deliver</td>
                        </tr>
                        <?php } ?>
                        <tr>
                          	<td><div class="hours">
                          	  <?=$hours?>
                       	    </div></td>
                        </tr>
                        <tr>
                          	<td><a href="redirect_ajax.php?cust_id=<?=$cust_id?>"><?=$domain?></a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
      			<?php $inc++; }?></td>
              </tr>
            </table></div>
            	
                    <table width="100%" align="center">
                          <?php if(!empty($specials)){  ?>
                          <tr>
                          	<td><h2 align="center">Specials</h2><hr /></td>
                          </tr>  
                          <tr>
                          	<td><?php echo $specials; ?></td>
                          </tr>
                          <?php }?> 
                          <?php //} ?>
                          
                          <tr>
                            <td>
                            <table width="85%" cellspacing="2" cellpadding="2" align="center">
             	   				<tr>
                                    <td colspan="2"><h2 align="center">Menu</h2><hr /></td>
                                </tr>  
									<?php $query =  display_menu($cust_id);?>
                                    <?php while ($result = mysql_fetch_array($query)){
                                        $menu_id	= $result['menu_id'];		
                                        $type		= $result['type'];
                                        $food 		= $result['food'];
                                        $price 		= $result['price'];
                                        $description = $result['description'];?>
                                   
                                        
                                        <?php if(!empty($food)){?>
                                        
                                          <input type="hidden" name="type" value="<?=$type?>" />
                                            <?php if($type != '1'){ display_subject_id($type);}?>
                                            
                                          <tr>
                                            <td><div class="items"><?=$food?></div></td>
                                            <td width="35%" align="right"><div class="items"><?=$price?></div></td>
                                          </tr>
                                          <tr>
                                            <td><div class="description"><?=$description?></div></td>
                                            <td></td>
                                            
                                            
                                          </tr>
                                        
                                        <?php } ?>
                                        <?php } ?>
                    
							</table>
                			</td>
                          </tr>
                         
                           <?php if(empty($food)) {?>
                           <tr>
                           	<td><h3 align="center"><i>Menu Coming Soon</i></h3></td>
                            <?php } ?>
                       </table>
         		
          </td>
    
    
    <!-- Right Ad Space -->
    <td valign="top"><div id="right">
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
