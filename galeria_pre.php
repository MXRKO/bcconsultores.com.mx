<?
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="../favicon.ico" />
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/galeria.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="../lib/js/jquery-1.5.2.min.js"></script>
<script src="../lib/js/menu.js"></script> 
<script src="../lib/js/queryLoader.js"></script>
<script src="<?=$fixed_uri?>lib/js/jquery.jplayer.min.js"></script>  
<script src="../galeria.js"></script>
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
                    <li class="seleccionado"><a "#">Galeria</a></li>
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
    <div id="imagenPrincipalGaleria">
    </div>
    
    <div id="contenido">
    	<div class="borderTop"></div>
    	<div class="contenedorGaleria">
        	<div class="topGaleria">
                <div class="seccionTexto">
                <p>En esta sección podrás disfruta de algunas imágenes captadas durante nuestras jornadas de trabajo, elije alguna de nuestras galerias.</p>
                </div>
                <?
				$edos=array(0=>"Veracruz",1=>"Oaxaca");
                $mpios=array(0=>array(
								0=>array("municipio"=>"Ángel R. Cabada","param"=>"cabada","img"=>"img3.jpg"),
								1=>array("municipio"=>"Ixcatepec","param"=>"ixcatepec","img"=>"img10.jpg"),
								2=>array("municipio"=>"Lerdo de Tejada", "param"=>"lerdo","img"=>"img7.jpg")),
							 1=>array(
								0=>array("municipio"=>"Ixtaltepec","param"=>"ixtaltepec","img"=>"img1.jpg"),
								1=>array("municipio"=>"Juchitán de Zaragoza","param"=>"juchitan","img"=>"img4.jpg"))
						     );
				$limits=array(0=>3, 1=>2);
				
				for($j=0;$j<count($edos);$j++){				
					?>
					<div class="seccion"><h2><img src="../images/indicador2.jpg" height="12" width="12" /> <?=$edos[$j]?></h2></div>
					<?
					for($i=0;$i<$limits[$j];$i++){
						?>
						<div class="itemGaleria">
						<p><a class="titulo" href="../galerias/<?=$mpios[$j][$i]["param"]?>/"><?=$mpios[$j][$i]["municipio"]?></a></p>
						<div class="bgItem"><a href="../galerias/<?=$mpios[$j][$i]["param"]?>/"><img src="../imagenes/galeria/<?=$mpios[$j][$i]["img"]?>" width="190" height="134" /></a></div>
						</div>
						<?
					}
					?>
					<div class="limpiar"></div>
                	<?
				}
                ?>
                <div class="limpiar"></div>
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