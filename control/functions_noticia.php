<?
function guardar_publicacion($titulo, $subtitulo, $autor, $url, $descripcion){
	if(mysql_query("INSERT INTO noticias(creacion, publicacion, titulo, subtitulo, descripcion, autor, url) VALUES(NOW(),NOW(),'".$titulo."','".$subtitulo."','".$descripcion."','".$autor."','".$url."')")){
		return "GUARDO";	
	}
	else{
		return "NOGUARDO";	
	}
}
function modificar_publicacion($id, $titulo, $subtitulo, $autor, $url, $descripcion){
	$sql="UPDATE noticias SET titulo='".$titulo."', subtitulo='".$subtitulo."', descripcion='".$descripcion."', autor='".$autor."', url='".$url."' WHERE id_publicacion='".$id."'";
	if(mysql_query($sql)){
		return "MODIFICO";	
	}
	else{
		return "NOMODIFICO";	
	}	
}
?>