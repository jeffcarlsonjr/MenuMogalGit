<?php require_once("../Connections/Lions.php"); ?>
<?php include("content/functions.php"); ?>
<?php

//This is the directory where images will be saved
$target = "uploads/";
$target = $target . basename( $_FILES['uploadedfile']['name']); 

//This gets all the other information from the form
$id=$_POST['id'];
$name=$_POST['name'];
$model=$_POST['model'];
$year=$_POST['year'];
$odometer=$_POST['odometer'];
$price=$_POST['price'];
$title=$_POST['title'];
$keywords=$_POST['keywords'];
$metadescription=$_POST['metadescription'];
$description=$_POST['description'];
$pic=($_FILES['uploadedfile']['name']);



mysql_select_db("handlionsdb") or die(mysql_error()) ;

//Writes the information to the database
mysql_query("INSERT INTO `sold cars` VALUES ('$id', '$name', '$model', '$year', '$odometer', '$price','$title','$keywords','$metadescription',  '$description','$pic')") ;

//Writes the photo to the server
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target))
{


redirect_to("display_sold.php");

}


else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
?> 

