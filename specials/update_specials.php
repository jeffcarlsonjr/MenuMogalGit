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

<?php display_specials($cust_id);?>	




<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center">
  <h2>Welcome <?=$name;?>, go head and add your specials!!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  	<td><div><a href="customer_page.php"> Back to Home Page</a></div></td>
  </tr>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td> <h2>Update Specials <hr></h2></td>
    </tr>
    <tr>    
        <td>
		    <?php update_specials($special_id);?> 
            <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
              <?php   $query = display_specials($cust_id);
					while ($result = mysql_fetch_array($query)){
						$special_id = $result['special_id'];
						$food = $result['food'];
						$price = $result['price'];
						$description = $result['description'];
						?>
            
	
                 
             <input type="hidden" name="special_id" value="<?=$special_id?>" />  
        	<table width="85%" align="center" cellpadding="2">
          		<form method="post" onSubmit="this.form.submit">
                
                 
        		<tr>
                	<td>Dish:</td>
                    <td><input type="text" name="food" size="45" value="<?=$food?>" /></td>
                    <td>Price:</td>
                    <td><input type="text" name="price" size="10" value="<?=$price?>" /></td>
                </tr>
                <tr>
                	<td>Description:</td>
                    <td><input type="text" name="description" size="55" value="<?=$description?>" /></td>
                    <td></td>
                    <td><input type="submit" name="update_specials" value="Update" /></td>
                 </tr>
                          	
                
                 
                </table>   </form> <?php }?>
                      
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
