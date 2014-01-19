<?php include'header.php';?>

<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>

<?php $cust = get_customer($cust_id); ?>
 <?php while ($result = mysql_fetch_array($cust)){ 
 
 		$cat_id_fk	= 	$result['cat_id_fk'];
		$name		=	$result['name'];
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
<div id="search_area" align="center"><h2>Welcome <?=$name;?>, go head and update your specials!!</h2></div>
<div id="menu_main">
  <table width="100%">
  <tr>
  <td valign="top" width="240px"><br /><br />
  <form method="post"></form>
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
			$name = $result['name'];
			
?>

<?php //if ($_POST["customer_update"]<>'') { 
			//$ToEmail = $_POST['email'];
			//$EmailSubject = $_POST['name'].' Here are the daily specials '; 
			//$mailheader = "From: 'admin@linkedupdesign.com'\r\n"; 
			//$mailheader .= "Reply-To: 'admin@linkedupdesign.com'\r\n"; 
			//$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//$MESSAGE_BODY = $_POST["specials"]."<br>"; 
			//$MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
			//$MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>"; 
			//$MESSAGE_BODY .= "Content: ".nl2br($_POST["comment"])."<br>"; 
			//mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ('Failure'); 
			//}?>
           <?php } ?> 
  		<form method="post" name="email">
        <input type="hidden" name="email" value="<?=$email?>"  />
  		<input type="hidden" name="name" value="<?=$name?>" />
        <h2>Email Specials</h2>
        <table width="85%" cellspacing="3" cellpadding="4" align="center">
  <tr>
    <td>To:</td>
    <td><textarea name="address" value="" /><?=$email?></textarea></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><textarea name="subject" value="" /></textarea></td>
  </tr>
  <tr>
    <td valign="top">Email Content:</td>
    <td><textarea name="specials" value="" cols="55" rows="20" /><?=$specials?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="email" id="email" value="Send Email" /></td>
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
