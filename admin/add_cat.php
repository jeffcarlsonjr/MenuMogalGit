<?php require('includes/header.php'); ?>
<?php add_cat();?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="main_area">
  
  <div id="right_content">
  		<form method="post">
        <h2>Add a category</h2>
  			<table width="450" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Category</td>
    <td><input type="text" name="category" id="category" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="add_cat" id="add_cat" value="Submit" /></td>
  </tr>
</table>
  </form>
  </div>
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
