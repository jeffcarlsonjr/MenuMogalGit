
<div id="display_main_area">
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
  	<td width="24%" valign="top">
    <div id="left">
    <div class="left_nav">
      <div class="top_title">Most Frequented in
        <?=$city?>
        ,
        <?=$state?>
      </div>
      <div class="top_list1">
        <?php $query = customer_update_display($zip_id); ?>
        <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
        <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
          <?=$name?>
          </a><br />
        <?php } ?>
      </div>
      <div class="top_title">Recently Added in
        <?=$city?>
        ,
        <?=$state?>
      </div>
      <div class="top_list1">
        <?php $query = customer_recent_display($zip_id);?>
        <?php while ($result = mysql_fetch_array($query)){
			$name = $result['name'];
			$cust_id = $result['cust_id']; ?>
        <a href="menu.php?cust_id=<?=$cust_id?>&amp;zip_id=<?=$zip_id?>">
          <?=$name?>
          </a><br />
        <?php } ?>
      </div>
    </div>
    <div class="left_adspace">
      	 <div class="skyscraper_left"><script type="text/javascript">
		show_ban('left');
	</script>
    	</div>
 	 </div>
     
     </td>
    <td width="65%" valign="top">
    	<div id="display_content">
    		<div class="main_ad"><img src="admin/uploads_ads/<?=$feature1?>" /></div>
    

  		<div><?php $search = clean_input($_POST['search']);?> 
             <?php search_menu($search); ?></div> 
  
  		<div id="rest"></div>
        
  		
  </td>
    <td width="11%" valign="top"><div id="right">
      <div class="skyscraper_right"><script type="text/javascript">
		show_ban('right');
	</script></div>
    </div></td>
  </tr>
 </table>
</div>

