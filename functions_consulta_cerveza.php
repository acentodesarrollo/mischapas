<?php
function info_cerveza($id_chapa){
include("conexion.php");
//$consulta = "SELECT C.graduacion, C.descripcion, C.enlace_desc, FE.nom_fermentacion, M.nom_marca, REC.nom_recipiente, CO.nom_color, CE.nom_cervecera, CR.nom_ciudad, CH.foto, CH.num_repetida, C.nom_cerveza, F.nom_forma, RP.nom_region, PC.nom_pais, C.id, CH.id
$consulta = "SELECT *
    FROM cerveza C
    INNER JOIN fermentacion FE ON FE.id = C.id_fermentacion
    INNER JOIN marca M ON M.id = C.id_marca
    INNER JOIN recipiente REC ON REC.id = C.id_recipiente
    INNER JOIN color CO ON CO.id = C.id_color
    INNER JOIN ciudad_region CR ON CR.id = C.id_ciudad
    INNER JOIN cervecera CE ON CE.id = C.id_cervecera
    INNER JOIN chapas CH ON C.id = CH.id_cerveza
    INNER JOIN region_pais RP ON RP.id = CR.id_region
    INNER JOIN pais_continente PC ON PC.id = RP.id_pais 
    INNER JOIN forma F ON F.id = CH.id_forma
    INNER JOIN subtipo_tipo ST ON ST.id = C.id_subtipo
    INNER JOIN tipo T ON T.id = ST.id_tipo
    WHERE CH.id = " . $id_chapa . ";";
    $datos = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_array($datos);
    return $fila;
}

function guardar_cerveza($cerveza,$cervecera,$cervecera_id,$graduacion,$pais,$region,$region_id,$ciudad,$ciudad_id,$fermentacion,$color,$marca, $marca_id, $recipiente,$tipo,$subtipo,$desc,$enlace_desc){
    include("conexion.php");
    //Guardamos la imagen en el directorio y la ruta en bbdd
    // $directorio_img = "img/chapas/";
    // $fichero = $directorio_img . basename($imagen["name"]);//"imagen" se refiere al id del input
    // move_uploaded_file ($imagen["tmp_name"], $fichero);
    //comprobamos si la ciudad y region existen
    if($region_id==0){
        $consulta = "INSERT INTO `region_pais`(`nom_region`, `id_pais`) VALUES ('".$region."',".$pais.")";
        $conn->query($consulta);
        $region_id= $conn->insert_id;
        //echo $conn->insert_id;
    }
    if($ciudad_id==0){
        $consulta = "INSERT INTO `ciudad_region`(`nom_ciudad`, `id_region`) VALUES ('" . $ciudad . "'," . $region_id . ")";
        $conn->query($consulta);
        $ciudad_id = $conn->insert_id;
    }
    if ($cervecera_id == 0) {
        $consulta = "INSERT INTO `cervecera`(`nom_cervecera`) VALUES ('" . $cervecera . "')";
        $conn->query($consulta);
        $cervecera_id = $conn->insert_id;
    }
    if ($marca_id == 0) {
        $consulta = "INSERT INTO `marca`(`nom_marca`) VALUES ('" . $marca . "')";
        $conn->query($consulta);
        $marca_id = $conn->insert_id;
    }
    $consulta="INSERT INTO `cerveza`(`nom_cerveza`, `graduacion`, `id_fermentacion`, `id_marca`, `id_recipiente`, `id_subtipo`, `id_color`, `id_cervecera`, `id_ciudad`, `descripcion`, `enlace_desc`) VALUES (
        '" . $cerveza. "',
        " . $graduacion . ",
        " . $fermentacion . ",
        " . $marca_id . ",
        " . $recipiente . ",
        " . $subtipo . ",
        " . $color . ",
        " . $cervecera_id . ",
        " . $ciudad_id . ",
        '" . $desc . "',
        '" . $enlace_desc . "')";
    if($conn->query($consulta)){
        echo "La cerveza se ha guardado correctamente";
    }else{
        echo "Error: ".$consulta."<br>".$conn->error;
    }
}

function guardar_chapa($imagen, $cerveza_id, $repetida, $num_repetida, $forma)
{
    include("conexion.php");
    //Guardamos la imagen en el directorio y la ruta en bbdd
    $directorio_img = "img/chapas/";
    $fichero = $directorio_img . basename($imagen["name"]); //"imagen" se refiere al id del input
    move_uploaded_file($imagen["tmp_name"], $fichero);

    if(is_null($repetida)){
        $repetida = 0;
    }else{
        $repetida = 1;
    }
    
    $consulta = "INSERT INTO `chapas`(`id_cerveza`,`foto`, `repetida`,`num_repetida`,`id_forma`) VALUES (
        " . $cerveza_id . ",
        '" . $fichero . "',
        " . $repetida . ",
        " . $num_repetida .",
        " . $forma . ")";
    if($conn->query($consulta)){
        echo "La chapa se ha guardado correctamente";
    }else{
        echo "Error: ".$consulta."<br>".$conn->error;
    }
}
?>