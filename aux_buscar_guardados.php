<?php
// Buscamos y mostramos las opciones guradas en la base de datos como campo de texto predictivo
include("conexion.php");
$opcion=$_POST["enviar_opcion"];
$consulta=$_POST["consulta"];
$respuesta = array();
switch($consulta){
    case "region":
        $pais=$_POST["pais"];
        $consulta_tipo = "SELECT * FROM region_pais WHERE nom_region LIKE '%".$opcion."%' AND id_pais=".$pais.";";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
            array_push($respuesta,array("nombre"=>$fila["nom_region"],"id"=>$fila["id"]));
        }
break;
case "ciudad":
        $consulta_tipo = "SELECT * FROM ciudad_region WHERE nom_ciudad LIKE '%" . $opcion . "%'";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
            array_push($respuesta, array("nombre" => $fila["nom_ciudad"], "id" => $fila["id"]));
        }
break;
case "marca":
        $consulta_tipo = "SELECT * FROM marca WHERE nom_marca LIKE '%" . $opcion . "%';";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
        array_push($respuesta, array("nombre" => $fila["nom_marca"], "id" => $fila["id"]));
    }
break;
case "cervecera":
        $consulta_tipo = "SELECT * FROM cervecera WHERE nom_cervecera LIKE '%" . $opcion . "%';";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
            array_push($respuesta, array("nombre" => $fila["nom_cervecera"], "id" => $fila["id"]));
        }
break;
case "cerveza":
        $consulta_tipo = "SELECT * FROM cerveza WHERE nom_cerveza LIKE '%" . $opcion . "%';";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
            array_push($respuesta, array("nombre" => $fila["nom_cerveza"], "id" => $fila["id"]));
        }
}
print_r(json_encode($respuesta));
//return json_encode($respuesta);//transformamos el array a json para que JS lo sepa leer
?>
