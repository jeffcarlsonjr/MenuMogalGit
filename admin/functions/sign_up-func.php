<?php 
	
//===================================================================
// upload new listings

		function upload_listing(){
			if (isset($_POST['upload_listing'])){
			
			$target = "admin/uploads/";
			$target = $target . basename($_FILES['uploadedfile']['name']);
			
			$contact	=	clean_input($_POST['contact']);
			$category	= 	clean_input($_POST['category']);
			$name		=	clean_input($_POST['name']);
			$email		=	clean_input($_POST['address']);	
			$address	=	clean_input($_POST['address']);
			$city		=	clean_input($_POST['city']);	
			$state		=	clean_input($_POST['state']);
			$zip_code	=	clean_input($_POST['zip_code']);	
			$phone		=	clean_input($_POST['phone']);
			$fax		=	clean_input($_POST['fax']);
			$hours		=	clean_input($_POST['hours']);
			$domain		=	clean_input($_POST['domain']);
			$pic		=	clean_input($_FILES['uploadedfile']['name']);
			$dine		= 	clean_input($_POST['dine_in']);
			$take		= 	clean_input($_POST['take_out']);
			$delivery	= 	clean_input($_POST['delivery']);
			$info		= 	clean_input($_POST['info']);
			$date		=	clean_input($_POST['date']);
			
			$query 		= "INSERT INTO sign_up (contact,category, name, email,address, city, state, zip_code,phone,fax, hours, domain, pic,dine_in,take_out,delivery,info,date) 
							VALUES ('$contact','$category','$name','$email','$address','$city','$state','$zip_code','$phone','$fax','$hours','$domain','$pic','$dine','$take','$delivery','$info', NOW() )";
			//echo $query;
			$result		= mysql_query($query) or die(mysql_error());
			
			if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target))
			{
				//redirect_to('admin.php');
				
				}
				
				else {
				
				//Gives and error if its not
				echo "Sorry, there was a problem uploading your file.";
				}
			
			return $result;
			}
			
			}



?>
