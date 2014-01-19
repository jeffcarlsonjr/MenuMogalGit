<?php include("admin/functions/functions.php");?>
<?php connect(); ?>

<?php 

$zip_id = clean_input($_GET['zip_id']);
$cat_id = clean_input($_GET['cat_id']);

//$zip_id = clean_input($_GET['zip_id']);

//$query = "SELECT DISTINCT customer.zip_id_fk, customer.cat_id_fk, customer.cust_id, categories.cat_id, categories.category 
			//FROM customer INNER JOIN categories ON customer.cat_id_fk=categories.cat_id WHERE customer.zip_id_fk='$zip_id' ";
 
		$query = "SELECT * FROM customer WHERE zip_id_fk = '$zip_id' AND cat_id_fk = '$cat_id' ";
		//echo $query;
		$result = mysql_query($query); ?>
         <table width="100%" cellspacing="2" cellpadding="3">
<?php		$inc = 0;
			while ($row = mysql_fetch_array($result)){
			$cat_id_fk	=	$row['cat_id_fk'];	
			$cust_id	=	$row['cust_id'];
			$name		=	$row['name'];
			$address	=	$row['address'];	
			$city		=	$row['city'];	
			$state		=	$row['state'];
			$zip_id_fk	=	$row['zip_id_fk'];	
			$phone		=	$row['phone'];
			$fax		=	$row['fax'];
			$hours		=	$row['hours'];
			$domain		=	$row['domain'];
			$pic		=	$row['pic'];
			$add_ca		=	$row['add_cat_id'];
			$add_zip	=	$row['add_zip_id'];
			$add_zip1	=   $row['add_zip1'];
			$menu		=	$row['menu'];
				?>


    <tr>
      <td align="left" width="100px"><a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/"><img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" align="left" width="125px"><a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/"><?=$name?></a></td><td class="address" align="left" width="100px"><?=$address?></td><td class="address" align="left" width="75px"><?=$city?></td>
    </tr>
	<?php $inc++;?>
    
    <?php } ?>



     
     
<?php 		$query1 = "SELECT * FROM customer WHERE add_zip_id = '$zip_id'  AND cat_id_fk='$cat_id' ";
			//echo $query;
			$result1 = mysql_query($query1); ?>
         <table width="100%" cellspacing="2" cellpadding="3">
<?php		$inc = 0;
			while ($row1 = mysql_fetch_array($result1)){
			$cat_id_fk1=	$row1['cat_id_fk'];	
			$cust_id1	=	$row1['cust_id'];
			$name1		=	$row1['name'];
			$address1	=	$row1['address'];	
			$city1		=	$row1['city'];	
			$state1		=	$row1['state'];
			$zip_id_fk1	=	$row1['zip_id_fk'];	
			$phone1		=	$row1['phone'];
			$fax1		=	$row1['fax'];
			$hours1		=	$row1['hours'];
			$domain1	=	$row1['domain'];
			$pic1		=	$row1['pic'];
			$add_ca		=	$row1['add_cat_id'];
			$add_zip1 	=	$row1['add_zip_id'];
			$add_zip11	=   $row1['add_zip1'];
			$menu1		=	$row1['menu']; 	
			?> 
    
    <tr>
      <td align="left" width="100px"><a href="menu/<?=stripped($name1)?>/<?=$cust_id1?>/<?=$zip_id?>/"><img src="<?php echo "admin/uploads/".$pic1.""; ?>" alt="<?=$name1?>" title="<?=$name1?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" align="left" width="125"><a href="menu/<?=stripped($name1)?>/<?=$cust_id1?>/<?=$zip_id?>/"><?=$name1?></a></td><td class="address" align="left" width="100px"><?=$address1?></td><td class="address" align="left" width="75px"><?=$city1?></td>
    </tr>  
     <?php $inc++;?> 
     <?php }?>
     
<?php 		$query2 = "SELECT * FROM customer WHERE add_zip1 = '$zip_id'  AND cat_id_fk='$cat_id' ";
			$query2 .=
			//echo $query;
			$result2 = mysql_query($query2); ?>
         <table width="100%" cellspacing="2" cellpadding="3">
<?php		$inc = 0;
			while ($row1 = mysql_fetch_array($result1)){
			$cat_id_fk2 =	$row2['cat_id_fk'];	
			$cust_id2	=	$row2['cust_id'];
			$name2		=	$row2['name'];
			$address2	=	$row2['address'];	
			$city2		=	$row2['city'];	
			$state2		=	$row2['state'];
			$zip_id_fk2	=	$row2['zip_id_fk'];	
			$phone2		=	$row2['phone'];
			$fax2		=	$row2['fax'];
			$hours2		=	$row2['hours'];
			$domain2	=	$row2['domain'];
			$pic2		=	$row2['pic'];
			$add_ca2	=	$row2['add_cat_id'];
			$add_zip2 	=	$row2['add_zip_id'];
			$add_zip12	=   $row2['add_zip1'];
			$menu2		=	$row2['menu']; 	
			?> 
    
    <tr>
      <td width="100px"><a href="menu/<?=stripped($name2)?>/<?=$cust_id2?>/<?=$zip_id?>/"><img src="<?php echo "admin/uploads/".$pic2.""; ?>" alt="<?=$name2?>" title="<?=$name2?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a>
      </td>
      <td class="title" width="125px"><a href="menu/<?=stripped($name2)?>/<?=$cust_id2?>/<?=$zip_id?>/"><?=$name2?></a></td><td class="address" align="left" width="100px"><?=$address2?></td><td class="address" width="75px"><?=$city2?></td>
    </tr>  
     <?php $inc++;?> 
     <? } ?>
       
 
</table>