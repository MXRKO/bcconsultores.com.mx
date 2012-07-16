// JavaScript Document
$(document).ready(function(){
	$("#btGuardar").click(function(){
		if( $.trim($("#txtTitulo").val())!="" && $.trim($("#txtAutor").val())!="" && $.trim($("#txtUrl").val())!="" && $.trim($("#txtContenido").val())!=""){
			$("#btGuardar").attr("disabled","disabled");
			$("#Accion").val("GUARDAR");							   
			$("#Datos").submit();
		}
		else{
			alert("¡Faltan campos requeridos!");	
		}
	});	
	
	$("#btModificar").click(function(){
		if( $.trim($("#txtTitulo").val())!="" && $.trim($("#txtAutor").val())!="" && $.trim($("#txtUrl").val())!="" && $.trim($("#txtContenido").val())!=""){
			$("#btModificar").attr("disabled","disabled");
			$("#Accion").val("MODIFICAR");							   
			$("#Datos").submit();
		}
		else{
			alert("¡Faltan campos requeridos!");	
		}
	});	
});