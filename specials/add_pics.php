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
<?php 

if(!empty($_GET['path']) && !empty($_GET['del'])) {
	$path = $_GET['id'];
	$query = "DELETE FROM pics WHERE pic_id = '$path'";
	mysql_query($query) or die(mysql_error());
}

if(isset($_FILES['image_upload'])) {
	$target_path = "../admin/uploads/";
	$rand = rand(10000,30000);
	$basename = basename($_FILES['image_upload']['name']);
	$file = $rand."-".$basename;
	$target_path = $target_path . $file;	
	if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $target_path)) {
		$query = "INSERT INTO pics (cust_id_fk,pics) VALUES ('$cust_id','$file') ";
		mysql_query($query) or die(mysql_error());
		echo "The file " . $basename . " has been uploaded";
	} else {
		echo "<strong>There was an error uploading the file. Please try again.</strong><br />";
		echo $_FILES['image_upload']['name'];
	}
}
?>

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
                    <td><input type="file" name="image_upload" /></td>
                </tr>
                <tr>
                	<td><input type="submit" value="Upload" /></td>
                    <td align="right"></td>
                </tr>
                </form>
             </table> 
             <?php 
						
								
						$a = 0;
						echo "<table width='450px'><tr>";
						$query = "SELECT pics, pic_id FROM pics WHERE cust_id_fk = '$cust_id'";
							$result = mysql_query($query) or die(mysql_error());
							while ($path = mysql_fetch_array($result)){
								   $id = $path['pic_id'];
						  if($a > 3)
						  {
							$a = 0;
							echo "</tr><tr>";
						  }
						  //Display each record.
						  echo "<td><a href='add_pics.php?id=$id&path=".$path[0]."&del=1'><img src='../admin/uploads/".$path[0]."' width='100px' height='100px' ></a><br /></td>";
						
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
