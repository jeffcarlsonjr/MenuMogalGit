<?php include'menu_header.php'; ?>
<div id="TOP_HEADER">
  <a onclick="javasciript: history.go(-1)"><div class="logo"></div></a>
  <div align="right" class="top"><a href="specials/index.php">Log In</a> | <a href="index.php">Change City</a></div>
  <div id="top_ad">
    <div class="leaderboard"><script type="text/javascript">
		show_ban('top');
	  </script></div>
  </div>
  <div class="menu_area">
    <a href="city_page.php?zip_id=<?=$zip_id?>"><div class="buttons">Home</div></a>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Downtown</div>
    <a href="sign_up.php?zip_id=<?=$zip_id?>"><div class="buttons">Sign Up</div></a>
  </div>
</div>
<div id="search_area">
  <div class="search_image"><img src="images/cuisine.png" alt="" width="125" height="25" /></div>
  <div class="search_cuisine">
  			
            
    		<form action="results.php?cat_id=<?=$cat_id?>&zip_id=<?=$zip_id?>" method="get">
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
  <div class="search_specific"><img src="images/entree.png" width="125" height="25" /></div>
  <div class="search_image_spec">
    <form method="post" >
      <input name="search" type="text" onclick="this.value='';" value="What are you craving?" maxlength="23" />
      <input type="submit" name="look" value="Search" />
    </form>
  </div>
</div>
<!-- Please do not change this area!! -->
<div id="display_main_area" style="min-height:400px;" >
<table class="table" align="center">
<tr>
	<td><?php show_image($cust_id); ?></td>
</tr>
</table>    



</div>

<?php include'footer.php';?>
