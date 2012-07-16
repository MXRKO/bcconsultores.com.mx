<?
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
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
<link rel="shortcut icon" href="../favicon.ico" />
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/noticias.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="../lib/js/jquery-1.5.2.min.js"></script>
<script src="../lib/js/menu.js"></script> 
<script src="../lib/js/queryLoader.js"></script>
<script src="<?=$fixed_uri?>lib/js/jquery.jplayer.min.js"></script> 
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
                    <li class="seleccionado"><a href="#">Noticias</a></li>
                    <li><a href="<?=$menu[4]?>">Bolsa de trabajo</a></li>
                    <li><a href="<?=$menu[3]?>">Publicaciones</a></li>
                    <li><a href="<?=$menu[2]?>">Servicios</a></li>
                    <li><a href="<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalNoticias">
    </div>
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="section3Columns p15pxTop">
   	    <div class="columnLeft"><!-- EMPIEZA COLUMNA -->
          <?
          $sql=mysql_query("SELECT*FROM noticias WHERE publicacion!='' ORDER BY id_publicacion DESC LIMIT ".$limite);
		  while($fila=mysql_fetch_array($sql)){
			  ?>
			  <div class="noticia <?=@file_exists("imagenes/imgs_noticias/noticia".$fila["id_publicacion"]."_thumb.jpg")==false?"completo":"";?>">
				<div class="fecha">
					<p><?=formatoFecha($fila["publicacion"])?></p>
					<a target="_blank" href="http://<?=utf8_encode($fila["url"])?>"><?=utf8_encode($fila["autor"])?></a>
				</div>
                <?
				if(@file_exists("imagenes/imgs_noticias/noticia".$fila["id_publicacion"]."_thumb.jpg"))
				{
					?>
                    <div class="imgItem">
                        <img src="../imagenes/imgs_noticias/noticia<?=$fila["id_publicacion"]?>_thumb.jpg" width="120" height="100" />                    	
                    </div>
                    <?
				}
				?>
				<div class="datos">
					<h5><?=utf8_encode($fila["titulo"])?></h5>
					<p class="modificado"><?=utf8_encode($fila["descripcion"])?></p>
					<a target="_blank" class="link" href="http://<?=utf8_encode($fila["url"])?>" >Ir al sitio</a>
				</div>
				<div class="limpiar"></div>
			  </div>
			  <?
		  }
		  ?>
        </div><!-- TERMINA COLUMNA -->
        <div class="columnRight">
            <h4>Encuéntranos también en facebook</h4>
            <p>En facebook compartiremos imágenes y comentarios referentes a nuestros servicios y experiencias, haz clic me gusta.</p>
            <!-- FACEBOOK -->	
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FBC-Consultores-Ambientales-y-de-Riesgos-SC%2F330648996963487&amp;width=292&amp;height=191&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:191px;" allowTransparency="true"></iframe>
        </div>
        <div class="limpiar"></div>
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
        		<p>Teléfonos: <img src="../images/telefono.jpg" width="5" height="12" alt="tel" /> 01(228) 2001585 / (Lada sin costo) 01 (800) 001 58 52</p>
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