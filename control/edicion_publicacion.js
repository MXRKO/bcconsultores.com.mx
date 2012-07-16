// JavaScript Document
$(document).ready(function(){
	$("#btGuardar").click(function(){
		if( $.trim($("#txtTitulo").val())!="" && $.trim($("#txtAutor").val())!="" && $.trim($("#txtContenido").val())!=""){
			if($("#chk_publicar").attr("checked"))
				$("#hfPublicar").val("1");
			else
				$("#hfPublicar").val("0");
			var count=0;
			$("#tArchivos tr td input[type=file]").each(function(){
				if($.trim($(this).val())!=""){
					count++;
				}
			});
			$("#hfImgs").val(count);
			$("#Accion").val("GUARDAR");							   
			$("#btGuardar").attr("disabled","disabled");
			$("#Datos").submit();
		}
		else{
			alert("¡Faltan campos requeridos!");	
		}
	});	
	
	$("#btModificar").click(function(){
		if( $.trim($("#txtTitulo").val())!="" && $.trim($("#txtAutor").val())!="" && $.trim($("#txtContenido").val())!=""){
			if($("#chk_publicar").attr("checked"))
				$("#hfPublicar").val("1");
			else
				$("#hfPublicar").val("0");
			var count=0;
			$("#tArchivos tr td input[type=file]").each(function(){
				if($.trim($(this).val())!=""){
					count++;
				}
			});
			$("#hfImgs").val(count);
			//alert($("#hfImgs").val());
			$("#btModificar").attr("disabled","disabled");
			$("#Accion").val("MODIFICAR");							   
			$("#Datos").submit();
		}
		else{
			alert("¡Faltan campos requeridos!");	
		}
	});	
	
	//$("#txtArchivo1").change(function(){listenerFile(1);});
	//$("#tArchivos tr td input[type=file]:last-child").change(function(){listenerFile(($("#tArchivos tr td img").length+1));});
	$("#txtArchivo"+($("#tArchivos tr td img").length+1)).change(function(){listenerFile(($("#tArchivos tr td img").length+1));});
	//alert($("#tArchivos tr td img").length);
});

function listenerFile(id){
	var valor=$("#txtArchivo"+id).val();							  
	var extencion=valor.split(".");
	if(extencion[extencion.length-1]=="jpg"||extencion[extencion.length-1]=="jpeg"||extencion[extencion.length-1]=="JPG"||extencion[extencion.length-1]=="JPEG"||extencion[extencion.length-1]=="png"||extencion[extencion.length-1]=="PNG"){
		if(ultimo(id)){
			$("#tArchivos").append("<tr id='tr"+(id+1)+"'><td width='11%' height='0'>Imágen</td><td width='89%' height='0'><label><input type='file' name='txtArchivo"+(id+1)+"' id='txtArchivo"+(id+1)+"' /></label> <input type='button' id='btEliminar"+(id+1)+"' name='btEliminar"+(id+1)+"' style='background-color:red;' value='Eliminar' onclick='eliminar("+(id+1)+")' /></td></tr>");
			$("#txtArchivo"+(id+1)).ready(function(){	
				$("#txtArchivo"+(id+1)).change(function(){listenerFile(id+1);});													
			});
		}
	}
	else{
		$("#txtArchivos"+id).val("");
		alert("Archivo no valido");
	}
}

function ultimo(actual){
	var bandera=0;
	var limite=0;
	var contador=1;
	var temp="";
	$("#tArchivos tr").each(function(){
		if(bandera>0){
			limite++;
		}
		if($(this).attr("id")=="tr"+actual){
			bandera=1;
			temp=$(this).attr("id");
		}
		contador++;
	});
	//alert("contador="+contador+", limite="+limite+", "+temp+", tr"+actual);
	if(limite>0) return false;
	return true;
}

function eliminar(id){
	$("#tr"+id).remove();
	//$("#hfImgs").val($("#hfImgs").val()-1);
}