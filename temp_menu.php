<?php include("admin/functions/functions.php");?>
<?php connect();?>
<?php $zip_id = $_GET['zip_id']?>
<?php show_ads($zip_id); ?>
<?php script($zip_id); ?>
<?php add_sub($cust_id); ?>
<?php display_menu($cust_id);?>
<?php display_subject_id($type);?>
<?php 	$cust_id = $_GET['cust_id'];
		$query = "SELECT name,zip_id_fk FROM customer WHERE cust_id = '$cust_id'";
		$result = mysql_query($query);
		//echo $zip_id;	?>
<?php 	
		while ($row = mysql_fetch_array($result)){
			$name		=	$row['name'];
			$zip_id_fk  =   $row['zip_id_fk'];}?>
      
<?php $query = display_zip_id($zip_id_fk);
	  while ($result = mysql_fetch_array($query)){
		  $city = $result['city']; 
		  $state = $result['state']; }	?>
<?php $query = "SELECT address FROM customer WHERE cust_id='$cust_id' ";
	  $result = mysql_query($query);
	  while($row = mysql_fetch_array($result)){
		  $address = $row['address'];
		  }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul, Where you find what to eat!</title>
<style type="text/css">
#WRAP {
	width: 1002px;
	margin-right: auto;
	margin-left: auto;
	overflow: visible;
	visibility: inherit;
	text-align: left;
}
#header {
	height: 168px;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/logo_final%20copy.png);
	background-position: left;
	background-repeat: no-repeat;
}
body {
	margin-top: 0px;
	background-image: url(images/final_bg.jpg);
	background-repeat: repeat;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: center;
}
#navigation {
	height: 70px;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
	background-image:
url(images/nav.jpg);
	background-repeat: repeat;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: ridge;
	border-left-style: solid;
	border-top-color: #9B242B;
	border-right-color: #9B242B;
	border-bottom-color: #9B242B;
	border-left-color: #9B242B;
	border-radius:10px;
	-moz-border-radius:10px; /* Firefox 3.6 and earlier */
	overflow: hidden;
}
#content {
	width: 1002px;
	overflow: auto;
}
#rt {
	float: right;
	width: 765px;
	overflow: auto;
	background-color: #FFF;
	margin-top: 5px;
	border-radius:10px;
-moz-border-radius:10px; /* Firefox 3.6 and earlier */
}
#right {
	float: right;
	height: 500px;
	width: 115px;
}
#feature {
	height: 240px;
	width: 650px;
	margin-right: auto;
	margin-left: auto;
	float: right;
}
#footer {
	width: 1002px;
	overflow: auto;
	margin-right: auto;
	margin-left: auto;
}
#left {
	float: left;
	height: 500px;
	width: 235px;
	margin-top: 5px;
}
#results {
	float: left;
	overflow: auto;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	width: 640px;
}
#toplinks a:link {
	color:#FFFFFF;
	text-decoration:none;
}
#toplinks a:visited {
	color:#FFFFFF;
	text-decoration:none;
}
#toplinks {
	color: #FFF;
	text-align: right;
	float: right;
	height: 18px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	width: 100%;
}
#skyscraper {
	float: right;
	height: 115px;
	width: 650px;
}
#navigationPH {
	float: right;
	height: 35px;
	width: 630px;
}
.button {
	height: 34px;
	width: 115px;
	float: left;
	margin-right: 5px;
	color: #FFF;
	text-align: center;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 18px;
	line-height: 32px;
	background-color: #AE292E;
	border-top-width: 1px;
	border-right-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-left-style: solid;
	border-top-color: #9B242B;
	border-right-color: #9B242B;
	border-bottom-color: #9B242B;
	border-left-color: #9B242B;
	-moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
	-moz-border-radius-topleft: 10px;
	border-top-left-radius: 10px;
}
#toplist {
	height: 245px;
	width: 225px;
	margin-right: auto;
	margin-left: auto;
	background-color: #FFF;
		border-radius:10px;
-moz-border-radius:10px; /* Firefox 3.6 and earlier */
}
#leftcontent {
	width: 225px;
	margin-right: auto;
	margin-left: auto;
	overflow: auto;
	background-color: #FFF;
	margin-top: 5px;
    border-radius:10px;
-moz-border-radius:10px; /* Firefox 3.6 and earlier */
}
.title {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	padding-top: 5px;
	padding-left: 5px;
}
.info {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	height: 95px;
	width: 200px;
	margin-right: auto;
	margin-left: auto;
}
#adcenter {
	height: 225px;
	width: 625px;
	margin-top: 8px;
	margin-right: auto;
	margin-left: auto;
	border: 1px dashed #CCC;
}
#adright {
	height: 468px;
	width: 90px;
	margin-top: 10px;
	margin-right: auto;
	margin-left: auto;
	border: 1px dashed #CCC;
	text-align: center;
}
#adleft {
	height: 228px;
	width: 210px;
	margin-right: auto;
	margin-left: auto;
	margin-top: 10px;
	margin-bottom: 10px;
	border: 1px dashed #CCC;
	text-align: center;
}
#adtop {
	height: 90px;
	width: 468px;
	margin-top: 10px;
	margin-right: auto;
	margin-left: auto;
	border: 1px dashed #CCC;
	text-align: center;
}
.searchtitle {
	float: left;
	width: 125px;
	margin-top: 20px;
	height: 25px;
	padding: 5px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #CCCCCC;
}
#keywordsearch {
	padding: 5px;
	height: 25px;
	width: 245px;
	float: left;
	margin-top: 20px;
}
#dropdownsearch {
	float: left;
	height: 25px;
	width: 150px;
	margin-top: 20px;
	padding: 5px;
}
#menuimage {
	float: left;
	height: 200px;
	width: 200px;
	margin-top: 18px;
	margin-left: 15px;
}
#menuinfo {
	float: right;
	width: 430px;
	margin-top: 18px;
}
</style>
</head>

<body>
<div id="WRAP">
  <div id="header">
    <div id="toplinks"><a href="http://www.menumogul.com/specials">sign in</a> | <a href="http://www.menumogul.com">change city</a></div>
    <div id="skyscraper">
      <div id="adtop"><script type="text/javascript">
		show_ban('top');
	</script></div>
    </div>
    <div id="navigationPH">
      <div id="navph">
        <div class="button">Home</div>
        <div class="button">Critique</div>
        <div class="button">Downtown</div>
        <div class="button">Coupons</div>
        <div class="button">Sign Up</div>
      </div>
    </div>
  </div>
<div id="navigation">
  <div class="searchtitle">Search Cuisine:</div>
  <div id="dropdownsearch">
<script type="text/javascript"> 
  function showCats(str)
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
  <div class="searchtitle">What Are You Craving?</div>
  <div id="keywordsearch">    <form method="post" >
      <input name="search" type="text" onclick="this.value='';" value="What are you craving?" maxlength="23" />
      <input type="submit" name="look" value="Search" />
    </form></div>
</div>
<div id="content">
  <div id="left">
    <div class="toplist" id="toplist">
      <div class="title"><span class="top_title">Most Frequented in
          <?=$city?>
,
<?=$state?>
      </span></div>
      <div class="info"><span class="top_list1">
      <?php $query = customer_update_display($zip_id); ?>
      <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
      <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
      <?=$name?>
      </a><br />
      <?php } ?>
      </span></div>
      <div class="title">Recently Added in
        <?=$city?>
        ,
        <?=$state?></div>
      <div class="info"><span class="top_list1">
      <?php $query = customer_recent_display($zip_id);?>
      <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
      <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
      <?=$name?>
      </a><br />
      <?php } ?>
      </span></div>
    </div>
    <div class="leftcontent" id="leftcontent">
      <div id="adleft"><script type="text/javascript">
		show_ban('left');
	</script></div>
    </div>
  </div>
  <div id="rt">
    <div id="right">
      <div id="adright"><script type="text/javascript">
		show_ban('right');
	</script></div>
    </div>
    <div id="feature">
      <div id="menuimage"><span class="image_place"><img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="200" height="200" id="image_place" style="background-color: #CCCCCC" /></span></div>
      <div id="menuinfo">
        <div class="menu_right">
          <div>
            <?=$name?>
          </div>
          <div>
            <table width="95%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><?=$address?></td>
              </tr>
              <tr>
                <td><?=$city?></td>
              </tr>
              <tr>
                <td><?=$phone?></td>
              </tr>
              <?php if($dine_in == 'yes'){?>
              <tr>
                <td>Dine In</td>
              </tr>
              <?php }?>
              <?php if($take_out == 'yes'){?>
              <tr>
                <td>Take Out</td>
              </tr>
              <?php } ?>
              <?php if($delivery == 'yes'){?>
              <tr>
                <td>We Deliver</td>
              </tr>
              <?php } ?>
              <tr>
                <td><div>
                  <?=$hours?>
                </div></td>
              </tr>
              <tr>
                <td><a href="redirect_ajax.php?cust_id=<?=$cust_id?>">
                  <?=$domain?>
                </a></td>
              </tr>
              <tr>
                <td><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                  <fb:like href="http://www.menumogul.com/menu.php?cust_id=<?=$cust_id?><?=$zip_id?>" show_faces="false" width="450" font=""></fb:like></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
     <div id="results">
       <table width="95%" align="center" cellpadding="0" cellspacing="0">
         <?php   
						$query = display_specials($cust_id);
						
						while($result = mysql_fetch_array($query)){
							
							$food = $result['food'];}?>
         <?php if(!empty($food)){  ?>
         <tr>
           <td><h2 align="center">Today's Specials</h2 >
             <hr width='85%' /></td>
         </tr>
         <tr>
           <td height="45"><table width="80%" align="center" cellpadding="0">
             <?php   
												$query = display_specials($cust_id);
												
												while($result = mysql_fetch_array($query)){
													$special_id = $result['special_id'];
													$food = $result['food'];
													$price = $result['price'];
													$description = $result['description']; ?>
             <tr>
               <td ><div class="items">
                 <?=$food?>
               </div></td>
               <td width="35%"align="right"><div class="items">
                 <?=$price?>
               </div></td>
             </tr>
             <tr>
               <td colspan="2"><div class="description">
                 <?=$description?>
               </div></td>
             </tr>
             <?   } ?>
           </table></td>
         </tr>
         <?php }?>
         <?php //} ?>
         <tr>
           <td><table width="85%" cellspacing="0" cellpadding="0" align="center">
             <tr>
               <td colspan="2"><h2 align="center">Menu</h2>
                 <hr /></td>
             </tr>
             <?php $query =  display_menu($cust_id);?>
             <?php while ($result = mysql_fetch_array($query)){
                                        $menu_id	= $result['menu_id'];		
                                        $type		= $result['type'];
                                        $food 		= $result['food'];
                                        $price 		= $result['price'];
                                        $description = $result['description'];?>
             <?php if(!empty($food)){?>
             <input type="hidden" name="type" value="<?=$type?>" />
             <?php if($type != '1'){ display_subject_id($type);}?>
             <tr>
               <td><div class="items">
                 <?=$food?>
               </div></td>
               <td width="35%" align="right"><div class="items">
                 <?=$price?>
               </div></td>
             </tr>
             <tr>
               <td colspan="2"><div class="description">
                 <?=$description?>
               </div></td>
             </tr>
             <?php } ?>
             <?php } ?>
           </table></td>
         </tr>
         <?php if(empty($food)) {?>
         <tr>
           <td><h3 align="center"><i>Menu Coming Soon</i></h3></td>
           <?php } ?>
         </tr>
       </table>
     </div> 
  </div>
</div>
</div>
<div id="footer">Menu Mogul &copy;2011</div>
</body>
</html>
