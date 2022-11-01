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
  if (isset($_POST['txtid'])) {

    $id = $_POST['txtid'];
    $Fecha = $_POST['txtFecha'];
    $Codigo = $_POST['txtCodigo'];
     $Nombre = $_POST['txtNombre'];
     $Destino = $_POST['txtDestino'];
     $Descripcion = $_POST['txtDescripcion'];
      $Cantidad = $_POST['txtCantidad'];
       $Idpersonas = $_POST['txtIdpersonas'];



    //usar el método guardar()
    $bd->guardar("Salidas", "id, Fecha, Codigo, Nombre,Destino,Descripcion,Cantidad,Idpersonas", "'".$id."', '".$Fecha."','".$Codigo."','".$Destino."','".$Descripcion."', '".$Cantidad."', '".$Idpersonas."'");

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

    numeros="0123456789.";

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
          <article id="contenido" class="col-sm-9 col-md-9  col-lg-10">
          <div style="border: 1px solid #ccc;" class="panel panel-default">
          <div class="panel-heading">
            <label for="usuario" id="panel"><span class="glyphicon glyphicon-eye-close"></span> FORMULARIO PARA GUARDAR SALIDAS</label>
          </div>
          <div class="panel-body">
          <form action="guardar-salidas.php" method="post">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">id:</label>
                <div class="col-10">
                  <input class="form-control" name="txtid" type="text" id="example-text-input" required onkeypress="return solonumeros(event)" onpaste="return false">
                </div>
            </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Fecha:</label>
                <div class="col-10">
                  <input class="form-control" name="txtFecha" type="text" id="example-text-input" >
                  </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nombre:</label>
                <div class="col-10">
                  <input class="form-control" name="txtNombre" type="text" id="example-text-input" required onkeypress="return sololetras(event)" onpaste="return false">
                </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Destinos:</label>
                <div class="col-10">
                  <input class="form-control" name="txtDestino" type="text" id="example-text-input" required onkeypress="return sololetras(event)" onpaste="return false">
             </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Descripcion:</label>
                <div class="col-10">
                  <input class="form-control" name="txtDescripcion" type="text" id="example-text-input" required onkeypress="return sololetras(event)" onpaste="return false">
             </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Cantidad:</label>
                <div class="col-10">
                  <input class="form-control" name="txtCantidad" type="text" id="example-text-input" required onkeypress="return solonumeros(event)" onpaste="return false">
             </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">IdPersona:</label>
                <div class="col-10">
                  <input class="form-control" name="txtIdpersonas" type="text" id="example-text-input" required onkeypress="return solonumeros(event)" onpaste="return false">
                </div>
                </div>
             <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Codigo:</label>
                <div class="col-10">
                  <input class="form-control" name="txtCodigo" type="text" id="example-text-input" required onkeypress="return solonumeros(event)" onpaste="return false">
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
