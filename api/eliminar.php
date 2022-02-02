<?php header("Access-Control-Allow-Origin: *"); 

include_once('conexion.php');

function eliminar($id){ 
	global $conexion;
	$query = "DELETE FROM recorridos WHERE id in ($id) ";
	mysqli_query($conexion, $query);
	
	return traer_todos();
}


$id = $_POST["id"];

eliminar($id);
echo traer_todos();