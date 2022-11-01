<?php 
//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");

  //para iniciar sesión
  session_start();

  //incluye el archivo conectar
  include('../include/conectar.php');

  //creamos un objeto instanciando la clase Conexion
  $bd = new Conexion();

  //validar a sesión
  $bd->validarUsuario($_SESSION['validacion']);
 
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php include ('../include/metas_links.php'); ?>
</head>
<body>

<div class="container">
  <section id="cabecera" class="main row">
    <header id="cabecera" class="col-md-12">
      <?php include("../include/cabecera-principal.php"); ?>
    </header>
  </section>
    <article>
      </div>
<div class="container-fluid">
  <section class="main row">
    <article id="contenido" class="col-sm-12 col-md-12  col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <label for="usuario" id="panel"><span class="glyphicon glyphicon-search"></span> CONSULTAS RELACIONADAS CON LAS VENTAS</label>
        </div>
        <div class="panel-body">
          <!-- Lista de tags que se ven por defecto aparece el primero -->
          <ul class="nav nav-tabs">
          <li class="active"><a id="btn-secundario" data-toggle="tab" href="#home"><span class="glyphicon glyphicon-eye-close"></span>VENTA</a></li>
        </ul>

        <!-- contenido de cada tag -->
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3 id="btn-secundario">VENTAS REGISTRADOS</h3>
            <?php include("consultar-venta.php"); ?>
          </div>
        </div>
        </div>
      </div>
    </article>
  </section>
</div>
<footer>
  <?php include ('../include/pie.php'); ?>
</footer>
  <?php include ('../include/js.php'); ?>
</body>
</html>