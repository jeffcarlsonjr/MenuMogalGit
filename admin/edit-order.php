<?php

//::JK -- If an order_id is specified in GET, change or create the session variable for it.
if (!empty($_GET['order_id'])) {$_SESSION['order_id'] = clean_input($_GET['order_id']);}
$order_id = $_SESSION['order_id'];

if ($_POST['copy'] == 'order') {
	$newid=copy_order($order_id);
	$_SESSION['order_id'] = $newid;
} else if ($_POST['copy'] == 'quote') {
	$newid=quote_order($order_id);
	$_SESSION['order_id'] = $newid;
}

$order_info = get_order($order_id);
while ($myarray = mysql_fetch_array($order_info)) {$order_processed = $myarray['order_processed'];}

if (!empty($_GET['product_id']) && $order_processed != 1) {
	$product_id = clean_input($_GET['product_id']);
	add_item($order_id,$product_id,'1');
}

if (!empty($_POST['note_text'])) {
	$note_text=clean_input($_POST['note_text']);
	$note_id=clean_input($_POST['note_id']);
	$note_enabled=clean_input($_POST['note_enabled']);
	update_note($note_id,$order_id,$note_text,$note_enabled);
}

//::JK -- Make any changes requested.
	if (!empty($_POST['addr_id']) ||
		!empty($_POST['billing_id']) ||
		!empty($_POST['billaddr_id']) ||
		!empty($_POST['payment_method']) ||
		!empty($_POST['order_status']) ||
		!empty($_POST['order_calldate']) ||
		!empty($_POST['order_quotedate']) ||
		!empty($_POST['order_solddate']) ||
		!empty($_POST['order_confdate']) ||
		!empty($_POST['order_calluser']) ||
		!empty($_POST['order_quoteuser']) ||
		!empty($_POST['order_solduser']) ||
		!empty($_POST['order_confuser']) ||
		!empty($_GET['order_shipcost']) ||
		isset($_POST['order_custom_shipmarkup']) ||
		isset($_POST['order_discount']) ||
		!empty($_POST['tracking_number']) ||
		!empty($_POST['order_shipby']) ||
		isset($_POST['order_origin']) ||
		isset($_POST['supplier_id']) ||					
		!empty($_GET['order_shiptype'])) {update_order($order_id);}

//::JK -- What customer is this order for? What address information does this customer have?
$order_info = get_order($order_id);

//$o = mysql_fetch_array($order_info);
while ($myarray = mysql_fetch_array($order_info)) {
	$ordernum        = $myarray['order_id'];
	$cust_id_fk      = $myarray['cust_id_fk'];
	$addr_id_fk      = $myarray['addr_id_fk'];
	$billaddr_id_fk  = $myarray['billaddr_id_fk'];
	$billing_id_fk   = $myarray['billing_id_fk'];
	$payment_method  = $myarray['payment_method'];
	$payment_refno   = $myarray['payment_refno'];
	$order_name      = $myarray['order_name'];
	$order_contact   = $myarray['order_contact'];
	$order_address   = $myarray['order_address'];
	$order_address2  = $myarray['order_address2'];
	$order_city      = $myarray['order_city'];
	$order_state     = $myarray['order_state'];
	$order_postcode  = $myarray['order_postcode'];
	$order_weight    = $myarray['order_weight'];
	$order_subtot    = $myarray['order_subtot'];
	$order_shipcost  = $myarray['order_shipcost'];
	$order_ship      = $myarray['order_ship'];
	$order_tax       = $myarray['order_tax'];
	$order_tot       = $myarray['order_tot'];
	$order_shipby    = $myarray['order_shipby'];
	$order_shiptype  = $myarray['order_shiptype'];
	$order_trackno   = $myarray['order_trackno'];
	$order_status    = $myarray['order_status'];
	$order_type      = $myarray['order_type'];
	$order_processed = $myarray['order_processed'];
	$order_notes     = $myarray['order_notes'];
	$order_date      = $myarray['order_date'];
	$order_mod       = $myarray['order_mod'];
	$order_mod_by    = $myarray['order_mod_by'];
	$order_calldate  = $myarray['order_calldate'];
	$order_quotedate = $myarray['order_quotedate'];
	$order_solddate  = $myarray['order_solddate'];
	$order_confdate  = $myarray['order_confdate'];
	$order_origin    = $myarray['order_origin'];
	$supplier_id     = $myarray['order_supplier_id'];			
	
}

if ($order_processed == 1) { ?>
	<script>
	/*$(document).ready(function() {
		$("#dim").fadeIn(400).delay(400).fadeOut("slow");
		$("<p>NOTICE:</p><p>This order is marked as completed.</p><p>Changes can be made but beware of modifications.</p>").appendTo("#xyalert");
		$("#xyalert").fadeIn(400).delay(400).fadeOut("slow");
	}); */
	</script>
<?php }

//don't ask. argh. lol
if(isset($_POST['addr_id']) || isset($_POST['billaddr_id'])){ 
	$edit_address = explode("-",$_POST['addr_id']);
	$edit_billing_address = explode("-",$_POST['billaddr_id']);

	if($edit_address[0] == "edit" || $edit_billing_address[0] == "edit"){ ?>

		<script type="text/javascript">
		// This is the auto load function
		hs.addEventListener(window, "load", function() {
		   hs.htmlExpand(null, {
			  <?php if($edit_address[0] == "edit") { ?>
			  	objectType: 'iframe', src: 'quick_edit_address.php?address_id=<?= $edit_address[1];?>&customer_id=<?= $cust_id_fk ;?>'
			  <?php } ?>
			  <?php if($edit_billing_address[0] == "edit") { ?>
			  	objectType: 'iframe', src: 'quick_edit_address.php?address_id=<?= $edit_billing_address[1];?>&customer_id=<?= $cust_id_fk ;?>'
			  <?php } ?>			  
		   });
		});
		</script>		

<?php }
}


$cust_name=get_cust_name($cust_id_fk);

$one_address = get_one_address($addr_id_fk);

while ($myarray = mysql_fetch_array($one_address)) {
	$addr_name      = $myarray['addr_name'];
	$addr_contact   = $myarray['addr_contact'];
	$addr_address   = $myarray['addr_address'];
	$addr_address2  = $myarray['addr_address2'];
	$addr_city      = $myarray['addr_city'];
	$addr_state     = $myarray['addr_state'];
	$addr_postcode  = $myarray['addr_postcode'];
	$addr_phone     = $myarray['addr_phone'];
	$addr_phone_wrk = $myarray['addr_phone_wrk'];
	$addr_phone_mob = $myarray['addr_phone_mob'];
	$addr_fax       = $myarray['addr_fax'];
	$addr_email     = $myarray['addr_email'];
	$addr_creation  = $myarray['creation'];
	$addr_modified  = $myarray['modified'];
	$addr_mod_by    = $myarray['mod_by'];
}

$one_billaddr = get_one_billing_address($billaddr_id_fk);

while ($myarray = mysql_fetch_array($one_billaddr)) {
	$billaddr_name      = $myarray['addr_name'];
	$billaddr_contact   = $myarray['addr_contact'];
	$billaddr_address   = $myarray['addr_address'];
	$billaddr_address2  = $myarray['addr_address2'];
	$billaddr_city      = $myarray['addr_city'];
	$billaddr_state     = $myarray['addr_state'];
	$billaddr_postcode  = $myarray['addr_postcode'];
	$billaddr_phone     = $myarray['addr_phone'];
	$billaddr_phone_wrk = $myarray['addr_phone_wrk'];
	$billaddr_phone_mob = $myarray['addr_phone_mob'];
	$billaddr_fax       = $myarray['addr_fax'];
	$billaddr_email     = $myarray['addr_email'];
	$billaddr_creation  = $myarray['creation'];
	$billaddr_modified  = $myarray['modified'];
	$billaddr_mod_by    = $myarray['mod_by'];
}

$one_billing = get_one_billing($billing_id_fk);

while ($myarray = mysql_fetch_array($one_billing)) {
	$cc_type           = $myarray['cc_type'];
	$cc_hash           = $myarray['cc_hash'];
	$cc_avs            = $myarray['cc_avs'];
	$cc_last4          = $myarray['cc_last4'];
	$cc_exp            = $myarray['cc_exp'];
	$bill_creation     = $myarray['creation'];
	$bill_modified     = $myarray['modified'];
	$bill_mod_by       = $myarray['mod_by'];
}

if (!empty($_POST['process'])) {
	$cc_num=key_decrypt($cc_hash, $GLOBALS['__DB_ENC_KEY__']);
	list($firstname, $lastname) = split(" ", $billaddr_name, 2);
	$auth_return=cc_process($cc_num,$cc_exp,$firstname,$lastname,$billaddr_address,$billaddr_state,$billaddr_postcode,$order_tot,$order_id);
	echo "&nbsp;&nbsp;&nbsp;&nbsp;".$auth_return[3];
}

$order_info = get_order($order_id);

while ($myarray = mysql_fetch_array($order_info)) {
	$ordernum        = $myarray['order_id'];
	$cust_id_fk      = $myarray['cust_id_fk'];
	$addr_id_fk      = $myarray['addr_id_fk'];
	$billaddr_id_fk  = $myarray['billaddr_id_fk'];
	$billing_id_fk   = $myarray['billing_id_fk'];
	$payment_method  = $myarray['payment_method'];
	$payment_refno   = $myarray['payment_refno'];
	$order_name      = $myarray['order_name'];
	$order_contact   = $myarray['order_contact'];
	$order_address   = $myarray['order_address'];
	$order_address2  = $myarray['order_address2'];
	$order_city      = $myarray['order_city'];
	$order_state     = $myarray['order_state'];
	$order_postcode  = $myarray['order_postcode'];
	$order_weight    = $myarray['order_weight'];
	$order_subtot    = $myarray['order_subtot'];
	$order_shipcost  = $myarray['order_shipcost'];
	$order_ship      = $myarray['order_ship'];
	$order_tax       = $myarray['order_tax'];
	$order_tot       = $myarray['order_tot'];
	$order_shiptype  = $myarray['order_shiptype'];
	$order_trackno   = $myarray['order_trackno'];
	$order_status    = $myarray['order_status'];
	$order_shipby    = $myarray['order_shipby'];	
	$order_type      = $myarray['order_type'];
	$order_processed = $myarray['order_processed'];
	$order_notes     = $myarray['order_notes'];
	$order_date      = $myarray['order_date'];
	$order_mod       = $myarray['order_mod'];
	$order_mod_by    = $myarray['order_mod_by'];
	$order_calldate  = $myarray['order_calldate'];
	$order_quotedate = $myarray['order_quotedate'];
	$order_solddate  = $myarray['order_solddate'];
	$order_confdate  = $myarray['order_confdate'];
	$order_confship  = $myarray['order_confship'];
	$order_calluser  = $myarray['order_calluser'];
	$order_quoteuser = $myarray['order_quoteuser'];
	$order_solduser  = $myarray['order_solduser'];
	$order_confuser  = $myarray['order_confuser'];
	$tracking_number = $myarray['tracking_number'];
	$order_origin    = $myarray['order_origin'];
	$supplier_id     = $myarray['order_supplier_id'];		
}
add_custom_shipping();
?>
<table width="100%">
<tr>
<td valign="top">
<? $addr_result=get_ship_address($cust_id_fk);
while ($myarray2 = mysql_fetch_array($addr_result)) {
	$addr_contact2   = $myarray2['addr_name'];
	$addr_state2     = $myarray2['addr_state'];
	}

?>
<div id="title-header" style = "height:45px;"><div id="title-text-order" style = "margin-top:-5px;">
<table width="100%"><span><tr><td width="8%"><a href="../oms/admin.php">Home </a>&gt;</td>
	<td width="22%"><a href="customers.php?action=edit&amp;cust_id=<?= $cust_id_fk;?>">Account Overview (<?=$cust_id_fk?>)</a> &nbsp;&nbsp;&gt;<br /></td>
	
	<td width="50%">Order Detail (<?=$order_id;?>) </td>
	<td width = "20%"><a href="orders.php?action=add&cust_id=<?= $cust_id_fk;?>"><strong>Create New Order</strong></a></td>
</tr></span>
	<tr><td></td><td><span style = "font-size:10px"><strong><?=$addr_contact2;?>, <?=$addr_state2;?></strong></span></td>
	<td ></td> 
    <td align="right"><form method="post" action="complete.php?order_solddate=<?= $order_solddate?>">
                            	<input type="submit" name="order_processed" id="order_processed" value="Save and Finish"/></form></td>                            
 </tr>                           
	</table>
  </div>

  </div><br />
</div>
<div id="large-content">


<script> 
		//$('#order_quoteuser').load('date_ajax.php?value=<?= now();?>&order_id=<?= $_SESSION['order_id'];?>&userid=<?=$_SESSION['userid'];?>&type=quoted');
</script>

<table width="100%" border="0px" cellspacing="2px" cellpadding="0px">
	<form method="post" name="time"><tr>
		<td>Call Date:</td>
		<td>
     <input type="button" value="Quote" onclick="$('#order_quotedate').load('date_ajax.php?value=<?= now();?>&order_id=<?= $_SESSION['order_id'];?>&userid=<?=$_SESSION['userid'];?>&type=quoted');" /> &nbsp;
     <?= get_user_name($order_quoteuser);?></td>
		<td>
        <input type="button" value="Sold" onclick="$('#order_solddate').load('date_ajax.php?value=<?= now();?>&order_id=<?= $_SESSION['order_id'];?>&userid=<?=$_SESSION['userid'];?>&type=completed');" /> &nbsp;
        <?= get_user_name($order_solduser);?></td>
		<td>
        <input type="button" value="Customer Confirmed" onclick="$('#order_confdate').load('date_ajax_1.php?value=<?= now();?>&order_id=<?= $_SESSION['order_id'];?>&type=confirmed');" />&nbsp;
        <?= get_user_name($order_confuser);?></td>

	    <td><input type="button" value="Shipped Confirmed" onclick="$('#order_confship').load('date_ajax_1.php?value=<?= now();?>&order_id=<?= $_SESSION['order_id'];?>&type=shipped');" /></td>
	</tr>
	<tr> 
		<td><input type="text" value="<?= date('m/d/Y',strtotime($order_date));?>" disabled /></td>
		<td><input name="order_quotedate" type="text" <?php if(!empty($order_quotedate)){ ?> value="<?= date('m/d/Y',strtotime($order_quotedate));?>"<?php } ?> 	
        		   id="order_quotedate"></input></td>
		<td><input name="order_solddate" type="text" <?php if(!empty($order_solddate)){ ?> value="<?= date('m/d/Y',strtotime($order_solddate));?>"<?php } ?> 
        		   id="order_solddate"></input></td>
		<td><input name="order_confdate" type="text" <?php if(!empty($order_confdate)){ ?> value="<?= date('m/d/Y',strtotime($order_confdate));?>"<?php } ?> 
        		   id="order_confdate"></input></td>
	    <td><input name="order_confship" type="text" <?php if(!empty($order_confship)){ ?> value="<?= date('m/d/Y',strtotime($order_confship));?>"<?php } ?> 
        		   id="order_confship"></input></td>
	</tr></form>
    <tr>
    	<td></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"></td>
    </tr>
</table>



</div>

    


<div id="large-content">
	<table width="100%" border="0px" cellspacing="2px" cellpadding="0px">
		<tr>
			<td width="50%" bgcolor="#CCCCCC" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="2px">
               


					<tr>
						<td valign="top"><div id="table-header-text">Shipping Info:<br/>
							<?php if (empty($addr_contact)) { ?><?php } else { ?>
								
							<?php } ?>
						</div></td>
						<td valign="top">&nbsp;</td>
					</tr>
					<tr><td colspan="2"><div id="alert-text">
					<?php if (empty($addr_contact)) { ?>
						This appears to be residential.<?php } else { ?>This appears to be non-residential.<?php } ?>
					</div></td></tr>
					<tr>
						<td valign="top">
							<!-- SELECT ADDRESS -->
							<form method="post">
								<select name="addr_id" onchange="this.form.submit()">
								<option value="">Select Address</option>
                                <?php $query = "SELECT cust_id FROM customers"?>
                                <?php $result = mysql_query($query);?>
                                <?php while ($row = mysql_fetch_array($result)){
								
										$cust_id = $row['cust_id']; 
								
								} ?>
                                <option value="<?php echo $addr_id_2 = '608';?>">Pick Up Academy</option>
<?php

$addr_result=get_ship_address($cust_id_fk);
while ($myarray = mysql_fetch_array($addr_result)) {
	$addr_id_2        = $myarray['addr_id'];
	$addr_name_2	  = $myarray['addr_name'];
	$addr_contact_2   = $myarray['addr_contact'];
	$addr_address_2   = $myarray['addr_address'];
	$addr_address2_2  = $myarray['addr_address2'];
	$addr_city_2      = $myarray['addr_city'];
	$addr_state_2     = $myarray['addr_state'];
	$addr_postcode_2  = $myarray['addr_postcode'];
	$addr_phone_2     = $myarray['addr_phone'];
	$addr_phone_wrk_2 = $myarray['addr_phone_wrk'];
	$addr_phone_mob_2 = $myarray['addr_phone_mob'];
	$addr_fax_2       = $myarray['addr_fax'];
	$addr_email_2     = $myarray['addr_email'];
	$addr_creation_2  = $myarray['creation'];
	$addr_modified_2  = $myarray['modified'];
	$addr_mod_by_2    = $myarray['mod_by'];

?>

<option value="<?= $addr_id_2;?>"<?php if ($addr_id_2 == $addr_id_fk) {echo " selected";}?>><?=$addr_name_2;?></option>
<option value="<?= $addr_id_2;?>"><?php if(!empty($addr_contact_2)){echo $addr_contact_2;}?></option>
<option value="<?= $addr_id_2;?>"><?= $addr_address_2;?> <?= $addr_address2_2;?></option> 
<option value="<?= $addr_id_2;?>"><?= $addr_city_2;?>, <?= $addr_state_2;?> <?= $addr_postcode_2;?> </option>
<option value="<?= $addr_id_2;?>"><?=$addr_phone_2;?></option>
<?php if(!empty($addr_fax_2)){ ?><option value="<?= $addr_id_2;?>"><?=$addr_fax_2;?></option><?php }?>
<option value="edit-<?= $addr_id_2;?>">-------EDIT-------</option>
<option>---------------------</option>
<?php } ?>
								</select>
								
						  </form>	<input type="button" value="View Address Book" onclick="navigateToURL('customers.php?action=edit&cust_id=<?= $cust_id_fk;?>')"/>					</td>
                          
					    <td><table border="0" cellspacing="0" cellpadding="0">
                          <?php if (!empty($addr_name)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Company/Name:</div></td>
                            <td>&nbsp;
                                <?= $addr_name;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_contact)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Contact:</div></td>
                            <td>&nbsp;
                                <?= $addr_contact;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_address)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Address:</div></td>
                            <td>&nbsp;
                                <?= $addr_address;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_address2)) { ?>
                          <tr>
                            <td align="right"></td>
                            <td>&nbsp;
                                <?= $addr_address2;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_city) || !empty($addr_state) || !empty($addr_postcode)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">City, State, Zip:</div></td>
                            <td>&nbsp;<?php echo $addr_city." ".$addr_state.", ".$addr_postcode;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_phone)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Main:</div></td>
                            <td>&nbsp;
                                <?= $addr_phone;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_phone_wrk)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Work:</div></td>
                            <td>&nbsp;
                                <?= $addr_phone_wrk;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_phone_mob)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Mobile:</div></td>
                            <td>&nbsp;
                                <?= $addr_phone_mob;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_fax)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Fax:</div></td>
                            <td>&nbsp;
                                <?= $addr_fax;?></td>
                          </tr>
                          <?php }
							if (!empty($addr_email)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Email:</div></td>
                            <td>&nbsp;
                                <?= $addr_email;?></td>
                          </tr>
                          <?php } ?>
                        </table></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
				  </tr>
					<tr><td colspan="2"><hr /></td></tr>
										<tr>
						<td valign="top"><div id="table-header-text">Billing Info: </div></td>
						<td valign="top">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">
							<!-- SELECT ADDRESS -->
							<form method="post">
							  <select name="billaddr_id" onchange="this.form.submit()">
                                <option value="" selected>Select Address</option>
                                <option></option>
                                <?php
									$addr_result=get_bill_address($cust_id_fk);
									while ($myarray = mysql_fetch_array($addr_result)) {
										$addr_id_2        	= $myarray['addr_id'];
										$billaddr_name_2      = $myarray['addr_name'];
										$billaddr_contact_2   = $myarray['addr_contact'];
										$billaddr_address_2   = $myarray['addr_address'];
										$billaddr_address2_2  = $myarray['addr_address2'];
										$billaddr_city_2      = $myarray['addr_city'];
										$billaddr_state_2    = $myarray['addr_state'];
										$billaddr_postcode_2  = $myarray['addr_postcode'];
										$billaddr_phone_2     = $myarray['addr_phone'];
										$billaddr_phone_wrk_2 = $myarray['addr_phone_wrk'];
										$billaddr_phone_mob_2 = $myarray['addr_phone_mob'];
										$billaddr_fax_2       = $myarray['addr_fax'];
										$billaddr_email_2     = $myarray['addr_email'];
										$billaddr_creation_2  = $myarray['creation'];
										$billaddr_modified_2  = $myarray['modified'];
										$billaddr_mod_by_2    = $myarray['mod_by'];	
									?>
							    <option value="<?= $addr_id_2;?>"<?php if ($addr_id_2 == $billaddr_id_fk) {echo "selected";}?>><?= $billaddr_name_2;?></option>
                                <option value="<?= $addr_id_2;?>"><?php if(!empty($billaddr_contact_2)){echo $billaddr_contact_2;}?></option>
                                <option value="<?= $addr_id_2;?>"><?php echo $billaddr_address_2." ".$billaddr_address2_2;?> </option>
                                <option value="<?= $addr_id_2;?>"><?= $billaddr_city_2;?>,<?= $billaddr_state_2;?>  <?= $billaddr_postcode_2;?> </option>
                                <option value="<?= $addr_id_2;?>"><?=$billaddr_phone_2;?> </option>
                                <?php if(!empty($billaddr_fax_2)){?><option value="<?= $addr_id_2;?>"><?=$billaddr_fax_2;?></option><?php }?>
								<option value="edit-<?= $addr_id_2;?>">-------EDIT-------</option>								
                                <option>---------------------</option>
                                <?php }  ?>
                              </select>
								</form>	<input type="button" value="View Address Book" onclick="navigateToURL('customers.php?action=edit&cust_id=<?= $cust_id_fk;?>')" />			</td>
                            
                           
					    <td>
                        	
                        <table border="0" cellspacing="0" cellpadding="0">
					      <?php if (!empty($billaddr_name)) { ?>
				  <tr>
                            <td align="right"><div id="table-header-text">Company/Name:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_name;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_contact)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Contact:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_contact;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_address)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Address:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_address;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_address2)) { ?>
                          <tr>
                            <td align="right"></td>
                            <td>&nbsp;
                                <?= $billaddr_address2;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_city) || !empty($billaddr_state) || !empty($billaddr_postcode)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">City, State, Zip:</div></td>
                            <td>&nbsp;<?php echo $billaddr_city." ".$billaddr_state.", ".$billaddr_postcode;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_phone)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Main:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_phone;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_phone_wrk)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Work:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_phone_wrk;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_phone_mob)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Mobile:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_phone_mob;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_fax)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Fax:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_fax;?></td>
                          </tr>
                          <?php }
							if (!empty($billaddr_email)) { ?>
                          <tr>
                            <td align="right"><div id="table-header-text">Email:</div></td>
                            <td>&nbsp;
                                <?= $billaddr_email;?></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
          					</table>          			</td>
					</tr>
					<tr>
						<td colspan="2"></a></td>
					</tr>

					<!--<tr>
						<td colspan="2"><br />Tracking Number:
						<form method="post" >
						<input type="text" name="tracking_number" value="<?= $tracking_number; ?>" />
						<input type="submit" value="update" />
						</form> 
						</td>
					</tr>-->
				</table>
			</td>
			<td width="50%" bgcolor="#BBBBBB" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="2px">
					<tr>
						<td valign="top"><div id="table-header-text">PAYMENT INFO: </div></td>						
						<td><form method='post'>
					  		<select name="payment_method" onchange="this.form.submit()">
                            	<option value="">Select Payment..</option>
								<option value="cash" <?php if ($payment_method=='cash') {selected();}?>>Cash</option>
								<option value="check" <?php if ($payment_method=='check') {selected();}?>>Check</option>
								<option value="cc" <?php if ($payment_method=='cc') {selected();}?>>Credit Card</option>
								<option value="paypal" <?php if ($payment_method=='paypal') {selected();}?>>PayPal</option>
                                <option value="account" <?php if ($payment_method=='account') {selected();}?>>Account Card</option>
                                
						  	</select>
						  
							<b>Add PO</b>: <input type="checkbox" name="add_po" value="po" onclick="display('posection')" /> 
							</form>
							
                            <!-- check-->
							     <div id=check <?php if ($payment_method=='check') {echo 'class="show"';}else{echo 'class="hide"';};?>>
                                  <?php $check = display_check($order_id);	?>
								   <?php $check_count = mysql_num_rows($check);?>
								   
								   <?php if($check_count < 1){ ?>
								   <?php $add_check = add_check();?>
								   <?php } else { ?>
								   <?php $update_check = update_check($order_id)?>
								   <?php } ?>
								   
							
                                   <form method="post" >
                                   <input type="hidden" name="add_check" value="1" />
                                   <input type="hidden" name="order_id" value="<?=order_id?>"  />
                                   
								   <?php  while ($result = mysql_fetch_array($check)){
								   			$sending = $result['sending'];
											$waiting = $result['waiting'];
											$cleared = $result['cleared'];
											$check_num = $result['check_number'];
											$check_date = $result['check_date'];
											$received_date = $result['received_date'];
											$cleared_date = $result['cleared_date'];}
								   ?>
                                    <table width="95%" cellpadding="1" cellspacing="1" border="1">
                                      <tr>
                                        <td colspan="2"><table width="100%">
                                      <tr>
                                        <td><div id="table-header-text">
                                        	<input type="radio" name="sending" <?php if($sending == '1'){ echo "checked"; }?>>Sending Check</div></td>
                                        <td><div id="table-header-text">
                                        	<input type="radio" name="waiting" <?php if($waiting == '1'){echo "checked"; }?>>Waiting to Clear</div></td>
                                        <td><div id="table-header-text">
                                        	<input type="radio" name="cleared" <?php if($cleared == '1'){echo "checked"; }?>>Check Cleared</div></td>
                                          
                                      </tr>
                                    </table></td>
                                      </tr>
                                      <tr>
                                        <td><div id="table-header-text">Check Number:</div></td>
                                        <td> <input type="text" name="check_number" value="<?=$check_num?>" size="15px"/></td>
                                      </tr>
                                      <tr>
                                        <td><div id="table-header-text">Check Date</div> </td>
                                        <td><input type="text" name="check_date" value="<?=$check_date?>" size="15px"/></td>
                                          
                                      </tr>
                                      <tr>
                                        <td><div id="table-header-text">Received Date</div> </td>
                                        <td><input type="text" name="received_date" value="<?=$received_date?>" size="15px"/> </td>
                                      </tr>
                                      <tr>
                                        <td><div id="table-header-text">Cleared Date: </div></td>
                                        <td><input type="text" name="cleared_date" value="<?=$cleared_date?>" size="15px"/></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="add_check" value="Submit" onclick="this.form.submit()" /></td>
                                      </tr>
                                    </table>
                                     </form>
                                     </div>
   
   

   							<!-- cc-->
							<div id=card_info <?php if ($payment_method=='cc') {echo 'class="show"';}else{echo 'class="hide"';};?> style="background-color:#CCCCCC">
                            
							<form action="orders.php?action=update&amp;cust_id=<?= $cust_id;?>"  method="post" name="edit_billing" id="edit_billing">
                  <input name="billing_id" type="hidden" value="<?= $billing_id;?>"/>
							<table width="347" height="148" border="0" cellpadding="0" cellspacing="2">
                            
  <tr>
									<td align="left"><div id="table-header-text">Card Type:</div></td>
									<td>
                                        
									<select name="billing_cc_type">
                                    <option>Select CC</option>
                                    <option value="visa" <?php if($cc_type =='visa') {selected();}?>>Visa</option>
                                    <option value="mastercard" <?php if($cc_type =='mastercard') {selected();}?>>Mastercard</option>
                                    <option value="discover" <?php if($cc_type =='discover') {selected();}?>>Discover</option>
                                  </select>										                                 </td>
								</tr>
                                <tr>
                                    <td><div id="table-header-text">Name On Card: 
                                    		
                                    </div></td>
                                    <td>
                                    	<input name="name_on_cc" id="name_on_cc" type="text" 
                                               class="large" style="width:175px;" value="<?php echo $name_on_cc ;?>"/></td> 
                                </tr>
                                 <tr>
                                   	<td><div id="table-header-text">
                                   		<input type="checkbox" name="bill_name" id="bill_name"
                                        	   onclick="javascript:name_on_cc.value='<?= $billaddr_name_2; ?>'" value="checkbox" />
                                     Company / Name</div></td>
                                   <td><div id="table-header-text">
                                      <input type="checkbox" name="bill contact" id="bill contact"
                                               onclick="javascript:name_on_cc.value='<?= $billaddr_contact_2; ?>'" value="checkbox" />
                                      Contact </div></td>
                                 </tr>
								<tr>
                                    <td><div id="table-header-text">Card Number:</div></td>
                                    <td><!--<input name="billing_cc_num" type="text" class="large" style="width:175px;"/>-->
                                        <input type="text" name="cc1" maxlength="4" size="3" 
                                        	   onkeyup="autofocus(this, 4, 'cc2', event)"/> -
                                        <input type="text" name="cc2" maxlength="4" size="3" 
                                        	   onkeyup="autofocus(this, 4, 'cc3', event)"/> -
                                        <input type="text" name="cc3" maxlength="4" size="3" 
                                        	   onkeyup="autofocus(this, 4, 'cc4', event)"/> -
                                        <input type="text" name="cc4" maxlength="4" size="3" 
                                        	    onkeyup="autofocus(this, 4, 'billing_cc_month', event)"/>                                   </td>
                                </tr>
                                <tr>
                                <td><div id="table-header-text">Expiration:</div></td>
                                    <td><input name="billing_cc_month" type="text" 
                                    	onKeyUp="autofocus(this, 2, 'billing_cc_year', event)" size="3" maxlength="2"/> -
        								<input type="text" name="billing_cc_year" 
                                        onKeyUp="autofocus(this, 2, 'billing_cc_avs', event)"size="3" maxlength="2"/>                                 </td>
                              </tr>
                                <tr>
                                    <td><div id="table-header-text">CCV:</div></td>
                                    <td><input name="billing_cc_avs" type="text" size="3" maxlength="3"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" value="Update CC Info"/>&nbsp;&nbsp;<input type="submit" value="Process"/></td>
                                </tr>
							</table>
                            </form>
							<!-- SELECT BILLING -->
                           
							<?php if ($order_processed != 1) {?>
                            		<form method="post"><input type="submit" name="process" value="Process"/>
                           	  </form>
							<?php }?>
							<?php if (1) { ?>
                            		<br/><a href="orders.php?action=viewauth">Details</a>
							<?php } ?>
							</div>
                            <!-- Account Card -->
                            <div id=account <?php if ($payment_method=='account') {echo 'class="show"';}else{echo 'class="hide"';};?>>
							<form method="post">
								 <table border="0" cellspacing="2" cellpadding="0" >
                            <?php

								$bill_result=get_billing($cust_id_fk);
								while ($myarray = mysql_fetch_array($bill_result)) {
									$billing_id        = $myarray['billing_id'];
									$cc_type           = $myarray['cc_type'];
									$cc_hash           = $myarray['cc_hash'];
									$cc_avs            = $myarray['cc_avs'];
									$cc_last4          = $myarray['cc_last4'];
									$cc_exp            = $myarray['cc_exp'];
									$bill_creation     = $myarray['creation'];
									$bill_modified     = $myarray['modified'];
									$bill_mod_by       = $myarray['mod_by'];  
                                    $cc_month = substr($cc_exp, 0, 2);
                                    $cc_year = substr($cc_exp, 2);}
                                    
                                    $cc = str_split(key_decrypt($cc_hash, $GLOBALS['__DB_ENC_KEY__']), 4);
                                   ?>
                    <tr>
                      <td><div id="table-header-text">Card Type:</div></td>
                      <td><select name="edit_billing_cc_type">
                          <option value="">Select Type...</option>
                          <option value="Visa"<?php if ($cc_type=="Visa"){selected();}?>>Visa</option>
                          <option value="Mastercard"<?php if ($cc_type=="Mastercard"){selected();}?>>Mastercard</option>
                          <option value="Discovery"<?php if ($cc_type=="Discovery"){selected();}?>>Discovery</option>
                        </select>                      </td>
                    </tr>
                    <tr>
                    	<td><div id="table-header-text">Name:</div></td>
                        <td><input type="text" name="billing_name" class="big" onchange="autofocus(this,'cc1', event)"
                        		value="<?= $billaddr_name;?>" /></td>
                    <tr>
                    <tr>
                      <td><div id="table-header-text">Card Number:</div></td>
                      <td>
                      		<input type="text" name="cc1" maxlength="4" size="3" onkeyup="autofocus(this, 4, 'cc2', event)" 
                            value="<?php if (!empty($cc_avs)){ echo $cc[0];} else echo "" ;?>"  /> -
                            <input type="text" name="cc2" maxlength="4" size="3" onkeyup="autofocus(this, 4, 'cc3', event)" 
                            value="<?= $cc[1];?>"  /> -
                            <input type="text" name="cc3" maxlength="4" size="3" onkeyup="autofocus(this, 4, 'cc4', event)" 
                            value="<?= $cc[2];?>"  /> -
                            <input type="text" name="cc4" maxlength="4" size="3" 
                            onkeyup="autofocus(this, 4, 'edit_billing_cc_month', event)"value="<?= $cc[3];?>" /></td>
                    </tr>
                   
                    <tr>
                      <td><div id="table-header-text">Expiration:</div></td>
                      <td><input name="edit_billing_cc_month" 
                      		type="text" onKeyUp="autofocus(this, 2, 'edit_billing_cc_year', event)" 
                             size="3" maxlength="2" value="<?= $cc_month; ?>"/> -
      
        					<input type="text" name="edit_billing_cc_year" onKeyUp="autofocus(this, 2, 'edit_billing_cc_avs', event)"  
                             size="3" maxlength="2" value="<?= $cc_year; ?>"/></td>
                    </tr>
                     <tr>
                      <td><div id="table-header-text">CCV:</div></td>
                      <td><input name="edit_billing_cc_avs" type="text" maxlength="3" size="3" 
                      	    value="<?= $cc_avs;?>"/></td>
                    </tr>
                    <tr>
                      <td><input type="button" value="Submit" name="submit" /></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
							</form>
                            <?php if ($order_processed != 1) {?>
                            		<form method="post"><input type="submit" name="process" value="Process"/>
                           	  </form>
							<?php }?>
							<?php if (1) { ?>
                            		<br/><a href="orders.php?action=viewauth">Details</a>
							<?php } ?>
                            </div>
                            <!-- po section-->
							<div id = "posection" class="hide">
							<?php $add_po = add_po($order_id);?>
							<form method = 'post' name = 'add_po'>
							<table>
							<tr><td>PO #:</td> <td><input type="text" name="po_number" /></td></tr>
							<tr><td>Date Issued: </td><td><input type="text" name="date_issue" /></td></tr>
							<tr><td>Issued By: </td><td><input type="text" name="issue_by" /></td></tr>
							<tr><td></td><td><input type="submit" name="po_sumbit" value="Submit"/></td></tr>
							</table>
							</form>
							</div>						</td>
					</tr>
					<tr>
						<td><a href="customers.php?action=edit&cust_id=<?= $cust_id_fk;?>">Add / Edit</a></td>
						<td></td>
					</tr>
					<tr><td colspan="2"><hr /></td></tr>


					<tr>
					  <td colspan="2"><div id="order_destination"><b>Order Destination:</b>
                      					<input 	type="button" 
                                        		id="origin_toggle" 
                                            	value="Edit" 
                                            	style ="margin-left:25px;">
                                       </div>
                      	
						<table width="400">
                        	<tr>	
                               <td><strong>Origin:</strong> 
							   <?php if($order_origin != "Drop Ship"){
							   				echo $order_origin; 
									   		if($order_origin == "AFC Acquire"){ echo " - <small>".get_supplier_name($supplier_id)."</small>"; }
									} else { 
											echo get_supplier_name($supplier_id);
											
											
									}?>							   </td>
                               <td><strong>&nbsp;&nbsp;&nbsp;Shipping method:</strong> 
							   <?php if ($order_origin == "Drop Ship"){
							   				echo "Drop Ship";
							   		} elseif ($order_origin == "AFC Acquire"){ 
							   				echo $order_shipby;} 
									else { 
							   				echo $order_shipby;
								}?>							   </td>
                            </tr>
                        </table>
                             							 
						<script>
							$("#origin_toggle").click(function () {
							  $("#order_origin").slideToggle("slow");
							});
						</script>
					
						<?php if(!empty($order_shipby) || !empty($supplier_id)){ ?>
							
							<?php if($order_origin != "AFC Acquire"){ ?>
							<div id="order_origin">
							<?php } ?>

						<?php } ?>
						
						
							<table>
                            	<tr>
                                	<td width="121">
									<div id="buttons">
									 <form method="post" onClick="this.submit();">
                                    	<input 	type="radio" 
                                        		name="order_origin" 
                                            	value="AFC Stock" <?php if($order_origin =='AFC Stock'){?> checked <?php } ?>/>AFC Stock<br />
                                    	<input 	type="radio" 
                                        		name="order_origin" 
                                            	value="AFC Make" <?php if($order_origin =='AFC Make'){?> checked <?php } ?>  />AFC Make<br />
                                        <input 	type="radio" 
                                        		name="order_origin" 
                                            	value="AFC Acquire" <?php if($order_origin =='AFC Acquire'){?> checked <?php } ?> />AFC Acquire<br />
                                        <input 	type="radio" 
                                        		name="order_origin" 
                                            	value="Drop Ship" <?php if($order_origin =='Drop Ship'){?> checked <?php } ?>  />Drop Ship
									</form>										
									</div>									</td>
                                   <td width="121">	   
									<?php if($order_origin =='AFC Stock' || $order_origin =='AFC Make' || $order_origin =='AFC Acquire'){ ?>
									<form method="post" onClick="this.submit();">                                   											    
										<input 	type="radio" 
                                        		name="order_shipby" 
                                            	value="Small Package" <?php if($order_shipby =='Small Package'){?> checked <?php } ?>/>Small Package<br />
                                    	<input 	type="radio" 
                                        		name="order_shipby" 
                                            	value="Freight" <?php if($order_shipby =='Freight'){?> checked <?php } ?>  />Freight<br />
                                        <input 	type="radio" 
                                        		name="order_shipby" 	
                                        		value="AFC Delivery" <?php if($order_shipby =='AFC Delivery'){?> checked <?php } ?> />Delivery AFC<br />
                                        <input 	type="radio" 
                                        		name="order_shipby" 
                                            	value="Pickup AFC" <?php if($order_shipby =='Pickup AFC'){?> checked <?php } ?>  />Pickup AFC
									</form>
									<?php } ?>
								  
									<?php if($order_origin =='AFC Acquire' || $order_origin =='Drop Ship'){ ?>
									<table border="0" cellspacing="0" cellpadding="3">
										  <tr>
											 <td valign="top">
											  <div id="suppliers" >
												<form method="post" onChange="this.submit();">
												<select name="supplier_id" onchange="this.form.submit()">
												<option value ="">Choose supplier...</option>                                
												 <?php $xysuppliers = call_suppliers(); ?>
												 <?php while($suppliers = mysql_fetch_array($xysuppliers)){
														$supplier_name = $suppliers['supplier_name'];     
														$supplier_id_called = $suppliers['supplier_id'];
														if($supplier_id == $supplier_id_called){
															echo "<option value=\"".$supplier_id_called."\" selected >".$supplier_name."</option>";}
														if($supplier_id != $supplier_id_called){
															echo "<option value=\"".$supplier_id_called."\" >".$supplier_name."</option>";}
														}?>
												</select>
												</form>
											   </div>												</td>
								      </tr>
									</table>
									<?php } ?>								  </td> 
                                </tr>
                            </table>
														
											<?php if(!empty($order_shipby) || !empty($supplier_id)){ ?>
                                                
                                            <?php if($order_origin != "AFC Acquire"){ ?>
                        </div>
                                            <?php } ?>
                                                
                                            <?php } ?>						</td>
                    </tr>
					<tr><td colspan="2">
					<hr />
                    <div id="table-header-text">Correspondence</div>
        				<table width="100%">
                                  <tr>
                                    <td><div id="table-header-text">Customer:</div></td>
                                    <td><div id="table-header-text">Supplier:</div></td>
                                  </tr>
                                  <tr>
                                    <td><form action="orderslip.php" method="get" target="_self">
                                      <input type="hidden" name="order_number" value="<?= $order_id;?>"/>
                                      <select name="type" onchange="this.form.submit()" style="width:175px">
                                        <option value="">Print...</option>
                                        <option value="Order Sheet">Order Sheet</option>
                                        <option value="Quote Sheet">Quote Sheet</option>
                                        <option value="Invoice">Invoice</option>
                                        <option value="Packing Slip">Packing Slip</option>
                                        <option value="Shop Slip">Shop Slip</option>
                                      </select>
                                    </form></td>
                                    <td><form action="supplierorder.php?" method="get"  target="_parent">
                                      <input type="hidden" name="order_number" value="<?=$order_id;?>" />
                                      <input type="hidden" name="type" value="fax_printed" />
                                      <select name="supplier_id" onchange="this.form.submit()" style="width:175px">
                                        <option>Print Fax Order</option>
                                        <?php $xysuppliers = get_suppliers_orders();?>
                                        <?php while($suppliers = mysql_fetch_array($xysuppliers)){
												$supplier_name = $suppliers['supplier_name'];
												$supplier_id_scratch = $suppliers['supplier_id'];
													echo "<option value=\"".$supplier_id_scratch."\">".$supplier_name."</option>";
											}?>
                                      </select>
                                    </form></td>
                                  </tr>
                                  <tr>
                                    <td><form method="post" action="customer_email.php?order_id=<?=$order_id;?>"  target="_parent">
                                    	<input type="hidden" name="supplier_id" value="<?php $_GET['supplier_id'];?>" />
                                      <select name="email_type" onchange="this.form.submit()" style="width:175px" >
                                        <option value="">Email...</option>
                                        <option value ="confirmation">Order Confirmation</option>
                                        <option value ="quote">Quote </option>
                                        <option value ="shipping">Tracking Number</option>
                                        <option value ="invoice">Invoice</option>
                                        <option value="general">General Email</option>
                                      </select>
                                      <!---<input type="submit" name="send_customer_email" value="Send Customer Email" /> -->
                                    </form></td> 
									
                                    <td><form action="supplierorder.php?" method="get"  target="_parent">
                                    	<input type="hidden" name="order_number" value="<?=$order_id;?>" />
                                      	<input type="hidden" name="type" value="ship_quote" />
                                        <select name="supplier_id" onchange="this.form.submit()" style="width:175px">
                                        <option>Print Ship Request</option>
                                        <?php $xysuppliers = get_suppliers_orders();?>
                                        <?php while($suppliers = mysql_fetch_array($xysuppliers)){
												$supplier_name = $suppliers['supplier_name'];
												$supplier_id_scratch = $suppliers['supplier_id'];
													echo "<option value=\"".$supplier_id_scratch."\">".$supplier_name."</option>";
											}?>
                                      </select>
                                    </form></td>
                      </tr>
                                  <tr>
                                    <td>&nbsp;</td><!--Supplier Email -->
                                    <td>
									<form method="post" action="supplier_email.php?order_id=<?=$order_id?>&supplier_id=<?= $supplier_id;?>" target="_parent">
                                      	<input type="hidden" name="supplier_id" value=""  />
                                        <select name="email_type" onchange="this.form.submit()" style="width:175px">
                                        <option>Email Supplier</option>
                                        <option value="order">Order - Web Purchase</option>
                                        <option value="shipping">Cost/Shipping Request</option>
                                        <option value="tracking">Tracking Inquiry</option>
                                        <option value="general">General Email</option>
                                      </select>
                                    </form></td>
                                  </tr>
                      </table>
                    <hr />
                    <table width="95%" align="center">
                    	<tr>
                        	<td align="right"><form method="post" action="complete.php?order_solddate=<?= $order_solddate?>">
                            	<input type="submit" name="order_processed" id="order_processed" value="Save and Finish"/> 
                                 
                            </form>
                          </td>
                            				
                                           
                        </tr>
                    </table>
					</td></tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="title-header"><div id="title-text">Order Detail - Items</div></div>



<!-- <form method="post">
<select name="copy" onchange="this.form.submit()">
<option value="">Copy To...</option>
<option value="order">New Order</option>
<option value="quote">Quote</option>
</select>
</form>
<input type="submit" name = "mop" value ="order" action ="this.form.submit()">
</form><p>
<a href = "orders.php?action=edit&order_id=<?= $order_id; ?>">duplicate order</a></div>

if ($_POST['copy'] == 'order') {
	$newid=copy_order($order_id);
	$_SESSION['order_id'] = $newid;
} else if ($_POST['copy'] == 'quote') {
	$newid=quote_order($order_id);
	$_SESSION['order_id'] = $newid;
}
 -->


<div id="large-content">
	<div id="orderitems" style="display:none"></div>
</div>

<script>
showitems('<?= $order_id;?>','','','');
$("#orderitems").delay(400).fadeIn();
</script>

<?php if ($_REQUEST['debug'] != "") { ?>
<div id="title-header"><div id="title-text">Summary</div></div>

<div id="large-content">
<table border="0" cellspacing="0" cellpadding="0">
<tr><td>Ordernum</td><td><?= $ordernum;?></td></tr>
<tr><td>Customer</td><td><?= $cust_name;?></td></tr>
<tr><td>Address ID</td><td><?= $addr_id_fk;?></td></tr>
<tr><td>Billing ID</td><td><?= $billing_id_fk;?></td></tr>
<tr><td>Payment Method</td><td><?= $payment_method;?></td></tr>
<tr><td>Payment Reference</td><td><?= $payment_refno;?></td></tr>
<tr><td>Weight</td><td><?= $order_weight;?></td></tr>
<tr><td>Sub Total</td><td><?= $order_subtot;?></td></tr>
<tr><td>Shipping Cost</td><td><?= $order_shipcost;?></td></tr>
<tr><td>Shipping Price</td><td><?= $order_ship;?></td></tr>
<tr><td>Tax</td><td><?= $order_tax;?></td></tr>
<tr><td>Total</td><td><?= $order_tot;?></td></tr>
<tr><td>Ship Type</td><td><?= $order_shiptype;?></td></tr>
<tr><td>Tracking #</td><td><?= $order_trackno;?></td></tr>
<tr><td>Status</td><td><?= $order_status;?></td></tr>
<tr><td>Type</td><td><?= $order_type;?></td></tr>
<tr><td>Processed</td><td><?php if ($order_processed == 1) {echo "Yes";} else {echo "No";}?></td></tr>
<tr><td>Notes</td><td><?= $order_notes;?></td></tr>
<tr><td>Date</td><td><?= $order_date;?></td></tr>
<tr><td>Modified</td><td><?= $order_mod;?></td></tr>
<tr><td>Modified by</td><td><?= $order_mod_by;?></td></tr>
</table>
</div>
<?php } ?>


<?php

$note_ar = mysql_fetch_array(get_note($order_id));

?>

<div id="note-backdrop">
	<div id="note-table">
		<form method="post">
			<table border="0" cellspacing="0" cellpadding="0" width="750px" height="33px">
				<tr>
					<td align="left">Add Custom Order Action Note
                    	<input 	type="hidden" 
                        		name="note_id" 
                                value="<?= $note_ar['note_id'];?>"/>
                        <input 	type="text" 
                        		name="note_text" 
                                size="50px" 
                                value="<?= $note_ar['note_text']?>"/>
                 Enable:<input 	type="checkbox" 
                 				name="note_enabled" <?php if ($note_ar['note_enabled'] == 1) {echo 'checked';}?>/></td>
					<td align="right">
                    	<input 	type="submit" 
                        		value="Add / Edit" />
                    </td>
				</tr>
			</table>
		</form>
	</div>	
</div>

<div id="activity-backdrop">
	
	<?php $order_activity = get_order_activity();?>
	<table border="0" cellspacing="0" cellpadding="0" width="750px" height="33px">
	<tr><td>		
		Order Activity:
	</td></tr>
	<?php $inc = 1;
		while($activity = mysql_fetch_array($order_activity)){
			$user_id = $activity['user_id'];
			$order_action = $activity['order_action'];
			$action_date = $activity['action_date'];
	?>
	<tr><td>		
	<?= $inc;?>.) <?= $order_action;?> <?php if(!empty($user_id)){echo "by". get_user_name($user_id);} else echo ""; ?> on <?= date('m/d/Y H:i',strtotime($action_date));?>
	</td></tr>
	<?php $inc++;?>	
	<?php } ?>
	</table>

</div>

<br style="clear:both;" />
<div id=""> 
<table width="85%"><tr><td><table width="100%" border="0" cellspacing="0" cellpadding="1" align="left">
		<tr>
		  <th>Order Id</th>
		  <th>Call Date</th>
		  <th>Sold Date</th>
          <th>1st Item Description</th>
		  <th>Total</th>
		  <th>Sub Total</th>
		  <th>Shipping Portion</th>
		  <th>Status</th>
			</tr>
		<tr>
			<td colspan="10"><hr /></td>
		</tr>
        <?php
			$xyquery = "SELECT * FROM order_items WHERE order_id_fk='$order_id'LIMIT 1";
			$xyresult = mysql_query($xyquery) or die (mysql_error);
			?>
			
		<?php
        
			while ($row = mysql_fetch_array($xyresult)) {
				list($product_name) = get_product_as_item_display($row['product_id_fk']);
        ?>
		
		<?php 
		$cust_id	= $cust_id_fk;
		$get_orders = call_orders3();
		$inc = 1;
		while ($order = mysql_fetch_array($get_orders)){
		
			$order_id = $order['order_id'];
			$order_date = $order['order_date'];
			$order_sold_date = $order['order_solddate'];
			$order_total = $order['order_tot'];
			$order_ship = $order['order_shipcost'];
			$cust_id_fk = $order['cust_id_fk'];
			$status = $order['order_status'];
			$sub_total = $order['order_subtot'];
			if ($status =="quoted"){$pic = '<img src="images/Q.jpg" width="10" height="10" border="1" alt="'.$quote_date.'" title="'.$quote_date.'"/>';} 
			if ($status =="completed"){$pic = '<img src="images/s.jpg" width="10" height="10" border="1" alt="'.$sold_date.'" title="'.$sold_date.'"/>';}
			if($cust_id == $cust_id_fk) {
			
		?>
			
            <tr <?php
				if($inc % 2 == 1){echo 'bgcolor="#DFFFDF"';}
				else {echo 'bgcolor="#CFDFCF"';}
				?>>
              <td><a href="orders.php?action=edit&amp;order_id=<?= $order_id;?>">
                <?= $order_id;?>
              </a></td>
              <td><?= date('m/d/Y',strtotime($order_date));?></td>
              <td><?php if(!empty($order_sold_date)) echo date('m/d/Y',strtotime($order_sold_date)); else echo "";?></td>
              <td><?=$product_name?></td>
              <td>$<?= $order_total;?></td>
                  
              <td>$<?= $sub_total;?></td>
                  
              <td>$<?= $order_ship;?></td>
                  
              <td><table>
                <tr>
                  <td width="18"><?php 	if($status =="quoted"){ 
								echo $pic;} 
							else if ($status =="completed"){ 
								echo $pic;} 
							else echo "<img src=\"images/un_Q.jpg\" width=\"10\" height=\"10\" border=\"1\" />"; ?></td>
                  <td width="18"><?php 	if(!empty($confirmed)) 
								echo "<img src=\"images/cc.jpg\" width=\"10\" height=\"10\" border=\"1\"/>"; 
							else echo "<img src=\"images/un_cc.jpg\" width=\"10\" height=\"10\" border=\"1\"/>";?></td>
                  <td width="18"><?php 	if(!empty($shipped)) 
								echo "<img src=\"images/SC.jpg\" width=\"10\" height=\"10\" border=\"1\" />"; 
							else echo "<img src=\"images/un_sc.jpg\" width=\"10\" height=\"10\" border=\"1\" />";?></td>
                </tr>
              </table></td>
				</tr>
            
		<?php 
			$inc++;
			}
		}
		}
		?>
      
	</table>
    </td>
    </tr>
    </table>
  
    </div>
</td>
<td valign="top"><?php include("items.php");?></td>
</tr></table>