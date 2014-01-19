<?php 
	
	show_ads($zip_id); ?>
<?php $query = show_ads($zip_id);
	  while($result = mysql_fetch_array($query)){

	$top1 	= $result['top1'];
	$top2 	= $result['top2'];
	$top3 	= $result['top3'];
	$top4 	= $result['top4'];
	$top5 	= $result['top5'];
	
	$left1 	= $result['left1'];
	$left2 	= $result['left2'];
	$left3 =  $result['left3'];
	$left4 	= $result['left4'];
	$left5 	= $result['left5'];
	
	$right1	= $result['right1'];
	$right2	= $result['right2'];
	$right3 = $result['right3'];
	$right4	= $result['right4'];
	$right5	= $result['right5'];}
	
	?>