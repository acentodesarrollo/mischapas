<?php
include_once("cabecera.php");
include_once("functions.php");
// Mostramos la ficha de la cervezas
?>

<section id="ficha_cerveza">
    <?php
    $id_cerveza = $_GET['id_cerveza'];
    if ($id_cerveza == null) {
        echo "No se ha seleccionado ninguna cerveza";
    } else {
        $fila = info_cerveza_by_id($id_cerveza);
        echo '<H1>' . $fila['nom_cerveza'] . '</H1>
      <p><span class="ficha">Marca</span>: ' . $fila['nom_marca'] . '</p>
      <p><span class="ficha">Graduación</span>: ' . $fila['graduacion'] . '</p>
      <p><span class="ficha">Fermentación</span>: ' . $fila['nom_fermentacion'] . '</p>
      <p><span class="ficha">Tipo/Subtipo</span>: ' . $fila['nom_tipo'] . ' / ' . $fila['nom_subtipo'] . '</p>
      <p><span class="ficha">Recipiente</span>: ' . $fila['nom_recipiente'] . '</p>
      <p><span class="ficha">Color</span>: ' . $fila['nom_color'] . '</p>
      <p><span class="ficha">Cervecera</span>: ' . $fila['nom_cervecera'] . '</p>
      <p><span class="ficha">Ciudad</span>: ' . $fila['nom_ciudad'] . '</p>
      <p><span class="ficha">Región</span>: ' . $fila['nom_region'] . '</p>
      <p><span class="ficha">Pais</span>: ' . $fila['nom_pais'] . '</p>
      <p><span class="ficha">Descripción</span>: ' . $fila['descripcion'] . '<br><a href="' . $fila['enlace_desc'] . '" target="_blank">Enlace a la descripción</a></p>';
    }
    ?>

</section>

<?php
include_once("footer.php");
?>
