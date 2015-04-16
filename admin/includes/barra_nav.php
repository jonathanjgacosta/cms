<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" >Solvetic.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav">

<?php 

if(isset($_SESSION['tipo_usuario'])){?>

            <li class="active"><a href="/CMS/admin/backend.php">Home</a></li>

<?php if($_SESSION['tipo_usuario']==1){?>

<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/CMS/modulos/usuarios/listar_usuarios.php">Listar Usuarios</a></li>
                <li><a href="/CMS/modulos/usuarios/usuarios.php">Nuevo Usuario</a></li>
              </ul>
</li>

<?php }?>

<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contenido <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/CMS/modulos/contenido/listar_contenido.php">Listar Contenido</a></li>
                <li><a href="/CMS/modulos/contenido/contenido.php">Nuevo Contenido</a></li>
              </ul>
</li>


          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Imagenes <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/CMS/modulos/imagenes/listar_imagenes.php">Listar Imagenes</a></li>
                <li><a href="/CMS/modulos/imagenes/imagenes.php">Cargar Imagen</a></li>
              </ul>
          </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$_SESSION['nombre']?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/CMS/modulos/usuarios/usuarios.php?editar=<?=$_SESSION['id']?>">Editar Datos</a></li>
                <li class="divider"></li>
                <li><a href="/CMS/admin/login.php?terminar=1">Salir</a></li>
              </ul>
            </li>
          </ul>
       <?php }?>   
      </div>
    </nav>
