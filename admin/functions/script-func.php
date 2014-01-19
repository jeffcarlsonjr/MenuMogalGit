<?php
function script($zip_id){
	$zip_id = clean_input($_GET['zip_id']);
	show_ads($zip_id);
	$query = show_ads($zip_id);
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
	$right5	= $result['right5'];
	
	$web1	= $result['web1'];
	$web2	= $result['web2'];
	$web3	= $result['web3'];
	$web4	= $result['web4'];
	$web5	= $result['web5'];
	
	$web6	= $result['web6'];
	$web7	= $result['web7'];
	$web8	= $result['web8'];
	$web9	= $result['web9'];
	$web10	= $result['web10'];
	
	$web11	= $result['web11'];
	$web12	= $result['web12'];
	$web13	= $result['web13'];
	$web14	= $result['web14'];
	$web15	= $result['web15'];
	
	$web16	= $result['web16'];
	$web17	= $result['web17'];
	$web18	= $result['web18'];
	$web19	= $result['web19'];
	$web20	= $result['web20'];
	
	$feature1 = $result['feature1'];
	$feature2 = $result['feature2'];
	$feature3 = $result['feature3'];
	$feature4 = $result['feature4'];
	$feature5 = $result['feature5'];
	
	}
	
	
	?>
	
	<script>

var settings = {
	
	'force_size':			0,         		// 	if set to 1 all ban will be resized to the width and height in the next to settings
	'img_width':			468,			//	width to resize all ban to, only takes effect if above is 1
	'img_height':			60, 			// 	height to resize all ban to, only takes effect if above is 1
	
	'refresh_time':			4000,			//	the seconds between refreshs of the ban - use 0 to disable
	'refresh_max':			100,				//	maximum number of refreshs on each page load
	
	'duplicate_ban':	0,				//	keep as 0 to make sure the same ban won't show on the same page. will only take effect
											//  if show_ban(); is used more than once. You must make sure you have enough ban to fill
											//  all the slots else the browser may freeze or give a stack overflow error
	
	'location_prefix': 		'adLocation-',	//	The prefix of the IDs of the <div> which wraps the ban - this div is generated dynamically.
											//  a number will be added on the end of this string. adLocation- was used by default before version 1.4.x
											
	'location_class':		'swb',			//  A class to add to all of the <div>s which wrap the ban, ideal to use for styling ban - use .swb img in your CSS	
	
	'window': 				'_blank',		//	Window to open links in, _self = current, _blank = new. Use _top if in a frame!		
	
	'default_ad_loc':		'default'		//	The default adLocation. This is assigned to any ban not given an adLocation in the below ban list
											//  There is no real reason to need to change this
}


var ban = [
	new ban('',				'<?=$web1;?>', 	'admin/uploads_ads/<?=$top1;?>', 	'30/04/2019',	'top'),
	new ban('',				'<?=$web2?>', 	'admin/uploads_ads/<?=$top2;?>',		'10/04/2019',	'top'),
	new ban('', 			'<?=$web3?>', 	'admin/uploads_ads/<?=$top3;?>',		'30/04/2019',	'top'),
	new ban('', 			'<?=$web6?>', 	'admin/uploads_ads/<?=$left1;?>', 	'10/04/2019',	'left'),
	new ban('', 			'<?=$web7?>', 	'admin/uploads_ads/<?=$left2;?>', 	'30/04/2019',	'left'),
	new ban('',				'<?=$web8?>',	'admin/uploads_ads/<?=$left3;?>',		'30/04/2019',	'left'),
	new ban('',				'<?=$web16?>',	'admin/uploads_ads/<?=$feature1;?>',		'30/04/2019',	'featured'),
	new ban('',				'<?=$web17?>',	'admin/uploads_ads/<?=$feature2;?>',		'30/04/2019',	'featured'),
	new ban('',				'<?=$web18?>',	'admin/uploads_ads/<?=$feature3;?>',		'30/04/2019',	'featured'),
	new ban('',				'<?=$web11?>',	'admin/uploads_ads/<?php if(!empty($right1)){ echo $right1;}?>',		'30/04/2019',	'right'),
	new ban('',				'<?=$web12?>',	'admin/uploads_ads/<?php if(!empty($right2)){ echo $right2;}?>',		'30/04/2019',	'right'),
	new ban('',				'<?=$web13?>',	'admin/uploads_ads/<?php if(!empty($right3)){ echo $right3;}?>',		'30/04/2019',	'right')
	
	
	
	
	
	]

//         				There is no need to edit below here
///////////////////////////////////////////////////////////////////////////////////

/*****
"global" vars
*****/
var used				= 0;
var location_counter	= 0;
var refresh_counter 	= 1;
var map 				= new Array();


/*************
	function ban()
	creates a ban object
*************/
function ban(name, url, image, date, loc)
{
	this.name	= name;
	this.url	= url;
	this.image	= image;
	this.date	= date;
	this.active = 0;
	this.oid = 0;
	
	// if no adlocation is given use the default a adlocation setting
	// this is used if adlocations aren't being used or using pre-1.4.x code
	if(loc != '')
	{
		this.loc = loc;
	}
	else
	{
		this.loc = settings.default_ad_loc;
	}
}


/*************
	function show_ban()
	writes ban <div> HTML and maps ad locations to <div> ID tags
*************/
function show_ban(ban_location)
{
	// increase the counter ready for further calls
	location_counter = location_counter + 1;

	// this part maps the adlocation name supplied by the user to the adlocation
	// ID used by the script
	if(ban_location != '' && ban_location != undefined)
	{
		map[location_counter] = ban_location;
	}
	else
	{
		map[location_counter] = settings.default_ad_loc;
	}

	// writes ban html
	var html = '<div id="' + settings.location_prefix + location_counter + '" class="' + settings.location_class + '"></div>';
	document.write(html);
	// calls the display ban script to fill this ad location
	display_ban(location_counter);
	
}



/*************
	function display_ban()
	displays ban for a given location number
*************/
function display_ban(location)
{
	// used in this function to hold tempoary copy of ban array
	var location_ban	= new Array();
	
	// if no location is given, do nothing
	if(location == '' || !location || location < 0)
	{
		return;
	}
	
	// get total ban
	var am	= ban.length;
	
	// all ban have been displayed in this pass and the user doesnt
	// want to have duplicate ban showing
	if((am == used) && settings.duplicate_ban == 0) {
		return;
	}

	// new for 1.4.x, this takes the list of ban and creates a tempoary list
	// with only the ban for the current adlocation in
	for(i = 0; i < (ban.length); i++)
	{
		ban[i].oid = i;
		if((ban[i].loc == map[location]) && (ban[i].active == 1))
		{
			location_ban.push(ban[i]);
		}
	}

	// same as 1.2.x - finds the ban randomly
	var rand	= Math.floor(Math.random()*location_ban.length);	
	var bn 		= location_ban[rand];
	
	// creates html
	var image_size 	= (settings.force_size == 1) ? ' width="' + settings.img_width + '" height="' + settings.img_height + '"' : '';
	var html 		= '<a href="' + bn.url + '" title="' + bn.name + '" target="' + settings.window + '"><img border="0" src="' + bn.image + '"' + image_size + ' alt="' + bn.name + '" /></a>';
	
	// calculates the date from inputted string, expected formate is DD/MM/YYYY
	var now		= new Date(); 
	var input	= bn.date;
	input		= input.split('/', 3);
	
	// creates a date object with info
	var end_date	= new Date();
	end_date.setFullYear(parseInt(input[2]), parseInt(input[1]) - 1, parseInt(input[0]));
	
	// compares curent date with ban end date
	if((now < end_date) && bn.active == 1) 
	{
		// attempt to find adlocation div
		var location_element = document.getElementById(settings.location_prefix + location);
		
		// couldn't find it, if this message shows there is a problem with show_ban
		if(location_element == null)
		{
			alert('spyka Webmaster ban rotator\nError: adLocation doesn\'t exist!');
		}
		// output ban HTML
		else
		{
			location_element.innerHTML = html;
			
			// if the user doesn't want the same ban to show again deactive it and increase
			// the users ban counter
			if(settings.duplicate_ban == 0)
			{
				ban[bn.oid].active = 0;
				used++;
			}
			return;
		}
	}
	else
	{
		// inactive ban, find another
		// if no ban fit this adlocation you'll have an endless loop !
		display_ban(location);
	}
	return;
}



/*************
	function refresh_ban()
	resets counters and active settings
*************/
function refresh_ban()
{
	if((refresh_counter == settings.refresh_max) || settings.refresh_time < 1)
	{
		clearInterval(ban_refresh);  
	}
	used = 0;
	for(j = 0; j < (ban.length); j++)
	{
		ban[j].active = 1;
	}

	for(j = 1; j < (location_counter+1); j++)
	{
		display_ban(j);
	}
	refresh_counter++;
}



// set timeout
var ban_refresh = window.setInterval(refresh_ban, settings.refresh_time);
</script>


	

<?php }	?>