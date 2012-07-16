<?
function guardar_publicacion($titulo, $subtitulo, $autor, $descripcion, $publicar){
	if(mysql_query("INSERT INTO publicaciones(titulo, subtitulo, autor, descripcion, fecha, publicar) VALUES('".$titulo."','".$subtitulo."','".$autor."','".$descripcion."',NOW(),'".$publicar."')")){
		return "GUARDO";	
	}
	else{
		return "NOGUARDO";	
	}
}
function modificar_publicacion($id, $titulo, $subtitulo, $autor, $descripcion, $publicar){
	$sql="UPDATE publicaciones SET titulo='".$titulo."', subtitulo='".$subtitulo."', descripcion='".$descripcion."', autor='".$autor."', publicar='".$publicar."' WHERE id='".$id."'";
	if(mysql_query($sql)){
		return "MODIFICO";	
	}
	else{
		return "NOMODIFICO";	
	}	
}
?>