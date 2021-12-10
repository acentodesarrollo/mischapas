<section id="listado">
    <ul>
        <?php
        // Mostramos el listado de chapas de la página de inicio
        $consulta = "SELECT foto, num_repetida, CH.id, C.nom_cerveza FROM chapas CH, cerveza C WHERE C.id = CH.id_cerveza";
        $datos = mysqli_query($conn, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '<li>
                    <div id="img-listado">
                        <img src="' . $fila['foto']. '">
                    </div>
                    <a href="ficha.php?id_chapa=' . $fila["id"] . '" id="' . $fila['id'] . '">'. $fila['nom_cerveza']. '</a><br>
                    Repeticiones: ' . $fila['num_repetida'] . '
                </li>';
        }
        ?>
    </ul>
</section>
