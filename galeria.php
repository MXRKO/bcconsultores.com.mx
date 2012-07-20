<?
	include("lib/php/settings.php");
	
	$edos=array("cabada"=>array("edo"=>"Veracruz","mpio"=>"Ángel R. Cabada"),
				"ixcatepec"=>array("edo"=>"Veracruz","mpio"=>"Ixcatepec"),
				"lerdo"=>array("edo"=>"Veracruz","mpio"=>"Lerdo de Tejada"),
				"ixtaltepec"=>array("edo"=>"Oaxaca","mpio"=>"Ixtaltepec"),
				"juchitan"=>array("edo"=>"Oaxaca","mpio"=>"Juchitán de Zaragoza"));
	
	$imgs=array("cabada"=>array(0=>"3",1=>"11",2=>"14",3=>"15",4=>"17",5=>"25",6=>"26",7=>"32",8=>"34",9=>"35",10=>"37"),
				"ixcatepec"=>array(0=>"10"),				
				"ixtaltepec"=>array(0=>"1",1=>"2"),
				"juchitan"=>array(0=>"4",1=>"5",2=>"6",3=>"8",4=>"9",5=>"12",6=>"13",7=>"19",8=>"20",9=>"21",10=>"22",11=>"23",12=>"24",13=>"36",14=>"38"),
				"lerdo"=>array(0=>"7",1=>"16",2=>"18",3=>"27",4=>"28",5=>"29",6=>"30",7=>"31",8=>"33",9=>"39"));
	$limitImgs=array("cabada"=>11,
					 "ixcatepec"=>1,
					 "ixtaltepec"=>2,
					 "juchitan"=>15,
					 "lerdo"=>10);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="../../favicon.ico" />
<link href="../../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/galeria.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="../../lib/js/jquery-1.5.2.min.js"></script>
<script src="../../lib/js/menu.js"></script> 
<script src="../../lib/js/queryLoader.js"></script>
<script src="../../lib/js/jquery.jplayer.min.js"></script>  
<script src="../../galeria.js"></script>
<?
	if(!isset($_GET["mun"])){
		?>
		<script>window.location.href="../../galeria/";</script>
		<?	
	}
?>
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
<input type="hidden" name="mun" id="mun" value="<?=$_GET["mun"]?>" />
<div>
    <div id="top">
    	<div id="menu">
            <div id="logo">
            </div>
            <div id="contentMenu">
                <ul class="principal">
                    <li><a href="<?=$menu[7]?>">Contacto</a></li>
                    <li class="seleccionado"><a "../<?=$menu[6]?>">Galeria</a></li>
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
                <div class="seccion2">
                <h2 class="ruta"><a href="../../galeria/"><?=$edos[$_GET["mun"]]["edo"]?></a> &gt; <?=$edos[$_GET["mun"]]["mpio"]?></h2>
                </div>
                <!-- <p>En esta sección podrás disfruta de algunas imágenes captadas durante nuestras jornadas de trabajo</p>-->
            </div>
    	  	<div class="mascara">
                <div class="divImgs">
                    <div class="cuadroImagen">
                        <img class="imagengaleria" src="../../imagenes/galeria/img<?=$imgs[$_GET["mun"]][0]?>.jpg" width="495" height="367" />
                    </div>
                    <div class="divMiniaturas">
                        <ul class="ulThumbs">
                            <?
                            for($i=0; $i<$limitImgs[$_GET["mun"]]; $i++){
                                ?>
                                <li><a class="ainterno" tabindex="<?=$i?>" href="#"><img src="../../imagenes/galeria/thumb<?=$imgs[$_GET["mun"]][$i]?>.jpg" width="50" height="50" /></a></li>
                                <?
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="limpiar"></div>
                <div id="coments"></div>
                </div>
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
        		<p>Teléfonos: <img src="../../images/telefono.jpg" width="5" height="12" alt="tel" /> 01(228) 2001585 / (Lada sin costo) 01 (800) 001 58 52</p>
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