<?
session_start();
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 
include("../lib/php/conexion.php");
include("settings.php");
include("functions_noticia.php");
include("../lib/php/resize-class.php");
$nombreTablaNoticias="noticias";

	function subirArchivo($nombre,$nombreCampoArchivo){		
		try{
			if(!$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../imagenes/imgs_noticias/".$nombre.".jpg"))
				throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
			else{
				$resizeObj = new resize("../imagenes/imgs_noticias/".$nombre.".jpg");
				$resizeObj -> resizeImage(120, 100, 'crop');/* Resize image (options: exact, portrait, landscape, auto, crop) */
				$resizeObj -> saveImage("../imagenes/imgs_noticias/".$nombre."_thumb.jpg", 100);
			}
		}catch(Exception $e){
			echo "Descripcion del error:".$e->getMessage();
		}
		if(!$task) return false;
		return true;			
	}
	
	function eliminarArchivo($id){
		if(!@file_exists("../imagenes/imgs_noticias/noticia".$id.".jpg")) return true;
		if(!@unlink("../imagenes/imgs_noticias/noticia".$id.".jpg")) return false;
		if(!@unlink("../imagenes/imgs_noticias/noticia".$id."_thumb.jpg")) return false;
		return true;
	}

	if($_POST["Accion"]=="GUARDAR"){
		if(strpos($_FILES["txtArchivo"][name],".jpg") || strpos($_FILES["txtArchivo"][name],".JPG") || trim($_FILES["txtArchivo"][name])=="" ){		
			$accion=guardar_publicacion(utf8_decode($_POST["txtTitulo"]),utf8_decode($_POST["txtSubtitulo"]), utf8_decode($_POST["txtAutor"]),utf8_decode($_POST["txtUrl"]),utf8_decode($_POST["txtContenido"]));
			$_POST["id"]=mysql_insert_id();
			$txtTitulo=utf8_encode($act["titulo"]);
			$txtAutor=utf8_encode($act["autor"]);
			$txtSubtitulo=utf8_encode($act["subtitulo"]);
			$txtUrl=utf8_encode($act["url"]);
			$txtContenido=utf8_encode($act["descripcion"]);	
			if(trim($_FILES["txtArchivo"][name])!=""){
				if(!subirArchivo("noticia".$_POST["id"],"txtArchivo")){
					$_POST["id"]="";
					@mysql_query("DELETE FROM ".$nombreTablaNoticias." WHERE id='".$_POST["id"]."'");	
					$accion="NOIMAGEN";	
				}
			}
		}
		else{
			$accion="IMGNOVALIDA";	
		}
	}
	if($_POST["Accion"]=="MODIFICAR"){
		if(strpos($_FILES["txtArchivo"][name],".jpg") || strpos($_FILES["txtArchivo"][name],".JPG") || trim($_FILES["txtArchivo"][name])==""){		
			$accion=modificar_publicacion($_POST["id"], utf8_decode($_POST["txtTitulo"]), utf8_decode($_POST["txtSubtitulo"]), utf8_decode($_POST["txtAutor"]), utf8_decode($_POST["txtUrl"]), utf8_decode($_POST["txtContenido"]) );
			if(trim($_FILES["txtArchivo"][name])!=""){
				if(@file_exists("../imagenes/imgs_noticias/noticia".$_POST["id"].".jpg")){
					if(eliminarArchivo($_POST["id"])){
						subirArchivo("noticia".$_POST["id"],"txtArchivo");	
					}
				}
				else{
					subirArchivo("noticia".$_POST["id"],"txtArchivo");	
				}
			}
		}
		else{
			$accion="IMGNOVALIDA";		
		}
	}
	if(isset($_GET["id"]) || isset($_POST["id"])){
		if(isset($_GET["id"])){
			$result=mysql_query("SELECT*FROM ".$nombreTablaNoticias." WHERE id_publicacion='".$_GET["id"]."'");	
			$_POST["id"]=$_GET["id"];
		}else{
			$result=mysql_query("SELECT*FROM ".$nombreTablaNoticias." WHERE id_publicacion='".$_POST["id"]."'");
			$_POST["id"]=$_POST["id"];
		}		
		$act=mysql_fetch_array($result);
		
		$txtTitulo=utf8_encode($act["titulo"]);
		$txtAutor=utf8_encode($act["autor"]);
		$txtSubtitulo=utf8_encode($act["subtitulo"]);
		$txtUrl=utf8_encode($act["url"]);
		$txtContenido=utf8_encode($act["descripcion"]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edición Noticia</title>
<link href="../lib/css/management.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/control.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script type="text/javascript" language="javascript" src="edicion_noticia.js"></script>
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
        <li><a href="<?=$links[0]?>" class="seleccionado">Noticias</a></li>
        <li><a href="<?=$links[1]?>">Publicaciones</a></li>
        <li><a href="<?=$links[2]?>">Bolsa de trabajo</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
<div id="divCentro">
<?
	switch($accion){
		case "GUARDO":
			?>
            <div class="mensajeExito"><p>Se ha guardado satisfactoriamente la información</p></div>
            <?
		break;
		case "NOGUARDO":
			?>
            <div class="mensajeError"><p>No se ha podido guardar la información</p></div>
            <?
		break;
		case "IMGNOVALIDA":
			?>
            <div class="mensajeAlerta"><p>La imágen debe ser en formato jpg, porfavor vuelva a intentarlo</p></div>
            <?
		break;
		case "NOIMAGEN":
			?>
            <div class="mensajeError"><p>No ha podido guardar la información, ni cargar la imágen, porfavor vuelva a intentarlo</p></div>
<?
		break;
		case "MODIFICO":
			?>
           <div class="mensajeExito"><p>Se ha modificado satisfactoriamente la información</p></div>	
            <?
		break;
		case "NOMODIFICO":
			?>
            <div class="mensajeError"><p>No se ha podido modificar la información</p></div>
            <?
		break;
	}
?>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="Datos" id="Datos">
<p><span class="ubicacion">Noticias > Edición</span></p>
<table class="formulario" width="100%" border="0">
  <tr>
    <td width="11%">*Titulo</td>
    <td width="89%"><input name="txtTitulo" type="text" id="txtTitulo" size="55" value="<?=$txtTitulo?>"/></td>
  </tr>
  <tr>
    <td>Sub Titulo</td>
    <td><input name="txtSubtitulo" type="text" id="txtSubtitulo" size="55" value="<?=$txtSubtitulo?>" /></td>
  </tr>
  <tr>
    <td>*Autor</td>
    <td><input name="txtAutor" type="text" id="txtAutor" size="55" value="<?=$txtAutor?>" /></td>
  </tr>
  <tr>
    <td>Imágen</td>
    <td>
	<?
	if(trim($_POST['id'])!="" && @file_exists("../imagenes/imgs_noticias/noticia".$_POST["id"]."_thumb.jpg")){
		?>
		<img src="../imagenes/imgs_noticias/noticia<?=$_POST["id"]?>_thumb.jpg" />
		<?	
	}
	?>
    <input type="file" name="txtArchivo" id="txtArchivo" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>(Sólo se permiten imágenes JPG)</td>
  </tr>
  <tr>
    <td>*url</td>
    <td><label>http://</label><input name="txtUrl" type="text" id="txtUrl" size="45" value="<?=$txtUrl?>" /></td>
  </tr>
  <tr>
    <td>*Descripción</td>
    <td><textarea name="txtContenido" id="txtContenido" cols="63" rows="10"><?=$txtContenido?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Todos los campos marcados con (*) son requeridos</td>
  </tr>
  <tr>
    <td><input type="hidden" id="Accion" name="Accion" /><input type="hidden" id="id" name="id" value="<?=$_POST["id"]?>" /></td>
    <td><input type="button" class="botonesConf" name="btGuardar" id="btGuardar" value="Guardar" <?=isset($_POST["id"])?"style='display:none;'":"";?> /> <input type="button" class="botonesConf" name="btModificar" id="btModificar" value="Actualizar" <?=!isset($_POST["id"])?"style='display:none;'":"";?> /></td>
  </tr>
</table>
</form>
</div>
</body>
</html>