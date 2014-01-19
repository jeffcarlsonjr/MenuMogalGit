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
		
<?php add_specials($cust_id);?>
<?php update_specials($cust_id);?>
<?php display_specials($cust_id);?>	
<?php  customer_update_menu($menu_id); ?>
 



<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center">
  <h2>Welcome <?=$name;?>, go ahead and add your specials!!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  	<td><div><a href="customer_page.php"> Back to Home Page</a></div></td>
  </tr>
    <td><div id="right_menu">
  	      
  	      
  	      <table width="100%" align="center">
  	<tr>
    	<td> <h2>Edit Menu </h2></td>
    	<td align="right" style="margin-right:5px;"><!--<a href="add_menu_items.php">+Add Items To The Menu</a>--></td>   
    </tr>
    <tr>
      <td colspan="2">
        	<table width="85%" cellspacing="0" cellpadding="0" align="center">
                
                    <?php $query =  display_menu($cust_id);?>
                    <?php while ($result = mysql_fetch_array($query)){
                        $menu_id	= $result['menu_id'];		
                        $type		= $result['type'];
                        $food 		= $result['food'];
                        $price 		= $result['price'];
                        $description = $result['description'];?>
                   
                        
                        <?php if(!empty($food)){?>
        	  <form method="post" onclick="this.form.submit()">
        	    <input type="hidden" name="menu_id" value="<?=$menu_id?>" />
   	    <input type="hidden" name="type" value="<?=$type?>" />
                            <?php if($type != '1'){ display_subject_id($type);}?>
                            
                          <tr>
                            <td><input type="text" name="food" value="<?=$food?>" size="50" /></td>
                            <td width="35%" align="right"><input type="text" name="price" value="<?=$price?>" size="10" /></td>
                          </tr>
                          <tr>
                            <td><input type="text" value="<?=$description?>" name="description" size="75"/></td>
                            <td align="right"><input type="submit" name="update" value="Edit" /></td>
                          </tr>
   	      </form>
                        
                        <?php } ?>
                        <?php } ?>
            </table>                </td>
      </tr>
  	<tr>
     	<td colspan="2"><hr /></td>   
     </tr>    
  	</tr>
  </table>
     </div>
  </td>
  </tr>
  </table>
  
</div>
</body>
</html>
