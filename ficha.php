<!doctype html>
<html>
<head>
  <title>Mis chapas</title>
  <meta charset="utf-8" />
</head>
<body>
  <?php
  include_once("conexion.php");
  $consulta= "SELECT * FROM forma";//variable donde hacemos la consulta
  //mysqli_select_db ("mis_chapas");//seleccionamos la base de datos de la consulta. Solo se usa una vez por pág.
  mysqli_query ($conn, $consulta);//hacemos la consulta - $conn es la conexión a la bbdd
  $datos = mysqli_query ($conn, $consulta);//variable donde almacenamos el resultado de la consulta
  //$fila= mysqli_fetch_array ($datos);//variable - matriz que extrae los datos del resultado de la consulta y los distribuye en celdas de una fila. Sólo lee una fila cada vez. Si no comentamos la variable aqui, no saldrá el registro 1 en el while.
    while ($fila=mysqli_fetch_array($datos))
  {
    echo $fila ["id_forma"];
    echo $fila ["forma"];
    echo "<br />";
}

  ?>
</body>
</html>
