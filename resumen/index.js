// JavaScript Document
$(function(){
	//QueryLoader.selectorPreload = ".contenedor";
	//QueryLoader.init();
});	
	
$(document).ready(function(){					   
	
	$('div.contenedor').cycle({ 
		fx:      'scrollVert', 
		speed:    1100, 
		slices: 6,
		timeout:  0,
		pause:	1,
		height:	'870px',
		pager: '.opciones ul',
		pagerAnchorBuilder: function(idx, slide) {
			// return selector string for existing anchor
			return '.opciones ul li:eq(' + idx + ')';
		}
	});
	
	//$("#ulprincipal").localScroll();
	
	$('div.perfiles').cycle({ 
		fx:      'fade', 
		speed:    600, 
		slices: 16,
		timeout:  2500,
		pause:	1,
		pager: 'ul.ulIntegrantes',
		pagerAnchorBuilder: function(idx, slide) {
			// return selector string for existing anchor
			return 'ul.ulIntegrantes li:eq(' + idx + ') a';
		}
	});
	
	$(".opciones > ul li:eq(0)").click(function(){ 
		$(".contenedor").css({height:'870'});
		//$('#nav li:eq(2) a').trigger('click'); 
		return false; 
	});
	
	$(".opciones > ul li:eq(1)").click(function(){ 
		$(".contenedor").css({height:'750'});
		return false; 
	});
	
	$(".opciones > ul li:eq(2)").click(function(){ 
		$(".contenedor").css({height:'890'});
		return false; 
	});
	
	$(".opciones > ul li:eq(3)").click(function(){ 
		$(".contenedor").css({height:'1800'});
		return false; 
	});
	
	$(".opciones > ul li:eq(4)").click(function(){ 
		$(".contenedor").css({height:'750'});
		return false; 
	});
	
	$(".opciones > ul li:eq(5)").click(function(){ 
		$(".contenedor").css({height:'870'});
		return false; 
	});
	
	$(".opciones > ul li:eq(6)").click(function(){ 
		$(".contenedor").css({height:'750'});
		return false; 
	});
	 
	$('.cabada_campo img, .juchitan_campo img, .juchitan_cartografia img, .lerdo_campo img, .lerdo_cartografia img').hoverpulse({
        size: 20,  // number of pixels to pulse element (in each direction)
        speed: 250 // speed of the animation 
    }).each(function() {
    	var $img = $(this);
    	var path = $img.attr('data-path');
		var titulo = $img.attr('alt');
		var alto=$img.attr('data-height');
		var ancho=$img.attr('data-width');
    	$img.click(function() {
    		//TINY.box.show({image:path,boxid:'frameless',animate:true, html:"<div style='padding:10px;'><p>"+titulo+"</p></div>"})
			TINY.box.show({boxid:'frameless',animate:true, height:alto, width:ancho, html:"<div><div style='background-color:#000; color:#FFF; padding:10px 10px 10px 20px; width:"+ancho+";'><p font-size:13px;'>"+titulo+"</p></div><img src='"+path+"' alt='"+titulo+"' /></div>"})
    		return false;
    	});
    });
	 
	$('.cabada_cartografia img').hoverpulse({
        size: 15,  // number of pixels to pulse element (in each direction)
        speed: 300 // speed of the animation 
    }).each(function() {
    	var $img = $(this);
    	var path = $img.attr('data-path');
		var titulo = $img.attr('alt');
    	$img.click(function() {
    		//TINY.box.show({image:path,boxid:'frameless',animate:true, html:"<div style='padding:10px;'><p>"+titulo+"</p></div>"})
			TINY.box.show({boxid:'frameless',animate:true, height:604, width:680, html:"<div><div style='background-color:#000; color:#FFF; padding:10px 10px 10px 20px;'><p>"+titulo+"</p></div><img src='"+path+"' alt='"+titulo+"' /></div>"});
    		return false;
    	});
    });
	
	$(".cabada_campo, .cabada_cartografia, .juchitan_campo, .juchitan_cartografia, .lerdo_campo, .lerdo_cartografia").css({height:'22px',overflow:'hidden'});
	
	$(".cabada_campo, .cabada_cartografia, .juchitan_campo, .juchitan_cartografia, .lerdo_campo, .lerdo_cartografia").toggle(function(){
		$(".contenedor, .clientes").animate({height:(parseInt(getPx($(".contenedor").css("height")))+parseInt($(this).attr("data-height")))+"px"});
		$(this).animate({height:$(this).attr("data-height")+'px'},400);								  
	},function(){
		$(this).animate({height:"22px"},400);						
		$(".contenedor, .clientes").animate({height:(parseInt(getPx($(".contenedor").css("height")))-parseInt($(this).attr("data-height")))+"px"});
	});
});


function getPx(pixeles){
	var px=pixeles.split("px");
	return px[0]; 
}