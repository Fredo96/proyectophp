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
</div>
<div class="container">
  <section class="main row">
    <article id="contenido" class="col-sm-9 col-md-9  col-lg-10">
      <div style="border: 1px solid #ccc;" class="panel panel-default">
        <div class="panel-heading">
          <label for="usuario" id="panel"><span class="glyphicon glyphicon-star"></span> P&Aacute;GINA PRINCIPAL</label>
        </div>
        <div class="panel-body text-center" id="panel-cuerpo">
          <img src="../img/5.png" id="img-logo" class="center-block img-responsive img-rounded" alt="Logo Empresarial" title="Logo Empresarial">
            <h2 id="btn-secundario"> Bienvenido <?php echo $_SESSION['nombreusuario']; ?></h2>
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
