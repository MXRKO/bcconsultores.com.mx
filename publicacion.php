<?
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
	header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
	header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
	header ("Pragma: no-cache"); 
	$limite=6;
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
		return $dia."-".$mes."-".$anio;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="../../favicon.ico" />
<link href="../../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/publicacion.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/pepper-grinder/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />
<script src="../../lib/js/jquery-1.5.2.min.js"></script>
<script src="../../lib/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="../../lib/js/menu.js"></script> 
<script src="../../lib/js/queryLoader.js"></script> 
<script src="../../publicacion.js"></script> 
<script type="text/javascript">
		$(function(){
			QueryLoader.selectorPreload = "#cargador";
			QueryLoader.init();					   
		});
</script>
<?
	if(trim($_GET["id"])=="")
		echo "<script>window.location.href='../../404/';</script>";
?>
</head>
<body>
<input type="hidden" id="idp" name="idp" value="<?=$_GET["id"]?>" />
<div>
    <div id="top">
    	<div id="menu">
            <div id="logo">
            </div>
            <div id="contentMenu">
                <ul class="principal">
                    <li><a href="../<?=$menu[7]?>">Contacto</a></li>
                    <li><a href="../<?=$menu[6]?>">Galeria</a></li>
                    <li><a href="../<?=$menu[5]?>">Noticias</a></li>
                    <li><a href="../<?=$menu[4]?>">Bolsa de trabajo</a></li>
                    <li class="seleccionado"><a href="../<?=$menu[3]?>">Publicaciones</a></li>
                    <li><a href="../<?=$menu[2]?>">Servicios</a></li>
                    <li><a href="../<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="../<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalPublicacion">
    </div>
    <?
    	$sql="SELECT*FROM publicaciones WHERE id='".$_GET["id"]."' LIMIT 1";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
	?>
    <div id="contenido">
    	<div class="borderTop"></div>
          <div class="contenedorPublicacion">
          	<div class="principales">
            	<h1><?=utf8_encode($row["titulo"])?></h1>
            	<? 
				if(trim($row["subtitulo"])!="")
				{
					?>
					<h4><?=utf8_encode($row["subtitulo"])?></h4>
					<?
				}
				?>
                <p class="autor">Por: <?=utf8_encode($row["autor"])?></p>
            </div>
            <div class="cuerpo">
            	<?
                if(file_exists("imagenes/imgs_publicaciones/publicacion_".$_GET["id"]."_1_thumb.jpg")){
					?>
					<div class="imagenPrevia"><img class="gal" id="img_1" src="../../imagenes/imgs_publicaciones/publicacion_<?=$_GET["id"]?>_1_thumb.jpg" width="120" height="100" /></div>
					<?
				}
				?>
                <p><?=nl2br(utf8_encode($row["descripcion"]))?></p>
                <div class="limpiar"></div>
                <div class="contentGal">
                	<ul>
					<?
                    $existe=true;
					$element=2;
                    while($existe)
					{
						if(file_exists("imagenes/imgs_publicaciones/publicacion_".$_GET["id"]."_".$element."_thumb.jpg"))								
						{
							?>
                            <li><img id="img_<?=$element?>" class="gal" src="../../imagenes/imgs_publicaciones/publicacion_<?=$_GET["id"]?>_<?=$element?>_thumb.jpg" /></li>
                            <?
						}
						else
							$existe=false;	
						$element++;
                    }
                    ?>
                    </ul>
                    <div class="limpiar"></div>
                </div>
            </div>
          </div>
		<div class="borderBottom"></div>
    </div>    
    <div class="separadorCafe completo"></div>
    <div id="footer">
    	<div class="contenidoFondo">
        	<div class="fondoIzq">
        		<p>Teléfonos: <img src="../../images/telefono.jpg" width="5" height="12" alt="tel" /> 01(228) 2001585 / (Lada sin costo) 01 (800) 001 58 52</p>
                <p>Olmos No. 1, Fraccionamiento Fuentes de las Ánimas.</p>	
                <p>BC Consultores Ambientales y de Riesgos S.C.</p>
            </div> 
            <div class="fondoDer">
        		<p><a class="linkfb" href="http://www.facebook.com/pages/BC-Consultores-Ambientales-y-de-Riesgos-SC/330648996963487">Visitanos en facebook.</a></p>
                <p><a class="linkrss" href="http://www.facebook.com/feeds/page.php?id=330648996963487&format=rss20">Agreganos a tu lector feeds.</a></p>
            </div> 
            <div class="limpiar"></div>
        </div>
    </div>
</div>
<div id="flotante" title="Imágen previa">
    <!-- <img src="../../imagenes/imgs_publicaciones/publicacion_9_1.jpg" height="420" width="450" /> -->
    <a id="imgIzq" href="#">&lt;&lt;</a><a id="imgDer" href="#">&gt;&gt;</a>
</div>
</div><!-- TERMINA DIV CARGADOR -->	
</body>
</html>