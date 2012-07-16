// JavaScript Document
$(document).ready(function(){
	$("#btEntrar").click(function(){
		if($.trim($("#txtUser").val())!="" && $.trim($("#txtPass").val())!="" ){
			$("#Datos").submit();
		}
		else{
			alert("Debe escribir usuario y contraseña");	
		}			   
	});
});