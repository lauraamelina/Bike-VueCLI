<?php header("Access-Control-Allow-Origin: *");


$conexion = mysqli_connect('localhost', 'id17994420_vue_laura_lopez', 'Velobike@vue2021', 'id17994420_recorridos' );
//pass = Velobike@vue2021
//usuario = id17994420_vue_laura_lopez
//nombre = id17994420_recorridos
//host="localhost"


function traer_todos() { 
	global $conexion;
	$query = "SELECT * FROM recorridos ORDER BY dia";
	
	$fetch = mysqli_query($conexion, $query);
	$return = array();
	
	while ($a = mysqli_fetch_assoc($fetch)){
		$return[] = $a; 
	}
	
	return json_encode($return);
	
}

?>