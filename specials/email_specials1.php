<?php include'header.php';?>
<?php $_POST['email']; ?>
<?php $query = show_login($user_id);
		while($result = mysql_fetch_array($query)){
			$cust_id = $result['cust_id_fk'];
			$urname = $result['urname'];
			$psword = $result['psword'];
			}?>

<?php $cust = get_customer($cust_id); ?>
 <?php while ($result = mysql_fetch_array($cust)){  		
		$restaurant		=	$result['name'];} ?>
  
  


          
<table width="95%" cellspacing="3" cellpadding="4" align="left">
  <tr>
    <td>To:</td>
    <td><textarea name="address" value="" cols="55" rows="4" readonly="readonly" /><?php $emails = show_sub($cust_id); ?></textarea></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><textarea name="subject" value="" cols="55" rows="1" readonly="readonly"/><?=$restaurant?></textarea></td>
  </tr>
  <tr>
    <td valign="top">Email Content:</td>
    <td><textarea name="specials" value="" cols="55" rows="20" readonly="readonly" /><?php email_specials($cust_id);?></textarea></td>
  </tr>
  
</table>       
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