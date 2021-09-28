<?php
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
}
print_r(json_encode($respuesta));
//return json_encode($respuesta);//transformamos el array a json para que JS lo sepa leer
?>