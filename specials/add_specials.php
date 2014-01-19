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
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td> <h2>Add Specials <hr></h2></td>
    </tr>
    <tr>    
        <td><form method="post" onSubmit="">
            <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
        	<table width="85%" align="center" cellpadding="2">
                <tr>
                	<td colspan="4"><i>To add a special simply add the dish, then the price and if you want a description and then click the "Add Special". The special will build right below you. If you are not happy with what you wrote then just delete and rewrite it. </i></td>
        		<tr>
                	<td>Dish:</td>
                    <td><input type="text" name="food" size="45" /></td>
                    <td>Price:</td>
                    <td><input type="text" name="price" size="10" /></td>
                </tr>
                <tr>
                	<td>Description:</td>
                    <td><input type="text" name="description" size="55" /></td>
                    <td></td>
                    <td></td>
                 </tr>
                 <tr>
                	<td colspan="4" align="right"><input type="submit" name="add_specials" value="Add Special" /></td>
                 </tr>
                 
                </table></form>        
        </td>
     <tr>
     	<td><hr />
        <table width="75%" align="center" cellpadding="3">
        	<?php   
					$query = display_specials($cust_id);
					$inc = 1;
					while($result = mysql_fetch_array($query)){
						$special_id = $result['special_id'];
						$food = $result['food'];
						$price = $result['price'];
						$description = $result['description']; ?>
            <input type="hidden" name="special_id" value="<?=$special_id?>">
            <tr bgcolor="#CCCCCC">
        	  	<td width="85%"><?=$food?></td>
                <td align="right"><?=$price?></td>	
            </tr>
            <tr>
            	<td><?=$description?> </td>
                <td><a href="delete_menu.php?special_id=<?=$special_id?>"><input type="submit" name="" value="X" title="delete special" /></a></td>
            </tr>
            <?   } ?> 
            
        	</table>
        </td>   
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
