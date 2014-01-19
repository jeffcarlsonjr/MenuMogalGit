<div id="menu_main">
<table width="100%">
	<tr>
    	<td>
        	<div id="left_menu"><br /><br />
       		 <?php include("includes/left_nav.php"); ?></div>

			  <div id="right_menu">
    <h1 align="center"> Ads Modual</h1>
    
    <div align="center">Zip Code:&nbsp;&nbsp;
   						 <form action="add_ads.php?zip_id?=<?=$zip_id?>" method="get">
    					<select name="zip_id" onChange="this.form.submit()">
						<option>Choose a zip....</option>
						<?php $query = display_zips();?>
                        <?php while ($result = mysql_fetch_array($query)){
							$zip_id = $result['zip_id'];
							$zip_code = $result['zip_codes'];
								echo "<option value=\"".$zip_id."\">".$zip_code."</option>";}?>
                        </select></form></div><br />
      <div id="ad_ads" class="hide" >          	
    	<table width="100%" cellspacing="2" cellpadding="2" align="center">
  			<form method="post" enctype="multipart/form-data">
  			  <tr>
              <td>Top Ad:</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <tr>
            	<td><input type="file" name="file[]" size="17" value="<?=$top1?>" /></td>
            	<td><input type="file" name="file[]" size="17" value="<?=$top2?>" /></td>
            	<td><input type="file" name="file[]" size="17" value="<?=$top3?>" /></td>
           	  </tr>
            <tr>
            	<td><input type="file" name="file[]" size="17" value="<?=$top4?>" /></td>
            	<td><input type="file" name="file[]" size="17" value="<?=$top5?>" /></td>
            	<td></td>
       	    </tr>
            <tr>
              <td>Left Ad:</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
            	<td><input type="file" name="file[]" size="17" value="<?=$left1?>" /></td>
            	<td><input type="file" name="file[]" size="17" value="<?=$left2?>" /></td>
            	<td><input type="file" name="file[]" size="17" value="<?=$left3?>" /></td>
           	</tr>
            
            <tr>
            	<td><input type="file" name="file[]" size="17" value="<?=$left4?>" /></td>
                <td><input type="file" name="file[]" size="17" value="<?=$left5?>" /></td>
                <td>&nbsp;</td>
            <tr>
              <td>Right Ad:</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            <tr>
              <td><input type="file" name="file[]" size="17" value="<?=$right1?>" /></td>
              <td><input type="file" name="file[]" size="17" value="<?=$right2?>" /></td>
              <td><input type="file" name="file[]" size="17" value="<?=$right3?>" /></td>
            <tr>
              <td><input type="file" name="file[]" size="17" value="<?=$right4?>" /></td>
              <td><input type="file" name="file[]" size="17" value="<?=$right5?>" /></td>
              <td>&nbsp;</td>
            <tr>
              <td></td>
              <td>&nbsp;</td>
              <td><input type="submit" name="add_ads" value="Submit" /></td>
              </form>
            </table>
    	

</div>
<br />
<button id="1">Updates</button>
                    
                          <div id="update">
                         <table width="100%" cellspacing="2" cellpadding="2" align="center">
                            <tr>
                            <td align="center" valign="top">Zip Code:</td>
                            </tr>
                            <tr>
                            <td align="center"><form>
                                <select name="zip_id" onChange="showAds(this.value)">
                                    <option>Choose a zip....</option>
                                <?php $query = display_zips();?>
                                <?php while ($result = mysql_fetch_array($query)){
                                        $zip_id = $result['zip_id'];
                                        $zip_code = $result['zip_codes'];
                                            echo "<option value=\"".$zip_id."\">".$zip_code."</option>";}?>
                                    </select></form></td>
                                    
                                  </tr>
                                </table>
                            <div id="show_updates"> </div>	
                              <button id="2">Hide</button>  </div></div>
                              <script>
                                    $("#1").click(function () {
                                    $("#update").show(4000);});
                                    
                                    $("#2").click(function () {
                                    $("#update").hide(2000);
                                    });
                                    
                                    </script>
                    
</td>
</tr>
</table>
  
</div>
<?php require('includes/header.php'); ?>
<?php display_zips(); ?>
<?php add_ads(); ?>
 <script type="text/javascript"> 
 function showAds(str)
	{
	if (str=="<?php $zip_id = clean_input($_GET['zip_id']);?>")
	  {
	  document.getElementById("show_updates").innerHTML="";
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
		document.getElementById("show_updates").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","ad_ajax.php?zip_id="+str,true);
	xmlhttp.send();
	}
	</script>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
</div>  
<div id="search_area"></div>
<div id="menu_main"> Welcome to the Matrix</div>

</body>
</html>
