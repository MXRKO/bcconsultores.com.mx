// JavaScript Document
$(document).ready(function(){
	$("#btnEnviar").click(function(event){
		event.preventDefault();						   
		if($.trim($("#txtNombre").val())!="" && $.trim($("#txtApellidos").val())!="" && $.trim($("#txtArchivo").val())!="" ){
			$("#Accion").val("ENVIAR");
			$("#Datos").submit();	
		}
		else{
			alert("Debe llenar todos los campos");
			return false;
		}
	});					   
});