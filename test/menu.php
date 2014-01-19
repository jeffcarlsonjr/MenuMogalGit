
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
                  <td><div class="style1">Name:</div></td> <td><input name="name" type="text" class="textfield" /></td>
                </tr>
                <tr>    
                  <td><div class="style1">Email:</div></td><td> <input name="email" type="email" class="textfield" /></td>
                </tr>
                <tr>    
                  <td colspan="2"><div><input type="submit" name="add_sub" value="Submit" /></div></td>
                </tr>    
              </form>
            </table>
   		  </div>
            
          <div class="map"><img src="http://maps.google.com/maps/api/staticmap?center=<?=$address?>+<?=$city;?>+<?=$state?>&amp;zoom=12&amp;size=175x175&amp;maptype=roadmap&amp;sensor=false"/></div>
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
                        
                            <img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="200" height="200" id="image_place" style="background-color: #CCCCCC" />                    </div>
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
                        <tr>
                          <td><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.menumogul.com/menu.php?cust_id=<?=$cust_id?><?=$zip_id?>" show_faces="false" width="450" font=""></fb:like></td>
                        </tr>
                      </table>
                    </div>
                  </div>
      			<?php $inc++; }?></td>
              </tr>
            </table></div>
            <div id="photo" width="35%" align="left"><?php show_image($cust_id); ?></div>
            	
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
                            <table width="85%" cellspacing="0" cellpadding="0" align="center">
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
      </table>          </td>
    
    
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
