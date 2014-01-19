<?php include("admin/functions/functions.php");?>
<?php connect();?>
<?php $zip_id = $_GET['zip_id']?>
<?php $cat_id = $_GET['cat_id']; ?>

 <script type="text/javascript"> 
 function showCats(str)
		{ 
			window.location="city_page.php?zip_id=<?=$zip_id?>&cat_id=<?=$cat_id?>";
		if (str=="<?php $cat_id = clean_input($_GET['cat_id']);?>")
		  {
		  document.getElementById("rest").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("rest").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","cust_ajax.php?zip_id=<?=$zip_id?>&cat_id="+str,true);
		xmlhttp.send();
		}
    </script>