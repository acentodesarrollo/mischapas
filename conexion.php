<?php
$servername = "localhost";
$database = "mis_chapas";
$username = "root";
$password = "root";
// Creando la conexión
$conn = mysqli_connect($servername, $username, $password, $database);
// comprobando la conexión. Nos indicará también dónde falló la conexión
if (!$conn) {
  die("Imposible conectar: " . mysqli_connect_error());
}
echo "Conectado con éxito<br />";
//mysqli_close($conn);
?>
