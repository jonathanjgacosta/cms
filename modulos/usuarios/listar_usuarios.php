<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listado Usuarios</title>

<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/modulos/usuarios/usuario_clase.php');

$conn = new modelo_conexion();

$usu = new usuario_clase();

$id_usuario=isset($_POST['id_usuario'])?$_POST['id_usuario']:'';
$nombre=isset($_POST['nombre'])?$_POST['nombre']:'';
$apellido=isset($_POST['apellido'])?$_POST['apellido']:'';
$usuario=isset($_POST['usuario'])?$_POST['usuario']:'';
$password=isset($_POST['password'])?$_POST['password']:'';
$tipo_usuario=isset($_POST['tipo_usuario'])?$_POST['tipo_usuario']:'';
$fecha_creacion = date("Y-m-d");

$id_eliminar=isset($_GET['eliminar'])?$_GET['eliminar']:'';

//Actualizacion del registro
if($id_usuario){

$datos_formulario = array($nombre,$apellido, $usuario,$password,$tipo_usuario,$fecha_creacion);

$usu->actualizarDatosUsuarios($datos_formulario, $id_usuario);

$mensaje_editar=1;

//Eliminacion del registro
}else if($id_eliminar){

$conn->eliminarDatos('usuarios', $id_eliminar);

$mensaje_eliminar=1;

//Creacion del nuevo registro
}else if($nombre){

$datos_formulario = array($nombre,$apellido, $usuario,$password,$tipo_usuario,$fecha_creacion);

$usu->ingresarDatosUsuarios($datos_formulario);

$mensaje_crear=1;

}

$datos_usuario = $conn->obtenerDatos('usuarios');

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div class="container">
  <h2>Listado de Usuarios</h2><br>


	<?php if(isset($mensaje_crear)==1){?>
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button">x</button>
              Registro Realizado con Exito
            </div>
    <?php }?>


    <?php if(isset($mensaje_editar)==1){?>
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button">x</button>
              Actualizacion Realizada con Exito
            </div>
    <?php }?>


	<?php if(isset($mensaje_eliminar)==1){?>
            <div class="alert alert-danger">
            <button class="close" data-dismiss="alert" type="button">x</button>
              Eliminacion Realizada con Exito
            </div>
    <?php }?>

<div class="col-md-10">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
              	<?php foreach ($datos_usuario as $row) {?>
              	<tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nombre']?></td>
                <td><?=$row['apellido']?></td>
                <td><?=$row['usuario']?></td>
                <td><?=($row['tipo_usuario']==1)?'Administrador':(($row['tipo_usuario']==2) ? 'Usuario Normal' : 'Solo Lectura'); ?></td>
                <td>
                	<a type="button" class="btn btn-success" href="usuarios.php?editar=<?=$row['id']?>">Editar <span class="glyphicon glyphicon-pencil"></span></a>

                	<a type="button" class="btn btn-danger" href="listar_usuarios.php?eliminar=<?=$row['id']?>">Eliminar <span class="glyphicon glyphicon-trash"></span></a>
                </td>
                    </tr>
                <?php }?>
             
            </tbody>
          </table>
        </div>
      </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>