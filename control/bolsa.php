<?
session_start();
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 
include("../lib/php/conexion.php");
include("settings.php");
$nombreTabla="bolsatrabajo";

function formatoFecha($fecha){
	$primero=explode(" ",$fecha); 
	$fechas = explode("-",$primero[0]); 
	$anio=$fechas[0];
	$mes="";
	$dia=$fechas[2];
	switch($fechas[1]){
		case '01':
			$mes="Enero";
		break;
		case '02':
			$mes="Febrero";
		break;
		case '03':
			$mes="Marzo";
		break;
		case '04':
			$mes="Abril";
		break;
		case '05':
			$mes="Mayo";
		break;
		case '06':
			$mes="Junio";
		break;
		case '07':
			$mes="Julio";
		break;
		case '08':
			$mes="Agosto";
		break;
		case '09':
			$mes="Septiembre";
		break;
		case '10':
			$mes="Octubre";
		break;
		case '11':
			$mes="Noviembre";
		break;
		case '12':
			$mes="Diciembre";
		break;
	}
	return $dia." - ".$mes." - ".$anio;
}

function eliminarArchivo($id,$ext){
	if(!@file_exists("../archivos_curr/curriculum".$id.".".$ext)) return true;
	if(!@unlink("../archivos_curr/curriculum".$id.".".$ext)) return false;
	return true;
}

if($_POST["Accion"]=="ELIMINAR"){
	if(mysql_query("DELETE FROM ".$nombreTabla." WHERE id='".$_POST["id"]."'")){
		eliminarArchivo($_POST["id"],$_POST["extencion"]);
		$respuesta="ELIMINO";	
	}
	else
		$respuesta="NOELIMINO";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bolsa de Trabajo</title>
<link href="../lib/css/control.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/management.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script src="bolsa.js"></script>
<?
if(trim($_SESSION["iduser"])==""){
	?>
	<script>
    window.location.href="login.php";
    </script>
	<?
}
?>
<body>
<div class="barra">
    <ul class="principal">
        <li><a href="<?=$links[0]?>">Noticias</a></li>
        <li><a href="<?=$links[1]?>">Publicaciones</a></li>
        <li><a href="<?=$links[2]?>" class="seleccionado" >Bolsa de trabajo</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
<div class="contenido">
<form id="Datos" name="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<?
if(isset($respuesta)){
	if($respuesta=="ELIMINO"){
		?>
		<div class="mensajeExito especial">Se ha eliminado con éxito el registro</div>
		<?	
	}
	else{
		?>
		<div class="mensajeError especial">No se ha podido eliminar el registro, porfavor contacte al administrador</div>
		<?
	}
}
?>
<h2>Bolsa de Trabajo</h2>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tInfo">
  <tr>
    <td width="40%">Nombre</td>
    <td width="33%">Fecha</td>
    <td width="16%">Archivo</td>
    <td width="11%">&nbsp;</td>
  </tr>
  <?
  $result=mysql_query("SELECT*FROM ".$nombreTabla." ORDER BY id DESC");
  $i=0;
  while($fila=mysql_fetch_array($result)){
	  ?>
	  <tr>
		<td><?=utf8_encode($fila["nombre"]." ".$fila["apellidos"])?></td>
		<td><?=formatoFecha($fila["fecha"])?></td>
		<td><?
		switch($fila["archivo"]){
			case "pdf":
				?>
				<a target="_blank" href="../archivos_curr/curriculum<?=$fila["id"].".".$fila["archivo"]?>"><img src="../images/pdf.jpg" /></a>
				<?
			break;
			case "doc":
			case "docx":
				?>
				<a target="_self" href="../archivos_curr/curriculum<?=$fila["id"].".".$fila["archivo"]?>"><img src="../images/word.png" /></a>
				<?
			break;
		}
		?></td>
		<td><input type="button" class="botonesAlert" name="btEliminar<?=$i?>" id="btEliminar<?=$i?>" value="Eliminar" onclick="eliminar('<?=$fila["id"]?>','<?=$fila["archivo"]?>');" /></td>
	  </tr>
	  <?
  	  $i++;
  }
  ?>
</table>
<input type="hidden" name="id" id="id"/>
<input type="hidden" name="extencion" id="extencion"/>
<input type="hidden" name="Accion" id="Accion" />
</form>
</div>
</body>
</html>