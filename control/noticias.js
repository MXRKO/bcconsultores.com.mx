// JavaScript Document
$(document).ready(function(){
	$("table.tInfo tr").hover(function(){
		$(this).addClass("over");
	}, function(){
		$(this).removeClass("over");	
	});
	
	$("#btNuevo").click(function(){
		window.location.href="edicion_noticia.php";
	});
});

function modificar(id){
	window.location.href="edicion_noticia.php?id="+id;
}

function eliminar(id){
	if(confirm("¿Está seguro que desea eliminar el registro?")){
		$("#id").val(id);
		$("#Accion").val("ELIMINAR");
		$("#Datos").submit();
	}
}