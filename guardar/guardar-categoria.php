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

  //tomar los valores enviados por post
  if (isset($_POST['txtdescripcion'])) {

    $descripcion = $_POST['txtdescripcion'];




    //usar el método guardar()
    $bd->guardar("categorias", "descripcion", "'".$descripcion."'");

  }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php include ('../include/metas_links.php'); ?>
</head>

<script>
  function sololetras(e){

    key=e.keyCode || e.which;

    teclado=String.fromCharCode(key).toLowerCase();

    letras =" abcdefghijklmnñopqrstuvwxyz";

    especiales="8-37-38-46-164";

    teclado_epecial=false;



    for (var i in especiales) {
     if (key==especiales[i]) {
      teclado_epecial=true;break;
      }
    }
if (letras.indexOf(teclado)==-1 && !teclado_epecial) {
  return false;
}

  }


function solonumeros(e){


    key=e.keyCode || e.which;

    teclado=String.fromCharCode(key);

    numeros="0123456789";

    especiales="8-37-38-46";//array

    teclado_epecial=false;


    for (var i in especiales) {

          if (key==especiales[i]){
             teclado_epecial=true;
          }
    }

if(numeros.indexOf(teclado)==-1 && !teclado_epecial) {
return false;
}

}




</script>
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
          <div style="border: 1px solid #ccc;" class="panel panel-default">
          <div class="panel-heading">
            <label for="usuario" id="panel"><span class="glyphicon glyphicon-eye-close"></span> FORMULARIO PARA GUARDAR CATEGOR&Iacute;AS</label>
          </div>
          <div class="panel-body">
          <form action="guardar-categoria.php" method="post">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">DESCRIPCI&Oacute;N:</label>
                <div class="col-10">
                  <input class="form-control" name="txtdescripcion" type="text" id="example-text-input" required onkeypress="return sololetras(event)" onpaste="return false">
                </div>
            </div>

                <div class="col-10">
                  <button type="submit" class="btn btn-md btn-primary" title="Guardar Cliente" ><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
                </div>
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
