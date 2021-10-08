<?php
    include_once("conexion.php");
    $tipo=$_POST['enviar_tipo'];
    $subtipo = $_POST['enviar_subtipo'];
$consulta_subtipo = "SELECT id, nom_subtipo FROM subtipo_tipo WHERE id_tipo=".$tipo.";";
$datos = mysqli_query($conn, $consulta_subtipo);
$HTML='<select name="subtipo" id="subtipo">
          <option value="0">Selecciona</option>';
          var_dump($subtipo);
while ($fila = mysqli_fetch_array($datos)) {
    if ($subtipo == $fila["id"]) {
        $HTML = $HTML . '<option value="' . $fila["id"] . '" selected>' . $fila["nom_subtipo"] . '</option>';
    }else{
        $HTML = $HTML . '<option value="' . $fila["id"] . '">' . $fila["nom_subtipo"] . '</option>';
    }
}
$HTML = $HTML . '</select>';
echo $HTML;
return $HTML;
?>