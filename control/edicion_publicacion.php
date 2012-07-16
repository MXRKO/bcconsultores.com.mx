<?
session_start();
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 
include("../lib/php/conexion.php");
include("settings.php");
include("functions_publicacion.php");
include("../lib/php/resize-class.php");
$nombreTablaNoticias="publicaciones";
	
	function subirArchivo($nombre,$nombreCampoArchivo){		
		try{
			$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../imagenes/imgs_publicaciones/".$nombre.".jpg") or die($_FILES[$nombreCampoArchivo]['error'].", porfavor notifique al adminstrador acerca de este error.");
			if(!$task)
				throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
			else{
				$resizeObj = new resize("../imagenes/imgs_publicaciones/".$nombre.".jpg");
				$resizeObj -> resizeImage(120, 100, 'crop');// Resize image (options: exact, portrait, landscape, auto, crop)
				$resizeObj -> saveImage("../imagenes/imgs_publicaciones/".$nombre."_thumb.jpg", 75);
				
				$resizeObjNorm = new resize("../imagenes/imgs_publicaciones/".$nombre.".jpg");
				$resizeObjNorm -> resizeImage(450, 420, 'crop');// Resize image (options: exact, portrait, landscape, auto, crop)
				$resizeObjNorm -> saveImage("../imagenes/imgs_publicaciones/".$nombre.".jpg", 90);
			}
		}catch(Exception $e){
			echo "Descripcion del error:".$e->getMessage();
		}
		if(!$task) return false;
		return true;			
	}
	
	function eliminarArchivo($id, $sub_id){
		if(!@file_exists("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub_id.".jpg")) return true;
		if(!@unlink("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub_id.".jpg")) return false;
		if(!@unlink("../imagenes/imgs_publicaciones/publicacion_".$id."_".$sub_id."_thumb.jpg")) return false;
		return true;
	}

	if($_POST["Accion"]=="GUARDAR"){
		$accion=guardar_publicacion(utf8_decode($_POST["txtTitulo"]),utf8_decode($_POST["txtSubtitulo"]), utf8_decode($_POST["txtAutor"]),utf8_decode($_POST["txtContenido"]),$_POST["hfPublicar"]);
		$_POST["id"]=mysql_insert_id();
		$imgs=$_POST["hfImgs"];
		$i=1;
		$contador=1;
		$uploaded=0;
		while($contador<=$imgs){
			if(trim($_FILES["txtArchivo".$i]["name"])!=""){
				if(subirArchivo("publicacion_".$_POST["id"]."_".$contador,"txtArchivo".$i)){
					$uploaded++;
				}
				$contador++;
			}
			$i++;
		}
		if($uploaded!=($contador-1)){
			$accion=$accion."&IMGSINCOMPLETAS";			
		}
		$txtTitulo=utf8_encode($act["titulo"]);
		$txtAutor=utf8_encode($act["autor"]);
		$txtSubtitulo=utf8_encode($act["subtitulo"]);
		$txtContenido=utf8_encode($act["descripcion"]);	
		$chkPublicar=$_POST["hfPublicar"];
	}
	if($_POST["Accion"]=="MODIFICAR"){
		$accion=modificar_publicacion($_POST["id"], utf8_decode($_POST["txtTitulo"]), utf8_decode($_POST["txtSubtitulo"]), utf8_decode($_POST["txtAutor"]), utf8_decode($_POST["txtContenido"]), $_POST["hfPublicar"]);
		$imgs=$_POST["hfImgs"];
		$i=1;
		$contador=1;
		$uploaded=0;
		while($contador<=$imgs){
			if(trim($_FILES["txtArchivo".$i]["name"])!=""){
				if(eliminarArchivo($_POST["id"], $i)){
					if(subirArchivo("publicacion_".$_POST["id"]."_".$i,"txtArchivo".$i)){
						$uploaded++;
					}	
				}
				$contador++;
			}
			$i++;
		}
		if($uploaded!=($contador-1)){
			$accion=$accion."&IMGSINCOMPLETAS";			
		}
	}
	if(isset($_GET["id"]) || isset($_POST["id"])){
		if(isset($_GET["id"])){
			$result=mysql_query("SELECT*FROM ".$nombreTablaNoticias." WHERE id='".$_GET["id"]."'");	
			$_POST["id"]=$_GET["id"];
		}else{
			$result=mysql_query("SELECT*FROM ".$nombreTablaNoticias." WHERE id='".$_POST["id"]."'");
			$_POST["id"]=$_POST["id"];
		}		
		
		$act=mysql_fetch_array($result);
		$txtTitulo=utf8_encode($act["titulo"]);
		$txtSubtitulo=utf8_encode($act["subtitulo"]);
		$txtAutor=utf8_encode($act["autor"]);
		$txtContenido=utf8_encode($act["descripcion"]);
		$chkPublicar=$act["publicar"];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edición Publicación</title>
<link href="../lib/css/management.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/control.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script type="text/javascript" language="javascript" src="edicion_publicacion.js"></script>
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
        <li><a href="<?=$links[1]?>" class="seleccionado">Publicaciones</a></li>
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
		case "GUARDO&IMGSINCOMPLETAS":
			?>
            <div class="mensajeAlerta"><p>Se ha guardado satisfactoriamente la información pero algunas imágenes no han podido ser agregadas, por favor intente agregarlas nuevamente.</p></div>
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
		case "MODIFICO&IMGSINCOMPLETAS":
			?>
           <div class="mensajeAlerta"><p>Se ha modificado satisfactoriamente la información pero algunas imágenes no han podido ser agregadas, por favor intente agregarlas nuevamente.</p></div>	
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
<p><span class="ubicacion">Publicaciones > Edición</span></p>
<table class="formulario" width="100%" border="0">
  <tr>
    <td width="11%">*Titulo</td>
    <td colspan="2"><input name="txtTitulo" type="text" id="txtTitulo" size="55" value="<?=$txtTitulo?>"/></td>
  </tr>
  <tr>
    <td>Sub Titulo</td>
    <td colspan="2"><input name="txtSubtitulo" type="text" id="txtSubtitulo" size="55" value="<?=$txtSubtitulo?>" /></td>
  </tr>
  <tr>
    <td>*Autor</td>
    <td colspan="2"><input name="txtAutor" type="text" id="txtAutor" size="55" value="<?=$txtAutor?>" /></td>
  </tr>
  <tr>
    <td>*Contenido</td>
    <td colspan="2"><textarea name="txtContenido" id="txtContenido" cols="63" rows="10"><?=$txtContenido?></textarea></td>
  </tr>
  <tr>
    <td colspan="3"><table id="tArchivos" width="100%" cellpadding="0">
      <?
	  if(trim($_POST["id"])!=""){
		  $count_i=1;
		  while(file_exists("../imagenes/imgs_publicaciones/publicacion_".$_POST["id"]."_".$count_i.".jpg")){
			  ?>
			  <tr id="tr<?=$count_i?>">
                <td width="11%" height="0">Imágen</td>
                <td width="89%" height="0"><img src="../imagenes/imgs_publicaciones/publicacion_<?=$_POST["id"]?>_<?=$count_i?>_thumb.jpg"  /><label>
                <input type="file" name="txtArchivo<?=$count_i?>" id="txtArchivo<?=$count_i?>" />
                </label></td>
			  </tr>
			  <?
			$count_i++;
		  }
		  ?>
		  <tr id="tr<?=($count_i)?>">
            <td width="11%" height="0">Imágen</td>
            <td width="89%" height="0"><label>
            <input type="file" name="txtArchivo<?=($count_i)?>" id="txtArchivo<?=($count_i)?>" />
            </label></td>
		  </tr>
		  <?
	  }
	  else{
	  		?>
			<tr id="tr1">
                <td width="11%" height="0">Imágen</td>
                <td width="89%" height="0"><label>
                <input type="file" name="txtArchivo1" id="txtArchivo1" />
                </label></td>
              </tr>
			<?
	  }
	  ?>
    </table></td>
    </tr>
  <tr>
    <td>Publicar</td>
    <td colspan="2"><label>
      <input type="checkbox" name="chk_publicar" id="chk_publicar" <?=$chkPublicar=="1"?"checked='checked'":"";?> />
      (Si selecciona esta casilla, la publicación aparecerá automaticamente en la página.)</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Todos los campos marcados con (*) son requeridos</td>
  </tr>
  <tr>
    <td>
    	<input type="hidden" id="Accion" name="Accion" /><input type="hidden" id="id" name="id" value="<?=$_POST["id"]?>" /><input type="hidden" id="hfImgs" name="hfImgs" value="1"/><input type="hidden" id="hfPublicar" name="hfPublicar" />
    </td>
    <td colspan="2"><input type="button" class="botonesConf" name="btGuardar" id="btGuardar" value="Guardar" <?=isset($_POST["id"])?"style='display:none;'":"";?> /> <input type="button" class="botonesConf" name="btModificar" id="btModificar" value="Actualizar" <?=!isset($_POST["id"])?"style='display:none;'":"";?> /></td>
  </tr>
</table>
</form>
</div>
</body>
</html>