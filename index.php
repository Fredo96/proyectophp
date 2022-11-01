<?php
  //para iniciar sesión
  session_start();
  //para destruir la sesión
  session_destroy();

  //incluir el archivo conectar
  include("include/conectar.php");

  //instanciar la clase Conexion
  $bd = new Conexion();

  //tomar los valores enviados por post
  if (isset($_POST['txtUsuario']) && isset($_POST['txtClave'])) {

    $usuario = $_POST['txtUsuario'];
    $clave = $_POST['txtClave'];
    //usar el método login() para entrar al sistema
    $bd->login($usuario, $clave);

  }

 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Colocar icono en la barra de título -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

    <title>Inicio de sesi&oacute;n</title>

    <!-- Bootstrap core CSS -->
       <link href="bootstrap3-7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap3-7/css/styleIndex.css" rel="stylesheet">
      <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>

  <body>
  <

    <section class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Ingrese sus datos</h2>
        <label for="inputUser" class="sr-only">Usuario</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Usuario" name = "txtUsuario" required autofocus>
        <label for="inputPassword" class="sr-only">Clave</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Clave" name = "txtClave" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
       
      </form>

    </section> <!-- /container -->

  </body>
</html>
