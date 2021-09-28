<?php
include("conexion.php");
$consulta = "SELECT * FROM usuarios";
$usuario = htmlentities(addslashes($_POST["usuario"]));
$password = htmlentities(addslashes($_POST["password"]));
?>

<?php
/*Con POO
$consulta = "SELECT * FROM usuarios";
$resultado=$conn->query($consulta);
if($conn_errno){
    die($conn->error);
}
*/
?>