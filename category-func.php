<?php

//=====================================================================================================================================
// CATEGORY FUNCTIONS
//=====================================================================================================================================

//::KP This function will do a basic category call
function call_categories() {
			$xyquery = "SELECT * FROM categories";
			$xyresult = mysql_query($xyquery) or die(mysql_error());
			return $xyresult;
}
//=====================================================================================================================================

//::KP This function will call a specific category
function get_category() {

	$cat_id 	= $_GET['cat_id'];

	$xyquery 	= "SELECT * FROM categories WHERE cat_id ='$cat_id'";
	$xyresult 	= mysql_query($xyquery) or die(mysql_error());
	return $xyresult;

}

//=====================================================================================================================================

//::KP This function will insert a new category into the db
function add_category() {

	if(isset($_POST['addcategory'])){

		$cat_name 			= clean_input($_POST['cat_name']);
		$cat_desc_short 	= clean_input($_POST['cat_desc_short']);
		$cat_desc_long 		= clean_input($_POST['cat_desc_long']);
		$cat_parent_id 		= clean_input($_POST['cat_parent_id']);
		if(empty($_POST['cat_parent_id'])){$cat_parent_id		= "0";}
		$cat_url 			= clean_input($_POST['cat_url']);
		$cat_date 			= clean_input($_POST['cat_date']);
		$cat_mod 			= clean_input($_POST['cat_mod']);
		$page_template 		= clean_input($_POST['page_template']);
		$cat_mod_by 		= clean_input($_SESSION['userid']);
		$cat_meta_title 			= clean_input($_POST['cat_meta_title']);
		$cat_meta_keywords 			= clean_input($_POST['cat_meta_keywords']);
		$cat_meta_description 		= clean_input($_POST['cat_meta_description']);
		$insert_keywords	 		= clean_input($_POST['insert_keywords']);				

		$xyquery = "INSERT INTO categories (";

		if (!empty($cat_name)){$xyquery .= "cat_name ";}
		if (!empty($cat_desc_short)){$xyquery .= ",cat_desc_short ";}
		if (!empty($cat_desc_long)){$xyquery .= ",cat_desc_long ";}
		if (!empty($cat_parent_id)){$xyquery .= ",cat_parent_id";}
		if (empty($cat_parent_id)){$xyquery .= ",cat_parent_id";}
		if (!empty($cat_url)){$xyquery .= ",cat_url";}
		$xyquery .= ",cat_date";
		$xyquery .= ",cat_mod";
		$xyquery .= ",cat_mod_by";
		if (!empty($page_template)){$xyquery .= ",page_template";}
		if (!empty($cat_meta_title)){$xyquery .= ",cat_meta_title";}
		if (!empty($cat_meta_keywords)){$xyquery .= ",cat_meta_keywords";}
		if (!empty($cat_meta_description)){$xyquery .= ",cat_meta_description";}				

		$xyquery .= ") VALUES ( ";

		if (!empty($cat_name)){$xyquery .= "'$cat_name' ";}
		if (!empty($cat_desc_short)){$xyquery .= ",'$cat_desc_short' ";}
		if (!empty($cat_desc_long)){$xyquery .= ",'$cat_desc_long' ";}
		if (!empty($cat_parent_id)){$xyquery .= ",'$cat_parent_id' ";	}
		if (empty($cat_parent_id)){$xyquery .= ",'0' ";	}
		if (!empty($cat_url)){$xyquery .= ",'$cat_url' ";}
		$xyquery .= ",NOW() ";
		$xyquery .= ",NOW() ";
		$xyquery .= ",'$cat_mod_by' ";
		if (!empty($page_template)){$xyquery .= ",'$page_template' ";}
		if (!empty($cat_meta_title)){$xyquery .= ",'$cat_meta_title' ";}
		if (!empty($cat_meta_keywords)){$xyquery .= ",'$cat_meta_keywords' ";}
		if (!empty($cat_meta_description)){$xyquery .= ",'$cat_meta_description' ";}
		if (!empty($insert_keywords)){$xyquery .= ",'$insert_keywords' ";}				

		$xyquery .= " )";

		$xyresult = mysql_query($xyquery) or die(mysql_error());
		//echo "<center><h4>The category ".$cat_name." has been created!</h4></center>";

?>
<script>
$(document).ready(function() {
	$("<p>NOTICE:</p><p>The category <?= $cat_name;?> has been created.</p>").appendTo("#xyalert");
	$("#xyalert").fadeIn(200).delay(1500).fadeOut(200);
});
</script>
<?

		return $xyresult;
	}
}

//=====================================================================================================================================

//::KP This function will edit a specific product in a speciif category
function edit_category() {

	if(isset($_POST['editcategory'])){

		$cat_id				= clean_input($_GET['cat_id']);
		$cat_name 			= clean_input($_POST['cat_name']);
		$cat_desc_short 	= clean_input($_POST['cat_desc_short']);
		$cat_desc_long 		= clean_input($_POST['cat_desc_long']);
		$cat_parent_id 		= clean_input($_POST['cat_parent_id']);
		$cat_url 			= clean_input($_POST['cat_url']);
		$cat_date 			= clean_input($_POST['cat_date']);
		$cat_mod 			= clean_input($_POST['cat_mod']);
		$page_template 		= clean_input($_POST['page_template']);
		$cat_mod_by 		= clean_input($_SESSION['userid']);
		$cat_meta_title 			= clean_input($_POST['cat_meta_title']);
		$cat_meta_keywords 			= clean_input($_POST['cat_meta_keywords']);
		$cat_meta_description 		= clean_input($_POST['cat_meta_description']);
		$insert_keywords	 		= clean_input($_POST['insert_keywords']);			

		$xyquery = "UPDATE categories SET ";
		$xyquery .= "cat_name = '$cat_name',";
		$xyquery .= "cat_desc_short = '$cat_desc_short'";
		$xyquery .= ",cat_desc_long = '$cat_desc_long'";
		$xyquery .= ",cat_parent_id = '$cat_parent_id'";
		$xyquery .= ",cat_url = '$cat_url'";
		$xyquery .= ",cat_mod = '$cat_mod'";
		$xyquery .= ",cat_mod_by = '$cat_mod_by'";
		$xyquery .= ",page_template = '$page_template'";
		$xyquery .= ",cat_meta_title = '$cat_meta_title'";
		$xyquery .= ",cat_meta_keywords = '$cat_meta_keywords'";
		$xyquery .= ",cat_meta_description = '$cat_meta_description'";
		$xyquery .= ",insert_keywords = '$insert_keywords'";				
		$xyquery .= "WHERE cat_id = '$cat_id'";

		$xyresult = mysql_query($xyquery) or die(mysql_error());

		//echo "<center><h4>The category ".$cat_name." been edited!</h4></center>";
?>
<script>
$(document).ready(function() {
	$("<p>NOTICE:</p><p>The category <?= $cat_name;?> has been modified.</p>").appendTo("#xyalert");
	$("#xyalert").fadeIn(200).delay(1500).fadeOut(200);
});
</script>
<?
		return $xyresult;
	}
}

//=====================================================================================================================================
// Script to upload cat metas JC  

	function upload_metas(){
	
		$cat_id 			= clean_input($_POST['cat_id']);
		$cat_title 			= clean_input($_POST['cat_meta_title']);
		$cat_keywords 		= clean_input($_POST['cat_meta_keywords']);
		$cat_descriptions 	= clean_input($_POST['cat_meta_description']);
		
		if(isset($_POST['upload'])){
		
		$query = "INSERT INTO categories WHERE cat_id ='$cat_id' ";
		$result = mysql_query($query) or die(mysql_error());
		
		return $result;
		}
	}
	
//=====================================================================================================================================
// Script to show keywords for edit_category.php by taking the <h>'s through long_description and pulling them from their and echoing them on the page.JC 	
function h_keywords($cat_id){
	
		connect(); 
			$cp_id = clean_input($cat_id);
			
		
			//
			if(!empty($_GET['cat_id'])){ 
				$xyquery  = "SELECT cat_desc_long FROM categories WHERE cat_id = '$cp_id'";
				$xyresult = mysql_query($xyquery) or die(mysql_error());
				list($cat_desc_long)= mysql_fetch_row($xyresult);
				}
				
			$heading = $cat_desc_long;
			$heading2 = explode('<h2>',$heading);
			$heading2 = explode('</h2>', $heading2[1]);
			
				if(!empty($heading2[0])) echo ",".$heading2[0];
			$heading = $cat_desc_long;
			$heading3 = explode('<h1>',$heading);
			$heading3 = explode('</h1>', $heading3[1]);
			
				if(!empty($heading3[0])) echo ",".$heading3[0];
			$heading = $cat_desc_long;
			$heading4 = explode('<h3>',$heading);
			$heading4 = explode('</h3>', $heading4[1]);
			
				if(!empty($heading4[0])) echo ",".$heading4[0];	
				
		}	
?>
