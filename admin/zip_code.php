<?php require('includes/header.php'); ?>
<?php add_zip_code(); ?>
<?php display_zips();?>
<?php update_zips($zip_id);?>
<?php all_zips();?>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="main_area">
  
  <div id="right_menu">
    <h2>Add a zip code</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    	<form method="post" onSubmit="return zip_codes();">
    	<table width="65%" cellspacing="2" cellpadding="2" >
  			
            <tr>
            	<td>Zip Code:</td>
            	<td><input type="text" name="zip_codes" id="zip_code" /></td>
            </tr>
            <tr>
            	<td>City:</td>
            	<td><input type="text" name="city" id="city" /></td>
            </tr>
            <tr>
              <td>State: initials</td>
              <td><input type="text" name="state" id="state" /></td>
            </tr>
            <tr>
              <td>Status:</td>
              <td>Active: <input type="checkbox" name="status" value="yes" />  Inactive:<input type="checkbox" name="status" value="no" /></td>
            </tr>
            
            <tr>
            	<td></td>
                <td><input type="submit" name="add_zip_code" value="Submit" /></td>
  	
</table></form>
</td>
  </tr>
</table>
<hr width="95%" />

<script type="text/javascript"> 
	function showZip(str)
		{
		if (str=="<?php $zip_id = clean_input($_GET['zip_id']);?>")
		  {
		  document.getElementById("update_zip").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("update_zip").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","zip_ajax.php?zip_id="+str,true);
		xmlhttp.send();
		}
</script>
<button>Update Zips</button>
<div id="zip" align="center" class="hide"><br />
		<form>
    	<select name="zip_id" onChange="showZip(this.value)">
    	<option>Select A Zip</option>
        
		<?php 	$inc = 0;
				$query 	= all_zips(); 
				while ($result = mysql_fetch_array($query)){
					$zip_id		= $result['zip_id'];
					$zip_code 	= $result['zip_codes'];
					
					echo "<option value=\"".$zip_id."\">".$zip_code."</option>";
					$inc++;
					}?>
		</select></form></div>
    	
<div id="update_zip" ></div>

<script>
$("button").click(function(){
$("#zip").show('slow');						   
;})
</script>
    </div>
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
