<?php
// include_once("conexion.php");
include("admin_cabecera.php");
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $id = $_GET['id'];
    if ($id!=null){
        // echo "Eliminando cerveza...".$id."\n";
        echo "Cerveza eliminada";
        eliminar_cerveza($id);
    }
}
?>
<section id="admin-listado">
    <h1>Listado cervezas</h1>
    <ul>
        <?php
        $consulta = "SELECT id, nom_cerveza  FROM cerveza";
        $datos = mysqli_query($conn, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            ?>
            <li>
                    <button type="submit"><a href="admin_form_cerveza.php?id=<?php echo $fila["id"] ?>">Editar</a></button>
                    <button type="submit" id="eliminar"><a href="#" onclick="eliminar(<?php echo $fila['id'] ?>)">Eliminar</a></button>
                    <a href="ficha_cerveza.php?id_cerveza=<?php echo $fila["id"] ?>" id="<?php echo $fila['id'] ?>" class="nom-item-listado-admin"><?php echo $fila['nom_cerveza'] ?></a>
                </li>
        <?php } ?>

    </ul>
</section>
<script>
    function eliminar(id){
        if(confirm('¿Estás seguro?')){
            window.location.href = "admin_listado_cervezas.php?id="+id;
        }else{

        }
    }
</script>
<?php
include("admin_footer.php");
?>
