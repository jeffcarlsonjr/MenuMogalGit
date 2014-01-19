<?php require('includes/header.php'); ?>
<?php info_upload(); ?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%">
	<tr>
    	
    	<td valign="top">
        <div id="right_menu"><h3>Add Information Page</h3><i>Make sure a corresponding link is added to footer.php by id</i>
        	<form method="post">
            <table width="85%" cellspacing="2" cellpadding="2" align="center">
              <tr>
                <td width="28%">Page Name</td>
                <td width="72%"><input type="text" name="name" /></td>
              </tr>
              <tr>
                <td>Title</td>
                <td><input type="text" name="title" /></td>
              </tr>
              <tr>
                <td>Meta Keywords</td>
                <td><input type="text" name="meta_keys" /></td>
              </tr>
              <tr>
                <td>Meta Description</td>
                <td><input type="text" name="meta_description" /></td>
              </tr>
              <tr>
                <td>Pages/HTML & CSS Can Be Added</td>
                <td><textarea name="coding" id="coding" cols="40" rows="15"></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="info_upload" value="Add Page" /></td>
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
