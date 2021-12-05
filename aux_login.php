<?php
include("conexion.php");
$usuario = ($_POST["usuario"]);
$password = ($_POST["password"]);
$consulta = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt=mysqli_prepare($conn,$consulta);//prepara una consulta. Inyeccion SQL
mysqli_stmt_bind_param($stmt,"s",$usuario);//vinculamos cada interrogante con su valor. La s es de "string", si tengo 2 interrogantes, pondria "ss"
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$id,$email,$pass);
mysqli_stmt_fetch($stmt);
// mysqli_stmt_bind_result($stmt,$usuariobd);

if(strcmp($pass,$password)==0){
    session_start();
    $_SESSION['id']=$id;
    header('Location:admin_listado_chapas.php');
}else{
    echo 'Datos incorrectos';
}
?>
