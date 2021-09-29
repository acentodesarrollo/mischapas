<?php
//Formulario alta chapa
include_once("admin_cabecera.php");
include_once("conexion.php");
include_once("functions_consulta_cerveza.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_FILES["imagen"];
    $cerveza_id = $_POST["id_cerveza"];
    $repetida = $_POST["repetida"];
    $num_repetida = $_POST["num_repetida"];
    $forma = $_POST["forma"];
    guardar_chapa($imagen, $cerveza_id, $repetida, $num_repetida, $forma);
}
?>
<!--empezamos con el formulario-->
<form method="post" enctype="multipart/form-data">
    <fieldset>
        <legend id="add-chapa">Añadir chapa</legend>
        <!--Pedimos foto-->
        <p>
            <label for="imagen">Subir imagen</label>
            <input type="file" name="imagen" id="imagen" required>
        </p>
        <!--Pedimos cerveza-->
        <p>
            <label for="cerveza">Cerveza</label>
            <input name="cerveza" id="cerveza" type="text" required>
            <input name="id_cerveza" id="id_cerveza" value="0" type="hidden">
            <input id="cerveza_selected" type="hidden">
        </p>

        <!--Preguntamos si está repetida-->
        <p>
            <label for="repetida">¿Está repetida?</label>
            <input name="repetida" type="checkbox" id="repetida">
        </p>
        <!--Preguntamos Nº repetida-->
        <p>
            <label for="num_repetida">Nº repetida</label>
            <input name="num_repetida" type="number" id="num_repetida" placeholder="0" min="0">
        </p>
        <!--Pedimos forma-->
        <p>
            <label for=" forma">Forma</label>
            <select name="forma" id="forma" required>
                <option value="0">Selecciona</option>
                <?php
                $consulta_forma = "SELECT * FROM forma";
                $datos = mysqli_query($conn, $consulta_forma);
                while ($fila = mysqli_fetch_array($datos)) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nom_forma'] . '</option>';
                }
                ?>
            </select>
        </p>
        <!--Fin campos de peticion de datos-->
        <button type="submit"><a>Guardar</a></button>
    </fieldset>
</form>


<!--Script para autocompletar y añadir nuevas opciones al input cerveza-->
<script>
    $(function() {
        $("#cerveza").autocomplete({
            source: function(request, response) {
                opcion = $("#cerveza").val();
                $.ajax({
                    type: "POST",
                    url: "aux_buscar_guardados.php",
                    data: {
                        "enviar_opcion": opcion,
                        "consulta": "cerveza",
                    }, //creo una nueva variable que es la que voy a enviar
                    dataType: 'json',
                    success: function(respuesta) {
                        //console.log(respuesta);
                        response($.map(respuesta, function(valor) { //cargamos jQuery UI y le pasamos la respuesta 
                            console.log(valor);
                            return { //transformamos la respuesta que recibimos de aux_buscar_opcion al formato adecuado
                                label: valor.nombre,
                                value: valor.id
                            }
                        }))
                    },
                    error: function(xhr, estado, error) {
                        console.log("Error: " + (estado));
                    }
                })
            },
            select: function(event, datos) {
                $('#cerveza').val(datos.item.label);
                $('#id_cerveza').val(datos.item.value);
                $('#cerveza_selected').val(datos.item.label);
                return false;
            }
        })
        $('#cerveza').change(function() {
            if ($('#cerveza').val() !== $('#cerveza_selected').val())
                $('#id_cerveza').val('0'); //cada vez que cambie la cerveza el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
        })
    })
</script>
<?php
include("footer.php");
?>