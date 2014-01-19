<?php include'functions/functions.php';
	connect();?>
<?php $menu_id = $_GET['menu_id'];?>
<?php $cust_id = $_GET['cust_id']; ?>
<?php update_menu($menu_id);?>
<?php display_menu_id($menu_id);?>
<?php $query = display_menu_id($menu_id);?>
<?php while($result=mysql_fetch_array($query)){
		$type = $result['type'];
		$food = $result['food'];
		$price = $result['price'];
		$description = $result['description'];
}?>
			<form method="post">
            
            <table align="center" cellpadding="3" cellspacing="3" width="675px">
               	<tr>
                    <td>Menu Item</td>
                    <td><input type="text" name="food" size="45" value="<?=$food?>"/></td>
                    <td>Price</td>
                    <td><input type="text" name="price" size="10" value="<?=$price?>"/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td colspan="3"><input type="text" name="description" size="75" value="<?=$description?>" /></td>
                </tr>
                <tr>
                	<td>Subject</td>
                    <td><input type="text" name="type" value="<?=$type?>" size="5"> <i>If you changed a subject by mistake make this a <b>1</b></i></td>
                    <td></td>
                    <td></td>
                    
                <tr>
                    <td></td>
                    <td><a href="menu.php?cust_id=<?=$cust_id?>">Back to the menu page</a></td>
                    <td></td>
                    <td><input type="submit" name="update" value="Update Menu" /></td>
                </tr>
             </table>  
             </form>

	
<?php

?>

