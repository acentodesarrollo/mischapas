<?php
include("conexion.php");
$opcion = $_POST["enviar_opcion"];
$consulta = $_POST["consulta"];
$respuesta = array();
if ($consulta) {
    //case "cervecera":
    //$pais=$_POST["pais"];
    $consulta_tipo = "SELECT * FROM cervecera WHERE nom_cervecera LIKE '%" . $opcion . "%';";
    $datos = mysqli_query($conn, $consulta_tipo);
    while ($fila = mysqli_fetch_array($datos)) {
        array_push($respuesta, array("nombre" => $fila["nom_cervecera"], "id" => $fila["id"]));
    }
    print_r(json_encode($respuesta));
}
//return json_encode($respuesta);//transformamos el array a json para que JS lo sepa leer
