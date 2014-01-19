<?php include'menu_header.php'; ?>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />

<div id="TOP_HEADER">
  <a onclick="javasciript: history.go(-1)"><div class="logo"></div></a>
  <div align="right" class="top"><a href="http://www.menumogul.com/specials/">Log In</a> | <a href="http://www.menumogul.com">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"><script type="text/javascript">
		show_ban('top');
	  </script></div>
  </div>
  <div class="menu_area">
    <a href="city_page.php?zip_id=<?=$zip_id?>"><div class="buttons">Home</div></a>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <a href="sign_up.php?zip_id=<?=$zip_id?>"><div class="buttons">Sign Up</div></a>
  </div>
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
<!-- Please do not change this area!! -->
<div id="display_main_area">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" valign="top"><div id="left">
   		<div class="left_nav">
   		  <div class="mailinglist">Join <b><?=$name?>'s</b> email list and get specials emailed daily<br/>
            <table width="100%" border="0">
              
              <form method="post" name="add_sub">
                <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
                <tr>
                  <td>&nbsp;</td> <td><input name="name" type="text" class="textfield" onclick="this.value='';" value="Name" /></td>
                </tr>
                <tr>    
                  <td>&nbsp;</td><td> <input name="email" type="email" class="textfield" onclick="this.value='';" value="Email" /></td>
                </tr>
                <tr>    
                  <td colspan="2"><div><input type="submit" name="add_sub" value="Submit" /></div></td>
                </tr>    
              </form>
            </table>
   		  </div>
            
          <div class="map"><a target="_blank" href="http://maps.google.com/maps?q=<?=$address?>,<?=$city;?>,<?=$state?>,<?=$zip_code?>" title="Click for Directions."><img src="http://maps.google.com/maps/api/staticmap?center=<?=$address?>,<?=$city;?>,<?=$state?>,<?=$zip_code?>&amp;zoom=15&amp;size=200x125&amp;maptype=mobile&markers=<?=$address?>,<?=$city;?>,<?=$state?>,<?=$zip_code?>&sensor=false&key=ABQIAAAARZJVmWhpZJax1M_ZGL_i7RSNg4pJGBdkVs8JwCO7BLHMIHCJchRZqGEqU7XTnAzdMHr38KbKy8VzRw
" border="0"/></div>
   		</div>
   		<div class="left_adspace">
   		  <div class="skyscraper_left">
   		    <script type="text/javascript">
                            show_ban('left');
                        </script>
	      </div>
	    </div></td>
    <!-- Menu Area Made to expand with the page  -->       
    <td width="65%" valign="top"><div class="menu_top">
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
                        	<a href="pix.php?cust_id=<?=$cust_id?>&zip_id=<?=$zip_id?>">
                            <img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" 
                            	 name="image_place" width="200" height="200" border="0" id="image_place" style="background-color: #CCCCCC" title="<?=$name?>" /></a></div>
                  <div class="menu_right">
                    <div class="title">
                      <?=$name?>
                    </div>
                    <div class="menu-info">
                      <?=$address?>
                    </div>
                    <div class="menu-info">
                      <?=$city?>,
                      <?=$state?>
                    </div>
                    <div class="menu-info">
                      <?=$phone?>
                    </div>
                    <div class="menu-info">
                      <?=$hours?>
                    </div>
                    <div class="menu-info">Dining? 
                      <?=$dine_in?>
                    </div>
                    <div class="menu-info">Take-Out?
                      <?=$take_out?>
                    </div>
                    <div class="menu-info">Deliver?
                      <?=$delivery?>
                    </div>
                    <div class="menu-info"><a href="redirect_ajax.php?cust_id=<?=$cust_id?>"><?=$domain?></a></div>
                    <div class="menu-info"><!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e2bc02d4329bb6f"></script>
<!-- AddThis Button END --></div>
                  </div>
      			<?php $inc++; }?></td>
              </tr>
            </table></div>
            <div id="photo" width="35%" align="left"></div>
            	
        <table width="95%" align="center" cellpadding="0" cellspacing="0">
                    <?php   
						$query = display_specials($cust_id);
						
						while($result = mysql_fetch_array($query)){
							
							$food = $result['food'];}?>
							
                          <?php if(!empty($food)){  ?>
                          <tr>
                          	<td><h2 align="center">Today's Specials</h2 ><hr width='85%' /></td>
                          </tr>  
                          <tr>
                          	<td><table width="80%" align="center" cellpadding="0">
										<?php   
												$query = display_specials($cust_id);
												
												while($result = mysql_fetch_array($query)){
													$special_id = $result['special_id'];
													$food = $result['food'];
													$price = $result['price'];
													$description = $result['description']; ?>
                                        
                                        <tr>
                                            <td ><div class="items"><?=$food?></div></td>
                                            <td width="35%"align="right"><div class="items"><?=$price?></div></td>	
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="description"><?=$description?></div></td>
                                        </tr>
                                        <?   } ?> 
                                
                                </table></td>
                          </tr>
                          <?php }?> 
                          <?php //} ?>
                          
                          <tr>
                            <td>
                            <table width="95%" cellspacing="0" cellpadding="0" align="center">
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
                                            <td><div class="menu-items"><?=$food?></div></td>
                                            <td width="35%" align="right"><div class="menu-items"><?=$price?></div></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2"><div class="description"><?=$description?></div></td>
                                          </tr>
                                        
                                        <?php } ?>
                                        <?php } ?>
							</table>                			</td>
                          </tr>
                         
                           <?php if(empty($food)) {?>
                           <tr>
                           	<td><h3 align="center"><i>Menu Coming Soon</i></h3></td>
                            <?php } ?>
      </table>
      <br /></td>
    
    
    <!-- Right Ad Space -->
    <td width="11.5%" valign="top"><div id="right">
      <div class="skyscraper_right"><script type="text/javascript">
		show_ban('right');
	</script></div>
    </div></td>
  </tr>
</table>



</div>

<?php include'footer.php';?>
