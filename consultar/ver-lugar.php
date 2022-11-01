<?php 

//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");

	//para iniciar sesión
	session_start();

	//incluye el archivo conectar
	include('../../include/conectar.php');

	//creamos un objeto instanciando la clase Conexion
	$bd = new Conexion();

	//validar a sesión
	$bd->validarUsuario($_SESSION['validacion']);

	//validar el envío del formulario
	if (isset($_POST['txtNombre'])) {
		//tomamos los valores
		$nombre = $_POST['txtNombre'];


	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include ("../metas_links.html"); ?>
</head>
<body>
<div class="container-fluid">
	<header id="logo-fijo" class="main row">
		<center>
			<img  id="logo" class="img-responsive" alt="Este es EL logo" src="../../img/logo.png" />
		</center>
	</header>
</div>
<div class="container-fluid">
	<section id="cabecera" class="main row">
		<header id="cabecera" class="col-md-12">
			<?php include("../cabecera/cabecera-guardar-estudiante.php"); ?>
		</header>
	</section>
</div>
<div class="container-fluid">
	<section class="main row">
		<article id="contenido" class="col-sm-12 col-md-12  col-lg-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <label for="usuario" id="panel"><span class="glyphicon glyphicon-search"></span> CONSULTAS RELACIONADAS CON LOS LUGARES</label>
			  </div>
			  <div class="panel-body">
			  	<!-- Lista de tags que se ven por defecto aparece el primero -->
			  	<ul class="nav nav-tabs">
				  <li class="active"><a id="btn-secundario" data-toggle="tab" href="#home"><span class="glyphicon glyphicon-flag"></span> Pa&iacute;s</a></li>
				  <li><a id="btn-secundario" href="ver-departamento.php"><span class="glyphicon glyphicon-map-marker"></span> Departamento - Estado</a></li>
				  <li><a id="btn-secundario"  href="ver-ciudad.php"><span class="glyphicon glyphicon-stats"></span> Cuidad - Municipio</a></li>
				  <li><a id="btn-secundario"  href="ver-temporada.php"><span class="glyphicon glyphicon-cloud"></span> Temporada</a></li>
				  <li><a id="btn-secundario"  href="ver-destino.php"><span class="glyphicon glyphicon-picture"></span> Destino</a></li>
				</ul>

				<!-- contenido de cada tag -->
				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active">
				    <h3 id="btn-secundario">PAICES REGISTRADOS</h3>
				    <?php include("consultar-pais.php"); ?>
				  </div>
				</div>
			  </div>
			</div>
		</article>
	</section>
</div>
<footer>
	<?php include ('../../include/pie.html'); ?>
</footer>
</body>
</html>