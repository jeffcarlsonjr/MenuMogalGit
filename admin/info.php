<?php require('includes/header.php'); ?>
<?php info_upload(); ?>
<?php display_info();?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%">
	<tr>
    	<td valign="top">
        <div id="right_menu">
        	<h3>Information Pages</h3>
            
            	<table width="85%" cellspacing="2" cellpadding="2" align="center">
                  <tr>
                    <td><a href="add_info.php">+Add Page</a></td>
                    <th align="left">&nbsp;</th>
                    <th align="left">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="left">Name</th>
                    <th align="left">Meta Description</th>
                    <th align="left">Edit</th>
                  </tr>
        <?php 	$query = display_info(); 
       		  	$inc   = 1;
				while ($result = mysql_fetch_array($query)){
				$id		= $result['id'];	
				$name 	= $result['name'];
				$meta 	= $result['meta_description'];
				
			?>         
                  <tr <?php
					if($inc % 2 == 1){echo 'bgcolor="#cccccc"';}
					else {echo 'bgcolor="#ffffff"';}
				  ?>>
                    <td><?= $name?></td>
                    <td><?= $meta?></td>
                    <td><a href="edit_info.php?id=<?=$id?>">Edit</a></td>
                  </tr>
          <?php $inc++;?>        
          <?php } ?>
                </table>
      
          
         
         
        </div></td>
    </tr>
    </table>
    
</div>
	 

</body>
</html>
