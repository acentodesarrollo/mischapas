<?php
include_once("conexion.php");
include("admin_cabecera.php");
?>
<section id="admin-listado">
    <h1>Listado cervezas</h1>
    <ul>
        <?php
        $consulta = "SELECT id, nom_cerveza  FROM cerveza";
        $datos = mysqli_query($conn, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '<li>
                    <button type="submit"><a href="admin_form_cerveza.php?id=' . $fila["id"] . '">Editar</a></button>
                    <button type="submit" id="eliminar"><a>Eliminar</a></button>
                    <a href="ficha_cerveza.php?id_cerveza=' . $fila["id"] . '" id="' . $fila['id'] . '" class="nom-item-listado-admin">' . $fila['nom_cerveza'] . '</a>
                </li>';
        }
        ?>
    </ul>
</section>
<?php
include("footer.php");
?>