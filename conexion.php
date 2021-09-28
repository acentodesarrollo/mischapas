<?php
/*
$servername = "localhost";
$database = "db_mischapas";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password, $database);


// comprobando la conexión. Nos indicará también dónde falló la conexión
/*if (!$conn) {
  die("Imposible conectar: " . mysqli_connect_error());
}
echo "Conectado con éxito<br />";*/
//mysqli_close($conn);
?>

<?php
//Conexion con POO
$conn=new mysqli("localhost", "root", "root", "db_mischapas");
  if($conn->connect_errno){
    echo "Falló la conexión " . $conn->connect_errno;
  }
?>




<?php
//Conexion con PDO
/*
try{
$conn = new PDO("mysql:host=localhost; dbname=db_mischapas", "root", "root");
//echo "Conexión ok";
}catch(Exception $e){
  die("Error: " . $e->GetMessage());
}finally{
  $conn=null;
}
*/
?>