<?php include('../admin/functions/functions.php'); 
 connect(); 
 login(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul | Where You Find What To Eat</title>
<link href="../css/stylesheet.css" rel="stylesheet" type="text/css"  />

</head>

<body>
<div id="wrapper">
<div id="TOP_HEADER">
  <div class="logo"></div>
  
</div>
<div id="search_area_log">
	<form method="post" >
    <table width="25%" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td>User Name: </td>
            <td><input type="text" name="urname" id="urname" /></td>
            </tr>
            <tr>
            <td>Password: </td>
            <td><input type="password" name="psword" id="psword" /></td>
            </tr>
            <tr>
            <td colspan="2"><input type="submit" name="login" id="login" value="Log In" /></td>
          </tr>
</table></form>
</div>
</div>
</body>
</html>
