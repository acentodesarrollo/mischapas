<?php
include("conexion.php");
$opcion=$_POST["enviar_opcion"];
$consulta=$_POST["consulta"];
$respuesta = array();
if($consulta){
    //case "cerveza":
        //$pais=$_POST["pais"];
        $consulta_tipo = "SELECT * FROM cerveza WHERE nom_cerveza LIKE '%".$opcion."%';";
        $datos = mysqli_query($conn, $consulta_tipo);
        while ($fila = mysqli_fetch_array($datos)) {
            array_push($respuesta,array("nombre"=>$fila["nom_cerveza"],"id"=>$fila["id"]));
}
print_r(json_encode($respuesta));
}
//return json_encode($respuesta);//transformamos el array a json para que JS lo sepa leer
