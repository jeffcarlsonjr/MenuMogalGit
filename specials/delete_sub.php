<?php include'header.php' ?>
<?php connect();?>
<?php $cust_id = $_GET['cust_id'];?>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>
<div id="search_area" align="center"><h2>Welcome <?=$name;?>, go head and update your specials!!</h2></div>
<div id="menu_main">
<?php		
		$id = $_GET['id'];
		if(!empty($id)){
		$query = "DELETE FROM subscribe WHERE id='$id' ";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "<h1 align='center'>User Has Been Deleted <a href=\"emails.php\">Return To Page</a></h1>";

		}
		
		?>
		</div>