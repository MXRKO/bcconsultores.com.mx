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
<link href="<?=$fixed_uri?>lib/css/contacto.css" rel="stylesheet" type="text/css" />
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
                    <li class="seleccionado"><a href="#">Contacto</a></li>
                    <li><a href="<?=$menu[6]?>">Galeria</a></li>
                    <li><a href="<?=$menu[5]?>">Noticias</a></li>
                    <li><a href="<?=$menu[4]?>">Bolsa de trabajo</a></li>
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
    <div id="imagenPrincipalContacto">
    </div>
    
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="contenedorContacto">
    	  <h3>Nos encontramos a tus órdenes en:</h3>
		  <div class="marcoMapa"><iframe width="873" height="290" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=es&amp;oe=UTF8&amp;msa=0&amp;msid=200699030428652147663.0004b5e458c49aae713f7&amp;t=m&amp;vpsrc=0&amp;ll=19.526303,-96.886271&amp;spn=0.003539,0.009388&amp;z=17&amp;output=embed"></iframe></div>
          <p class="grande">Calle Olmos 1, Esquina Jacarandas. Fraccionamiento Fuentes de las Ánimas, Xalapa, Veracruz, México.<br />
          C.P. 91190<br />
		  rbalan@bcconsultores.com.mx</p>
          <a href="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=es&amp;oe=UTF8&amp;msa=0&amp;msid=200699030428652147663.0004b5e458c49aae713f7&amp;t=m&amp;vpsrc=0&amp;ll=19.526303,-96.886271&amp;spn=0.003539,0.009388&amp;z=17&amp;source=embed" class="link" >Ver en Google Maps</a>
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
        </div>
    </div>
</div>
</div><!-- TERMINA DIV CARGADOR -->	
</body>
</html>