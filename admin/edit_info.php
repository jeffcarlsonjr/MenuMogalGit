<?php require('includes/header.php'); ?>
<?php update_info($id); ?>
<?php display_info_id($id);?>
<?php $id = $_GET['id']; ?>
<?php
	$query = display_info_id($id);
	while ($result = mysql_fetch_array($query)){
		$id		= $result['id'];	
		$name 	= $result['name'];
		$meta 	= $result['meta_description'];
		$key	= $result['meta_keys'];
		$coding = $result['coding'];
		$title	= $result['title'];
		
		}
?>

<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%">
	<tr>
    	
	
    	<td valign="top">
        <div id="right_menu"><h3>Edit Info Pages</h3>
        	<form method="post">
            <table width="85%" cellspacing="2" cellpadding="2" align="center">
              <tr>
                <td>Id</td>
                <td><?=$id?></td>
              </tr>
              <tr>
                <td width="28%">Page Name</td>
                <td width="72%"><input type="text" name="name" value="<?=$name?>" /></td>
              </tr>
              <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?=$title?>" /></td>
              </tr>
              <tr>
                <td>Meta Keywords</td>
                <td><input type="text" name="meta_keys" value="<?=$key?>" /></td>
              </tr>
              <tr>
                <td>Meta Description</td>
                <td><input type="text" name="meta_description" value="<?=$meta?>" /></td>
              </tr>
              <tr>
                <td>Page</td>
                <td><textarea name="coding" cols="40" rows="15" value="<?=$coding?>"><?=$coding?></textarea></td>
              </tr>
              <tr>
                <td><input type="button" value="Back" onClick="javascript: history.go(-1)" /></td>
                <td><input type="submit" name="update_info" value="Edit Page" /></td>
              </tr>
            </table>
           </form>
        
         </div>
         
         
        </td>
   </tr>
</table></div>
    
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>

</body>
</html>
