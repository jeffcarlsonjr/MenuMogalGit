<?php

//===========================================================================================================================
// ORDER FUNCTIONS
//===========================================================================================================================

//::JK -- Returns all orders ordered by date.

function call_orders($range_start,$range_end,$status,$search,$search1) {

	$where_clause = "";

	if (!empty($range_start) && !empty($range_end)) {
		$where_clause = "WHERE order_mod >= '$range_start' AND order_mod <= '$range_end 23:59:59'";
	}
	if (!empty($range_start) && empty($range_end)) {
		$where_clause = "WHERE order_mod >= '$range_start'";
	}
	if (!empty($status) && !empty($where_clause)) {
		$where_clause .= "AND order_status = '$status'";
	}
	if (!empty($status) && empty($where_clause)) {
		$where_clause = "WHERE order_status = '$status'";
	}
	if (!empty($search) && !empty($where_clause)) {
		$where_clause .= "AND (customers.name LIKE '%$search%' OR order_id LIKE '%$search%' OR customers.contact LIKE '%$search%' OR customers.postcode LIKE '%$search%')";
	}
	if (!empty($search) && empty($where_clause)) {
		$where_clause = "WHERE (customers.name LIKE '%$search%' OR order_id LIKE '%$search%' OR customers.contact LIKE '%$search%' OR customers.postcode LIKE '%$search%')";
	}
		
	$xyquery = "SELECT * FROM orders INNER JOIN customers ON orders.cust_id_fk=customers.cust_id $where_clause ORDER BY order_status,order_date DESC";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}
//===========================================================================================================================

function call_orders_day($reqDay,$status,$search) {

$endDay = $reqDay +1;

	
$datequery = "SELECT * FROM orders INNER JOIN customers ON orders.cust_id_fk=customers.cust_id WHERE order_date >= DATE_ADD( CURDATE(), INTERVAL '" . $reqDay . "' DAY) AND order_date < DATE_ADD( CURDATE(), INTERVAL '" . $endDay . "' DAY) ORDER BY order_status,order_date DESC";
	$xyresult = mysql_query($datequery) or die(mysql_error());
	return $dayresult;
}
//===========================================================================================================================


//::JC -- Returns all orders ordered by date.

function call_orders2($search) {

	
	$xyquery = "SELECT * FROM orders INNER JOIN customers ON orders.cust_id_fk=customers.cust_id ORDER BY order_status,order_date DESC";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JC -- Returns all orders ordered by date.

function call_orders3() {


	
	$xyquery = "SELECT * FROM orders INNER JOIN customers ON orders.cust_id_fk=customers.cust_id ORDER BY order_status,order_date DESC";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Returns all information related to a specified order.

function get_order($order_id) {
	$xyquery = "SELECT * FROM orders WHERE order_id = '$order_id'";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Create a blank order in the DB for a specified customer.

function add_order($cust_id) {
	if(!empty($cust_id)){
		$xyquery = "SELECT primary_billing_fk,primary_billaddr_fk,primary_addr_fk FROM customers WHERE cust_id='$cust_id'";
		$xyresult = mysql_query($xyquery) or die(mysql_error());
		list ($primary_billing_fk,$primary_billaddr_fk,$primary_addr_fk) = mysql_fetch_row($xyresult);

		$userid=$_SESSION['userid'];

		$xyquery = "INSERT INTO orders
					(cust_id_fk,billing_id_fk,billaddr_id_fk,order_date,order_mod,order_mod_by,order_calluser)
					VALUES
					('$cust_id','$primary_billing_fk','$primary_billaddr_fk',NOW(),NOW(),'$userid','$userid')";
		$xyresult = mysql_query($xyquery) or die(mysql_error());
		$new_order_id = mysql_insert_id();
		
		// JC this section was added in order to insert who and when the order was started to display in the order action section.
		$jcquery = "INSERT INTO order_actions
					(order_id_fk,user_id,order_action,action_date)
					VALUES
					('$new_order_id', '$userid', 'Order Started:', NOW())";
		$jcresult = mysql_query($jcquery) or die(mysql_error());

		//echo "<br /><center>A new order, #".$new_order_id.", has been created.</center>";
?>
<script>
$(document).ready(function() {
	$("<p>NOTICE:</p><p>A new order, #<?= $new_order_id;?>, has been created.</p>").appendTo("#xyalert");
	$("#xyalert").fadeIn(200).delay(1500).fadeOut(200);
});
</script>
<?

		return $new_order_id;
	}
}

//===========================================================================================================================

//::JK -- Update an order in the DB.

function update_order($order_id) {
	$user_id = $_SESSION['userid'];
	if(!empty($order_id)){
		$addr_id_fk = clean_input($_POST['addr_id']);
		$edit_address = explode("-",$addr_id_fk);
		
		$billaddr_id_fk = clean_input($_POST['billaddr_id']);
		$edit_billing_address = explode("-",$_POST['billaddr_id']);
			
		$billing_id_fk = clean_input($_POST['billing_id']);
		$payment_method = clean_input($_POST['payment_method']);
		$payment_refno = clean_input($_POST['payment_refno']);
		$order_contact = clean_input($_POST['order_contact']);
		$order_address = clean_input($_POST['order_address']);
		$order_address2 = clean_input($_POST['order_address2']);
		$order_city = clean_input($_POST['order_city']);
		$order_state = clean_input($_POST['order_state']);
		$order_postcode = clean_input($_POST['order_postcode']);
		$order_weight = clean_input($_POST['order_weight']);
		$order_subtot = clean_input($_POST['order_subtot']);
		$order_shipcost = clean_input($_REQUEST['order_shipcost']);
		if (isset($_POST['order_custom_shipmarkup'])) {
			$order_custom_shipmarkup = clean_input($_POST['order_custom_shipmarkup']);
		}
		if (isset($_POST['order_discount'])) {
			$order_discount = clean_input($_POST['order_discount']);
		}
		$order_ship = clean_input($_REQUEST['order_ship']);
		$order_tax = clean_input($_POST['order_tax']);
		$order_total = clean_input($_POST['order_total']);
		$order_shipby = clean_input($_POST['order_shipby']);
		$order_shiptype = clean_input($_REQUEST['order_shiptype']);
		$order_trackno = clean_input($_POST['order_trackno']);
		$order_status = clean_input($_POST['order_status']);
		$order_notes = clean_input($_POST['order_notes']);
		$order_calldate = clean_input($_POST['order_calldate']);
		$order_quotedate = clean_input($_POST['order_quotedate']);
		$order_solddate = clean_input($_POST['order_solddate']);
		$order_confdate = clean_input($_POST['order_confdate']);
		$order_calluser = clean_input($_POST['order_calluser']);
		$order_quoteuser = clean_input($_POST['order_quoteuser']);
		$order_solduser = clean_input($_POST['order_solduser']);
		$order_confuser = clean_input($_POST['order_confuser']);
		$order_origin = clean_input($_POST['order_origin']);
		$order_supplier_id = clean_input($_POST['supplier_id']);		
		$order_tracking_number = clean_input($_POST['tracking_number']);
		$order_processed = clean_input($_POST['order_processed']);
		

		$xyquery = "UPDATE orders SET ";
		if (!empty($addr_id_fk) && $edit_address[0] != "edit") {$xyquery .= "addr_id_fk='$addr_id_fk', ";}
		if (!empty($billaddr_id_fk) && $edit_billing_address[0] != "edit") {$xyquery .= "billaddr_id_fk='$billaddr_id_fk', ";}
		if (!empty($billing_id_fk)) {$xyquery .= "billing_id_fk='$billing_id_fk', ";}
		if (!empty($payment_method)) {$xyquery .= "payment_method='$payment_method', ";}
		if (!empty($payment_refno)) {$xyquery .= "payment_refno='$payment_refno', ";}
		if (!empty($order_contact)) {$xyquery .= "order_contact='$order_contact', ";}
		if (!empty($order_address)) {$xyquery .= "order_address='$order_address', ";}
		if (!empty($order_address2)) {$xyquery .= "order_address2='$order_address2', ";}
		if (!empty($order_city)) {$xyquery .= "order_city='$order_city', ";}
		if (!empty($order_state)) {$xyquery .= "order_state='$order_state', ";}
		if (!empty($order_postcode)) {$xyquery .= "order_postcode='$order_postcode', ";}
		if (!empty($order_weight)) {$xyquery .= "order_weight='$order_weight', ";}
		if (!empty($order_subtot)) {$xyquery .= "order_subtot='$order_subtot', ";}
		if (!empty($order_shipcost)) {$xyquery .= "order_shipcost='$order_shipcost', ";}
		if (!empty($order_custom_shipmarkup)) {$xyquery .= "order_custom_shipmarkup='$order_custom_shipmarkup', ";}
		
		//if (isset($order_custom_shipmarkup) && empty($order_custom_shipmarkup)) {$xyquery .= "order_custom_shipmarkup=NULL, ";}
		
		if (!empty($order_discount)) {$xyquery .= "order_discount='$order_discount', ";}
		if (isset($order_discount) && empty($order_discount)) {$xyquery .= "order_discount=NULL, ";}
		if (!empty($order_ship)) {$xyquery .= "order_ship='$order_ship', ";}
		if (!empty($order_tax)) {$xyquery .= "order_tax='$order_tax', ";}
		if (!empty($order_total)) {$xyquery .= "order_total='$order_total', ";}
		if (!empty($order_shipby)) {$xyquery .= "order_shipby='$order_shipby', ";}
		if (!empty($order_shiptype)) {$xyquery .= "order_shiptype='$order_shiptype', ";}
		if (!empty($order_trackno)) {$xyquery .= "order_trackno='$order_trackno', ";}
		if (!empty($order_status)) {$xyquery .= "order_status='$order_status', ";}
		if (!empty($order_calldate)) {$xyquery .= "order_calldate='$order_calldate', ";}
		if (!empty($order_quotedate)) {$xyquery .= "order_quotedate='$order_quotedate', ";}
		if (!empty($order_solddate)) {$xyquery .= "order_solddate='$order_solddate', ";}
		if (!empty($order_confdate)) {$xyquery .= "order_confdate='$order_confdate', ";}
		if (!empty($order_calluser)) {$xyquery .= "order_calluser='$order_calluser', ";}
		if (!empty($order_quoteuser)) {$xyquery .= "order_quoteuser='$order_quoteuser', ";}
		if (!empty($order_solduser)) {$xyquery .= "order_solduser='$order_solduser', ";}
		if (!empty($order_confuser)) {$xyquery .= "order_confuser='$order_confuser', ";}
		if (!empty($order_tracking_number)) {$xyquery .= "tracking_number='$order_tracking_number', order_confship = NOW(), ";} //::KP update time 
		if (!empty($order_origin)) {$xyquery .= "order_origin='$order_origin', ";}	
		if (!empty($order_supplier_id)) {$xyquery .= "order_supplier_id='$order_supplier_id', ";}

		//::kP if cash method is selected then the order is marked as completed
		if($payment_method == "cash") {$xyquery .= "order_solddate = NOW(), order_solduser = '$user_id', ";}
		//if($payment_method == "cc") {$xyquery .= "order_solddate = NOW(), order_solduser = '$user_id', ";}
		if($payment_method == "check") {$xyquery .= "order_solddate = NOW(), order_solduser = '$user_id', ";}
		if($payment_method == "paypal") {$xyquery .= "order_solddate = NOW(), order_solduser = '$user_id', ";}
						
		
		$xyquery .= "order_mod=NOW() ";
		$xyquery .= "WHERE order_id='$order_id'";
		//echo $xyquery;
		$xyresult = mysql_query($xyquery) or die(mysql_error());
		//echo "<br /><center>Your changes to the current order have been made.</center>";
		
		//JC this section is to mark the order action to show how it was paid. CC are not on here because they have to be processed before they are considered paid.
		if (!empty($payment_method)){
		if ($payment_method == "cc" && $order_processed == "1"){$order_action ='Paid by CC';}
		if ($payment_method == "account" && $order_processed == "1"){$order_action ='Paid by CC';}
		if ($payment_method == "cash") { $order_action ='Paid with cash';}
		if ($payment_method == "check") {$order_action = 'Paid by check' ;}
		if ($payment_method == "paypal") {$order_action ='Paid through Paypal' ;} 
						
		$jcquery = "INSERT INTO order_actions (order_id_fk,user_id,order_action,action_date) VALUES ('$order_id','$user_id','$order_action',NOW()) ";
		$xyresult = mysql_query($jcquery) or die(mysql_error());
			}

		if($edit_address[0] != "edit" && $edit_billing_address[0] != "edit"){ ?>
			<script>
			$(document).ready(function() {
				$("<p>NOTICE:</p><p>Your changes to the current order have been made.</p>").appendTo("#xyalert");
				$("#xyalert").fadeIn(100).delay(450).fadeOut(100);
			});
			</script>
		<? }
		
		return $xyresult;
	}
}

//===========================================================================================================================

//::JK -- Update order totals in the DB.

function update_order_tot($order_id,$order_tot,$sub_tax,$ship_price,$sub_tot) {
	if(!empty($order_id) && !empty($order_tot)){
		$xyquery = "UPDATE orders SET ";
		$xyquery .= "order_tot='$order_tot', ";
		$xyquery .= "order_tax='$sub_tax', ";
		$xyquery .= "order_ship='$ship_price', ";
		$xyquery .= "order_subtot='$sub_tot', ";
		$xyquery .= "order_mod=NOW() ";
		$xyquery .= "WHERE order_id='$order_id'";
		$xyresult = mysql_query($xyquery) or die(mysql_error());

		return $xyresult;
	}
}

//===========================================================================================================================

//::JK -- Update order status in the DB.

function update_order_status($order_id,$status) {
	if(!empty($order_id) && !empty($status)){
		$xyquery = "UPDATE orders SET ";
		$xyquery .= "order_status='$status', ";
		$xyquery .= "order_mod=NOW() ";
		$xyquery .= "WHERE order_id='$order_id'";
		$xyresult = mysql_query($xyquery) or die(mysql_error());

		return $xyresult;
	}
}

//===========================================================================================================================

//::JK -- Mark an order as processed in the DB. JC -- Once CC is processed, it will mark the order sold & mark who sold it.

function order_is_processed($order_id) {
	if(!empty($order_id)){
		$xyquery = "UPDATE orders SET order_processed=1, order_mod=NOW(), "; 
		$xyquery .= "order_solddate = NOW(), order_solduser = '$user_id', ";
		$xyquery .= "WHERE order_id='$order_id'";
		$xyresult = mysql_query($xyquery) or die(mysql_error());
		return $xyresult;
	}
}

//===========================================================================================================================

//::JK -- Adds an order item using the provided arguments.

function add_item($order_id,$product_id,$quantity) {
	$query = "SELECT count(*) FROM order_items WHERE order_id_fk = '". $order_id ."' AND enabled = 1";
	$result = mysql_query($query) or die (mysql_error());
	$num = mysql_fetch_row($result);
	$num = $num[0];
	if ($num == '') {$sort = 1;} else {$sort = $num + 1;}
	
	//::KP we need to insert the price or things get foobared
	$q2 = "SELECT price FROM products WHERE product_id = '$product_id'";
	$r2 = mysql_query($q2) or die (mysql_error());
	list($price) = mysql_fetch_array($r2);

	$xyquery = "INSERT INTO order_items ";
	$xyquery .= "(order_id_fk,product_id_fk,item_quantity,sort,item_price) ";
	$xyquery .= "VALUES ";
	$xyquery .= "('$order_id','$product_id','$quantity','$sort','$price')";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Updates an order item using provided arguments.

function update_item($item_id,$order_id,$product_id,$quantity,$price,$sort) {
	$row = get_product_as_item($product_id);
	$xyquery = "UPDATE order_items SET ";
	$xyquery .= "order_id_fk='$order_id'";
	if (!empty($product_id)) {$xyquery .= ", product_id_fk='$product_id'";}
	$xyquery .= ", item_quantity='$quantity'";
	if (!empty($price) && $row['price'] != $price) {$xyquery .= ", item_price='$price', ";}
	$xyquery .= "sort='$sort' ";
	$xyquery .= "WHERE item_id='$item_id'";
	echo $xyquery;
	die();
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Disable an order item.

function disable_item($item_id) {

	$query = "SELECT sort FROM order_items WHERE item_id = $item_id";
	$result = mysql_query($query) or die (mysql_error());
	$old = mysql_fetch_row($result);
	$old = $old[0];

	$query = "UPDATE order_items SET sort=sort-1 WHERE sort > ". $old;
	$result = mysql_query($query) or die (mysql_error());

	$xyquery = "UPDATE order_items SET enabled = 0 WHERE item_id='$item_id'";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Enable an order item.

function enable_item($item_id) {
	$query = "SELECT order_id_fk FROM order_items WHERE item_id = $item_id";
	$result = mysql_query($query) or die (mysql_error());
	$order_id = mysql_fetch_row($result);
	$order_id = $order_id[0];

	$query = "SELECT count(*) FROM order_items WHERE order_id_fk = '". $order_id ."' AND enabled = 1";
	$result = mysql_query($query) or die (mysql_error());
	$num = mysql_fetch_row($result);
	$num = $num[0];
	$sort = $num + 1;

	$xyquery = "UPDATE order_items SET enabled = 1,sort = $sort WHERE item_id='$item_id'";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Update or add a note

function update_note($note_id,$order_id,$note_text,$enabled) {

	$user_id=$_SESSION['userid'];

	if (!empty($enabled)) {
		$enabled = 1;
	} else {
		$enabled = 0;
	}

	if (empty($note_id)) {
		$xyquery = "INSERT INTO order_notes (order_id_fk,note_text,note_enabled,note_date,note_mod_date,note_mod_by)
					VALUES ('$order_id','$note_text',$enabled,NOW(),NOW(),$user_id)";
	} else {
		$xyquery = "UPDATE order_notes SET note_text='$note_text',note_enabled='$enabled',note_mod_date=NOW(),
					note_mod_by=$user_id WHERE note_id=$note_id";
	}
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Returns all notes

function call_notes() {
	$xyquery = "SELECT * FROM order_notes WHERE note_enabled = 1 ORDER BY note_date DESC";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	return $xyresult;
}

//===========================================================================================================================

//::JK -- Copy Order

function copy_order($order_id) {
	$xyquery = "INSERT orders (cust_id_fk,addr_id_fk,billaddr_id_fk,billing_id_fk,payment_method,payment_refno,order_subtot,
				order_shipcost,order_custom_shipmarkup,order_discount,order_ship,order_tax,order_tot,order_shipby,order_shiptype,
				order_trackno,order_status,order_type,order_notes,order_date,order_mod)
				SELECT cust_id_fk,addr_id_fk,billaddr_id_fk,billing_id_fk,payment_method,payment_refno,order_subtot,
				order_shipcost,order_custom_shipmarkup,order_discount,order_ship,order_tax,order_tot,order_shipby,order_shiptype,
				order_trackno,order_status,order_type,order_notes,NOW(),NOW() FROM orders WHERE order_id = $order_id";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	$new_order_id = mysql_insert_id();

	$xyquery = "INSERT order_items (order_id_fk,product_id_fk,item_quantity,item_price,enabled,item_date,item_mod,item_mod_by)
				SELECT '$new_order_id',product_id_fk,item_quantity,item_price,enabled,item_date,item_mod,item_mod_by
				FROM order_items WHERE order_id_fk = $order_id";
	$xyresult = mysql_query($xyquery) or die (mysql_error());

	return $new_order_id;
}

//===========================================================================================================================

//::JK -- Quote Order

function quote_order($order_id) {
	$xyquery = "INSERT orders (cust_id_fk,addr_id_fk,billaddr_id_fk,billing_id_fk,payment_method,payment_refno,order_subtot,
				order_shipcost,order_custom_shipmarkup,order_discount,order_ship,order_tax,order_tot,order_shipby,order_shiptype,
				order_trackno,order_status,order_type,order_notes,order_date,order_mod)
				SELECT cust_id_fk,addr_id_fk,billaddr_id_fk,billing_id_fk,payment_method,payment_refno,order_subtot,
				order_shipcost,order_custom_shipmarkup,order_discount,order_ship,order_tax,order_tot,order_shipby,order_shiptype,
				order_trackno,'quoted','quote',order_notes,NOW(),NOW() FROM orders WHERE order_id = $order_id";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	$new_order_id = mysql_insert_id();

	$xyquery = "INSERT order_items (order_id_fk,product_id_fk,item_quantity,item_price,enabled,item_date,item_mod,item_mod_by)
				SELECT '$new_order_id',product_id_fk,item_quantity,item_price,enabled,item_date,item_mod,item_mod_by
				FROM order_items WHERE order_id_fk = $order_id";
	$xyresult = mysql_query($xyquery) or die (mysql_error());

	return $new_order_id;
}

//===========================================================================================================================

//::JK -- Item Ordering Functions

function item_swapdown($order_id,$item_id) {
	$query = "SELECT sort FROM order_items WHERE item_id = $item_id";
	$result = mysql_query($query) or die (mysql_error());
	$old = mysql_fetch_row($result);
	$old = $old[0];
	$below = $old - 1;

	if ($old != 1) {
		$query = "UPDATE order_items SET sort='". $below ."' WHERE item_id='". $item_id ."'";
		$result = mysql_query($query) or die (mysql_error());

		$query = "UPDATE order_items SET sort='". $old ."' WHERE sort='". $below ."' AND order_id_fk='". $order_id ."' AND item_id != $item_id";
		$result = mysql_query($query) or die (mysql_error());
	}
}

function item_swapup($order_id,$item_id) {
	$query = "SELECT sort FROM order_items WHERE item_id = $item_id";
	$result = mysql_query($query) or die (mysql_error());
	$old = mysql_fetch_row($result);
	$old = $old[0];
	$above = $old + 1;

	$query = "SELECT count(*) FROM order_items WHERE order_id_fk = '". $order_id ."' AND enabled = 1";
	$result = mysql_query($query) or die (mysql_error());
	$c = mysql_fetch_row($result);
	$c = $c[0];

	if ($old != $c) {
		$query = "UPDATE order_items SET sort='". $above ."' WHERE item_id='". $item_id ."'";
		$result = mysql_query($query) or die (mysql_error());

		$query = "UPDATE order_items SET sort='". $old ."' WHERE sort='". $above ."' AND order_id_fk='". $order_id ."' AND item_id != $item_id";
		$result = mysql_query($query) or die (mysql_error());
	}
}

//===========================================================================================================================

//::JK -- Get a note by order ID

function get_note($order_id) {
	$xyquery = "SELECT * FROM order_notes WHERE order_id_fk = '$order_id'";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	return $xyresult;
}

//===========================================================================================================================
//::KP gets all the suppliers for use in the drop down.
function get_suppliers_orders() {
	$xyquery = "SELECT * FROM suppliers ORDER BY supplier_name ASC";
	$xyresult = mysql_query($xyquery) or die (mysql_error());
	return $xyresult;
}

//===========================================================================================================================
//::JK -- Get an authorize.net response for an order.
function get_auth_response($order_id) {
	$q = "SELECT * FROM authorize_responses WHERE order_id_fk = $order_id LIMIT 1";
	$r = mysql_query($q) or die (mysql_error());
	return $r;
}

//===========================================================================================================================
//::JC -- Insert date 

function now(){
	$today = getdate();
	echo $today['year']."-";
	echo $today['mon']."-";
	echo $today['mday']. "-";
	echo $today['hours']. ":";
	echo $today['minutes'];
	
}
//===========================================================================================================================
//::JC -- Insert Quote User Id

function user_id_quote(){

	$order_id = clean_input($_GET['order_id']);
	$userid = clean_input($_GET['userid']);
	$type = clean_input($_GET['type']);
	
	$jcquery = "UPDATE orders SET ";
	$jcquery .= "order_quoteuser ='$userid', ";
	if($type == "quoted") {$jcquery .= "order_quoteuser ='$userid' ";}
	
	$jcquery .= "WHERE order_id = '$order_id' ";
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	return $jcresult;
	
} 

//===========================================================================================================================
//::JC -- Insert Sold User Id

function user_id_sold() {
	$order_id = clean_input($_GET['order_id']);
	$userid = clean_input($_GET['userid']);
	$type = clean_input($_GET['type']);


	$jcquery = "UPDATE orders SET ";
	$jcquery .= "order_solduser ='$userid', ";
	if($type == "completed") {$jcquery .= "order_solduser ='$userid' ";}

	$jcquery .= "WHERE order_id = '$order_id' ";
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	return $jcresult;
}
//===========================================================================================================================
//::JC -- Insert Quote User Id

function user_id_quote1(){

	$order_id = clean_input($_GET['order_number']);

	$userid = clean_input($_SESSION['userid']);
	$type = clean_input(strtolower($_GET['type']));
	if($type == "quote sheet"){$type = "quoted";}
	$jcquery = "UPDATE orders SET ";
	$jcquery .= "order_quoteuser ='$userid', ";
	if($type == "quoted") {$jcquery .= "order_quoteuser ='$userid' ";}
	
	$jcquery .= "WHERE order_id = '$order_id' ";
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	return $jcresult;
	
} 

//===========================================================================================================================
//::JC -- Print Function for orderslip.php

function printer(){
	if (isset($_POST['type'])){
	
	$order_id = clean_input($_GET['order_number']);
	$time = "NOW()";
	$type = clean_input(strtolower($_GET['type']));
	if($type == "quote sheet"){$type = "quoted";}	
	
	$xyquery = "UPDATE orders SET " ;
	$xyquery .= "order_status ='$type', ";
	if($type == "quoted"){$xyquery .= "order_quotedate = $time ";}

	$xyquery .= "WHERE order_id = '$order_id' ";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	if ($type == "quoted"){user_id_quote1();}
	
	//::KP mark an order action as printed.
	order_actions('quote_printed');
		
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=orders.php?action=edit&order_id=$order_number\">";
	}
}
//===========================================================================================================================
//::JC -- Print Function for orderslip.php....This will only print the order and redirect

function printer_only(){
	if (isset($_POST['type'])){
		$type = clean_input($_GET['type']);
		if ($type == 'Order Sheet'){order_actions('order_printed');}
		if ($type == 'fax_printed') {order_actions('fax_printed');}
		if ($type == 'ship_quote') {order_actions('ship_quote');}
		if ($type == 'Invoice') {order_actions('invoice_sheet');}
		if ($type == 'Packing Slip') {order_actions('packing_sheet');}

		echo "<meta http-equiv=\"refresh\" content=\"0; URL=orders.php?action=edit&order_id=$order_number\">";
		
	}
	
}
//===========================================================================================================================
//::KP inserts action into the db depending on the parameter passed.
function order_actions($action_type){

	$user_id = $_SESSION['userid'];
	$order_id = $_SESSION['order_id'];
	
	//::KP here we set an array of all the possible order actions then based off the parameter we choose the action to be inserted.
	$order_actions = array('quoted' => 'Order quoted', 
							'quote_emailed' => 'Order quote emailed',
							'cc_processed' => 'Paid by credit card',
							'cash_processed' => 'Paid by cash',
							'check_processed' => 'Paid by check',
							'quote_printed' => 'Quote sheet printed',
							'order_printed' => 'Order sheet printed',
							'order_emailed' => 'Order confirmation emailed',
							'fax_printed' => 'Fax Order sheet printed',
							'supplier_emailed' => 'supplier emailed',
							'tracking_emailed' => 'Tracking number has been emailed',	
							'invoiced_emailed' => 'Invoice was emailed',
							'supplier_order' => 'Emailed order sent',
							'ship_quote' => 'Ship/Quote request emailed',
							'tracking_request'=> 'Tracking request emailed',
							'general_emailed' => 'General email sent',
							'invoice_sheet' => 'Invoice was printed',
							'packing_sheet' => 'Packing Slip was printed',					
							 );
	

	//::KP here we set the specific order action by taking the parameter of the function and setting it to a string from the array.
	$specific_order_action = $order_actions[$action_type];
		
	//::KP here we need to pass the email address being sent into the keys quote_emailed,general_emailed,ship_quote,tracking_request		
	if($_POST['email']){
		$specific_order_action = $specific_order_action." to <b>".$_POST['email']."</b> ";
	}
	
	//::KP now lets put it all together and do an insert. 
	$xyquery = "INSERT INTO order_actions (order_id_fk, user_id, order_action, action_date) VALUES ('$order_id', '$user_id','$specific_order_action', NOW())";
	
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	
	return $xyresult;
}

//===========================================================================================================================
// KP this is to display on the edit-order.php Order Activity section
function get_order_activity(){
	
	$order_id = $_SESSION['order_id'];
	$xyquery = "SELECT * FROM order_actions WHERE order_id_fk = '$order_id'";
	$xyresult = mysql_query($xyquery) or die(mysql_error());
	return $xyresult;
	
}
//===========================================================================================================================
// JC insert check data
function add_check(){
	$order_id = $_SESSION['order_id'];
	
	if(isset($_POST['add_check'])){
	
	$sending = clean_input($_POST['sending']);
	$waiting = clean_input($_POST['waiting']);
	$cleared = clean_input($_POST['cleared']);
	$check_num = clean_input($_POST['check_number']);
	$check_date = clean_input($_POST['check_date']);
	$received_date = clean_input($_POST['received_date']);
	$cleared_date = clean_input($_POST['cleared_date']);
	
	if ($sending == 'on') {$sending = 1;} else {$sending = 0;}
	if ($waiting == 'on') {$waiting = 1;} else {$waiting = 0;}
	if ($cleared == 'on') {$cleared = 1;} else {$cleared = 0;}
	
	$jcquery = "INSERT INTO checks (order_id_fk,sending,waiting,cleared,check_number,check_date,received_date,cleared_date) 
				VALUES ('$order_id','$sending','$waiting','$cleared','$check_num','$check_date','$received_date','$cleared_date')";
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	
	return $result;
	}
}
//===========================================================================================================================
// JC display check data
function display_check($order_id){
	$order_id = $_SESSION['order_id'];
	
	$jcquery = "SELECT * FROM checks WHERE order_id_fk = '$order_id'";
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	
	return $jcresult; 
}
//===========================================================================================================================
// JC update check data
function update_check($order_id){
	$order_id = $_SESSION['order_id'];
	if (isset ($_POST['add_check'])){
	$sending = clean_input($_POST['sending']);
	$waiting = clean_input($_POST['waiting']);
	$cleared = clean_input($_POST['cleared']);
	$check_num = clean_input($_POST['check_number']);
	$check_date = clean_input($_POST['check_date']);
	$received_date = clean_input($_POST['received_date']);
	$cleared_date = clean_input($_POST['cleared_date']);

	if ($sending == 'on') {$sending = 1;} else {$sending = 0;}
	if ($waiting == 'on') {$waiting = 1;} else {$waiting = 0;}
	if ($cleared == 'on') {$cleared = 1;} else {$cleared = 0;}
	
	$jcquery = "UPDATE checks SET ";
	if (!empty($sending)) {$jcquery .= "sending='$sending', ";}
	if (!empty($waiting)) {$jcquery .= "waiting='$waiting', ";}
	if (!empty($cleared)) {$jcquery .= "cleared='$cleared', ";}
	if (!empty($check_num)) {$jcquery .= "check_number='$check_num', ";}
	if (!empty($check_date)) {$jcquery .= "check_date='$check_date', ";}
	if (!empty($received_date)) {$jcquery .= "received_date='$received_date', ";}
	if (!empty($cleared_date)) {$jcquery .= "cleared_date='$cleared_date' ";}
	$jcquery .= "WHERE order_id_fk = '$order_id'";
	//echo $jcquery;
	$jcresult = mysql_query($jcquery) or die(mysql_error());
	
	
	return $jcresult;
}
}
//===========================================================================================================================
function add_po($order_id){
	$order_id = $_SESSION['order_id'];
	$po_number = clean_input($_POST['po_number']);
	$date_issue = clean_input($_POST['date_issue']);
	$issue_by = clean_input($_POST['issue_by']);
	
	$query = "UPDATE orders SET order_po_no	 = '$po_number', order_po_date = '$date_issue', order_po_issue = '$issue_by' WHERE order_id = '$order_id'";
	$result = mysql_query($query) or die (mysql_error());
	return $result;
}	
//===========================================================================================================================
// Save and finish order

function complete($order_id){
		if(isset($_POST['complete'])){
		$order_id = $_SESSION['order_id'];

		if (!empty($order_solddate)){
		$order_processed = clean_input($_POST['order_processed']);
		$jcquery = "UPDATE orders SET order_processed = '1' WHERE order_id = '$order_id'";
		//echo $jcquery;
		$jcresult = mysql_query($jcquery) or die(mysql_error()); 
		
		return $jcresult;
		
		//header("Location: admin.php?order_close=1");
		}
		elseif(empty($order_soldate)){echo "<h1>You fucking dork!!!!!</h1>";
		//header("Location: admin.php?order_close=1");
		}
	}
	
}

?>
