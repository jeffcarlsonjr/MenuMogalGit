<?php include'header.php';?>

<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>
<?php $cust_id; ?>
<?php add_pics($cust_id)?>
<?php customer_update($cust_id); ?>
<?php show_cats($cat_id_fk); ?>
<?php display_cats(); ?>
<?php get_customers($cust_id); ?>
<?php display_zip_id($zip_id); ?>
<?php show_login($cust_id);?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center"><h2>Go ahead <?=$restaurant;?> and add some photos!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  <td valign="top" width="240px"><br /><br />
  <div><a href="customer_page.php">Back To Your Home Page</a></div></td>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center" height="393">
  	<tr valign="top">
    	<td>
        	<table width="100%" >
        		<tr valign="top">
                	<td height="52" colspan="2"><h2>Add Some Photos Of Your Restaurant</h2><i>These will be the photos that will be on your menu page</i></td>
                    
                </tr>
               <form method="post" enctype="multipart/form-data">
               <input type="hidden" name="cust_id" value="<?=$cust_id?>" />
                <tr valign="top">
                	<td>Upload Your Photo:</td>
                    <td><input type="file" name="uploadedfile" /></td>
                </tr>
                <tr>
                	<td><input type="submit" name="add_pics" value="Submit" /></td>
                    <td align="right"></td>
                </tr>
                </form>
             </table> 
             <?php echo $cust_id;
						$cust_id_fk = $cust_id;
					
						$a = 0;
						echo "<table width='450px'><tr>";
						$query = "SELECT pics FROM pics WHERE cust_id_fk = '$cust_id_fk'";
							$result = mysql_query($query) or die(mysql_error());
							while ($path = mysql_fetch_array($result)){
						  if($a > 3)
						  {
							$a = 0;
							echo "</tr><tr>";
						  }
						  //Display each record.
						  echo "<td><img src='../admin/uploads/".$path[0]."' width='100px' height='100px' ><br /></td>";
						
						  $a++;
						}
						echo '</tr></table>';
						mysql_close();
						?>
        </td>

  </tr>
  </table></div>
  </td>
  </tr>
  </table>
  
</div>
</body>
</html>
