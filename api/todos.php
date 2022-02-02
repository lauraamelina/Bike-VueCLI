<?php header("Access-Control-Allow-Origin: *"); 

include_once('conexion.php');
$query = "SELECT * FROM recorridos";

$return = mysqli_query($conexion, $query);
$salida = [];

while($fila = mysqli_fetch_assoc($return)) {
    $salida[] = $fila;
}

echo json_encode($salida);

