// JavaScript Document
$(document).ready(function(){
	$("#btnEnviar").click(function(event){
		event.preventDefault();						   
		if($.trim($("#txtNombre").val())!="" && $.trim($("#txtApellidos").val())!="" && $.trim($("#txtArchivo").val())!="" ){
			$("#btnEnviar").attr("disabled",true);
			$("#Accion").val("ENVIAR");
			$("#Datos").submit();	
		}
		else{
			$("#btnEnviar").attr("disabled",false);
			alert("Debe llenar todos los campos");
			return false;
		}
	});					   
});