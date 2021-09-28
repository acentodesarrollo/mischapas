<?php
include_once("conexion.php");
include("admin_cabecera.php");
?>
<section id="admin-listado">
    <h1>Listado chapas</h1>
    <ul id="admin-listado">
        <?php
        $consulta_img_nom = "SELECT foto, num_repetida, CH.id, C.nom_cerveza FROM chapas CH, cerveza C WHERE C.id = CH.id_cerveza";
        $datos = mysqli_query($conn, $consulta_img_nom);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '<li><div id="img-admin-listado"><img src="' . $fila['foto'] . '"></div><a href="ficha.php?id_chapa=' . $fila["id"] . '" id="' . $fila['id'] . '">' . $fila['nom_cerveza'] . '</a> | Repeticiones: ' . $fila['num_repetida'] . '</li>';
        }
        ?>
    </ul>
</section>
<?php
include("footer.php");
?>