<?
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="<?=$fixed_uri?>favicon.ico" />
<link href="<?=$fixed_uri?>lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/quienes.css" rel="stylesheet" type="text/css" />
<link href="<?=$fixed_uri?>lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="<?=$fixed_uri?>lib/js/jquery-1.5.2.min.js"></script>
<script src="<?=$fixed_uri?>lib/js/menu.js"></script> 
<script src="<?=$fixed_uri?>lib/js/queryLoader.js"></script> 
<script type="text/javascript">
		$(function(){
			QueryLoader.selectorPreload = "#cargador";
			QueryLoader.init();					   
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
                    <li><a href="<?=$menu[3]?>">Publicaciones</a></li>
                    <li><a href="<?=$menu[2]?>">Servicios</a></li>
                    <li class="seleccionado"><a href="#">Quienes somos</a></li>
                    <li><a href="<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalQuienes">
    </div>
    
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="contenedorBlanco">
   	    <div class="divMision">
          <h4 style="border-bottom:1px #999 dotted; padding-bottom:10px; color:#F90;">Misión</h4>
          <p>Somos una empresa que brinda asesoría y soluciones a instituciones públicas y privadas,  mediante el desarrollo de proyectos de aprovechamiento sustentable de los recursos naturales e identificación de riesgos que afecten  a  la población, infraestructura y el entorno.  Los servicios que ofrecemos son desarrollados por profesionales calificados y sensibles ante las problemáticas ambientales actuales. Aplicamos altos estándares de calidad para alcanzar la competitividad en nuestros servicios y así, incrementar el valor de la  inversión de nuestros clientes.</p>
   	    </div>
        <div class="divVision">
          <h4 style="border-bottom:1px #999 dotted; padding-bottom:10px; color:#F90;">Visión</h4>
          <p>Ser una empresa con presencia a nivel estatal y nacional, reconocida por la calidad de sus servicios de consultoría en la gestión ambiental y de riesgos,   generando un impacto positivo en la población y su entorno.</p>
        </div>
        <!-- <div class="columnRight">
            <h4>Encuentranos también en facebook</h4>
            <p>En facebook compartiremos imágenes y comentarios referentes a nuestros servicios y experiencias, haz clic me gusta.</p>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FBC-Consultores-Ambientales-y-de-Riesgos-SC%2F330648996963487&amp;width=292&amp;height=191&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:191px;" allowTransparency="true"></iframe>
          </div> -->
        <div class="limpiar"></div>
        </div>
        <div class="borderBottom"></div>
    </div>
    <!-- <div id="contenido">
	    <div class="section2Columns">
            <div class="dobleColumnaIzq">
            	<h3>Misión</h3>
                <p>Somos una empresa que brinda asesoría y soluciones a instituciones públicas y privadas,  mediante el desarrollo de proyectos de aprovechamiento sustentable de los recursos naturales e identificación de riesgos que afecten  a  la población, infraestructura y el entorno.  Los servicios que ofrecemos son desarrollados por profesionales calificados y sensibles ante las problemáticas ambientales actuales. Aplicamos altos estándares de calidad para alcanzar la competitividad en nuestros servicios y así, incrementar el valor de la  inversión de nuestros clientes.</p> 
                <h3>Visión</h3>
                <p>Ser una empresa con presencia a nivel estatal y nacional, reconocida por la calidad de sus servicios de consultoría en la gestión ambiental y de riesgos,   generando un impacto positivo en la población y su entorno.</p>
            </div>
            <div class="simpleColumnaDer">
            	<ul class="listadoCafe">
                	<li>Elaboración de Atlas de Riesgos Municipales.</li>
                    <li>Análisis de vulnerabilidad y de riesgos.</li>
                    <li>Integración y funcionamiento de las Brigadas de Protección Civil</li>
                </ul>
            </div>
            <div class="limpiar"></div> 
        </div>
    </div> -->
    <div class="separadorCafe completo"></div>
    <div id="footer">
    	<div class="contenidoFondo">
        	<!-- <div class="logoCafe">
            </div> -->
            <div class="fondoIzq">
        		<p>Teléfonos: <img src="images/telefono.jpg" width="5" height="12" alt="tel" /> 01(228) 2001585 / (Lada sin costo) 01 (800) 001 58 52</p>
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