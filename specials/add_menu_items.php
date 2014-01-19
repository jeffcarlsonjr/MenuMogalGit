<?php include'header.php';?>

<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>
<? //$cust_id = $_GET['cust_id']; ?>

<?php $cust = get_customer($cust_id); ?>
<?php while ($result = mysql_fetch_array($cust)){ 
		$name		=	$result['name'];} ?>
		
<?php customer_menu_upload($cust_id);?>
<?php add_subject();?>
<?php display_menu($cust_id);?>
<?php display_subject_id($type);?>

 



<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center">
  <h2>Welcome <?=$name;?>, go ahead and add your specials!!</h2></div>
<div id="menu_main">
  <table align="center">
	<tr>
		<td ><div id="left"><h3>Add A Menu Subject</h3>
        		<form method="post" onSubmit="this.form.submit">
                <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
                <table width="95%" cellspacing="2" cellpadding="2" align="center">
                  <tr>
                    <td width="25%">Subject</td>
                    <td width="75%"><input type="text" name="subjects" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="left"><input type="submit" name="add_subject" value="Add Subject" /></td>
                  </tr>
                </table>
                </form>
        	 </div>
        </td>
    	<td valign="top"><h3>Add A Menu</h3>
            <form method="post" onSubmit="this.form.submit">
            <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
            <table align="center" cellpadding="3" cellspacing="3" width="675px">
                <tr>
                    <td colspan="4">
                    		<select name="type">
                            	<option value="">Select Subject</option>
                                <?php $query = display_subject();?>
                                <?php while($result = mysql_fetch_array($query)){ 
										$id		= $result['sub_id'];
										$subject = $result['subjects'];
										
											echo"<option value=\"".$id."\">".$subject."</option>";										
											}
								?>
                                </select>
                    </td>
                </tr>
                <tr>
                    <td>Menu Item</td>
                    <td><input type="text" name="food" size="45"/></td>
                    <td>Price</td>
                    <td><input type="text" name="price" size="10" /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td colspan="3"><input type="text" name="description" size="75" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="menu_upload" value="Upload Menu" /></td>
                </tr>
             </table>  
             </form>
             
				
		</td>
 	</tr>
</table>
<table width="85%" cellspacing="2" cellpadding="2" align="center">
             	   
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
                        
                      <tr><input type="hidden" name="menu_id" value="<?=$menu_id ?>" />
                        <td><?=$food?></td>
                        <td width="35%" align="right"><?=$price?></td>
                      </tr>
                      <tr>
                        <td><?=$description?></td>
                        <td align="right"><a href="update_menu_ajax.php?menu_id=<?= $menu_id?>&cust_id=<?=$cust_id?>">Edit Item</a></td>
                        
                        
                      </tr>
                    
					<?php } ?>
                    <?php } ?>
                    
				</table>
</div>
</body>
</html>
