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
  if (isset($_POST['txtNombre']) && isset($_POST['txtApellido'])) {

    #tomar los datos
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $email = $_POST['txtEmail'];
    $usuario = $_POST['txtUsuario'];
    $clave = $_POST['txtClave'];



    //usar el método guardar()
    $bd->guardar("usuario", "nombre, apellido, email, usuario, clave", "'".$nombre."', '".$apellido."', '".$email."', '".$usuario."', MD5('".$clave."')");

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

          <h3>FORMULARIO PARA GUARDAR USUARIO</h3>
          <form action="guardar-usuario.php" method="post" class="form-horizontal">
            <div class="form-group row">
              <label for="txtNombre" class="col-2 col-form-label">NOMBRE</label>
              <div class="col-10">
                <input class="form-control" name="txtNombre" type="text" required id="txtNombre"  placeholder="Solo letras" onkeypress="return sololetras(event)" onpaste="return false">
              </div>
            </div>
            <div class="form-group row">
              <label for="txtApellido" class="col-2 col-form-label">APELLIDOS</label>
              <div class="col-10">
                <input class="form-control" name="txtApellido" type="text" required id="txtApellido" placeholder="Solo letras" onkeypress="return sololetras(event)" onpaste="return false">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">EMAIL</label>
              <div class="col-10">
                <input class="form-control" type="email" placeholder="email@example.com" id="example-email-input" name="txtEmail">
              </div>
            </div>
            <div class="form-group row">
              <label for="txtUsuario" class="col-2 col-form-label">USUARIO</label>
              <div class="col-10">
                <input class="form-control" name="txtUsuario" type="text" required id="txtUsuario" placeholder="NombrePrimera&uacute;ltimaLetra del Apellido" onkeypress="return sololetras(event)" onpaste="return false">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">CLAVE</label>
              <div class="col-10">
                <input class="form-control" type="password" name="txtClave" id="example-password-input" placeholder="Ingrese la clave">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">CONFIRMAR CLAVE</label>
              <div class="col-10">
                <input class="form-control" type="password" name="txtClave2" id="example-password-input" placeholder="Repita la clave">
              </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <button type="submit" class="btn btn-md btn-primary" title="Guardar Cliente" ><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
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
