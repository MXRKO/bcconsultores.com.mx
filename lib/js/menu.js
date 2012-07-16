$(document).ready(function(){
	$("ul.principal li").hover(function(){
		if(!$(this).hasClass("seleccionado")){
			$(this).stop().animate({'border-bottom-width':"5",'margin-bottom':'0'},100);
		}
	},function(){
		if(!$(this).hasClass("seleccionado")){
			$(this).stop().animate({'margin-bottom':'5','border-bottom-width':"0"},100);
		}
	});						   
});
