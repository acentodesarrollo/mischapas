<?php
//Formulario alta chapa
include("conexion.php");
include("cabecera.php");
?>
<section id="listado">
    <ul>
        <?php
        $consulta_img_nom = "SELECT foto, num_repetida, CH.id, C.nom_cerveza FROM chapas CH, cerveza C WHERE C.id = CH.id_cerveza";
        $datos = mysqli_query($conn, $consulta_img_nom);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '<li><div id="img-listado"><img src="' . $fila['foto']. '"></div><a href="ficha.php?id_chapa=' . $fila["id"] . '" id="' . $fila['id'] . '">'. $fila['nom_cerveza']. '</a><br>Repeticiones: ' . $fila['num_repetida'] . '</li>';
        }
        ?>
    </ul>
</section>
<?php
include("footer.php");
?> 