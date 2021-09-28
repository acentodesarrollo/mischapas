<?php
    include_once("conexion.php");
    $tipo=$_POST['enviar_tipo'];
$consulta_subtipo = "SELECT id, nom_subtipo FROM subtipo_tipo WHERE id_tipo=".$tipo.";";
$datos = mysqli_query($conn, $consulta_subtipo);
$HTML='<select name="subtipo" id="subtipo">
          <option value="0">Selecciona</option>';
while ($fila = mysqli_fetch_array($datos)) {
    $HTML=$HTML . '<option value="' . $fila["id"].'">' . $fila["nom_subtipo"] . '</option>';
}
$HTML = $HTML . '</select>';
echo $HTML;
return $HTML;
?>