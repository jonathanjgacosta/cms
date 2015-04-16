<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/conexion.php');

class instalacion_clase{

//Metodo para crear el admin

function crearAdmin($datos){

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

//Metodo para crear una clave aleatoria

function generarClave(){

$longitud = 8;
$pass = substr(md5(rand()),0,$longitud);

return $pass;

}

//Metodo para crear las tablas

function crearTablas(){

    $pdo = conexion::obtenerConexion();

	$crearTablas = $pdo->exec("CREATE TABLE IF NOT EXISTS contenidos (
  id int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(255) NOT NULL,
  contenido text NOT NULL,
  tipo_contenido int(11) NOT NULL,
  fecha_publicacion date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS imagenes (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  ruta text NOT NULL,
  fecha_creacion date NOT NULL,
  PRIMARY KEY (id)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

  CREATE TABLE IF NOT EXISTS tipo_contenido (
  id int(11) NOT NULL AUTO_INCREMENT,
  descripcion varchar(255) NOT NULL,
  habilitado int(11) NOT NULL,
  PRIMARY KEY (id),
    UNIQUE KEY id (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO tipo_contenido (id, descripcion, habilitado) VALUES
(1, 'Servicios', 1),
(2, 'Equipo', 1),
(3, 'Acerca de', 1);


CREATE TABLE IF NOT EXISTS tipo_usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  descripcion varchar(255) NOT NULL,
  habilitado int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Volcado de datos para la tabla tipo_usuario
--

INSERT INTO tipo_usuario (id, descripcion, habilitado) VALUES
(1, 'Administrador', 1),
(2, 'Usuario Normal', 1),
(3, 'Solo Lectura', 1);


CREATE TABLE IF NOT EXISTS usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(45) NOT NULL,
  apellido varchar(45) NOT NULL,
  usuario varchar(45) NOT NULL,
  password varchar(45) NOT NULL,
  tipo_usuario int(11) NOT NULL,
  fecha_creacion date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;


  ");






}


}
?>