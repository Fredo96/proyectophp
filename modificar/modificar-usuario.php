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
  if (isset($_POST['txtnombre'])) {

    //tomamos los valores
    $id = $_POST['txtid'];
    $nombre = $_POST['txtnombre'];
    $apellido = $_POST['txtapellido'];
    $email = $_POST['txtemail'];
    $usuario = $_POST['txtusuario'];


    //usar el método modificar()
    $bd->modificar("usuario", "nombre = '$nombre', apellido = '$apellido',
      email = '$email', usuario = '$usuario'", "idusuario = $id", "../consultar/ver-usuario.php");
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
          <article id="contenido" class="col-sm-9 col-md-9  col-lg-10">
          <div style="border: 1px solid #ccc;" class="panel panel-primary">
          <div class="panel-heading">
            <label for="usuario" id="panel"><span class="glyphicon glyphicon-eye-close"></span> FORMULARIO PARA MODIFICAR USUARIO</label>
          </div>
          <div class="panel-body">
          <form action="modificar-usuario.php" method="post">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nombres:</label>
                <div class="col-10">
                  <input class="form-control" name="txtnombre" type="text" id="example-text-input" value="<?php $bd-> mostrarValor('nombre', 'usuario', 'idusuario', $id); ?>" required onkeypress="return sololetras(event)" onpaste="return false">
                  <input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Apellidos:</label>
                <div class="col-10">
                  <input class="form-control" name="txtapellido" type="text" id="example-text-input" value="<?php $bd-> mostrarValor('apellido', 'usuario', 'idusuario', $id); ?>" required onkeypress="return sololetras(event)" onpaste="return false">
                  <input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email:</label>
                <div class="col-10">
                  <input class="form-control" name="txtemail" type="text" id="example-text-input" value="<?php $bd-> mostrarValor('email', 'usuario', 'idusuario', $id); ?>" required>
                  <input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nombre De Usuario:</label>
                <div class="col-10">
                  <input class="form-control" name="txtusuario" type="text" id="example-text-input" value="<?php $bd-> mostrarValor('usuario', 'usuario', 'idusuario', $id); ?>" required onkeypress="return sololetras(event)" onpaste="return false">
                  <input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <button type="submit" class="btn btn-md btn-primary" title="Modificar Usuario" ><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
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
