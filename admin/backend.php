<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Panel de Administracion</title>

<?php 

include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html'); 

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/modulos/usuarios/usuario_clase.php');

$usu = new usuario_clase();

if(isset($_POST['usuario'])){

$usuario=isset($_POST['usuario'])?$_POST['usuario']:'';
$password=isset($_POST['password'])?$_POST['password']:'';

$datos_sesion = $usu->comprobarDatosUsuario('usuarios',$usuario, $password);

if($datos_sesion){ 

foreach($datos_sesion as $row){

$tipousuario = $row['tipo_usuario'];
$nombre_desplegar = $row['nombre'];
$idusuario = $row['id'];

}

session_start();
$_SESSION['tipo_usuario']=$tipousuario;
$_SESSION['nombre']=$nombre_desplegar;
$_SESSION['id']=$idusuario;

}

}


?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

    <div class="container">

      <div class="starter-template">
        <h1>Este es el Home del Back-End</h1>
        <p class="lead">Este es un texto de ejemplo para visualizar el contenedor del Back-End</p>
      </div>

    </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>