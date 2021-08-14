<?php
include ("conexion.php");
$sql = "INSERT INTO pais (pais) VALUES ('')";
if (mysqli_query($conn, $sql)) {
      echo "Nuevo pais añadido";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
