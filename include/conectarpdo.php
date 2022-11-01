<?php
//Funcion que contiene el enlace a la base de datos.
function conexion(){
	$conn = null;
	$host = 'localhost';
	$db = 'alfredo';
	$user = 'root';
	$pwd = '';
	
try{
	$conn = new PDO('mysql:host='.$host.'; dbname='.$db,$user,$pwd);
	//echo 'Conexion satisfactoria.<br>';
	
}catch(PDOException $e){
	//echo '<p> no se puede conectar con la base de datos!!</p>';
	exit();
	
}
return $conn;
	
}
//conexion();

?>