<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/conexion.php');

class usuario_clase{

//Metodo para insertar registros en la tabla usuario

function ingresarDatosUsuarios($datos){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('INSERT INTO usuarios VALUES (NULL,?, ?, ?, ?, ?, ?)');

$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $apellido);
$sentencia->bindParam(3, $usuario);
$sentencia->bindParam(4, $password);
$sentencia->bindParam(5, $tipo_usuario);
$sentencia->bindParam(6, $fecha_creacion);

$nombre = $datos[0];
$apellido = $datos[1];
$usuario = $datos[2];
$password = $datos[3];
$tipo_usuario = $datos[4];
$fecha_creacion = $datos[5];

$resultado = $sentencia ->execute();

return $resultado;

}

//Metodo para actualizar registros en la tabla usuario

function actualizarDatosUsuarios($datos, $id){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('UPDATE usuarios SET nombre=?, apellido=?, usuario=?, password=?, tipo_usuario=?, fecha_creacion=? WHERE id=?');

$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $apellido);
$sentencia->bindParam(3, $usuario);
$sentencia->bindParam(4, $password);
$sentencia->bindParam(5, $tipo_usuario);
$sentencia->bindParam(6, $fecha_creacion);
$sentencia->bindParam(7, $id_registro);

$nombre = $datos[0];
$apellido = $datos[1];
$usuario = $datos[2];
$password = $datos[3];
$tipo_usuario = $datos[4];
$fecha_creacion = $datos[5];
$id_registro = $id;

$resultado = $sentencia ->execute();

return $resultado;

}


public static function comprobarDatosUsuario($tabla, $usuario, $password){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('SELECT * FROM '.$tabla.' WHERE usuario=? AND password=?');

$sentencia->bindParam(1, $id_registro);
$sentencia->bindParam(2, $id_password);
$id_registro = $usuario;
$id_password = $password;

$sentencia ->execute();

$fila = $sentencia->fetchAll();

return $fila;

}



}

?>