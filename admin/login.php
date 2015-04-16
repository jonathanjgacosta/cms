<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Modulo de Instalacion</title>

<?php 

include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/modulos/instalacion/instalacion_clase.php');

$conn = new modelo_conexion();

$inst = new instalacion_clase();

if(isset($_GET['terminar'])){

session_destroy();

}else if(isset($_POST['nombre'])){

$nombre=isset($_POST['nombre'])?$_POST['nombre']:'';
$apellido=isset($_POST['apellido'])?$_POST['apellido']:'';
$usuario=isset($_POST['usuario'])?$_POST['usuario']:'';
$password=$inst->generarClave();
$tipo_usuario=1;
$fecha_creacion = date("Y-m-d");

$datos_formulario = array($nombre,$apellido, $usuario,$password,$tipo_usuario,$fecha_creacion);


$inst->crearTablas();

$inst->crearAdmin($datos_formulario);

}

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div id="primary" align="content-full-width">

                <form id="instalacionForm" method="post" class="form-horizontal mitad" action="backend.php">

                <h2>Inicio de Sesion</h2>  


                    <div class="form-group">
                        <label class="col-lg-3 control-label">Usuario</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="usuario" />
                        </div>
                    </div>

                       <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>

					<div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">

                            <button type="submit" class="btn btn-warning center">Iniciar Sesion</button>

                        </div>
                    </div>
    

     </form>

         </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>