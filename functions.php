<?php
//Buscamos la información de una cerveza relacionada con una chapa concreta para mostrarla en la ficha de la chapa
function info_cerveza_by_chapa($id_chapa)
{
    include("conexion.php");
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

//Buscamos la información de una cerveza según la id de la cerveza para mostrarla en caso de que necesitemos editarla
function info_cerveza_by_id($id_cerveza)
{
    include("conexion.php");
    $consulta = "SELECT *
    FROM cerveza C
    INNER JOIN fermentacion FE ON FE.id = C.id_fermentacion
    INNER JOIN marca M ON M.id = C.id_marca
    INNER JOIN recipiente REC ON REC.id = C.id_recipiente
    INNER JOIN color CO ON CO.id = C.id_color
    INNER JOIN ciudad_region CR ON CR.id = C.id_ciudad
    INNER JOIN cervecera CE ON CE.id = C.id_cervecera
    INNER JOIN region_pais RP ON RP.id = CR.id_region
    INNER JOIN pais_continente PC ON PC.id = RP.id_pais 
    INNER JOIN subtipo_tipo ST ON ST.id = C.id_subtipo
    INNER JOIN tipo T ON T.id = ST.id_tipo
    WHERE C.id = " . $id_cerveza . ";";
    $datos = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_array($datos);
    return $fila;
}

//Guardamos los datos de una nueva cerveza en la base de datos
function guardar_cerveza($cerveza, $cervecera, $cervecera_id, $graduacion, $pais, $region, $region_id, $ciudad, $ciudad_id, $fermentacion, $color, $marca, $marca_id, $recipiente, $tipo, $subtipo, $desc, $enlace_desc)
{
    include("conexion.php");
    //comprobamos si la ciudad y region existen
    if ($region_id == 0) {
        $consulta = "INSERT INTO region_pais(nom_region, id_pais) VALUES ('" . $region . "'," . $pais . ")";
        $conn->query($consulta);
        $region_id = $conn->insert_id;
    }
    if ($ciudad_id == 0) {
        $consulta = "INSERT INTO ciudad_region(nom_ciudad, id_region) VALUES ('" . $ciudad . "'," . $region_id . ")";
        $conn->query($consulta);
        $ciudad_id = $conn->insert_id;
    }
    if ($cervecera_id == 0) {
        $consulta = "INSERT INTO cervecera(nom_cervecera) VALUES ('" . $cervecera . "')";
        $conn->query($consulta);
        $cervecera_id = $conn->insert_id;
    }
    if ($marca_id == 0) {
        $consulta = "INSERT INTO marca(nom_marca) VALUES ('" . $marca . "')";
        $conn->query($consulta);
        $marca_id = $conn->insert_id;
    }
    $consulta = "INSERT INTO cerveza(nom_cerveza, graduacion, id_fermentacion, id_marca, id_recipiente, id_subtipo, id_color, id_cervecera, id_ciudad, descripcion, enlace_desc) VALUES (
        '" . $cerveza . "',
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
    if ($conn->query($consulta)) {
        echo "La cerveza se ha guardado correctamente";
    } else {
        echo "Error: " . $consulta . "<br>" . $conn->error;
    }
}

//Guardamos los cambios de una cerveza que ya teniamos guardada en la base de datos
function actualizar_cerveza($cerveza, $cervecera, $cervecera_id, $graduacion, $pais, $region, $region_id, $ciudad, $ciudad_id, $fermentacion, $color, $marca, $marca_id, $recipiente, $tipo, $subtipo, $desc, $enlace_desc, $id)
{
    include("conexion.php");
    //comprobamos si la ciudad y region existen
    if ($region_id == 0) {
        $consulta = "INSERT INTO region_pais(nom_region, id_pais) VALUES ('" . $region . "'," . $pais . ")";
        $conn->query($consulta);
        $region_id = $conn->insert_id;
    }
    if ($ciudad_id == 0) {
        $consulta = "INSERT INTO ciudad_region(nom_ciudad, id_region) VALUES ('" . $ciudad . "'," . $region_id . ")";
        $conn->query($consulta);
        $ciudad_id = $conn->insert_id;
    }
    if ($cervecera_id == 0) {
        $consulta = "INSERT INTO cervecera(nom_cervecera) VALUES ('" . $cervecera . "')";
        $conn->query($consulta);
        $cervecera_id = $conn->insert_id;
    }
    if ($marca_id == 0) {
        $consulta = "INSERT INTO marca(nom_marca) VALUES ('" . $marca . "')";
        $conn->query($consulta);
        $marca_id = $conn->insert_id;
    }
    $consulta = "UPDATE cerveza SET nom_cerveza='" . $cerveza . "',
    graduacion=" . $graduacion . ", 
    id_fermentacion=" . $fermentacion . ", 
    id_marca=" . $marca_id . ", 
    id_recipiente=" . $recipiente . ", 
    id_subtipo=" . $subtipo . ", 
    id_color=" . $color . ", 
    id_cervecera=" . $cervecera_id . ", 
    id_ciudad=" . $ciudad_id . ", 
    descripcion='" . $desc . "', 
    enlace_desc='" . $enlace_desc . "' 
    WHERE id=" . $id . ";";
    if ($conn->query($consulta)) {
        return true;
    } else {
        echo "Error: " . $consulta . "<br>" . $conn->error;
        return false;
    }
}

function eliminar_cerveza($id){
    include("conexion.php");
    $consulta="DELETE FROM cerveza WHERE id=".$id;
    echo $consulta;
    mysqli_query($conn, $consulta);
}

//Guardamos los datos de una nueva chapa en la base de datos
function guardar_chapa($imagen, $cerveza_id, $repetida, $num_repetida, $forma)
{
    include("conexion.php");
    $directorio_img = "img/chapas/";
    if($imagen['tmp_name']!=''){
        //Guardamos la imagen en el directorio y la ruta en bbdd
        $fichero = $directorio_img . basename($imagen["name"]); //"imagen" se refiere al id del input
        move_uploaded_file($imagen["tmp_name"], $fichero);
    }else{
        $fichero = $directorio_img . "generica.png"; //"imagen" se refiere al id del input
    }

    if (is_null($repetida)) {
        $repetida = 0;
    } else {
        $repetida = 1;
    }

    $consulta = "INSERT INTO chapas(id_cerveza,foto, repetida,num_repetida,id_forma) VALUES (
        " . $cerveza_id . ",
        '" . $fichero . "',
        " . $repetida . ",
        " . $num_repetida . ",
        " . $forma . ")";
    if ($conn->query($consulta)) {
        echo "La chapa se ha guardado correctamente";
    } else {
        echo "Error: " . $consulta . "<br>" . $conn->error;
    }
}

//Sacamos de la base de datos todos los datos de la chapa para mostrarlos en la ficha.
function info_chapa($id){
    include("conexion.php");
    $consulta = "SELECT *
    FROM chapas CH
    INNER JOIN cerveza C ON C.id=CH.id_cerveza
    WHERE CH.id = " . $id . ";";
    $datos = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_array($datos);
    return $fila;
}

//Guardamos los cambios de una chapa que ya tení­amos guardada en la base de datos.
function actualizar_chapa($imagen, $cerveza_id, $repetida, $num_repetida, $forma, $id, $fichero)
{
    include("conexion.php");
    if($imagen['tmp_name']!=''){
        //Guardamos la imagen en el directorio y la ruta en bbdd
        $directorio_img = "img/chapas/";
        $fichero = $directorio_img . basename($imagen["name"]); //"imagen" se refiere al id del input
        move_uploaded_file($imagen["tmp_name"], $fichero);
    }

    if (is_null($repetida)) {
        $repetida = 0;
    } else {
        $repetida = 1;
    }

    $consulta = "UPDATE chapas 
    SET id_cerveza=" . $cerveza_id . ",
    foto='" . $fichero . "',
    repetida=" . $repetida . ",
    num_repetida=" . $num_repetida . ",
    id_forma=" . $forma . " WHERE id=" . $id . ";";
    if ($conn->query($consulta)) {
        echo "La chapa se ha editado correctamente";
    } else {
        echo "Error: " . $consulta . "<br>" . $conn->error;
    }
}
?>