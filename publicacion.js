// JavaScript Document
$(document).ready(function(){
	$('#flotante').dialog({
		autoOpen: false,
		width: 485,
		resizable: false,
		modal: true,
		position: ['center',70]
	});
	
	$("img.gal").each(function(){
		$(this).click(function(){				  
			$('#flotante').load("../../imagen.php?id="+$("#idp").val()+"&sub="+getID($(this).attr("id"))).dialog("open");
			return false;
		});						   
	});
	
	
});

function getID(valor){
	var arr=valor.split("_");
	return arr[1];
}