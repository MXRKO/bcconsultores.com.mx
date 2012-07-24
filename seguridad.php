<?
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$settings["nombreSitio"]?></title>
<link rel="shortcut icon" href="../../favicon.ico" />
<link href="../../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/template1.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/seguridad.css" rel="stylesheet" type="text/css" />
<link href="../../lib/css/queryLoader.css" rel="stylesheet" type="text/css" />
<script src="../../lib/js/jquery-1.5.2.min.js"></script>
<script src="../../lib/js/menu.js"></script> 
<script src="../../lib/js/queryLoader.js"></script>
<script src="../../lib/js/jquery.jplayer.min.js"></script>  
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
                    <li><a href="../<?=$menu[7]?>">Contacto</a></li>
                    <li><a href="../<?=$menu[6]?>">Galeria</a></li>
                    <li><a href="../<?=$menu[5]?>">Noticias</a></li>
                    <li><a href="../<?=$menu[4]?>">Bolsa de trabajo</a></li>
                    <li><a href="../<?=$menu[3]?>">Publicaciones</a></li>
                    <li class="seleccionado"><a href="../<?=$menu[2]?>">Servicios</a></li>
                    <li><a href="../<?=$menu[1]?>">Quienes somos</a></li>
                    <li><a href="../<?=$menu[0]?>">Inicio</a></li>
                </ul>
            </div>
        </div>
        <div class="limpiar"></div>
	</div>
<div id="cargador"><!-- DIV CARGADOR -->	
    <div id="imagenPrincipalGaleria">
    </div>
    <div id="contenido">
    	<div class="topGaleriaImage">
        	<h2>Capacitación en materia de protección civil</h2>
            <p>Capacitar a la población sobre temas de protección civil, fomenta esquemas de prevención que generan una capacidad de respuesta inmediata ante fenómenos naturales destructivos y/o eventos inesperados, que colocan al individuo en situaciones que ponen en riesgo su vida. </p>
        </div>
        <div class="contenedorGaleria">
       	  <div class="topGaleria">                
				<h2>Capacitación en espacios laborales</h2>
            <p>Las empresas de cualquier giro, origen del capital y tamaño, tienen la obligación y necesidad de de operar bajo políticas de seguridad, que salvaguarden la integridad física de su personal y clientes, y que eviten deterioros en la infraestructura del inmueble.</p>
              <p>BC Consultores Ambientales y De Riesgos S.C., con base a las normas oficiales de Protección Civil y un equipo de profesionales altamente capacitados, ofrece a usted y a su personal las herramientas y capacidades adecuadas para responder en el momento de enfrentar una emergencia mediante los siguientes cursos talleres:</p>
                <table class="cursos" width="100%" border="1">
                  <tr>
                    <td class="head" width="22%"><h2>Taller</h2></td>
                    <td class="head" width="33%"><h2>Objetivos</h2></td>
                    <td class="head" width="32%"><h2>Temario</h2></td>
                    <td class="head" width="13%"><h2>Duración (Horas)</h2></td>
                  </tr>
                  <tr>
                    <td><p>Primeros Auxilios</p></td>
                    <td><p>Entrenar a los
                      participantes en las
                      destrezas y conocimiento
                      que les permitan salvar
                      una vida ante una
                    emergencia médica.</p></td>
                    <td>-Introducción.<br />
                      -Soporte vital básico.<br />
                      -Control de Hemorragias.<br />
                      -Estado de Shock.<br />
                      -Heridas.<br />
                      -Quemaduras.<br />
                      -Fracturas.<br />
                    -Movimiento de lesionado.</td>
                    <td><p class="cen">6</p></td>
                  </tr>
                  <tr>
                    <td><p>Formación de
                    Brigadas</p></td>
                    <td><p>Resaltar la importancia de
                      la formación de brigadas
                      de Protección Civil en
                      una empresa, como
                      recurso humano capaz de
                    enfrentar una emergencia.</p></td>
                    <td>-Introducción.<br />
                      -Personal de Brigadas de<br />
                      -Protección Civil.<br />
                      -Brigada de Evacuación.<br />
                      -Brigada de Primeros 
                      Auxilios.<br />
                      -Brigada de Prevención y Combate de Incendio.</td>
                    <td><p class="cen">6</p></td>
                  </tr>
                  <tr>
                    <td><p>Simulacros y
                      evacuación de
                    inmuebles</p></td>
                    <td><p>Proporcionar a lo
                      integrantes de una
                      empresa los elementos
                      metodológicos, que
                      les permitan planear e
                    instrumentar simulacros.</p></td>
                    <td>-Principios de un simulacro.<br />
                      -Características básicas.<br />
                      -Etapas para el diseño de un simulacro.<br />
                    -Recomendaciones.</td>
                    <td><p class="cen">2</p></td>
                  </tr>
                  <tr>
                    <td><p>Introducción al
                      SINAPROC (
                      Sistema Nacional
                      de Protección
                    Civil)</p></td>
                    <td><p>Dar a conocer a
                      los participantes la
                      organización del
                      SINAPROC para una óptima comprensión del papel
                      que representa una
                      empresa capacitada en materia de Protección
                    Civil.</p></td>
                    <td>-Introducción.<br />
                      -Antecedentes.<br />
                      -Objetivos.<br />
                    -Organización.</td>
                    <td><p class="cen">2</p></td>
                  </tr>
                  <tr>
                    <td><p>Señalización de
                    inmuebles</p></td>
                    <td><p>Ofrecer los conocimientos
                      sobre un sistema de
                      señalización en materia
                      de Protección Civil que
                      permita brindar unas
                      instalaciones seguras a
                    los ocupantes.</p></td>
                    <td>-Introducción.<br />
                      -Objetivo.<br />
                      -Campo de aplicación.<br />
                      -Definiciones.<br />
                      -Clasificación.<br />
                    -Especificaciones.</td>
                    <td><p class="cen">2</p></td>
                  </tr>
                  <tr>
                    <td><p>Plan de
                    Emergencia</p></td>
                    <td><p>Contar con estructura
                      de planeación de
                      respuesta ante situaciones de emergencia o de
                    desastres.</p></td>
                    <td>-Introducción.<br />
                      -Definición.<br />
                      -Objetivo.<br />
                      -Características.<br />
                    -Metodología.</td>
                    <td><p class="cen">2</p></td>
                  </tr>
                  <tr>
                    <td><p>Administración
                      de Refugios
                    Temporales</p></td>
                    <td><p>Brindar a los participantes
                      los conocimientos básicos
                      sobre la manera de
                      proporcionar abrigo a
                      una población afectada
                      y desplazada por un
                    desastre.</p></td>
                    <td>-Introducción.<br />
                      -Conceptos Generales.<br />
                      -Tipos.<br />
                      -Etapas de administración.<br />
                      -Características.<br />
                    -Áreas de distribución.</td>
                    <td><p class="cen">4</p></td>
                  </tr>
                </table>
                <p class="nota">*Al finalizar cada curso de manera exitosa, se ofrecerá al participante una constancia
expedida por la empresa y avalada por la Secretaría del Trabajo y Previsión Social (STPS),
la Secretaría de Protección Civil del Estado de Veracruz, la Cruz Roja Mexicana y el
Centro Nacional de Prevención de Desastres (CENAPRED).</p>
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