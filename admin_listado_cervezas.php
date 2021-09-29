<?php
include_once("conexion.php");
include("admin_cabecera.php");
?>
<section id="admin-listado">
    <h1>Listado chapas</h1>
    <ul id="admin-listado">
        <?php
        $consulta = "SELECT id, nom_cerveza  FROM cerveza";
        $datos = mysqli_query($conn, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '<li><a href="ficha.php?id_chapa=' . $fila["id"] . '" id="' . $fila['id'] . '">' . $fila['nom_cerveza'] . '</a></li>';
        }
        ?>
    </ul>
</section>
<?php
include("footer.php");
?>