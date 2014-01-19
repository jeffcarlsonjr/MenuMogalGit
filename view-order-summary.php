<div id="title-header"><div id="title-text">Activity Search and Filter</div></div>
<div id="large-content">
	<form method="post">
	<table width="736" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td width="508">
				<input name="search_key" type="text" class="large" <?php if (!empty($_POST['search_key'])) {echo "value='".$_POST['search_key']."'";}?>/>&nbsp; <input type="submit" name="Submit" value="Search Orders" /><br />
				<i>by customer name or order id</i><br />
			</td>
			<td width="252">
				<table width="218" border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td><div id="small-text">Status: </div></td>
						<td>
							<select name="status" onchange="submit()">
								<option value="" <?php if ($_POST['status'] == '') { echo 'selected'; }?>>All Orders</option>
								<option value="new" <?php if ($_POST['status'] == 'new') { echo 'selected'; }?>>New Orders</option>
								<option value="quoted" <?php if ($_POST['status'] == 'quoted') { echo 'selected'; }?>>Quoted Orders</option>
								<option value="processing" <?php if ($_POST['status'] == 'processing') { echo 'selected'; }?>>Processing Orders</option>
								<option value="completed" <?php if ($_POST['status'] == 'completed') { echo 'selected'; }?>>Complete Orders</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><div id="small-text">Time Range: </div></td>
						<td>
							<select name="daterange" onchange="submit()">
								<option value="0" <?php if ($_POST['daterange'] == '0') { echo 'selected'; }?>>Today</option>
								<option value="3" <?php if ($_POST['daterange'] == '3') { echo 'selected'; }?>>Last 3 days</option>
								<option value="7" <?php if ($_POST['daterange'] == '7') { echo 'selected'; }?>>Last 7 days</option>
								<option value="30" <?php if ($_POST['daterange'] == '30') { echo 'selected'; }?>>Last 30 days</option>
								<option value="60" <?php if ($_POST['daterange'] == '60') { echo 'selected'; }?>>Last 60 days</option>
								<option value="180" <?php if ($_POST['daterange'] == '180') { echo 'selected'; }?>>Last 180 days</option>
								<option value="65535" <?php if ($_POST['daterange'] == '65535') { echo 'selected'; }?>>All</option>
							</select>
						</td>
					</tr>
                    
				</table>
			</td>
		</tr>
	</table>
	</form>
</div>

<div id="large-content" style="margin-top:3px;">
<table  border="0" cellpadding="2" cellspacing="0">
    <tr>
      <td >
	  <form method="post" action"view-order-summary.php">
			<input type="hidden" name="daterange" value="<?= $_POST['daterange'] + 1; ?>" />
			<input type="submit" name="singleRange" value="<< " style="float:left;" >
    	</form></td>
	  <td>&nbsp;
      <b> Today's Activity For: 
	  <?php 
		if($_POST['daterange'] != 0){
		$date = date("l m/d/Y");// current date
		$adjust = "-".$_POST['daterange']." day";
		$date = date("l m/d/Y",strtotime(date("l m/d/Y", strtotime($date)) . $adjust));	  
		echo $date;   
		} else {
		echo date("l m/d/Y");
		}
		?> 
      </b>
                
      </td>
  <?php if($_POST['daterange'] > 0){?>
		<td width="31%"><form method="post" action"view-order-summary.php">
			<input type="hidden" name="daterange" value="<?= $_POST['daterange'] - 1; ?>" />
			<input type="submit" name="singleRange" value=" >>" style="margin-left:5px;">
    	</form>	</td>
	  <?php } ?>				
      <td></td>
    </tr>
</table>
</div>

<?php
connect();

//::JK -- Note code
$get_notes = call_notes();
while($note = mysql_fetch_array($get_notes)) {
	$note_id = $note['note_id'];
	$order_id_fk = $note['order_id_fk'];
	$note_text = $note['note_text'];
	$note_enabled = $note['note_enabled'];
	$note_date = $note['note_date'];
	$note_moddate = $note['note_mod_date'];
	$note_modby = $note['note_mod_by'];
	$note_username = get_user_name($note_modby);

	$get_order_info = get_order($order_id_fk);
	$order = mysql_fetch_array($get_order_info);
	$cust_id_fk = $order['cust_id_fk'];
	$cust_name = get_cust_name($cust_id_fk);
	$state = $order['order_state'];
?>

<a href="orders.php?action=edit&order_id=<?= $order_id_fk;?>">
<div id="note-backdrop"><div id="note-text">
<b><?= $cust_name;?></b> - <?= $state;?> [<?= $note_date;?> by <?= $note_username;?>] - <?= $note_text;?>
</div></div>
</a>

<?php

}


$range_start = clean_input($_GET['range_start']);
$range_end = clean_input($_GET['range_end']);
$posted_status = clean_input($_POST['status']);
$search = clean_input($_POST['search_key']);
$search1 = clean_input($_POST['search_key']);
$search_type = clean_input($_POST['options']);
$daterange = clean_input($_POST['daterange']);
$past = time()-($daterange*86400);

if (!empty($daterange)) {
	$range_start = date(Y,$past)."-".date(m,$past)."-".date(d,$past);
}

if (empty($range_start)) {
	$range_start = date(Y)."-".date(m)."-".date(d);
	$range_end='';
}

if(isset($_POST['singleRange'])){
	$daterange = "- ".$daterange." day";
	$range_start_date = date('Y-m-d h:i:s', time());
	$range_start = date ( 'Y-m-d' , strtotime ( $daterange , strtotime ( $range_start_date ) ) )." 00:00:00";
	$range_end = date ( 'Y-m-d' , strtotime ( $daterange , strtotime ( $range_start_date ) ) );
	//echo $range_start."<br />";
	//echo $range_end."<br />";	
}

// Check for 'All' value from view option and empty variables
if ($daterange == 65535) {$range_start = ''; $range_end = '';}

//$get_orders1 = call_orders_day($reqDay,$status,$search);

$get_orders = call_orders($range_start,$range_end,$posted_status,$search,$search_type,$search1);

while($order = mysql_fetch_array($get_orders)) {
	$order_id = $order['order_id'];
	$addr_id_fk = $order['addr_id_fk'];
	$cust_id_fk = $order['cust_id_fk'];
	$payment_method = $order['payment_method'];
	$cust_name = get_cust_name($cust_id_fk);
	$contact = $order['order_contact'];
	$state = $order['order_state'];
	$status = $order['order_status'];
	$confirmed = $order['order_confdate'];
	$shipped = $order['order_confship'];
	$shiptype = $order['order_shiptype'];
	$total = $order['order_tot'];
	$notes = $order['order_notes'];
	$processed = $order['order_processed'];
	$date = $order['order_date'];
	$moddate = $order['order_mod'];
	$modby = $order['order_mod_by'];
	$quote_date = $order['order_quotedate'];
	$sold_date = $order['order_solddate'];
	$calluser = $order['order_calluser'];
 	$quoteuser = $order['order_quoteuser'];
	$solduser = $order['order_solduser'];
	$order_origin = $order['order_origin'];
	$order_shipby = $order['order_shipby'];
	$supplier_id = $order['order_supplier_id'];
	$get_addr = get_one_address($addr_id_fk);
	$addrinfo = mysql_fetch_array($get_addr);
	$state = $addrinfo['addr_state'];

if ($status =="new"){$id = "title-header-blue";}
if ($status =="processing"){$id = "title-header-red";}
if ($status =="quoted"){$id = "title-header-orange";}
if ($status =="completed"){$id = "title-header-grey";}



if ($payment_method == "cc"){$paytype = 'Card';}
if ($payment_method == "cash"){$paytype = 'Cash';}
if ($payment_method == "check"){$paytype = 'Check';}
if ($payment_method == "paypal"){$paytype = 'Paypal';}
if ($payment_method == ""){$paytype = '???';}


if ($status =="processing"){$id = "title-header-red";}
if ($status =="quoted"){$pic = '<img src="images/Q.jpg" width="15" height="15" border="1" alt="'.$quote_date.'" title="'.$quote_date.'"/>';} 
if ($status =="completed"){$pic = '<img src="images/s.jpg" width="15" height="15" border="1" alt="'.$sold_date.'" title="'.$sold_date.'"/>';}


?>
<div id="<?= $id;?>"><div id="title-display">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="60"><a href="orders.php?action=edit&order_id=<?= $order_id;?>"> #<?= $order_id;?></a></td>
		
        <td width="160"><a href="customers.php?action=edit&cust_id=<?= $cust_id_fk?>" title="#<?= $cust_id_fk?>"><?= $cust_name;?></a> 
        				 (<?=order_number_count($cust_id_fk);?>)</td>
        
        <td width="280"><?php 
		if ($status == "completed"){ 
		if (!empty($order_origin) || ($order_shipby)) { 
			echo "(".$order_origin.", " .$order_shipby. "" .get_supplier_name($supplier_id).")"; 
		} else { 
			$no_origin = "order not designated";

			echo "(<font color='red'>" . $no_origin . "</font>" .get_supplier_name($supplier_id).")";
		}
		}
		
		
		 ?></td>
		
        <td width="59"><?= $state;?></td>
		
        <td width="75"><?php if($status =="new") echo date('m/d/Y',strtotime($date)); 
							 if($status =="processing") 
								echo date('m/d/Y',strtotime($date)); 
							 if($status =="quoted") 
								echo date('m/d/Y',strtotime($quote_date)); 
							 if($status =="completed") 
							 	echo date('m/d/Y',strtotime($sold_date)); ?></td>
                                
		<td width="100">Total: $ <?= number_format($total,2);?></td>
        
        <td width="18"><?php if($status =="quoted"){ echo $pic;} 
							 else if ($status =="completed"){ echo $pic;} 
							 else echo "<img src=\"images/un_Q.jpg\" width=\"15px\" height=\"15px\" border=\"1\" />"; ?></td>
        
        <td width="18"><?php if(!empty($confirmed)) echo "<img src=\"images/cc.jpg\" width=\"15\" height=\"15\" border=\"1\"/>"; 
							 else echo "<img src=\"images/un_cc.jpg\" width=\"15\" height=\"15\" border=\"1\"/>";?></td>
        
        <td width="18"><?php if(!empty($shipped)) echo "<img src=\"images/SC.jpg\" width=\"15\" height=\"15\" border=\"1\" />"; 
							 else echo "<img src=\"images/un_sc.jpg\" width=\"15\" height=\"15\" border=\"1\" />"?></td>
  		
        <td width="40">&nbsp;<?php if ($status == "quoted") echo get_user_name($quoteuser); 
								   else if ($status == "completed") echo get_user_name($solduser);?></td>
		
        <td width="32" ><a href="javascript:display('details-<?= $order_id;?>')">
        				<img id="image-details-<?= $order_id;?>" src="images/show.png" border="0px"/></a></td>
	</tr>
</table>
</div></div>
<div id="large-display-content">

 <table cellpadding="2" cellspacing="5">
<?php
$xyquery = "SELECT * FROM order_items WHERE order_id_fk='$order_id'LIMIT 1";
$xyresult = mysql_query($xyquery) or die (mysql_error);
?>

<?php

while ($row = mysql_fetch_array($xyresult)) {
	list($product_name,$color,$price,$weight_lbs,$size,$display_size_2 ) = get_product_as_item_display($row['product_id_fk']);
?>
<tr height="12px">
		
		<td><div id="title-text"><?= $row['item_quantity'];?></div></td>
		<td><div id="title-text"><?= $product_name;?></div></td>
	    <td><div id="title-text"><?= $size;?></div></td>
	    <td><div id="title-text"><?= $display_size_2;?></div></td>
	    <td><div id="title-text"><?= $color;?></div></td>
        <td><div id="title-text"><?= number_format($weight_lbs);?> lbs</div></td>
	    <td><div id="title-text">$<?= $price;?></div></td>
	 
		
	</tr>

<?php  }?>

</table>
</div>

<div class="hide" id="details-<?= $order_id;?>">
	<div id="large-content-white">
		<table width="100%" border="0" cellspacing="0" cellpadding="1px">
			<tr>
				<td valign="top">
					Order created on <?= date('m/d/Y',strtotime($date));?>.<br />
					Order modified on <?= date('m/d/Y',strtotime($moddate));?> by <?php echo get_user_name($modby);?>.
				</td>
				<td valign="top">
					Ship type: <?= $shiptype;?><br />
				</td>
			</tr>
		</table>
		<hr />
<?php

$xyquery = "SELECT * FROM order_items WHERE order_id_fk='$order_id' and enabled=1";
$xyresult = mysql_query($xyquery) or die (mysql_error);

$i = 1;
$sub_tot=0.00;
$weight=0.00;

?>

<table>
	<tr>
		<th>#</th>
		<th>Quantity</th>
		<th>Item #</th>
		<th>Description</th>
		<th>Size</th>
		<th>Unit Price</th>
		<th>Price</th>
		<th></th>
	</tr>

<?php
$i=1;
while ($row = mysql_fetch_array($xyresult)) {
	list($product_name,$item_no,$price,$length,$width,$height,$weight,$size) = get_product_as_item($row['product_id_fk']);
	if (!empty($row['item_price'])) {$price = $row['item_price'];}

?>
	<tr>
		<td><?= $i;?></td>
		<td><?= $row['item_quantity']?></td>
		<td><?= $item_no?></td>
		<td><?= $product_name?></td>
		<td><?php echo $size;?></td>
		<td><?= number_format($price,2,'.','');?></td>
		<td>$<?php $item_tot = $price*$row['item_quantity']; echo number_format($item_tot,2); $sub_tot=$sub_tot+$item_tot;?></td>
		<td>&nbsp;</td>
	</tr>

<?php  } ?>

</table>

		<hr />
		<u>Notes</u>:<br />
		<?= $notes;?>
	</div>

</div>
<?php } ?>

<div id="status"><img src="images/status.png" /></div>
