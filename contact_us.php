<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php cat_by_zip($cust_id_fk);?>
<?php get_cat_zip($zip_id); ?>
<?php $zip_id = $_GET['zip_id'];?>
<?php script($zip_id); ?>
<?php $page_id = $_GET['page_id'];?>
<?php  display_info_page($page_id);?>
<?php add_contact_email();?>

<?php
	$query = display_info_page($page_id);
	while ($result = mysql_fetch_array($query)){
			
		$name 	= $result['name'];
		$meta 	= $result['meta_description'];
		$key	= $result['meta_keys'];
		$coding = $result['coding'];
		$title	= $result['title'];
		
		}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul |Welcome To <?=$title?> </title>
<meta name="keywords" content="<?=$key?>" />
<meta name="description" content="<?=$meta?>" />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="javascript/ban.min.js"></script>-->
<script type="text/javascript" src="javascript/menujava.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

</head>
<body>

<div id="TOP_HEADER">

  <div class="logo"></div>
  <div align="right" class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard">
      <div class="leaderboard">
        <script type="text/javascript">
		show_ban('top');
	  </script>
      </div>
    </div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <div class="buttons"><a href="sign_up.php?zip_id=<?=$zip_id?>">Sign Up</a></div>
  </div>
</div>
<div id="search_area">
  <div class="search_cuisine">
  <script type="text/javascript"> function showCats(str)
		{
		if (str=="<?php $cat_id = clean_input($_GET['cat_id']);?>")
		  {
		  document.getElementById("rest").innerHTML="";
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
			document.getElementById("rest").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","cust_ajax.php?zip_id=<?=$zip_id?>&cat_id="+str,true);
		xmlhttp.send();
		}
</script>
    		<form>
            <input type="hidden" name="zip_id" value="<?=$zip_id?>" />
            <select name="cat_id" id="cat_id"  onchange="showCats(this.value)">
            <option>Select For Cuisines</option>
          <?php $inc = 0;
		  		$zip_id = $_GET['zip_id'];
				$query = cat_by_zip($zip_id);?>
		  <?php 
                while ($row = mysql_fetch_array($query)){
					$cat_id = $row['cat_id'];
					$category = $row['category'];
					echo "<option value=\"".$cat_id."\" >".$category."</option>";
				
				$inc++;}?>
          	 </select>
    		</form>
  </div>
  <div class="search_specific"><img src="images/entree.png" width="125" height="25" /></div>
  <div class="search_image"><img src="images/cuisine.png" width="125" height="25" alt="Cuisine | Menu Mogul where you find what to eat" /></div>
  <div class="search_image_spec">
    <form id="entree2" name="entree" method="post" action="">
      <label for="search_keyword2"></label>
      <input type="text" name="search_keyword2" id="search_keyword2" />
      <input type="submit" name="Search2" id="Search2" value="Search" />
    </form>
  </div>
</div>
<div id="display_main_area">

	<?php if ($_POST["email"]<>'') { 
			$ToEmail = 'info@menumogul.com'; 
			$EmailSubject = 'Comment From A Fan '; 
			$mailheader = "From: ".$_POST["email"]."\r\n"; 
			$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			$MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
			$MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
			$MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>"; 
			$MESSAGE_BODY .= "Content: ".nl2br($_POST["comment"])."<br>"; 
			mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
			}?>
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td valign="top">
                    <form method="post" name="email">
                        <table width="30%" border="0" align="right" cellpadding="1" cellspacing="1">
                          <tr>
                            <td colspan="2"><h3>&nbsp;</h3></td>
                          </tr>
                          <tr>
                            <td class="menu-info">Name:</td>
                            <td><input type="text" name="name"></td>
                          </tr>
                          <tr>
                            <td class="menu-info">Email:</td>
                            <td><input type="text" name="name"></td>
                          </tr>
                          
                          <tr>
                            <td class="menu-info">Your Comments:</td>
                            <td><textarea name="comment" cols="30" rows="5"></textarea></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="email" value="Submit">
                            	<input name="email" type="hidden" id="info@menumogul.com" value="email" />
                            </td>
                          </tr>
                        </table>
                	</form>
                	</td>
                  </tr>
                 </table>
                </div>
<?php include'footer.php';?>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20964627-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>
