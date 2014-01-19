<?php  
//===================================================================
// add ads
function add_ads(){
	if(isset($_POST['add_ads'])){
	
	$target = "uploads_ads/";
	$target1 = $target . basename($_FILES['uploadedfile']['name'] [0]);
	$target2 = $target . basename($_FILES['uploadedfile']['name'] [1]);
	$target3 = $target . basename($_FILES['uploadedfile']['name'] [2]);
	$target4 = $target . basename($_FILES['uploadedfile']['name'] [3]);
	$target5 = $target . basename($_FILES['uploadedfile']['name'] [4]);
	$target6 = $target . basename($_FILES['uploadedfile']['name'] [5]);
	$target7 = $target . basename($_FILES['uploadedfile']['name'] [6]);
	$target8 = $target . basename($_FILES['uploadedfile']['name'] [7]);
	$target9 = $target . basename($_FILES['uploadedfile']['name'] [8]);
	$target10 = $target . basename($_FILES['uploadedfile']['name'] [9]);
	$target11 = $target . basename($_FILES['uploadedfile']['name'] [10]);
	$target12 = $target . basename($_FILES['uploadedfile']['name'] [11]);
	$target13 = $target . basename($_FILES['uploadedfile']['name'] [12]);
	$target14 = $target . basename($_FILES['uploadedfile']['name'] [13]);
	$target15 = $target . basename($_FILES['uploadedfile']['name'] [14]);
	
	$zip_id = clean_input($_POST['zip_id']);	
	$top1 	= clean_input($_FILES['file']['name'] [0]);
	$top2 	= clean_input($_FILES['file']['name'] [1]);
	$top3 	= clean_input($_FILES['file']['name'] [2]);
	$top4 	= clean_input($_FILES['file']['name'] [3]);
	$top5 	= clean_input($_FILES['file']['name'] [4]);
	
	$left1 	= clean_input($_FILES['file']['name'] [5]);
	$left2 	= clean_input($_FILES['file']['name'] [6]);
	$left3 	= clean_input($_FILES['file']['name'] [7]);
	$left4 	= clean_input($_FILES['file']['name'] [8]);
	$left5 	= clean_input($_FILES['file']['name'] [9]);
	
	$right1	= clean_input($_FILES['file']['name'] [10]);
	$right2	= clean_input($_FILES['file']['name'] [11]);
	$right3 = clean_input($_FILES['file']['name'] [12]);
	$right4	= clean_input($_FILES['file']['name'] [13]);
	$right5	= clean_input($_FILES['file']['name'] [14]);	
	$date = clean_input($_POST['date']);
	
	$query = "INSERT INTO ads (id,zip_id_fk,top1,top2,top3,top4,top5,left1,left2,left3,left4,left5,right1,right2,right3,right4,right5,date) 
				VALUES ('','$zip_id','$top1','$top2','$top3','$top4','$top5','$left1','$left2','$left3','$left4','$left5','$right1','$right2','$right3','$right4','$right5', NOW() ) ";
	echo $query;
	//$result = mysql_query($query) or die (mysql_error());
	
	
	return $result;
	$file1 = ($_FILES['uploadedfile']['name'] [0]);
	$file2 = ($_FILES['uploadedfile']['name'] [1]);
	$file3 = ($_FILES['uploadedfile']['name'] [2]);
	$file4 = ($_FILES['uploadedfile']['name'] [3]);
	$file5 = ($_FILES['uploadedfile']['name'] [4]);
	$file6 = ($_FILES['uploadedfile']['name'] [5]);
	$file7 = ($_FILES['uploadedfile']['name'] [6]);
	$file8 = ($_FILES['uploadedfile']['name'] [7]);
	$file9 = ($_FILES['uploadedfile']['name'] [8]);
	$file10 = ($_FILES['uploadedfile']['name'] [9]);
	$file11 = ($_FILES['uploadedfile']['name'] [10]);
	$file12 = ($_FILES['uploadedfile']['name'] [11]);
	$file13 = ($_FILES['uploadedfile']['name'] [12]);
	$file14 = ($_FILES['uploadedfile']['name'] [13]);
	$file15 = ($_FILES['uploadedfile']['name'] [14]);

	
	
	if (move_uploaded_file($file1 && $file2 && $file3 && $file4 && $file5 && $file6 && $file7 && $file8 && $file9 && $file10 && $file11 && $file12 && $file13 && $file14 && $file15,$target))
	{
		//redirect_to('admin.php');
		
		}
		
		else {
		
		//Gives and error if its not
		echo "Sorry, there was a problem uploading your file.";
		}
	
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



?>
