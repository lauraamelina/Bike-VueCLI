<?php header("Access-Control-Allow-Origin: *"); 

include_once('conexion.php');

function guardar($id, $nombre, $distancia, $duracion, $ambito, $dia) {
    global $conexion;

    $query = "INSERT INTO recorridos VALUES ($id, '$nombre', $distancia, $duracion, '$ambito', '$dia') on duplicate key update nombre = '$nombre', distancia = $distancia, duracion = $duracion, ambito = '$ambito', dia = '$dia' ";

    $return = mysqli_query($conexion, $query);
    echo mysqli_error($conexion);

    return traer_todos();

}

//Captura de datos 
$id =           $_POST["id"] ?? 'NULL';
$nombre =       $_POST["nombre"];
$distancia =    $_POST["distancia"];
$duracion =     $_POST["duracion"];
$ambito =       $_POST["ambito"];
$dia =          $_POST["dia"];

//Guardar nuevo recorrido
$nuevoRecorrido = guardar($id, $nombre, $distancia, $duracion, $ambito, $dia);

echo($nuevoRecorrido);

?>