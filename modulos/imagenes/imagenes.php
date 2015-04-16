<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Imagenes</title>

<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_estilos.html');

?>

</head>
<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/barra_nav.php'); ?>

<div id="primary" class="content-full-width">

 <h2>Subir imagenes</h2>

            <form enctype="multipart/form-data" action="listar_imagenes.php" method="post">

                <div class="form-group">
                    <input id="file-5" name="img_subir[]" class="file" type="file" multiple="true" data-preview-file-type="any" data-upload-url="/CMS/cms/uploads">
                </div>

                <button type="submit" class="btn btn-success right">Subir imagenes</button>
            </form>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/CMS/admin/includes/inclusion_scripts.html'); ?>

</body>
</html>