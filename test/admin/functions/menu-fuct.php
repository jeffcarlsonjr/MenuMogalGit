<?php
//==================================================================
// add menus

function menu_upload($cust_id){
	if(isset($_POST['menu_upload'])){
	$cust_id_fk = clean_input($_GET['cust_id']);
	$food		= clean_input($_POST['food']);
	$price		= clean_input($_POST['price']);
	$description = clean_input($_POST['description']);
	$type		= clean_input($_POST['type']);
	
	
	$query = "INSERT INTO menu (cust_id_fk, food, price, description, type) VALUE ('$cust_id_fk', '$food', '$price', '$description', '$type')";
	$result = mysql_query($query) or die(mysql_error());
	
	$query1  = "UPDATE customer SET update1=NOW() ";
	$result1 = mysql_query($query1) or die(mysql_error());
	
	return $result;
	
	}
	
	}
//==================================================================
// display by menus

function display_menu($cust_id){
	
	$query = "SELECT * FROM menu WHERE cust_id_fk='$cust_id'";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	
	}
//==================================================================
// display by menus_id

function display_menu_id($menu_id){
	
	$query = "SELECT * FROM menu WHERE menu_id='$menu_id'";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	
	}	
//==================================================================
// update menu

function update_menu($menu_id){
	
	if(isset($_POST['update'])){
		//$menu_id = clean_input($_['menu_id']);
		$type	 = clean_input($_POST['type']);
		$food	 = clean_input($_POST['food']);
		$price	 = clean_input($_POST['price']);
		$description	 = clean_input($_POST['description']);
		
		
		$query = "UPDATE menu SET type='$type', food='$food', price='$price', description='$description' WHERE menu_id='$menu_id' ";
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		
		$query1  = "UPDATE customer SET update1=NOW() ";
		$result1 = mysql_query($query1) or die(mysql_error());
		 
		
	return $result;
	
	}
	
}


//==================================================================
// add_subject

function add_subject(){
	
	if(isset($_POST['add_subject'])){
		
		$subjects = clean_input($_POST['subjects']);
		
		$query = "INSERT INTO subject (subjects) VALUES ('$subjects') ";
		$result = mysql_query($query) or die(mysql_error());
	
		return $result;
		
		}
	
	}
//==================================================================
// display_subjects
function display_subject(){
	
	$query = "SELECT * FROM subject";
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	
	}
	
	
//==================================================================
// display_subjects
function display_subject_id($type){
	//$type = $_POST['type'];
	
	$query = "SELECT DISTINCT subjects FROM subject WHERE sub_id='$type'";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($result)){
	
		$subjects = $row['subjects'];
		
		echo "<tr><td colspan=\"2\" style=\"font-size:20px; font-weight:bold;\" align=\"center\">" .$subjects. "</td></td>";
	}
	return $result;

}	
//==================================================================
// search menu 	
function search_menu($search){
	$search = clean_input($_POST['search']);	
	if(isset($_POST['look'])){
	
	$query1 = "SELECT cust_id_fk,food FROM menu WHERE food LIKE '%$search%' ";
	//echo $query1;
	$result1 = mysql_query($query1);
	while($row1 = mysql_fetch_array($result1)){
		$fud_id = $row1['cust_id_fk'];
		$food = $row1['food'];
		
		
	} ?>
    <?php 
	$zip_id = clean_input($_GET['zip_id']);
	$query = "SELECT * FROM customer WHERE cust_id='$fud_id' ";
	//echo $query;
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)){
		$cust_id	= $row['cust_id'];
		$name 		= $row['name'];
		$address 	= $row['address'];
		$city	 	= $row['city'];
		$pic 		= $row['pic']; ?>
		
     <table width="100%">
      <tr>
      <td align="left" width="100px">
      	<a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/">
      			<img src="<?php echo "admin/uploads/".$pic.""; ?>" alt="<?=$name?>" title="<?=$name?>" name="image_place" width="75" height="75" id="image_place" style="background-color: #CCCCCC" /></a></td>
      
      <td class="title" align="left" width="125px"><a href="menu/<?=stripped($name)?>/<?=$cust_id?>/<?=$zip_id?>/"><?=$name?></a></td>
      <td class="address" align="left" width="100px"><?=$address?></td><td class="address" align="left" width="75px"><?=$city?></td>
    </tr>
     
     </table>   
<?php  
	}
	}

}
?>