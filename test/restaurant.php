<?php session_start(); ?>
<?php include "header.php";?>


<?php 
if($_GET['page'] == 'city'){ include "city_page.php"; }
if($_GET['page'] == 'menu'){ include "menu.php"; }


?>


<?php include'footer.php';?>
