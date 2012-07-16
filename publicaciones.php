<?
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
	$limite=6;
	$limitePalabras=55;
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
<link href="../lib/css/publicaciones.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="../lib/js/jquery-1.5.2.min.js"></script>
<script src="../lib/js/menu.js"></script> 
<script src="../lib/js/queryLoader.js"></script> 
<script src="../lib/js/jquery.jplayer.min.js"></script>
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
                    <li class="seleccionado"><a href="#">Publicaciones</a></li>
                    <li><a href="<?=$menu[2]?>">Servicios</a></li>
                    <li><a href="<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalPublicaciones">
    </div>
    <div id="contenido">
    	<div class="borderTop"></div>
    	  <div class="contenedorPublicaciones">
          <?
          $sql=mysql_query("SELECT*FROM publicaciones WHERE publicar=1 ORDER BY id DESC LIMIT ".$limite);
		  $sql2=mysql_query("SELECT*FROM publicaciones WHERE publicar=1");
		  if(mysql_num_rows($sql2)>0){
			  while($fila=mysql_fetch_array($sql)){
				  ?>
				  <div class="publicacion <?=@file_exists("imagenes/imgs_publicaciones/publicacion_".$fila["id"]."_1_thumb.jpg")==false?"completo":"";?>">
					<?
					if(@file_exists("imagenes/imgs_publicaciones/publicacion_".$fila["id"]."_1_thumb.jpg"))
					{
						?>
						<div class="imgItem">
							<img src="../imagenes/imgs_publicaciones/publicacion_<?=$fila["id"]?>_1_thumb.jpg" width="120" height="100" />                    	
							<p><?=formatoFecha($fila["fecha"])?></p>
						</div>
						<?
					}
					?>
					<div class="datos">
						<h5><?=utf8_encode($fila["titulo"])?></h5>
						<h4><?=utf8_encode($fila["subtitulo"])?></h4>
						<a class="autor" href="../publicacion/<?=$fila["id"]?>/"><?=utf8_encode($fila["autor"])?></a>
						<p class="modificado"><?
						$array= split(' ',$fila["descripcion"]);
						$actual=0;
						$texto="";
						while($actual<=$limitePalabras){
							$texto=$texto." ".$array[$actual];
							$actual++;
						}
						echo utf8_encode($texto)."...";
						?>                        
                        </p>
						<a class="link" href="../publicacion/<?=$fila["id"]?>/" >Leer más</a>
					</div>
					<div class="limpiar"></div>
				  </div>
				  <?
			  }
		  }
		  else{
		  ?>
          <p>Por el momento aún no hay publicaciones.</p>
          <?
		  }
		  ?>
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