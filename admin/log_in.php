<?php include('../functions/functions.php'); 
 connect(); 
 checklogin(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul | Where You Find What To Eat</title>
<link href="../css/stylesheet.css" rel="stylesheet" type="text/css"  />

</head>

<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div class="menu_area">This Area Is Set For Navigation</div>
</div>
<div id="log_in">
	<form method="post" >
    <table width="80%" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td>User Name: </td>
            <td><input type="text" name="username" id="username" /></td>
            <td>Password: </td>
            <td><input type="password" name="password" id="password" /></td>
            <td><input type="submit" name="login" id="login" value="Log In" /></td>
          </tr>
</table></form>
</div>

</body>
</html>
