<!DOCTYPE html>
<html lang="es">
<?php
    include("conexion.php");
    include ("functions.php");
    session_start();
    if (!isset($_SESSION['id'])){
        header('Location:admin_form_login.php');
    }
?>
<head>
    <title>Mis Chapas</title>
    <meta charset="UTF-8">
    <meta name="title" content="Mis Chapas">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mi colección de chapas de cerveza con toda la información sobre la marca asociada">
    <link href="styles/style_admin.css" rel="stylesheet" type="text/css" />
    <!-- <link href="bootstrap-4.0.0-dist/css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <script src="scripts/jquery-3.5.1.js"></script>
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.png" />
    <link rel="stylesheet" href="https://releases.jquery.com/git/ui/jquery-ui-git.css" />
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js" integrity="sha256-bLjSmbMs5XYwqLIj5ppZFblCo0/9jfdiG/WjPhg52/M=" crossorigin="anonymous">
    </script>

</head>

<body>
    <div id="contenedor">
        <header>
            <h1>
                <a href="admin_listado.php">Mis chapas | Admin</a>
            </h1>
        </header>
        <div id="contenido">
            <nav>
                <ul>
                    <li><a href="admin_listado_chapas.php">Listado chapas</a></li>
                    <li><a href="admin_listado_cervezas.php">Listado cervezas</a></li>
                    <li><a href="admin_form_cerveza.php">Añadir cerveza</a></li>
                    <li><a href="admin_form_chapa.php">Añadir chapa</a></li>
                </ul>
            </nav>
