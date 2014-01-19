<?php require('includes/header.php'); ?>

<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div class="menu_area"></div>
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="main_area">
  
  <div id="right_menu">
    <h2>Users</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    <table width="90%" cellspacing="2" cellpadding="2"  border="1">
 	
    
  <tr>
    <th>User</th>
    <th>Password</th>
    <th>Last Login</th>
    <th>Delete</th>
  </tr>
  
  <?php $query = "SELECT * FROM user ORDER BY user_id ASC";
		$result = mysql_query($query); ?>
        
  <?php $inc = 0;
  		while ($row = mysql_fetch_array($result)){
		$user_id = $row['user_id']; ?>
  <tr>
    <td align="center"><?= $row['username']; ?></td>
    <td align="center"><?= $row['password']; ?></td>
    <td align="center"><?php echo date("m/d/Y G:i", strtotime ($row['date'])); ?></td>
    <td align="center"><a href="delete.php?user_id=<?= $user_id?>"><input type="submit" id="<?= $user_id?>" value="X" /></a></td>
  </tr>
  <?php $inc++;  } ?>
 
</table></form>
</td>
  </tr>
 
  
</table>
	<br />
    <button>Add Users</button>
        <div id="add" class="hide">
				<?php add_user(); ?>
                 <table width="90%" cellspacing="2" cellpadding="2" border="1">
                         <form method="post" action="">
                          <tr>
                            <th>User Name</th>
                            <th>Password</th>
                            <th></th>
                            
                          </tr>
                          <tr>
                            <td align="center"><input type="text" name="username" id="username" /></td>
                            <td align="center"><input type="password" name="password" id="password" /></td>
                            <td align="center"><input type="submit" name="add_user" id="add_user" value="Add User" onClick="refresh()"/></td>
                            
                          </tr>
                          </form>
                 </table><button id="close">Close</button>
         </div> 
         <script>
		 $('button').click(function(){
		 $('#add').show('slow');							
		 ;})
		  $('#close').click(function(){
		 $('#add').hide('slow');							
		 ;})
		 </script>
    </div>
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
