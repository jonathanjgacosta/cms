<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listado Imagenes</title>

<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/modulos/imagenes/imagenes_clase.php');

$conn = new modelo_conexion();

$img = new imagenes_clase();

$id_eliminar=isset($_GET['eliminar'])?$_GET['eliminar']:'';

 if($id_eliminar){

$datos_img = $conn->obtenerDatosID('imagenes',$id_eliminar);

foreach ($datos_img as $row2) {
        $ruta_elim = $row2['ruta'].$row2['nombre'];

}

$img->eliminarImgServidor($ruta_elim);

$conn->eliminarDatos('imagenes', $id_eliminar);

$mensaje_eliminar=1;

//Creacion del nuevo registro y subida al servidor
}else if(isset($_FILES['img_subir'])){

$nombre=$_FILES['img_subir']['name'];
$tmp= $_FILES['img_subir']['tmp_name'];
$ruta="uploads/";

for($i=0;$i<sizeof($nombre);$i++){

	$img->subirImgServidor($tmp[$i], $ruta.$nombre[$i]);

	$fecha_creacion = date("Y-m-d");

	$datos_formulario = array($nombre[$i], $ruta, $fecha_creacion);

	$img->guardarDatosImg($datos_formulario);
}

$mensaje_crear=1;

}

$datos_img = $conn->obtenerDatos('imagenes');

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div class="container">

	<h2>Listado de Imagenes</h2><br>

	<?php if(isset($mensaje_crear)==1){?>
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button">x</button>
              Registro Realizado con Exito
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
                <th>Nombre</th>
                <th>Fecha Creacion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
              	<?php foreach ($datos_img as $row) {?>
              	<tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nombre']?></td>
                <td><?=$row['fecha_creacion']?></td>
                <td>
                	<a type="button" class="btn btn-danger" href="listar_imagenes.php?eliminar=<?=$row['id']?>">Eliminar <span class="glyphicon glyphicon-trash"></span></a>
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