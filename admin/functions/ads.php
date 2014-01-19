<?php  
//===================================================================
// add ads
function add_ads(){
if(isset($_POST['add_ads'])){
	$destpath = "uploads_ads/" ;
		while(list($key,$value) = each($_FILES["uploadedfile"]["name"])) {
		
		if(!empty($value)){
		if ($_FILES["uploadedfile"]["error"][$key] > 0) {
		echo "Error: " . $_FILES["uploadedfile"]["error"][$key] . "<br/>" ;
		}		
		else {
		$source = $_FILES["uploadedfile"]["tmp_name"][$key] ;
		$filename = $_FILES["uploadedfile"]["name"][$key] ;
		move_uploaded_file($source, $destpath . $filename) ;?>
		<script>
        alert("<?php echo "Uploaded: " . $destpath . $filename ;?>");
		</script>
        <?
		}
		}
		}

	$zip_id = clean_input($_GET['zip_id']);	
	$top1 	= clean_input($_FILES['uploadedfile']['name'] [0]);
	$top2 	= clean_input($_FILES['uploadedfile']['name'] [1]);
	$top3 	= clean_input($_FILES['uploadedfile']['name'] [2]);
	$top4 	= clean_input($_FILES['uploadedfile']['name'] [3]);
	$top5 	= clean_input($_FILES['uploadedfile']['name'] [4]);
	
	$left1 	= clean_input($_FILES['uploadedfile']['name'] [5]);
	$left2 	= clean_input($_FILES['uploadedfile']['name'] [6]);
	$left3 	= clean_input($_FILES['uploadedfile']['name'] [7]);
	$left4 	= clean_input($_FILES['uploadedfile']['name'] [8]);
	$left5 	= clean_input($_FILES['uploadedfile']['name'] [9]);
	
	$right1	= clean_input($_FILES['uploadedfile']['name'] [10]);
	$right2	= clean_input($_FILES['uploadedfile']['name'] [11]);
	$right3 = clean_input($_FILES['uploadedfile']['name'] [12]);
	$right4	= clean_input($_FILES['uploadedfile']['name'] [13]);
	$right5	= clean_input($_FILES['uploadedfile']['name'] [14]);
	
	$web1	= clean_input($_POST['web1']);
	$web2	= clean_input($_POST['web2']);
	$web3	= clean_input($_POST['web3']);
	$web4	= clean_input($_POST['web4']);
	$web5	= clean_input($_POST['web5']);
	$web6	= clean_input($_POST['web6']);
	$web7	= clean_input($_POST['web7']);
	$web8	= clean_input($_POST['web8']);
	$web9	= clean_input($_POST['web9']);
	$web10	= clean_input($_POST['web10']);
	$web11	= clean_input($_POST['web11']);
	$web12	= clean_input($_POST['web12']);
	$web13	= clean_input($_POST['web13']);
	$web14	= clean_input($_POST['web14']);
	$web15	= clean_input($_POST['web15']);
	$web16	= clean_input($_POST['web16']);
	$web17	= clean_input($_POST['web17']);
	$web18	= clean_input($_POST['web18']);
	$web19	= clean_input($_POST['web19']);
	$web20	= clean_input($_POST['web20']);
	
	$feature1 = clean_input($_FILES['uploadedfile']['name'] [15]);
	$feature2 = clean_input($_FILES['uploadedfile']['name'] [16]);
	$feature3 = clean_input($_FILES['uploadedfile']['name'] [17]);
	$feature4 = clean_input($_FILES['uploadedfile']['name'] [18]);
	$feature5 = clean_input($_FILES['uploadedfile']['name'] [19]);
	
	
	
	$date = clean_input($_POST['date']);
	
	$query = "INSERT INTO ads (zip_id_fk,top1,top2,top3,top4,top5,left1,left2,left3,left4,left5,right1,right2,right3,right4,right5,web1,web2,web3,web4,web5,web6,web7,web8,web9,web10,
							   web11,web12,web13,web14,web15,web16,web17,web18,web19,web20,feature1,feature2,feature3,feature4,feature5, date) 
				VALUES ('$zip_id','$top1','$top2','$top3','$top4','$top5','$left1','$left2','$left3','$left4','$left5','$right1','$right2','$right3','$right4','$right5','$web1','$web2','$web3','$web4','$web5',
						'$web6','$web7','$web8','$web9','$web10','$web11','$web12','$web13','$web14','$web15','$web16','$web17','$web18','$web19','$web20','$feature1','$feature2','$feature3','$feature4','$feature5', NOW() ) ";
	//echo $query;
	$result = mysql_query($query) or die (mysql_error());
	
	return $result;
	
 		}
	}
//====================================================================================================
// show ads
function show_ads($zip_id){
	$zip_id = clean_input($_GET['zip_id']);
	
	$query = "SELECT * FROM ads WHERE zip_id_fk='$zip_id' ";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	
	return $result;
	
	}

//===================================================================
// add ads
function update_ads($zip_id){
	$zip_id = $_GET['zip_id'];
	
	if(isset($_POST['update_ads'])){
	
	$destpath = "uploads_ads/" ;
		while(list($key,$value) = each($_FILES["uploadedfile"]["name"])) {
		
		if(!empty($value)){
		if ($_FILES["uploadedfile"]["error"][$key] > 0) {
		echo "Error: " . $_FILES["uploadedfile"]["error"][$key] . "<br/>" ;
		}		
		else {
		$source = $_FILES["uploadedfile"]["tmp_name"][$key] ;
		$filename = $_FILES["uploadedfile"]["name"][$key] ;
		move_uploaded_file($source, $destpath . $filename) ;?>
        <script>
		alert("<?php echo "Uploaded: " . $destpath . $filename ;?>");
		</script>
	<?	//echo "Uploaded: " . $destpath . $filename . "<br/>" ;
		}
		}
		}

	
	
	$top1 	= clean_input($_FILES['uploadedfile']['name'] [0]);
	$top2 	= clean_input($_FILES['uploadedfile']['name'] [1]);
	$top3 	= clean_input($_FILES['uploadedfile']['name'] [2]);
	$top4 	= clean_input($_FILES['uploadedfile']['name'] [3]);
	$top5 	= clean_input($_FILES['uploadedfile']['name'] [4]);
	
	$left1 	= clean_input($_FILES['uploadedfile']['name'] [5]);
	$left2 	= clean_input($_FILES['uploadedfile']['name'] [6]);
	$left3 	= clean_input($_FILES['uploadedfile']['name'] [7]);
	$left4 	= clean_input($_FILES['uploadedfile']['name'] [8]);
	$left5 	= clean_input($_FILES['uploadedfile']['name'] [9]);
	
	$right1	= clean_input($_FILES['uploadedfile']['name'] [10]);
	$right2	= clean_input($_FILES['uploadedfile']['name'] [11]);
	$right3 = clean_input($_FILES['uploadedfile']['name'] [12]);
	$right4	= clean_input($_FILES['uploadedfile']['name'] [13]);
	$right5	= clean_input($_FILES['uploadedfile']['name'] [14]);
	$web1	= clean_input($_POST['web1']);
	$web2	= clean_input($_POST['web2']);
	$web3	= clean_input($_POST['web3']);
	$web4	= clean_input($_POST['web4']);
	$web5	= clean_input($_POST['web5']);
	$web6	= clean_input($_POST['web6']);
	$web7	= clean_input($_POST['web7']);
	$web8	= clean_input($_POST['web8']);
	$web9	= clean_input($_POST['web9']);
	$web10	= clean_input($_POST['web10']);
	$web11	= clean_input($_POST['web11']);
	$web12	= clean_input($_POST['web12']);
	$web13	= clean_input($_POST['web13']);
	$web14	= clean_input($_POST['web14']);
	$web15	= clean_input($_POST['web15']);
	$web16	= clean_input($_POST['web16']);
	$web17	= clean_input($_POST['web17']);
	$web18	= clean_input($_POST['web18']);
	$web19	= clean_input($_POST['web19']);
	$web20	= clean_input($_POST['web20']);
	
	$feature1 = clean_input($_FILES['uploadedfile']['name'] [15]);
	$feature2 = clean_input($_FILES['uploadedfile']['name'] [16]);
	$feature3 = clean_input($_FILES['uploadedfile']['name'] [17]);
	$feature4 = clean_input($_FILES['uploadedfile']['name'] [18]);
	$feature5 = clean_input($_FILES['uploadedfile']['name'] [19]);
	$date = clean_input($_POST['date']);
	
	$query = "UPDATE ads SET ";
	if(!empty($top1)){ $query .= "top1='$top1', ";}
	if(!empty($top2)){ $query .= "top2='$top2', ";}
	if(!empty($top3)){ $query .= "top3='$top3', ";}
	if(!empty($top4)){ $query .= "top1='$top4', ";}
	if(!empty($top5)){ $query .= "top1='$top5', ";}
	if(!empty($left1)){ $query .= "left1='$left1', ";}
	if(!empty($left2)){ $query .= "left2='$left2', ";}
	if(!empty($left3)){ $query .= "left3='$left3', ";}
	if(!empty($left4)){ $query .= "left4='$left4', ";}
	if(!empty($left5)){ $query .= "left5='$left5', ";}
	if(!empty($right1)){ $query .= "right1='$right1', ";}
	if(!empty($right2)){ $query .= "right2='$right2', ";}
	if(!empty($right3)){ $query .= "right3='$right3', ";}
	if(!empty($right4)){ $query .= "right4='$right4', ";}
	if(!empty($right5)){ $query .= "right5='$right5', ";}
	
	if(!empty($web1)){ $query .= "web1='$web1', ";}
	if(!empty($web2)){ $query .= "web2='$web2', ";}
	if(!empty($web3)){ $query .= "web3='$web3', ";}
	if(!empty($web4)){ $query .= "web4='$web4', ";}
	if(!empty($web5)){ $query .= "web5='$web5', ";}
	if(!empty($web6)){ $query .= "web6='$web6', ";}
	if(!empty($web7)){ $query .= "web7='$web7', ";}
	if(!empty($web8)){ $query .= "web8='$web8', ";}
	if(!empty($web9)){ $query .= "web9='$web9', ";}
	if(!empty($web10)){ $query .= "web10='$web10', ";}
	if(!empty($web11)){ $query .= "web11='$web11', ";}
	if(!empty($web12)){ $query .= "web12='$web12', ";}
	if(!empty($web13)){ $query .= "web13='$web13', ";}
	if(!empty($web14)){ $query .= "web14='$web14', ";}
	if(!empty($web15)){ $query .= "web15='$web15', ";}
	if(!empty($web16)){ $query .= "web16='$web16', ";}
	if(!empty($web17)){ $query .= "web17='$web17', ";}
	if(!empty($web18)){ $query .= "web18='$web18', ";}
	if(!empty($web19)){ $query .= "web19='$web19', ";}
	if(!empty($web20)){ $query .= "web20='$web20', ";}
	
	if(!empty($feature1)){ $query .= "feature1='$feature1', ";}
	if(!empty($feature2)){ $query .= "feature2='$feature2', ";}
	if(!empty($feature3)){ $query .= "feature3='$feature3', ";}
	if(!empty($feature4)){ $query .= "feature4='$feature4', ";}
	if(!empty($feature5)){ $query .= "feature5='$feature5', ";}
	
	$query .= "date= NOW()";
	$query .= "WHERE zip_id_fk = '$zip_id'  ";
	
	//echo $query;
	$result = mysql_query($query) or die (mysql_error());
	
	
	return $result;
	
	
 		}
	}

?>
