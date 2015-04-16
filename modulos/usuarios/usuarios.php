<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Usuarios</title>

<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

require_once($_SERVER['DOCUMENT_ROOT'].'/CMS/cms/conexion/modelo_conexion.php');

$conn = new modelo_conexion();

$datos_tipo_usuario = $conn->obtenerDatosSelect('tipo_usuario');

$tipo_usuario = '';


if(isset($_GET['editar'])){

$id_editar=$_GET['editar'];

$datos_usuario = $conn->obtenerDatosID('usuarios',$id_editar);

	foreach ($datos_usuario as $row) {

	$id = $row['id'];
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$usuario = $row['usuario'];
	$password = $row['password'];
	$tipo_usuario = $row['tipo_usuario'];

		}

}

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div id="primary" class="content-full-width">

                <form id="usuarioForm" method="post" class="form-horizontal mitad" action="listar_usuarios.php">
                
                <?php 
                if(isset($id_editar)){?>
                <h2>Editar Datos</h2>
                <?php } else{?>
                <h2>Creacion de Usuario</h2>
                <?php }?>  


                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombres</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="nombre" value="<?=isset($nombre)?$nombre:''?>"/>
                        </div>
                    </div>

                       <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="apellido" value="<?=isset($apellido)?$apellido:''?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Usuario</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="usuario" value="<?=isset($usuario)?$usuario:''?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" name="password" value="<?=isset($password)?$password:''?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo de Usuario</label>
                        <div class="col-lg-3">
                          
								<select name="tipo_usuario" id="tipo_usuario" class="form_control">
									<option value="">Seleccione </option>

							    	<?php foreach ($datos_tipo_usuario as $row2) {?>

 									<option value="<?=$row2['id']?>" 

 									<?=($row2['id']==$tipo_usuario)?'selected':'';?>>
 									<?=$row2['descripcion']?>
 									 </option>

                           			<?php }?>
                          		 </select>

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

    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=isset($id)?$id:''?>">
    

     </form>

         </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>