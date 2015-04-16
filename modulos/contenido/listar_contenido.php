<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listado Contenido</title>

<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/modulos/contenido/contenido_clase.php');

$conn = new modelo_conexion();

$cont = new contenido_clase();

$id_contenido=isset($_POST['id_contenido'])?$_POST['id_contenido']:'';
$titulo=isset($_POST['titulo'])?$_POST['titulo']:'';
$contenido=isset($_POST['edit'])?$_POST['edit']:'';
$tipo_contenido=isset($_POST['tipo_contenido'])?$_POST['tipo_contenido']:'';
$fecha_publicacion=isset($_POST['datetimepicker'])?$_POST['datetimepicker']:'';

$id_eliminar=isset($_GET['eliminar'])?$_GET['eliminar']:'';

//Actualizacion del registro
if($id_contenido){

$datos_formulario = array($titulo, $contenido, $tipo_contenido, $fecha_publicacion);

$cont->actualizarContenido($datos_formulario, $id_contenido);

$mensaje_editar=1;

//Eliminacion del registro
}else if($id_eliminar){

$conn->eliminarDatos('contenidos', $id_eliminar);

$mensaje_eliminar=1;

//Creacion del nuevo registro
}else if($titulo){

$datos_formulario = array($titulo, $contenido, $tipo_contenido, $fecha_publicacion);

$cont->crearContenido($datos_formulario);

$mensaje_crear=1;

}

$datos_contenido = $conn->obtenerDatos('contenidos');

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div class="container">

	<h2>Listado de Contenido</h2><br>

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
                <th>Titulo</th>
                <th>Fecha Publicacion</th>
                <th>Tipo Contenido</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
              	<?php foreach ($datos_contenido as $row) {?>
              	<tr>
                <td><?=$row['id']?></td>
                <td><?=$row['titulo']?></td>
                <td><?=$row['fecha_publicacion']?></td>
                <td><?=($row['tipo_contenido']==1)?'Articulo':(($row['tipo_contenido']==2) ? 'Tutoriales' : 'Cursos'); ?></td>
                <td>
                	<a type="button" class="btn btn-success" href="contenido.php?editar=<?=$row['id']?>">Editar <span class="glyphicon glyphicon-pencil"></span></a>

                	<a type="button" class="btn btn-danger" href="listar_contenido.php?eliminar=<?=$row['id']?>">Eliminar <span class="glyphicon glyphicon-trash"></span></a>
                </td>
                    </tr>
                <?php }?>

          
             
            </tbody>
          </table>
        </div>
      </div>

    </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>