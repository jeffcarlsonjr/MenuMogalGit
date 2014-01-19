<?php $xyresult	= call_categories(); ?>
<div id="title-header"><div id="title-text">Current Categories</div></div>	
<div id="large-content">
<?php
//::KP Fetches Results
while ($row = mysql_fetch_array($xyresult)){
	$menu_array[$row['cat_id']] = array('name' => $row['cat_name'],'parent' => $row['cat_parent_id'],'rowid' => $row['cat_id']);
}

//::KP  function that prints categories as a nested html unorderd list
function generate_menu($parent){
	$has_childs = false;
	//::KP this prevents printing 'ul' if we don't have subcategories for this category
	global $menu_array;
	//::KP use global array variable instead of a local variable to lower stack memory requierment
	$inc=1;
	foreach($menu_array as $key => $value) {
		if ($value['parent'] == $parent){       
			//::KP if this is the first child print '<ul>'                       
			if ($has_childs === false){
				//::KP don't print '<ul>' multiple times                             
				$has_childs = true;
				echo '<ul>';
			}
			if($inc != 1 && $value['parent'] == "0"){ echo '</div> <div id ="category-header"><a href="javascript:categorydisplay(\'option'.$inc.'\')">';}
			if($inc == 1 && $value['parent'] == "0"){ echo '<div id ="category-header"><a href="javascript:categorydisplay(\'option'.$inc.'\')">';}

			if ($value['parent'] != "0"){echo '<li>'. $value['name'] .' - <a href="categories.php?action=edit&cat_id='.$value['rowid'].'">edit</a>';}
			if ($value['parent'] == "0"){echo $value['name']."</a><small><small> - <a href='categories.php?action=edit&cat_id=".$value['rowid']."'>edit</a></small></small></div><br /><div class='hide' id='option$inc'>";}

			if ($value['parent'] == "0"){$inc++;}

			generate_menu($key);
			//::KP call function again to generate nested list for subcategories belonging to this category
			echo '</li>';
		}
	}

	if ($has_childs === true) echo '</ul>';
}
//::KP generate menu starting with parent categories (that have a 0 parent)
generate_menu(0);

?>
</div>