<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Modulo de Instalacion</title>

<?php 

include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div id="primary" class="content-full-width">

                <form id="instalacionForm" method="post" class="form-horizontal mitad" action="/CMS/admin/login.php">

                <h2>Instalacion</h2>  

               <div class="alert alert-info" role="alert">
        <strong>Importante</strong> Al pulsar el boton de Continuar se iniciara el proceso de creacion de las tablas de la Base de Datos del CMS.
      </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombres</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="nombre" />
                        </div>
                    </div>

                       <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="apellido" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Usuario</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="usuario" value="Admin"/>
                        </div>
                    </div>

					<div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">

                            <button type="submit" class="btn btn-primary left">Continuar</button>

                        </div>
                    </div>
    

     </form>

         </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>