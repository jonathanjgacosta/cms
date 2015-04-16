<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Creacion de Contenido</title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/editor_estilos.html'); 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

$conn = new modelo_conexion();

$datos_tipo_contenido = $conn->obtenerDatosSelect('tipo_contenido');

$tipo_contenido = '';


if(isset($_GET['editar'])){

$id_editar=$_GET['editar'];

$datos_contenido = $conn->obtenerDatosID('contenidos',$id_editar);

  foreach ($datos_contenido as $row) {

  $id = $row['id'];
  $titulo = $row['titulo'];
  $contenido = $row['contenido'];
  $tipo_contenido = $row['tipo_contenido'];
  $fecha_publicacion = $row['fecha_publicacion'];
  
    }

}


?>


</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

                <form id="contenidoForm" method="post" class="form-horizontal mitad" action="listar_contenido.php">
           
<?php 
                if(isset($id_editar)){?>
                <h2>Editar Contenido</h2>
                <?php } else{?>
                <h2>Creacion de Contenido</h2>
                <?php }?> 


<section id="editor">
      <textarea id='edit' name="edit" style="margin-top: 30px;">
         <?=html_entity_decode(isset($row['contenido'])?$row['contenido']:'')?>
      </textarea>
  </section>

<br><br>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Titulo</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="titulo" value="<?=isset($titulo)?$titulo:''?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo de Contenido</label>
                        <div class="col-lg-3">
                          
                <select name="tipo_contenido" id="tipo_contenido" class="form_control">
                  <option value="">Seleccione </option>

                    <?php foreach ($datos_tipo_contenido as $row2) {?>

                  <option value="<?=$row2['id']?>" 

                  <?=($row2['id']==$tipo_contenido)?'selected':'';?>>
                  <?=$row2['descripcion']?>
                   </option>

                                <?php }?>
                               </select>

                             </div>
                    </div>

  	<div class="form-group">
        <label class="col-lg-3 control-label">Fecha de Publicacion</label>
        <div class="col-lg-3">
                <input type="text" class="form-control" name="datetimepicker" id="datetimepicker" data-date-format="YYYY-MM-DD" value="<?=isset($fecha_publicacion)?$fecha_publicacion:''?>"/>
       	 </div>
    </div>

					<div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
								<?php if(isset($id_editar)){?>
                            <button type="submit" class="btn btn-success left">Actualizar</button>
								<?php }else {?>
                            <button type="submit" class="btn btn-success left">Guardar</button>
								<?php }?>

                        </div>
                    </div>

        <input type="hidden" name="id_contenido" id="id_contenido" value="<?=isset($id)?$id:''?>">
    

     </form>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/editor_scripts.html'); ?>

</body>
</html>