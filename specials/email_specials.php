<?php include'header.php';?>

<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>
<?php $cust_id; ?>
<?php $cust = get_customer($cust_id); ?>
 <?php while ($result = mysql_fetch_array($cust)){ 
 
 		$cat_id_fk	= 	$result['cat_id_fk'];
		$restaurant		=	$result['name'];
		$address	=	$result['address'];	
		$city		=	$result['city'];	
		$state		=	$result['state'];
		$zip_id_fk	=	$result['zip_id_fk'];	
		$phone		=	$result['phone'];
		$fax		=	$result['fax'];
		$hours		=	$result['hours'];
		$domain		=	$result['domain'];
		$pic		=	$result['pic'];
		$add_ca		=	$result['add_cat_id'];
		$add_zip	=	$result['add_zip_id'];
		$add_zip1	= 	$result['add_zip1'];
		$menu		=	$result['menu'];	
		$rating		=	$result['rating'];
		$dine		=	$result['dine_in'];
		$take		=   $result['take_out'];
		$delivery	=	$result['delivery'];
		$email		= 	$result['email'];
		$specials	= 	$result['specials'];
		}
 
 ?>
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
<div id="search_area" align="center"><h2>Go ahead <?=$restaurant;?> and email your specials!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  <td valign="top" width="240px"><br /><br />
  <div><a href="customer_page.php">Back To Your Home Page</a></div>
  <br>
  <div><a href="emails.php">Update Your Email List</a></div>
  </td>
  <td>
  	<div id="right_menu">
 
 
  <table width="100%" align="center">
  	<tr>
    	<td>
        
<?php  $inc = 0;
	   $query = show_sub($cust_id);
	   while($result = mysql_fetch_array($query)){
			$email = $result['email'];
			$name = $result['name'];}
			
?>
 <?php if ($_POST["email"]<>'') { 
			$ToEmail = $_POST["address"];
			
			$mailheader = "From: \"admin@linkedupdesign.com\"\r\n"; 
			$mailheader .= "Reply-To: \"admin@linkedupdesign.com\"\r\n"; 
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$EmailSubject = "Specials from ". $_POST["subject"]; 
			$MESSAGE_BODY = "<h3> Here Are The Specials From " . $_POST["subject"]."</h3><br>";
			$MESSAGE_BODY .= $_POST["specials"]."<br>"; 
			$MESSAGE_BODY .= "This message was brought to you by <a href=\"http://www.menumogul.com\">Menu Mogul</a>"; 
			//$MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>"; 
			//$MESSAGE_BODY .= "Content: ".nl2br($_POST["comment"])."<br>"; 
			mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader,'-f admin@linkedupdesign.com') or die ('Failure'); 
			echo "<meta http-equiv=\"refresh\" content=\"0; url=http://www.menumogul.com/specials/customer_page.php\">"
			?>
            
			
			<?php }?>
  
          
          
  		<form method="post" name="email" >
        
        <h2>Email Specials</h2>
        <table width="95%" cellspacing="3" cellpadding="4" align="left">
  <tr>
    <td>To:</td>
    <td><textarea name="address" value="" cols="55" rows="4" readonly="readonly" /><?php  $inc = 0;
			   $query = show_sub($cust_id);
			   while($result = mysql_fetch_array($query)){
					$email = $result['email'];
					$name = $result['name'];
					echo $email.",";
					}
			
?></textarea></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><textarea name="subject" value="" cols="55" rows="1" readonly="readonly"/><?=$restaurant?></textarea></td>
  </tr>
  <tr>
    <td valign="top">Email Content:</td>
    <td><textarea name="specials" value="" cols="55" rows="20" readonly="readonly" /><?php email_specials($cust_id);?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="email" id="email" value="Send Email" /><input name="email" type="hidden" id="" value="email" /></td>
  </tr>
</table>
  		</form>
  </td>
  </tr>
  </table></div>
  </td>
  </tr>
  </table>
 
  
</div>
</body>
</html>
