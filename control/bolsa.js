// JavaScript Document
$(document).ready(function(){
	$("table.tInfo tr").hover(function(){
		$(this).addClass("over");
	}, function(){
		$(this).removeClass("over");	
	});
});

function eliminar(id,extencion){
	if(confirm("¿Está seguro que desea eliminar el registro?")){
		$("#id").val(id);
		$("#extencion").val(extencion);
		$("#Accion").val("ELIMINAR");
		$("#Datos").submit();
	}
}