<?php
include_once("cabecera.php");
include_once("functions_consulta_cerveza.php");
?>

<section id="ficha_chapa">
  <?php
  $id_chapa = $_GET['id_chapa'];
  if($id_chapa == null){
 echo "No se ha seleccionado ninguna chapa";
  } else {
  $fila = info_cerveza($id_chapa);
  echo '<div id="img-ficha"><img src="' . $fila['foto'] . '" /></div>
      <H1>' . $fila['nom_cerveza'] . '</H1>
      <p><span class="ficha">Forma</span>: ' . $fila['nom_forma'] . '</p>
      <p><span class="ficha">Repeticiones</span>: ' . $fila['num_repetida'] . '</p>
      <p><span class="ficha">Marca</span>: ' . $fila['nom_marca'] . '</p>
      <p><span class="ficha">Graduación</span>: ' . $fila['graduacion'] . '</p>
      <p><span class="ficha">Fermentación</span>: ' . $fila['nom_fermentacion'] . '</p>
      <p><span class="ficha">Tipo/Subtipo</span>: ' . $fila['nom_tipo'] . ' / '. $fila['nom_subtipo'] .'</p>
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