<?
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
	$limite=5;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="<?=$fixed_uri?>favicon.ico" />
<link href="<?=$fixed_uri?>lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/nivo-slider.css" rel="stylesheet" type="text/css" />
<script src="<?=$fixed_uri?>lib/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="<?=$fixed_uri?>lib/js/menu.js" type="text/javascript"></script>
<script src="<?=$fixed_uri?>lib/js/jquery.cycle.all.js" type="text/javascript"></script>
<script src="<?=$fixed_uri?>lib/js/queryLoader.js" type="text/javascript"></script> 
<script src="<?=$fixed_uri?>lib/js/jquery.nivo.slider.pack.js" type="text/javascript" ></script> 
<script src="<?=$fixed_uri?>lib/js/jquery.jplayer.min.js" type="text/javascript" ></script> 
<script type="text/javascript">
	$(function(){
		QueryLoader.selectorPreload = "#cargador";
		QueryLoader.init();					   
		$('#banner').cycle({ 
			fx:      'scrollDown', 
			speed:    400, 
			slices: 15,
			timeout:  3500,
			pause:		1
		});
	});
		
	$(window).load(function() {
		$('#imgsprincipales').nivoSlider({
			effect:'sliceDown', //fold, random, sliceDown
			animSpeed:900,
			pauseTime:4000,
			directionNav:false, 
			directionNavHide:false, 
			controlNav:false, 
		});
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
            <!-- <div id="busqueda"><input type="text" id="txtBusqueda" name="txtBusqueda" /><input type="button" id="btBuscar" name="btBuscar" value=" "/></div>-->
            <div id="contentMenu">
                <ul class="principal">
                    <li><a href="<?=$menu[7]?>">Contacto</a></li>
                    <li><a href="<?=$menu[6]?>">Galeria</a></li>
                    <li><a href="<?=$menu[5]?>">Noticias</a></li>
                    <li><a href="<?=$menu[4]?>">Bolsa de trabajo</a></li>
                    <li><a href="<?=$menu[3]?>">Servicios</a></li>
                    <li><a href="<?=$menu[2]?>">Curriculum</a></li>
                    <li><a href="<?=$menu[1]?>">Quienes somos</a></li>
                    <li class="seleccionado"><a href="#">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipal">
		<div class="ancho1000px centrar">    		
            <div id="imgsprincipales">
            	<img src="<?=$fixed_uri?>images/imgprincipal1.jpg" height="168" width="658" />
                <img src="<?=$fixed_uri?>images/imgprincipal2.jpg" height="168" width="658" />
            </div>
            <div id="banner">
                <?
                $sql=mysql_query("SELECT*FROM noticias WHERE publicacion!='' ORDER BY id_publicacion DESC LIMIT ".$limite);
				while($fila=mysql_fetch_array($sql))
				{
					?>
					<div class="item"><a class="linkMENU" href="../noticias/"><?=utf8_encode($fila["titulo"])?></a><p><?=utf8_encode($fila["descripcion"])?></p></div> 
					<?
				}
				?>
            </div>
         </div>
    </div>
    <!-- <div id="submenu">
    	<ul class="secundario">
        	<li><a href="<?$submenu[0]?>">Opciones secundarias</a></li>
            <li><a href="<?$submenu[1]?>">Ligas de interes</a></li>
            <li><a href="<?$submenu[2]?>">Contactanos</a></li>
        </ul>
    </div> --> 
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="section3Columns">
   	    <div class="columnLeft">
            
          <!-- <div style="border-bottom:1px #D1CDAD dotted; margin:7px 0 7px 0; height:1px;"></div> -->
          <img class="contenido" src="<?=$fixed_uri?>imagenes/imagen1.jpg" width="560" height="120" />
          <h3>Comprometidos con nuestros clientes y el medio ambiente</h3>
          <p>Somos una empresa que brinda asesoría y soluciones a instituciones públicas y privadas,  mediante el desarrollo de proyectos de aprovechamiento sustentable de los recursos naturales e identificación de riesgos que afecten  a  la población, infraestructura y el entorno.  Los servicios que ofrecemos son desarrollados por profesionales calificados y sensibles ante las problemáticas ambientales actuales. Aplicamos altos estándares de calidad para alcanzar la competitividad en nuestros servicios y así, incrementar el valor de la  inversión de nuestros clientes.</p> 
            <a class="link" href="<?=$fixed_uri?>quienes-somos/">Leer más...</a>
          </div>
            <div class="columnRight">
            	<h3>Nos dedicamos a...</h3>
            	<p>Algunos de nuestros principales servicios son:</p> 
                <ul class="listado">
                	<li>Elaboración de Atlas de Riesgos Municipales y Estatales.</li>
                    <li>Análisis de vulnerabilidad y de riesgos.</li>
                    <li>Integración y funcionamiento de las Brigadas de Protección Civil</li>
                    <li>Proyecto Nacional de Eficiencia Energética en Alumbrado Público Municipal.</li>
                    <li>Estudios de Impacto ambiental.</li>
                    <li>Programa de Optimización de Energía.</li>
                </ul>
                <a class="link" href="<?=$fixed_uri?>servicios/">Leer más...</a>
            </div>
            <div class="limpiar"></div>
        </div>
        <div class="borderBottom"></div>
    </div>
    <!-- <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FBC-Consultores-Ambientales-y-de-Riesgos-SC%2F330648996963487&amp;width=292&amp;height=70&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:70px;" allowTransparency="true"></iframe> -->
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