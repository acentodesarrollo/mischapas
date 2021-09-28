<?php
include("conexion.php");
include("cabecera.php");
$consulta = "SELECT * FROM tipo";
$datos = mysqli_query($conn, $consulta);
$fila = mysqli_fetch_array($datos);
?>
<h1>Tipos de cerveza</h1>
<table>
    <tr>
        <th>Tipo</th>
        <th>Descripción</th>
    </tr>

    <?php
    while ($fila = mysqli_fetch_array($datos)) {
        echo
        "<tr>
                <td id='nom-tipo'>" . $fila['nom_tipo'] . "</td>
                <td>" . $fila['desc_tipo'] . "</td>
            </tr>";
    }
    ?>
</table>
<table>
    <tr>
        <th>Tipo</th>
        <th>Subtipo</th>
        <th>Descripción</th>
    </tr>
<h1>Subtipos de cerveza</h1>
    <?php
    $consulta = "SELECT * 
    FROM tipo T
    INNER JOIN subtipo_tipo ST ON ST.id_tipo=T.id";
    $datos = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_array($datos);
    while ($fila = mysqli_fetch_array($datos)) {
        echo
        "<tr>
                <td id='nom-tipo'>" . $fila['nom_tipo'] . "</td>
                <td id='nom-subtipo'>" . $fila['nom_subtipo'] . "</td>
                <td>" . $fila['desc_subtipo'] . "</td>
            </tr>";
    }
    ?>
</table>
<?php
include("footer.php");
?>