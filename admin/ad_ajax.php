<?php session_start();?>
<?php include'functions/functions.php';
		connect();?>
<?php show_ads($zip_id);?>
<?php update_ads($zip_id); ?>

<?php 
$zip_id = clean_input($_GET['zip_id']);
$query = show_ads($zip_id);?>
<table width="100%" cellspacing="2" cellpadding="2" align="center">
<?php
$inc=0;
while ($results = mysql_fetch_array($query)){
	$id		= $results['id'];
	$top1 	= $results['top1'];
	$top2 	= $results['top2'];
	$top3 	= $results['top3'];
	$top4 	= $results['top4'];
	$top5 	= $results['top5'];
	
	$left1 	= $results['left1'];
	$left2 	= $results['left2'];
	$left3 	= $results['left3'];
	$left4 	= $results['left4'];
	$left5 	= $results['left5'];
	
	$right1	= $results['right1'];
	$right2	= $results['right2'];
	$right3 = $results['right3'];
	$right4	= $results['right4'];
	$right5	= $results['right5'];	?>
    
    
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="zip_id" value="<? $zip_id;?>"  />

<tr>
  <td>Top Ad:</td>
  <td></td>
  <td>&nbsp;</td>
  </tr>
<tr>
    <td><?php if (!empty($top1)){ echo  "<img src=\"uploads_ads/".$top1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
    <td><?php if (!empty($top2)){ echo  "<img src=\"uploads_ads/".$top2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
    <td><?php if (!empty($top3)){ echo  "<img src=\"uploads_ads/".$top3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
  </tr>
<tr>
	<td><input type="file" name="uploadedfile[]" size="17" value="<?=$top1?>" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$top2?>" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$top3?>" /></td>
</tr>
<tr>
    <td><?php if (!empty($top4)){ echo  "<img src=\"uploads_ads/".$top4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
    <td><?php if (!empty($top5)){ echo  "<img src=\"uploads_ads/".$top5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
    <td></td>
</tr>
<tr>
	<td><input type="file" name="uploadedfile[]" size="17" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" /></td>
    <td></td>

</tr>
<tr>
  <td>Left Ad:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td><?php if (!empty($left1)){ echo  "<img src=\"uploads_ads/".$left1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($left2)){ echo  "<img src=\"uploads_ads/".$left2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($left3)){ echo  "<img src=\"uploads_ads/".$left3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
</tr>
<tr>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$left1?>" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$left2?>" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$left3?>" /></td>
</tr>
<tr>
<td><?php if (!empty($left4)){ echo  "<img src=\"uploads_ads/".$left4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($left5)){ echo  "<img src=\"uploads_ads/".$left5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td></td>
</tr>

<tr>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$left4?>" /></td>
    <td><input type="file" name="uploadedfile[]" size="17" value="<?=$left5?>" /></td>
    <td>&nbsp;</td>
<tr>
  <td>Right Ad:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<tr>
<td><?php if (!empty($right1)){ echo  "<img src=\"uploads_ads/".$right1."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($right2)){ echo  "<img src=\"uploads_ads/".$right2."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($right3)){ echo  "<img src=\"uploads_ads/".$right3."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
</tr>
<tr>
  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right1?>" /></td>
  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right2?>" /></td>
  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right3?>" /></td>
  </tr>
  <tr>
<td><?php if (!empty($right4)){ echo  "<img src=\"uploads_ads/".$right4."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td><?php if (!empty($right5)){ echo  "<img src=\"uploads_ads/".$right5."\" width=\"50\" height=\"50\" border=\"1\" />" ;} ?></td>
<td></td>
</tr>
<tr>
  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right4?>" /></td>
  <td><input type="file" name="uploadedfile[]" size="17" value="<?=$right5?>" /></td>
  <td>&nbsp;</td>
<tr>
  <td><input type="submit" name="update_ads" value="Submit" /></td>
  <td>&nbsp;</td>
  <td>     </td>
  	
	
<?php $inc++; }?>
</tr></form>
</table>