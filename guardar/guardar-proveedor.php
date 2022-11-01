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
  if (isset($_POST['txtNombre']))  {

    #tomar los datos
    $nombre = $_POST['txtNombre'];
    $direccion = $_POST['txtdireccion'];
    $telefono = $_POST['txttelefono'];
    //usar el método guardar()
    $bd->guardar("proveedores", "Nombre, Direccion, Telefono", "'".$nombre."', '".$direccion."', '".$telefono."'");

  }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php include ('../include/metas_links.php'); ?>
</head>
<body>
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

    numeros="0123456789-";

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
          <article id="contenido" class="col-sm-8 col-md-8  col-lg-9">

          <h3>FORMULARIO PARA GUARDAR PROVEEDOR</h3>
          <form action="guardar-proveedor.php" method="post" class="form-horizontal">
            <div class="form-group row">
              <label for="txtNombre" class="col-2 col-form-label">NONBRE</label>
              <div class="col-10">
                <input class="form-control" name="txtNombre" type="text" required id="txtNombre"  placeholder="Solo letras" onkeypress="return sololetras(event)" onpaste="return false">
              </div>
            </div>
            <div class="form-group row">
              <label for="txtApellido" class="col-2 col-form-label">DIRECCI&Oacute;N</label>
              <div class="col-10">
                <input class="form-control" name="txtdireccion" type="text" required id="txtdireccion" placeholder="letras y n&uacute;meros" >
              </div>
            </div>
            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">TEL&Eacute;FONO</label>
              <div class="col-10">
                <input class="form-control" type="text" placeholder="Solo n&uacute;meros" id="example-telefono-input" name="txttelefono" maxlength="9" onkeypress="return solonumeros(event)" onpaste="return false">
              </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <button type="submit" class="btn btn-md btn-primary" title="Guardar Cliente" ><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
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
