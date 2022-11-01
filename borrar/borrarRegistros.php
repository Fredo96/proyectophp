<?php 
//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");

//incluye el archivo conectar
include('../include/conectar.php');

//creamos un objeto instanciando la clase Conexions
$bd = new Conexion();

if (isset($_GET['campo']) and isset($_GET['tabla'] )) {

	//tomamos los id enviados anteriormente
	$campo = $_GET['campo'];
	$valorCampo = $_GET['valorCampo'];
	$tabla = $_GET['tabla'];
	$url = $_GET['url'];

	//usamos el método para modificar el estado a 0
	$resultado = $bd->modificarEstado($tabla, "estado=0", $campo."=".$valorCampo);

	if ($resultado == '1') {
		# funciona
		echo '<script>valor=confirm("Excelente,\nLos Datos Fueron Borrados");
							valor;
							if (valor == true) {
								location.href="'.$url.'";
							} else {
								location.href="'.$url.'";
							}
						</script>';	

	} else {
		# no funciona
		echo 	'<script>	
					valor=confirm("Lo sentimos,\nPor Favor Pruebe Otra Vez");
					valor;
							if (valor == true) {
								location.href="'.$url.'";
							} else {
								location.href="'.$url.'";
						}
				</script>';
	}

}

?>