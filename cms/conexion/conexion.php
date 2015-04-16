<?php

require_once($_SERVER['DOCUMENT_ROOT'].'CMS/cms/rutas.php');

class conexion {

public static function obtenerConexion(){

$archivo_config = rutas::obtenerConfig();

$xmlconfig = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$archivo_config);

$host= $xmlconfig->database->host;
$usuario= $xmlconfig->database->username;
$password= $xmlconfig->database->password;
$db= $xmlconfig->database->dbname;

$conn = new PDO('mysql:host='.$host.';dbname='.$db.'', $usuario, $password);

return $conn;

	}

}

?>