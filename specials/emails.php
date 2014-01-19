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
		$name		=	$result['name'];
		
		}
 
 ?>


<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center"><h2>Welcome <?=$name;?>, go head and update your email list!!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  	<td><div><a href="customer_page.php"> Back to Home Page</a></div></td>
  </tr>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td>
        <h2>Email List Maintainence<hr></h2>
  			<table width="500px" border="0" cellspacing="4" cellpadding="4" align="center">
          <tr>
            <th>Name</th>
            <th>Email</th>
            
            <th>Delete</th>
          </tr>
	<?php 	$query = show_sub($cust_id); 
			while ($result = mysql_fetch_array($query)){
				
				$id		= $result['id'];
				$name	= $result['name'];
				$email = $result['email'];
				$date	= $result['date'];?>	
				
				
            <tr>
                
                <td><?=$name?></td>
                <td><?=$email?></td>
                <td align="center"><a href="delete_sub.php?id=<?=$id?>"> <input type="button" name="delete" value="Delete" id="<?=$id?>" /></a></td>
             </tr> 
             <?php } ?>        
             </table>
      
  </td>
  </tr>
  </table></div>
  </td>
  </tr>
  </table>
  
</div>
</body>
</html>
