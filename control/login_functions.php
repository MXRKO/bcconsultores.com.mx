<?
session_start();
session_register("user_name");
session_register("iduser");
include("../lib/php/conexion.php");

function quitar($mensaje)
{
	$mensaje = str_replace("<","<",$mensaje);
	$mensaje = str_replace(">",">",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"'",$mensaje);
	$mensaje = str_replace('\\\\','"\"',$mensaje);
	return $mensaje;
}

if(trim($_POST["txtUser"]) != "" && trim($_POST["txtPass"]) != "")
{
	$nickN = quitar($_POST["txtUser"]);
	$passN = quitar($_POST["txtPass"]);

    $consulta="SELECT id, usuario, pass FROM usuarios WHERE usuario='$nickN' AND pass = MD5('$passN') AND estatus LIKE '1' LIMIT 1";
	$result = mysql_query($consulta);
	if($row = mysql_fetch_array($result))
	{
		//CREAMOS LA SESSION
		$_SESSION["username"]=$row["nombre_completo"];
		$_SESSION["iduser"]=$row["id"];
		$liga="noticias.php";	
		?>
        Cargando...
        <script type="text/javascript" languaje="javascript">
        window.location.href="<?=$liga?>";
        </script>
		<?
	}
	else
	{
		session_unset();
		session_destroy();
		echo "<html><script>alert('Datos incorrectos, intentelo nuevamente');";
		echo "window.location.href='login.php';</script></html>";
	}
	mysql_free_result($result);
	}
else
{
	echo "<html><script>alert('Usuario no existente en la base de datos');";
	echo "window.location.href='login.php';</script></html>";
}
mysql_close();
?>