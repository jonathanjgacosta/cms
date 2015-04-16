<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/conexion.php');

class modelo_conexion{

//Metodo para obtener todos los datos de una tabla

public static function obtenerDatos($tabla){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('SELECT * FROM '.$tabla.'');
$sentencia ->execute();

$fila = $sentencia->fetchAll();

return $fila;

}

public static function obtenerDatosID($tabla, $id){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('SELECT * FROM '.$tabla.' WHERE id=?');

$sentencia->bindParam(1, $id_registro);
$id_registro = $id;

$sentencia ->execute();

$fila = $sentencia->fetchAll();

return $fila;

}


function obtenerDatosSelect($tabla){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('SELECT * FROM '.$tabla.' WHERE habilitado=1');

$sentencia ->execute();

$fila = $sentencia->fetchAll();

return $fila;

}


//Metodo para eliminar registros

public static function eliminarDatos($tabla, $id){

$pdo = conexion::obtenerConexion();

$sentencia  = $pdo->prepare('DELETE FROM '.$tabla.' WHERE id=?');

$sentencia->bindParam(1, $id_registro);
$id_registro = $id;

$sentencia ->execute();

}

}

?>