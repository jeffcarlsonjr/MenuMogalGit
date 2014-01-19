<?php session_start();
if(!session_is_registered('urname')) {header('Location: index.php?loggedin=no');} 
?>

<?php require('../admin/functions/functions.php');
 connect(); 
 
 ?>
 <?php $user_id = $_SESSION['user_id']; ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul | Where You Find What To Eat</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"  />
<script src="https://www.google.com/jsapi?key=ABQIAAAADadku8u4YO8MKBhtMxDIRBSNg4pJGBdkVs8JwCO7BLHMIHCJchRle7TgN8lZpE1NGkQPuNZ7h8jgHA" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/menujava.js"></script>

</head>
