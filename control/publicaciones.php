<?
session_start();
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 
include("../lib/php/conexion.php");
include("settings.php");
$nombreTablaNoticias="publicaciones";

function formatoFecha($fecha){
	$fechas = explode("-",$fecha); 
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

function eliminarArchivo($id, $sub){
	if(!@file_exists("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub.".jpg")) return true;
	if(!@unlink("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub.".jpg")) return false;
	if(!@unlink("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub."_thumb.jpg")) return false;
	return true;
}

if($_POST["Accion"]=="ELIMINAR"){
	if(mysql_query("DELETE FROM ".$nombreTablaNoticias." WHERE id='".$_POST["id"]."'")){
		$existe=true;
		$sub=1;
		while($existe){
			eliminarArchivo($_POST["id"],$sub);
			if(file_exists("../imagenes/imgs_publicaciones/publicacion_".$_POST["id"]."_".($sub+1).".jpg")){
				$existe=true;
				$sub++;
			}else
				$existe=false;
		}
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
<title>Publicaciones</title>
<link href="../lib/css/control.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/management.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script src="publicaciones.js"></script>
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
        <li><a href="<?=$links[1]?>" class="seleccionado" >Publicaciones</a></li>
        <li><a href="<?=$links[2]?>">Bolsa de trabajo</a></li>
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
<h2>Publicaciones</h2>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tInfo">
  <tr>
    <td width="38%">Titulo</td>
    <td width="24%">Autor</td>
    <td width="19%">Fecha</td>
    <td width="10%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
  </tr>
  <?
  $result=mysql_query("SELECT*FROM ".$nombreTablaNoticias." WHERE fecha!='' ORDER BY id DESC");
  $i=0;
  while($fila=mysql_fetch_array($result)){
  ?>
  <tr>
    <td><?=utf8_encode($fila["titulo"])?></td>
    <td><?=utf8_encode($fila["autor"])?></td>
    <td><?=formatoFecha($fila["fecha"])?></td>
    <td><input type="button" class="botonesConf" name="btModificar<?=$i?>" id="btModificar<?=$i?>" value="Modificar" onclick="modificar('<?=$fila["id"]?>');" /></td>
    <td><input type="button" class="botonesAlert" name="btEliminar<?=$i?>" id="btEliminar<?=$i?>" value="Eliminar" onclick="eliminar('<?=$fila["id"]?>');" /></td>
  </tr>
  <?
  	$i++;
  }
  ?>
</table>
<input type="button" class="botonesConf" name="btNuevo" id="btNuevo" value="Nuevo" />
<input type="hidden" name="id" id="id"/>
<input type="hidden" name="Accion" id="Accion" />
</form>
</div>
</body>
</html>