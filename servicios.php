<?
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link href="<?=$fixed_uri?>favicon.ico" rel="shortcut icon" />
<link href="<?=$fixed_uri?>lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="<?=$fixed_uri?>lib/js/jquery-1.5.2.min.js"></script>
<script src="<?=$fixed_uri?>lib/js/menu.js"></script> 
<script src="<?=$fixed_uri?>lib/js/queryLoader.js"></script> 
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
                    <li><a href="<?=$menu[5]?>">Noticias</a></li>
                    <li><a href="<?=$menu[4]?>">Bolsa de trabajo</a></li>
                    <li class="seleccionado"><a href="#">Servicios</a></li>
                    <li><a href="<?=$menu[2]?>">Curriculum</a></li>
                    <li><a href="<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
	<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalServicio">
    </div>
        <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="section3Columns">
   	    <div class="columnLeft">
        	<h3>Nuestros principales servicios</h3>
            <p>Somos una empresa dedicada y comprometida con nuestra labor y el medio ambiente que está siempre en busca de mejorar nuestro compromiso con nuestros clientes y con nuestro entorno.</p> 
            <p>Algunos de nuestros principales servicios son:</p> 
            <ul class="listado">
                <li>Elaboración de Atlas de Riesgos Municipales y Estatales.</li>
                <li>Análisis de vulnerabilidad y de riesgos.</li>
                <li>Integración y funcionamiento de las Brigadas de Protección Civil <a href="../servicio/seguridad/">&laquo; Leer más &raquo;</a></li>
                <li>Proyecto Nacional de Eficiencia Energética en Alumbrado Público Municipal.</li>
                <li>Estudios de Impacto ambiental.</li>
                <li>Programa de Optimización de Energía.</li>
                <li>Evaluación Ecológica de Plantas Industriales.</li>
                <li>Cambio de Uso de Suelo Forestal.</li>
                <li>Planes de Contingencia.</li>
                <li>Elaboración y reglamentos de construcción, cursos, talleres y estrategias de difusión, de educación y sensibilización para la prevención de desastres.</li>
                <li>Reforestación con fines de prevención.</li>
                <li>Elaboración de proyectos que impliquen el aprovechamiento y desarrollo de energías renovables.</li>
                <li>Entre otros.</li>
            </ul>  
        </div>
        <div class="columnRight" style="height:500px;">
        <h4>Encuentranos también en facebook</h4>
        <p>En facebook compartiremos imágenes y comentarios referentes a nuestros servicios y experiencias, haz clic me gusta.</p>
        <!-- FACEBOOK -->	
        <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FBC-Consultores-Ambientales-y-de-Riesgos-SC%2F330648996963487&amp;width=292&amp;height=391&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:0; overflow:hidden; width:292px; height:391px;" allowTransparency="true"></iframe>
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
        </div>
    </div>
</div>
</div><!-- TERMINA DIV CARGADOR -->	
</body>
</html>