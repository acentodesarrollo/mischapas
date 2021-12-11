<?php
// Mostramos el listado de chapas en la parte de administración
include("admin_cabecera.php");
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $id = $_GET['id'];
    if ($id!=null){
        echo "Chapa eliminada";
        eliminar_chapa($id);
    }
}
?>
<section id="admin-listado">
    <h1>Listado chapas</h1>
    <ul id="admin-listado">
        <?php
        $consulta = "SELECT foto, num_repetida, CH.id, C.nom_cerveza FROM chapas CH, cerveza C WHERE C.id = CH.id_cerveza";
        $datos = mysqli_query($conn, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
          ?>
            <li>
                    <button type="submit"><a href="admin_form_chapa.php?id=<?php echo $fila["id"]?>">Editar</a></button>
                    <button type="submit" id="eliminar"><a href="#" onclick="eliminar(<?php echo $fila['id'] ?>)">Eliminar</a></button>
                    <div id="img-admin-listado"><img src=<?php echo $fila['foto'] ?>></div>
                    <a class="nom-item-listado-admin" href="ficha.php?id_chapa=<?php echo $fila["id"]?>" id="<?php echo $fila['id'] ?>"><?php echo $fila['nom_cerveza'] ?></a> | Repeticiones: <?php echo $fila['num_repetida'] ?>
            </li>
        <?php } ?>
    </ul>
</section>
<script>
    function eliminar(id){
        if(confirm('¿Estás seguro?')){
            window.location.href = "admin_listado_chapas.php?id="+id;
        }else{

        }
    }
</script>
<?php
include("admin_footer.php");
?>
