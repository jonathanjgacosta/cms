<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/conexion.php');

class imagenes_clase{

function subirImgServidor($ruta_tmp, $archivo){

move_uploaded_file($ruta_tmp, $archivo);

}

function eliminarImgServidor($ruta){

unlink($ruta);

}


function guardarDatosImg($datos){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('INSERT INTO imagenes VALUES (NULL,?, ?, ?)');

$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $ruta);
$sentencia->bindParam(3, $fecha_creacion);

$nombre = $datos[0];
$ruta = $datos[1];
$fecha_creacion = $datos[2];

$resultado = $sentencia ->execute();

return $resultado;

}




}

?>