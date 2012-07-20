<?
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
	include("lib/php/resize-class.php");
	
	function subirArchivo($nombre,$nombreCampoArchivo,$id){		
		if(strpos($_FILES[$nombreCampoArchivo][name],".pdf"))	$extencion="pdf";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".PDF"))	$extencion="pdf";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".doc"))	$extencion="doc";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".DOC"))	$extencion="doc";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".docx"))	$extencion="docx";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".DOCX"))	$extencion="docx";
		else	$extencion="NO";
			
		if($extencion!="NO"){
			try{
				if(!$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"archivos_curr/".$nombre.".".$extencion)){
					throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
				}
			}catch(Exception $e){
				echo "Descripcion del error:".$e->getMessage();
			}
			if(!$task) return "nosubio";
			$sql="UPDATE bolsatrabajo SET archivo='".$extencion."' WHERE id='".$id."'";
			mysql_query($sql);
			return "subio";			
		}
		else{
			return "novalido";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link href="<?=$fixed_uri?>favicon.ico" rel="shortcut icon" />
<link href="<?=$fixed_uri?>lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/bolsatrabajo.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="<?=$fixed_uri?>lib/js/jquery-1.5.2.min.js"></script>
<script src="<?=$fixed_uri?>lib/js/menu.js"></script> 
<script src="<?=$fixed_uri?>lib/js/queryLoader.js"></script> 
<script src="<?=$fixed_uri?>lib/js/jquery.jplayer.min.js"></script>
<script src="../bolsatrabajo.js"></script>

<script type="text/javascript">
		$(function(){
			QueryLoader.selectorPreload = "#cargador";
			QueryLoader.init();					   
		});
		
		$(document).ready(function(){
			  $("#jquery_jplayer").jPlayer({
					ready: function () {
					  $(this).jPlayer("setMedia", {
						oga: "<?=$settings["music"]?>"
					  });
					  $(this).jPlayer("play",0);
					  $("#play_button").hide();
					  $("#pause_button").show();
					},
					volume:100,
					loop:1,
					wmode:"window",
					supplied:"oga"
			  });
			  
			  $("#play_button").click(function(){
				$("#jquery_jplayer").jPlayer("play");
				$(this).hide();
				$("#pause_button").hide().show();
			  });
			  
			  $("#pause_button").click(function(){
				$("#jquery_jplayer").jPlayer("pause");
				//alert($("#jquery_jplayer").data("jPlayer").internal.audio.id);
				$(this).hide();
				$("#play_button").hide().show();
			  });
		});
</script>
</head>
<body>
<div>
    <div id="top">
    	<div id="menu">
            <div id="logo">
            </div>
            <div id="contentMenu">
                <ul class="principal">
                    <li><a href="<?=$menu[7]?>">Contacto</a></li>
                    <li><a href="<?=$menu[6]?>">Galeria</a></li>
                    <li><a href="<?=$menu[5]?>">Noticias</a></li>
                    <li class="seleccionado"><a href="#">Bolsa de trabajo</a></li>
                    <li><a href="<?=$menu[3]?>">Servicios</a></li>
                    <li><a href="<?=$menu[2]?>">Curriculum</a></li>
                    <li><a href="<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalBolsa">
    </div>
    
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="contenedorBolsa">
    	  <div class="imgfondo">
          	<h3>Bolsa de Trabajo</h3>
          	<p>El desarrollo de nuestros servicios,  se encuentra a cargo de un equipo de profesionales calificados en varias disciplinas  de las ciencias de la tierra,  ciencias naturales, arquitectos y personal administrativo que  aplican altos estándares de calidad en cada proyecto con la finalidad de obtener un producto útil para la toma de decisiones, en beneficio de la sociedad. Si consideras que posees un perfil a fin a nuestras áreas de trabajo y  tienes pasión por el cuidado de nuestros recursos naturales, envíanos tu currículum vitae para mantenerte informado sobre nuestras vacantes.</p>
          </div>
          <?
		  	if($_POST["Accion"]=="ENVIAR"){
				if(isset($_POST["txtNombre"])!="" && isset($_POST["txtApellidos"])!="" && isset($_FILES["txtArchivo"]["name"])!=""){
					if(($_FILES["txtArchivo"]["size"]/1024)<10240){
						$sql="INSERT INTO bolsatrabajo(nombre, apellidos, fecha) VALUES('".utf8_decode($_POST["txtNombre"])."','".utf8_decode($_POST["txtApellidos"])."', NOW())";
						$result=mysql_query($sql);
						$id=mysql_insert_id();
						$resultFile=subirArchivo("curriculum".$id,"txtArchivo",$id);
						if($result && $resultFile=="subio"){
							?>
							<div class="mensaje exito">Se ha enviado tu curriculum satisfactoriamente, nosotros nos comunicaremos contigo a la brevedad. Haz clic <a href="../inicio/">aquí</a> para ir a la página de inicio.</div>
							<?	
						}
						else if($result && $resultFile=="novalido"){
							?>
							<div class="mensaje alerta">El tipo de archivo que usted desea adjuntar, no es valido, porfavor intente con un archivo distinto.</div>
							<?	
						}
						else{
							?>
							<div class="mensaje error">Ha ocurrido un error desconocido, no se ha podido enviar tu curriculum.</div>
							<?	
						}
						$_POST["txtNombre"]="";
						$_POST["txtApellidos"]="";
						$_FILES["txtArchivo"]="";
					}
					else{
						?>
						<div class="mensaje error">Solo se pueden adjuntar archivos menores a 10mb, no se ha podido enviar tu curriculum.</div>
						<?	
					}
			  }
			  $_POST["Accion"]="";
		  }
		 ?>
          <div class="formulario">
          	  <form id="Datos" name="Datos" action="../bolsa-de-trabajo/" method="post" enctype="multipart/form-data">
              <table class="formu" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="21%"><label for="txtNombre">Nombre</label></td>
                  <td width="79%"><input class="campo" name="txtNombre" type="text" id="txtNombre" size="45"></td>
                </tr>
                <tr>
                  <td><label for="txtApellidos">Apellidos</label></td>
                  <td><input class="campo" name="txtApellidos" type="text" id="txtApellidos" size="45"></td>
                </tr>
                <tr>
                  <td><label for="txtArchivo">Curriculum</label></td>
                  <td><input class="campo" name="txtArchivo" type="file" id="txtArchivo" lang="es" size="45" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><p class="nota">(Únicamente se aceptan archivos menores a 10 mb y con extensión: pdf, doc, docx)</p></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><!-- <button id="btEnviar" value="Enviar" class="btBlanco"><span>Enviar</span></button>-->
                  <input id="btnEnviar" name="btnEnviar" type="image" class="imgBtn" src="../images/btnBnco.jpg"  />
                  </td>
                </tr>
              </table>
              <input id="Accion" name="Accion" type="hidden" value="STOP"/>
              </form>
          </div>
        </div>
        <div class="borderBottom"></div>
    </div>
    <div class="separadorCafe completo"></div>
    <div id="footer">
    	<div class="contenidoFondo">
        	<div class="reproductor">      	
                <div id="jquery_jplayer"></div>
                <ul class="sound">
                    <li title="Sonido" id="play_button"></li>
                    <li title="Pausar" id="pause_button"></li>
                </ul>
            </div>
            <div class="fondoIzq">
        		<p>Teléfonos: <img src="<?=$fixed_uri?>images/telefono.jpg" width="5" height="12" alt="tel" /> 01(228) 2001585 / (Lada sin costo) 01 (800) 001 58 52</p>
                <p>Olmos No. 1, Fraccionamiento Fuentes de las Ánimas.</p>	
                <p>BC Consultores Ambientales y de Riesgos S.C.</p>
            </div> 
            <div class="fondoDer">
        		<p><a class="linkfb" href="http://www.facebook.com/pages/BC-Consultores-Ambientales-y-de-Riesgos-SC/330648996963487">Visitanos en facebook.</a></p>
                <p><a class="linkrss" href="http://www.facebook.com/feeds/page.php?id=330648996963487&format=rss20">Agreganos a tu lector feeds.</a></p>
            </div> 
            <div class="limpiar"></div>
            <!-- <div class="subfondo"><p class="psubfondo">BC Consultores Ambientales y de Riesgos S.C.</p></div>-->
        </div>
    </div>
</div>
</div><!-- TERMINA DIV CARGADOR -->	
</body>
</html>