<?php require('includes/header.php'); ?>
<body>
<div id="TOP_HEADER"><div class="logo"></div></div>
  
<script type="text/javascript"> function showCust(str)
		{
		if (str=="<?php $zip_id = clean_input($_GET['zip_id']);?>")
		  {
		  document.getElementById("cust").innerHTML="";
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
			document.getElementById("cust").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","customer_ajax.php?zip_id="+str,true);
		xmlhttp.send();
		}
</script> 

<div id="search_area"><?php include'includes/nav.php';?></div>
<div id="menu_main">
<table width="100%" height="200">
<tr>
  	
   <td valign="top"> <div id="right_menu">
    <h2>List of customers</h2>
    <table width="95%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
          	<td>
            <form >
    	
                    <select name="zip_id" id="zip_id"  onchange="showCust(this.value)">
                    <option>Choose a zip code</option>
                    <?php 	$query = display_zips();
							while ($row = mysql_fetch_array($query)){ 
							$zip_id = $row['zip_id'];
							$zip_codes = $row['zip_codes'];
							$city = $row['city'];
								echo"<option value=\"".$zip_id."\">".$city."/".$zip_codes."</option>";
						
					}?>
                </select>
              </form>
            </td>
          </tr>
          <tr>
            <td><br /><div id="cust"></div></td>
          </tr>
     </table>
    
    </div></td></tr></table>
</div>
<div align="center" style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Menu Mogul Inc &copy; <?php echo date ("Y")?></div>
</body>
</html>
