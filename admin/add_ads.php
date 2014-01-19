<?php require('includes/header.php'); ?>
<?php show_ads($zip_id);?>
<?php update_ads($zip_id); ?>
<?php  add_ads(); ?>
<!--3/6/2011 -->
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%">
	<tr>
    	
	
    	<td valign="top">
        	<div id="right_menu">
            	<h2>Ad Module</h2> 
                	<form action="add_ads.php?zip_id?=<?=$zip_id?>" method="get">
            		 <div align="center">Zip Code:&nbsp;&nbsp;
   						
    					<select name="zip_id" onChange="this.form.submit()">
						<option>Choose a zip....</option>
						<?php $query = display_zips();?>
                        <?php while ($result = mysql_fetch_array($query)){
							$zip_id = $result['zip_id'];
							$zip_code = $result['zip_codes'];
								echo "<option value=\"".$zip_id."\">".$zip_code."</option>";}?>
                        </select>
                       </div>
                     </form>
                   <br />
                   <?php $zip_id = $_GET['zip_id'];
				   		$query = show_ads($zip_id);
						while ($result = mysql_fetch_array($query)){
							
							$zip_id_fk = $result['zip_id_fk'];
							$top1 = $result['top1'];}
							
							if (isset($zip_id_fk)){
							echo "<button id=\"a\">Update Ads</button>";
							}
							if(!isset($zip_id_fk)){
								
								echo "<button id=\"2\">Add Ads</button>";
								} ?>
                                        <div id="ad_ads" class="hide" >          	
                                        <table width="100%" cellspacing="2" cellpadding="2" align="center">
                                           
                                            <form method="post" enctype="multipart/form-data">
						<input type="hidden" name="zip_id" value="<?=$zip_id?>" />
                                              <tr>
                                              <td>Top Ad:</td>
                                              <td></td>
                                              <td>&nbsp;</td>
                                              </tr>
                                            <tr>
                                                <td><input name="uploadedfile[]" type="file" id="uploadedfile[]" size="17"/></td>
                                                <td><input name="uploadedfile[]" type="file" id="uploadedfile[]" size="17"  /></td>
                                                <td><input name="uploadedfile[]" type="file" id="uploadedfile[]" size="17"  /></td>
                                              </tr>
                                            <tr>
                                            	<td><input type="text" name="web1" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web2" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web3" size="17" />&nbsp;Website</td>
                                            </tr>  
                                            <tr>
                                                <td><input name="uploadedfile[]" type="file" id="uploadedfile[]" size="17"  /></td>
                                                <td><input name="uploadedfile[]" type="file" id="uploadedfile[]" size="17"  /></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td><input type="text" name="web4" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web5" size="17" />&nbsp;Website</td>
                                                <td></td>
                                            </tr>  
                                            <tr>
                                              <td>Left Ad:</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                            </tr>
                                            <tr>
                                            	<td><input type="text" name="web6" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web7" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web8" size="17" />&nbsp;Website</td>
                                            </tr>  
                                            <tr>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                            	<td><input type="text" name="web9" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web10" size="17" />&nbsp;Website</td>
                                                <td></td>
                                            </tr>  
                                            <tr>
                                              <td>Right Ad:</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            <tr>
                                              <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                              <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                              <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                            </tr>
                                            <tr>
                                            	<td><input type="text" name="web11" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web12" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web13" size="17" />&nbsp;Website</td>
                                            </tr>  
                                            <tr>
                                              <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                              <td><input type="file" name="uploadedfile[]" size="17"/></td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                            	<td><input type="text" name="web14" size="17" />&nbsp;Website</td>
                                                <td><input type="text" name="web15" size="17" />&nbsp;Website</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td>Featured Ads</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td><input type="file" name="uploadedfile[]" size="17" /> </td>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="web16" size="17" />&nbsp;Website</td>
                                              <td><input type="text" name="web17" size="17" />&nbsp;Website</td>
                                              <td><input type="text" name="web18" size="17" />&nbsp;Website</td>
                                            </tr>  
                                            <tr>
                                            	<td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td><input type="file" name="uploadedfile[]" size="17" /></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="web19" size="17" />&nbsp;Website</td>
                                              <td><input type="text" name="web20" size="17" />&nbsp;Website</td>
                                              <td></td>
                                            </tr>    
                                            <tr>
                                              <td></td>
                                              <td>&nbsp;</td>
                                              <td><input type="submit" name="add_ads" value="Submit" /></td>
                                            </tr>
                                              </form>
                                            </table><br /><br />
                                        </div>		
				   					<div id="updates" class="hide">
                                   
                                     
                            			<div id="show_updates"> 
										<?php 
												$zip_id = clean_input($_GET['zip_id']);
												$query = show_ads($zip_id);?>
												<table width="100%" cellspacing="2" cellpadding="2" align="center">
												<?php
												$inc=0;
												while ($results = mysql_fetch_array($query)){
													$id		= $results['id'];
													$top1 	= $results['top1'];
													$top2 	= $results['top2'];
													$top3 	= $results['top3'];
													$top4 	= $results['top4'];
													$top5 	= $results['top5'];
													
													$left1 	= $results['left1'];
													$left2 	= $results['left2'];
													$left3 	= $results['left3'];
													$left4 	= $results['left4'];
													$left5 	= $results['left5'];
													
													$right1	= $results['right1'];
													$right2	= $results['right2'];
													$right3 = $results['right3'];
													$right4	= $results['right4'];
													$right5	= $results['right5'];	
													$web1	= $results['web1'];
													$web2	= $results['web2'];
													$web3	= $results['web3'];
													$web4	= $results['web4'];
													$web5	= $results['web5'];
													$web6	= $results['web6'];
													$web7	= $results['web7'];
													$web8	= $results['web8'];
													$web9	= $results['web9'];
													$web10	= $results['web10'];
													$web11	= $results['web11'];
													$web12	= $results['web12'];
													$web13	= $results['web13'];
													$web14	= $results['web14'];
													$web15	= $results['web15'];
													$web16	= $results['web16'];
													$web17	= $results['web17'];
													$web18	= $results['web18'];
													$web19	= $results['web19'];
													$web20	= $results['web20'];
													$feature1 = $results['feature1'];
													$feature2 = $results['feature2'];
													$feature3 = $results['feature3'];
													$feature4 = $results['feature4'];
													$feature5 = $results['feature5'];
													?>
													
													
												<form method="post" enctype="multipart/form-data">
												<input type="hidden" name="zip_id" value="<? $zip_id;?>"  />
												
												<tr>
												  <td>Top Ad:</td>
												  <td></td>
												  <td>&nbsp;</td>
												  </tr>
												<tr>
													<td><?php if (!empty($top1)){ echo  "<img src=\"uploads_ads/".$top1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
													<td><?php if (!empty($top2)){ echo  "<img src=\"uploads_ads/".$top2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
													<td><?php if (!empty($top3)){ echo  "<img src=\"uploads_ads/".$top3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												  </tr>
												<tr>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top1?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top2?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top3?>" /></td>
												</tr>
                                                <tr>
                                                    <td><input type="text" name="web1" size="17" value="<?=$web1?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web2" size="17" value="<?=$web2?>"  />&nbsp;Website</td>
                                                    <td><input type="text" name="web3" size="17" value="<?=$web3?>"  />&nbsp;Website</td>
                                                </tr>
												<tr>
													<td><?php if (!empty($top4)){ echo  "<img src=\"uploads_ads/".$top4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
													<td><?php if (!empty($top5)){ echo  "<img src=\"uploads_ads/".$top5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
													<td></td>
												</tr>
												<tr>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top4?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top5?>"/></td>
													<td></td>
												</tr>
                                                <tr>
                                                    <td><input type="text" name="web4" size="17" value="<?=$web4?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web5" size="17" value="<?=$web5?>"  />&nbsp;Website</td>
                                                    <td></td>
                                                </tr>
												
												<tr>
												  <td>Left Ad:</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												</tr>
												<tr>
												<td><?php if (!empty($left1)){ echo  "<img src=\"uploads_ads/".$left1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td><?php if (!empty($left2)){ echo  "<img src=\"uploads_ads/".$left2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td><?php if (!empty($left3)){ echo  "<img src=\"uploads_ads/".$left3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												</tr>
												<tr>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$left1?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$left2?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$left3?>" /></td>
												</tr>
                                                <tr>
                                                    <td><input type="text" name="web6" size="17" value="<?=$web6?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web7" size="17" value="<?=$web7?>"  />&nbsp;Website</td>
                                                    <td><input type="text" name="web8" size="17" value="<?=$web8?>"  />&nbsp;Website</td>
                                                </tr>
												<tr>
												<td><?php if (!empty($left4)){ echo  "<img src=\"uploads_ads/".$left4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td><?php if (!empty($left5)){ echo  "<img src=\"uploads_ads/".$left5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td></td>
												</tr>
												
												<tr>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$left4?>" /></td>
													<td><input type="file" name="uploadedfile[]" size="17" value="<?=$left5?>" /></td>
													<td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="web9" size="17" value="<?=$web9?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web10" size="17" value="<?=$web10?>"  />&nbsp;Website</td>
                                                    <td></td>
                                                </tr>
												<tr>
												  <td>Right Ad:</td>
												  <td>&nbsp;</td>
												  <td>&nbsp;</td>
												<tr>
												<td><?php if (!empty($right1)){ echo  "<img src=\"uploads_ads/".$right1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td><?php if (!empty($right2)){ echo  "<img src=\"uploads_ads/".$right2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												<td><?php if (!empty($right3)){ echo  "<img src=\"uploads_ads/".$right3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
												</tr>
												<tr>
												  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right1?>" /></td>
												  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right2?>" /></td>
												  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right3?>" /></td>
												</tr>
                                                <tr>
                                                    <td><input type="text" name="web11" size="17" value="<?=$web11?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web12" size="17" value="<?=$web12?>"  />&nbsp;Website</td>
                                                    <td><input type="text" name="web13" size="17" value="<?=$web13?>"  />&nbsp;Website</td>
                                                </tr>
												<tr>
                                                    <td><?php if (!empty($right4)){ echo  "<img src=\"uploads_ads/".$right4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                    <td><?php if (!empty($right5)){ echo  "<img src=\"uploads_ads/".$right5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                    <td></td>
												</tr>
												<tr>
												  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right4?>" /></td>
												  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right5?>" /></td>
												  <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="web14" size="17" value="<?=$web14?>" />&nbsp;Website</td>
                                                    <td><input type="text" name="web15" size="17" value="<?=$web15?>"  />&nbsp;Website</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                  <td>Featured Ads</td>
                                                  <td>&nbsp;</td>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td><?php if (!empty($feature1)){ echo  "<img src=\"uploads_ads/".$feature1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                  <td><?php if (!empty($feature2)){ echo  "<img src=\"uploads_ads/".$feature2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                  <td><?php if (!empty($feature3)){ echo  "<img src=\"uploads_ads/".$feature3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                </tr>
                                                <tr>
                                                  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$feature1?>" /></td>
                                                  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$feature2?>" /></td>
                                                  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$feature3?>" /></td>
                                                </tr>
                                                <tr>
                                                  <td><input type="text" name="web16" size="17" value="<?=$web16?>"  />&nbsp;Website</td>
                                                  <td><input type="text" name="web17" size="17" value="<?=$web17?>"  />&nbsp;Website</td>
                                                  <td><input type="text" name="web18" size="17" value="<?=$web18?>"  />&nbsp;Website</td>
                                                </tr>
                                                <tr>
                                                  <td><?php if (!empty($feature4)){ echo  "<img src=\"uploads_ads/".$feature4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                  <td><?php if (!empty($feature5)){ echo  "<img src=\"uploads_ads/".$feature5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$feature4?>" /></td>
                                                  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$feature5?>" /></td>
                                                  <td></td>
                                               </tr>
                                                <tr>
                                                  <td><input type="text" name="web19" size="17" value="<?=$web19?>"  />&nbsp;Website</td>
                                                  <td><input type="text" name="web20" size="17" value="<?=$web20?>"  />&nbsp;Website</td>
                                                  <td></td>
                                                </tr>                                                
												<tr>
												  <td><input type="submit" name="update_ads" value="Submit" /></td>
												  <td>&nbsp;</td>
												  <td>     </td>
													
													
												<?php $inc++; }?>
												</tr></form>
												</table></div>
                            		</div>
				  	    
           	</div>
         
        </td>
    </tr>
    </table>
</div>
	 <script>
	 $("document").ready(function(){
		$("#a").click(function () {
			$("#updates").show(2000);
			
		});
		});
		</script>
        <script>
		$("document").ready(function(){
		$("#2").click(function () {
		$("#ad_ads").show(2000);});
		});
		
		</script>
       		 
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
