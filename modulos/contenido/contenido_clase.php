<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/conexion.php');

class contenido_clase{

//Metodo para insertar registros en la tabla contenidos

function crearContenido($datos){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('INSERT INTO contenidos VALUES (NULL,?, ?, ?, ?)');

$sentencia->bindParam(1, $titulo);
$sentencia->bindParam(2, $contenido);
$sentencia->bindParam(3, $tipo_contenido);
$sentencia->bindParam(4, $fecha_publicacion);

$titulo = $datos[0];
$contenido = $datos[1];
$tipo_contenido = $datos[2];
$fecha_publicacion = $datos[3];

$resultado = $sentencia ->execute();

return $resultado;

}

//Metodo para actualizar registros en la tabla contenidos

function actualizarContenido($datos, $id){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('UPDATE contenidos SET titulo=?, contenido=?, tipo_contenido=?, fecha_publicacion=? WHERE id=?');

$sentencia->bindParam(1, $titulo);
$sentencia->bindParam(2, $contenido);
$sentencia->bindParam(3, $tipo_contenido);
$sentencia->bindParam(4, $fecha_publicacion);
$sentencia->bindParam(5, $id_registro);

$titulo = $datos[0];
$contenido = $datos[1];
$tipo_contenido = $datos[2];
$fecha_publicacion = $datos[3];
$id_registro = $id;

$resultado = $sentencia ->execute();

return $resultado;

}

}

?>