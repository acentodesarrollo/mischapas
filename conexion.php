<?php
//Conexion con POO
  $conn=new mysqli("localhost", "root", "root", "db_mischapas");
  if($conn->connect_errno){
    echo "Falló la conexión " . $conn->connect_errno;
  }
?>