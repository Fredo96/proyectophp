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

  #TOMAR EL VALOR POR GET
   if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  //tomar los valores enviados por post
  if (isset($_POST['txtdescripcion'])) {

    //tomamos los valores

    $id = $_POST['txtid'];
    $descripcion = $_POST['txtdescripcion'];



    //usar el método modificar()
    $bd->modificar("categorias", "descripcion = '$descripcion'", "Id_categoria = $id", "../consultar/ver-categoria.php");
  }

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
      <div class="container">
        <section class="main row">
          <article id="contenido" class="col-sm-9 col-md-9  col-lg-10">
          <div style="border: 1px solid #ccc;" class="panel panel-primary">
          <div class="panel-heading">
            <label for="usuario" id="panel"><span class="glyphicon glyphicon-eye-close"></span> FORMULARIO PARA MODIFICAR CATEGOR&Iacute;AS</label>
          </div>
          <div class="panel-body">
          <form action="modificar-categoria.php" method="post">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Descripci&oacute;n:</label>
                <div class="col-10">
                  <input class="form-control" name="txtdescripcion" type="text" id="example-text-input" value="<?php $bd-> mostrarValor('descripcion', 'categorias', 'Id_categoria', $id); ?>" required>

                  <input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <button type="submit" class="btn btn-md btn-primary" title="Modificar Pregunta" ><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
                </div>
            </div>
            </div>
          </div>
          </form>
    </article>
  </section>
</div>
<footer>
  <?php include ('../include/pie.php'); ?>
</footer>
  <?php include ('../include/js.php'); ?>
</body>
</html>
