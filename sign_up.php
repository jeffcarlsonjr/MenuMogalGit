<?php include("admin/functions/functions.php");?>
<?php connect(); ?>
<?php cat_by_zip($cust_id_fk);?>
<?php get_cat_zip($zip_id); ?>
<?php $zip_id = $_GET['zip_id'];?>
<?php upload_listing();?>

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
<title>Menu Mogul | Restaurant Sign Up</title>
<meta name="keywords" content="<?=$key?>" />
<meta name="description" content="<?=$meta?>" />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="javascript/ban.min.js"></script>-->
<script type="text/javascript" src="javascript/menujava.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<style type="text/css">
.arrow {	height: 35px;
	width: 35px;
	float: left;
	background-image: url(images/for_rstrnts/arrow.jpg);
}
.content {
	width: 975px;
	margin-right: auto;
	margin-left: auto;
	height: 570px;
}
.content_left {	background-image: url(images/final_bg.jpg);
	background-repeat: repeat;
	float: left;
	height: 550px;
	width: 450px;
	margin-top: 10px;
	border-radius:15px;
	-moz-border-radius:15px;
}
.content_left_header {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #FC3;
	text-align: center;
}
.content_left_image {	float: right;
	width: 110px;
	height: 80px;
	margin-right: 3px;
}
.content_left_info {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFF;
	float: left;
	width: 325px;
	margin-left: 8px;
	margin-top: 10px;
	text-align: justify;
	line-height: 16px;
}
.content_left_title {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #FC3;
	float: left;
	margin-top: 5px;
	margin-left: 8px;
	height: 35px;
	width: 300px;
	text-align: center;
}
.content_right {
	float: left;
	width: 515px;
	height: 550px;
	margin-top: 10px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.content_right_image {	float: left;
	height: 80px;
	width: 110px;
}
.content_right_info {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFF;
	text-align: justify;
	width: 325px;
	margin-right: 8px;
	float: right;
	margin-top: 10px;
	line-height: 16px;
}
.content_right_title {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #FC3;
	float: right;
	margin-top: 5px;
	margin-right: 8px;
	width: 300px;
	text-align: center;
	height: 35px;
}
.wrap {	width: 450px;
	float: left;
	height: 80px;
}
</style>
</head>
<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div align="right" class="top" style="color:#ffffff;"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"></div>
  </div>
  <div class="menu_area">
    <div class="buttons"><a href="city_page.php?zip_id=<?=$zip_id?>">Home</a></div>
    <a href="http://www.menumogul.com"></a>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <a href="sign_up.php?zip_id=<?=$zip_id?>">
    <div class="buttons">Sign Up</div>
  </a> </div>
</div>
<div id="search_area">
  <div class="search_image"><img src="images/cuisine.png" alt="" width="125" height="25" /></div>
  <div class="search_cuisine">
    <form action="results.php?cat_id=<?=$cat_id?>&amp;zip_id=<?=$zip_id?>" method="get">
      <input type="hidden" name="zip_id" value="<?=$zip_id?>" />
      <select name="cat_id" id="cat_id" onchange="this.form.submit()">
        <option>Select From Cuisines</option>
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
  <div class="search_specific"><img src="images/entree.png" alt="" width="125" height="25" /></div>
  <div class="search_image_spec">
    <form method="post" >
      <input name="search" type="text" onclick="this.value='';" value="What are you craving?" maxlength="23" />
      <input type="submit" name="look" value="Search" />
    </form>
  </div>
</div>
<div id="display_main_area">
  <?php if ($_POST["upload_listing"]<>'') { 
			$ToEmail = 'info@menumogul.com'; 
			$EmailSubject = 'New Listing '; 
			$mailheader = "From: ".$_POST["email"]."\r\n"; 
			$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			$MESSAGE_BODY .= "Contact: ".$_POST["contact"]."<br>";
			$MESSAGE_BODY .= "Category: ".$_POST["category"]."<br>";
			$MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
			$MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
			$MESSAGE_BODY .= "Address: ".$_POST["address"]."<br>";
			$MESSAGE_BODY .= "City: ".$_POST["city"]."<br>";
			$MESSAGE_BODY .= "State: ".$_POST["state"]."<br>";
			$MESSAGE_BODY .= "Zip code: ".$_POST["zip_code"]."<br>";
			$MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>";
			$MESSAGE_BODY .= "Fax: ".$_POST["fax"]."<br>";
			$MESSAGE_BODY .= "Hours: ".$_POST["hours"]."<br>";
			$MESSAGE_BODY .= "Dine-in: ".$_POST["dine_in"]."<br>";
			$MESSAGE_BODY .= "Take-out: ".$_POST["take_out"]."<br>";
			$MESSAGE_BODY .= "Delivery: ".$_POST["delivery"]."<br>";
			$MESSAGE_BODY .= "Website: ".$_POST["domain"]."<br>";
			$MESSAGE_BODY .= "Wants Info: ".nl2br($_POST["info"])."<br>"; 
			mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
			}?>
  <div class="content">
    <div class="content_left">
	    <div class="content_left_header">For Restaurants </div>
	    <div class="content_left_title">
	      <div class="arrow"></div>
	      your menu online </div>
	    <div class="wrap">
	      <div class="content_left_info">When you join Menu Mogul you receive a profile page for your restaurant featuring your menu, daily specials, and coupons along with a custom URL to easily direct traffic to your page.</div>
	      <div class="content_left_image"><img src="images/for_rstrnts/sub.jpg" width="110" height="80" alt="Menu Mogul - For Restaurants" /></div>
        </div>
	    <div class="content_right_title">
	      <div class="arrow"></div>
	      update daily specials </div>
	    <div class="wrap">
	      <div class="content_right_image"><img src="images/for_rstrnts/burger.jpg" width="110" height="80" alt="Menu Mogul - For Restaurants" /></div>
	      <div class="content_right_info">It has never been easier to notify your customers about your Daily Specials. By simply updating your specials you post them on your profile and email them to your mailing list. No More Faxing. </div>
        </div>
	    <div class="content_left_title">
	      <div class="arrow"></div>
	      email list subscription</div>
	    <div class="wrap">
	      <div class="content_left_info">Your customers can subscribe by email to receive Daily Specials, Coupons, and Updates directly to their email or mobile phone. Our system has been carefully designed with your restaurant in mind.</div>
	      <div class="content_left_image"><img src="images/for_rstrnts/pizza.jpg" width="110" height="80" alt="Menu Mogul - For Restaurants" /></div>
        </div>
	    <div class="content_right_title">
	      <div class="arrow"></div>
	      the social network</div>
	    <div class="wrap">
	      <div class="content_right_image"><img src="images/for_rstrnts/hotdog.jpg" width="110" height="80" alt="Menu Mogul - For Restaurants" /></div>
	      <div class="content_right_info">Consumers have the ability to share your restaurant with over 500 million people on Social Platforms such as Facebook and Twitter. </div>
        </div>
    </div>
	  <div class="content_right">
	    <table width="100%">
	      <tr>
	        <td valign="top"><form method="post" enctype="multipart/form-data" >
	          <table width="469" border="0" cellspacing="0" cellpadding="0" align="center">
	            <tr>
	              <td colspan="2">Thank you for choosing Menu Mogul
	                
	                Please submit your information about your restaurant and be sure to fill in as much as possible. We will get back to you in 24-48 hours. If you want more information about listing your menu, be sure to check the more info box. </td>
                </tr>
	            <tr>
	              <td>Contact</td>
	              <td><input type="text" name="contact" /></td>
                </tr>
	            <tr>
	              <td width="228">Type of Restaurant</td>
	              <td width="218"><input type="text" name="category" /></td>
                </tr>
	            <tr>
	              <td>Name of Restaurant</td>
	              <td><input type="text" name="name" id="name" /></td>
                </tr>
	            <tr>
	              <td>Email Address</td>
	              <td><input type="text" name="email" /></td>
                </tr>
	            <tr>
	              <td>Address</td>
	              <td><input type="text" name="address" id="address" style="size:100px;" /></td>
                </tr>
	            <tr>
	              <td>City</td>
	              <td><input type="text" name="city" id="city" /></td>
                </tr>
	            <tr>
	              <td>State(initials)</td>
	              <td><input type="text" name="state" id="state" /></td>
                </tr>
	            <tr>
	              <td>Zip Code</td>
	              <td><input type="text" name="zip_code" /></td>
                </tr>
	            <tr>
	              <td>Phone</td>
	              <td><input type="text" name="phone" id="phone" /></td>
                </tr>
	            <tr>
	              <td>Fax</td>
	              <td><input type="text" name="fax" id="fax" /></td>
                </tr>
	            <tr>
	              <td>Hours</td>
	              <td><input type="text" name="hours" id="hours" /></td>
                </tr>
	            <tr>
	              <td>Dine-In</td>
	              <td>Yes:
	                <input type="checkbox" name="dine_in" value="yes" />
	                No:
	                <input type="checkbox" name="dine_in" value="no" /></td>
                </tr>
	            <tr>
	              <td>Take-Out</td>
	              <td>Yes:
	                <input type="checkbox" name="take_out" value="yes" />
	                No:
	                <input type="checkbox" name="take_out" value="no" /></td>
                </tr>
	            <tr>
	              <td>Delivery</td>
	              <td>Yes:
	                <input type="checkbox" name="delivery" value="yes" />
	                No:
	                <input type="checkbox" name="delivery" value="no" /></td>
                </tr>
	            <tr>
	              <td>Website</td>
	              <td><input type="text" name="domain" id="domain" /></td>
                </tr>
	            <tr>
	              <td>Logo or Picture of your place</td>
	              <td><input type="file" name="uploadedfile" id="uploadedfile" />
	                <i>Image must be under 1M</i></td>
                </tr>
	            <tr>
	              <td colspan="2"><i>If you would like more information about how to post your menu please check this box:</i>
	                <input type="checkbox" name="info" value="yes" /></td>
                </tr>
	            <tr>
	              <td>&nbsp;</td>
	              <td><input type="submit" name="upload_listing" id="upload_listing" value="Submit" />
	                <input name="email" type="hidden" id="info@menumogul.com" value="upload_listing" /></td>
                </tr>
              </table>
	          </form></td>
          </tr>
        </table>
      </div>
  </div>
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
