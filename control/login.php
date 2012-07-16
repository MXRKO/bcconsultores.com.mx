<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BC Consultores - Login</title>
<script src="../lib/js/jquery-1.7.min.js"></script>
<script src="login.js"></script>
</head>
<body>
<form id="Datos" name="Datos" action="login_functions.php" method="post">
<table width="100%" border="0">
  <tr>
    <td width="10%">usuario</td>
    <td width="90%"><input type="text" name="txtUser" id="txtUser" /></td>
  </tr>
  <tr>
    <td>contraseña</td>
    <td><input type="password" name="txtPass" id="txtPass" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="btEntrar" id="btEntrar" value="Entrar" /></td>
  </tr>
</table>
</form>
</body>
</html>