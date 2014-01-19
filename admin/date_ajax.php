<?php session_start();
require "functions/functions.php";
connect();

$order_id = clean_input($_GET['order_id']);
$time = clean_input($_GET['value']);
$type = clean_input($_GET['type']);

$xyquery = "UPDATE orders SET " ;
$xyquery .= "order_status ='$type', ";
if($type == "quoted"){$xyquery .= "order_quotedate ='$time' ";}
if($type == "completed"){$xyquery .= "order_solddate ='$time' ";}

$xyquery .= "WHERE order_id = '$order_id' ";

$xyresult = mysql_query($xyquery) or die(mysql_error());
?>
<?php if ($type == "quoted"){ user_id_quote();}
	  elseif ($type == "completed") {user_id_sold(); }	
?>
<script>
location.reload(true);
</script>
