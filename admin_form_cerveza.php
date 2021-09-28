  <?php
  //Formulario alta chapa
  include_once("admin_cabecera.php");
  include_once("conexion.php");
  include_once("functions_consulta_cerveza.php");
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cerveza = $_POST["cerveza"];
    $cervecera = $_POST["cervecera"];
    $cervecera_id = $_POST["id_cervecera"];
    $graduacion = $_POST["graduacion"];
    $pais = $_POST["pais"];
    $region = $_POST["region"];
    $region_id = $_POST["id_region"];
    $ciudad = $_POST["ciudad"];
    $ciudad_id = $_POST["id_ciudad"];
    $fermentacion = $_POST["fermentacion"];
    $color = $_POST["color"];
    $marca = $_POST["marca"];
    $marca_id = $_POST["id_marca"];
    $recipiente = $_POST["recipiente"];
    $tipo = $_POST["tipo"];
    $subtipo = $_POST["subtipo"];
    $desc = $_POST["desc"];
    $enlace_desc = $_POST["enlace_desc"];
    guardar_cerveza($cerveza, $cervecera, $cervecera_id, $graduacion, $pais, $region, $region_id, $ciudad, $ciudad_id, $fermentacion, $color, $marca, $marca_id, $recipiente, $tipo, $subtipo, $desc, $enlace_desc);
  }
  ?>
  <!--empezamos con el formulario-->
  <form method="post" enctype="multipart/form-data">
    <fieldset>
      <legend id="add-chapa">Añadir cerveza</legend>
      <!--Pedimos nombre-->
      <p>
        <label for="nombre">Cerveza</label>
        <input type="text" name="cerveza" id="cerveza">
      </p>
      <!--Pedimos graduacion-->
      <p>
        <label for="graduacion">Graduación</label>
        <input type="number" name="graduacion" id="graduacion" step="0.5">
      </p>

      <!--Pedimos pais-->
      <p>
        <label for="pais">Pais</label>
        <select name="pais" id="pais" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_pais = "SELECT * FROM pais_continente";
          $datos = mysqli_query($conn, $consulta_pais);
          while ($fila = mysqli_fetch_array($datos)) {
            echo '<option value="' . $fila['id'] . '">' . $fila['nom_pais'] . '</option>';
          }
          ?>
        </select>
      </p>
      <!--Pedimos region-->
      <p>
        <label for="region">Región</label>
        <input name="region" id="region" type="text">
        <input name="id_region" id="id_region" value="0" type="hidden">
        <input id="region_selected" type="hidden">
      </p>
      <!--Pedimos ciudad-->
      <p>
        <label for="ciudad">Ciudad</label>
        <input name="ciudad" id="ciudad" type="text">
        <input name="id_ciudad" id="id_ciudad" value="0" type="hidden">
        <input id="ciudad_selected" type="hidden">
      </p>
      <!--Pedimos fermentacion-->
      <p>
        <label for="fermentacion">Fermentación</label>
        <select name="fermentacion" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_fermentacion = "SELECT * FROM fermentacion";
          $datos = mysqli_query($conn, $consulta_fermentacion);
          while ($fila = mysqli_fetch_array($datos)) {
            echo '<option value="' . $fila["id"] . '">' . $fila['nom_fermentacion'] . '</option>';
          }
          ?>
        </select>
      </p>
      <!--Pedimos color cerveza-->
      <p>
        <label for="color_cerveza">Color de la cerveza:</label>
        <select name="color">
          <option value="0">Selecciona</option>
          <?php
          $consulta_color_cerveza = "SELECT * FROM color";
          $datos = mysqli_query($conn, $consulta_color_cerveza);
          while ($fila = mysqli_fetch_array($datos)) {
            echo '<option value="' . $fila["id"] . '">' . $fila["nom_color"] . '</option>';
          }
          ?>
        </select>
      </p>
      <!--Pedimos marca-->
      <p>
        <label for="marca">Marca</label>
        <input name="marca" id="marca" type="text">
        <input name="id_marca" id="id_marca" value="0" type="hidden">
        <input id="marca_selected" type="hidden">
      </p>
      <!--Pedimos cervecera-->
      <p>
        <label for="nombre">Cervecera</label>
        <input type="text" name="cervecera" id="cervecera">
        <input name="id_cervecera"id="id_cervecera" value="0" type="hidden">
        <input id="cervecera_selected" type="hidden">
      </p>
      <!--Pedimos recipiente-->
      <p>
        <label for="recipiente">Recipiente</label>
        <select name="recipiente">
          <option value="0">Selecciona</option>
          <?php
          $consulta_recipiente = "SELECT * FROM recipiente";
          $datos = mysqli_query($conn, $consulta_recipiente);
          while ($fila = mysqli_fetch_array($datos)) {
            echo '<option value="' . $fila["id"] . '">' . $fila["nom_recipiente"] . '</option>';
          }
          ?>
        </select>
        <!--Pedimos tipo-->
      <p>
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
          <option value="0">Selecciona</option>
          <?php
          $consulta_tipo = "SELECT * FROM tipo";
          $datos = mysqli_query($conn, $consulta_tipo);
          while ($fila = mysqli_fetch_array($datos)) {
            echo '<option value="' . $fila['id'] . '">' . $fila['nom_tipo'] . '</option>';
          }
          ?>
        </select>
      </p>
      <!--Pedimos subtipo-->
      <p>
        <label for="subtipo">Subtipo</label>
        <select name="subtipo" id="subtipo">
          <option value="0">Selecciona</option>
          <!--eliminamos este option porque se sustituye por el del archivo buscar_subtipo.php-->
        </select>
      </p>
      <!--Pedimos descripción-->
      <p>
        <label for="desc">Descripción</label><br>
        <textarea name="desc" id="desc"></textarea>
      </p>
      <!--Pedimos enlace descripcion-->
      <p>
        <label for="enlace_desc">Enlace descripción</label>
        <input type="enlace_desc" name="enlace_desc" id="enlace_desc">
      </p>
      <!--Fin campos de peticion de datos-->
      <button type="submit"><a>Guardar</a></button>
    </fieldset>
  </form>

  <!--Script para mostrar los subtipos dependiendo del tipo seleccionado-->
  <script>
    $(document).ready(function() {
      // Aqui verificamos la seleccion
      $("#tipo").change(function() { //cuando seleccionamos la opcion del select
        var tipo = $(this).val(); //hace referencia al id del value tipo
        $.ajax({
          type: "POST",
          url: "aux_buscar_subtipo.php",
          data: "enviar_tipo=" + tipo, //creo una nueva variable que es la que voy a enviar
          success: function(respuesta) {
            $("#subtipo").html(respuesta); //reemplazamos el html del subtipo por el del archivo buscar_subtipo.php
          },
          error: function(xhr, estado, error) {
            console.log("Error: " + JSON.parse(error));
          }
        })
      });
    });
  </script>

  <!--Script para autocompletar y añadir nuevas opciones al input region-->
  <script>
    $(function() {
      $("#region").autocomplete({
        source: function(request, response) {
          opcion = $("#region").val();
          pais = $("#pais").val();
          $.ajax({
            type: "POST",
            url: "aux_buscar_region.php",
            data: {
              "enviar_opcion": opcion,
              "consulta": "region",
              "pais": pais
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
          $('#region').val(datos.item.label);
          $('#id_region').val(datos.item.value);
          $('#region_selected').val(datos.item.label);
          return false;
        }
      })
      $('#region').change(function() {
        if ($('#region').val() !== $('#region_selected').val())
          $('#id_region').val('0'); //cada vez que cambie la region el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
      })
    })
  </script>

  <!--Script para autocompletar y añadir nuevas opciones al input ciudad-->
  <script>
    $(function() {
      $("#ciudad").autocomplete({
        source: function(request, response) {
          opcion = $("#ciudad").val();
          region = $("#region").val();
          $.ajax({
            type: "POST",
            url: "aux_buscar_region.php",
            data: {
              "enviar_opcion": opcion,
              "consulta": "ciudad",
              "region":region
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
          $('#ciudad').val(datos.item.label);
          $('#id_ciudad').val(datos.item.value);
          $('#ciudad_selected').val(datos.item.label);
          return false;
        }
      })
      $('#ciudad').change(function() {
        if ($('#ciudad').val() !== $('#ciudad_selected').val())
          $('#id_ciudad').val('0'); //cada vez que cambie la cerveza el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
      })
    })
  </script>


  <!--Script para autocompletar y añadir nuevas opciones al input cervecera-->
  <script>
    $(function() {
      $("#cervecera").autocomplete({
        source: function(request, response) {
          opcion = $("#cervecera").val();
          $.ajax({
            type: "POST",
            url: "aux_buscar_cervecera.php",
            data: {
              "enviar_opcion": opcion,
              "consulta": "cervecera",
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
          $('#cervecera').val(datos.item.label);
          $('#id_cervecera').val(datos.item.value);
          $('#cervecera_selected').val(datos.item.label);
          return false;
        }
      })
      $('#cervecera').change(function() {
        if ($('#cervecera').val() !== $('#cervecera_selected').val())
          $('#id_cervecera').val('0'); //cada vez que cambie la cerveza el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
      })
    })
  </script>

  <!--Script para autocompletar y añadir nuevas opciones al input marca-->
  <script>
    $(function() {
      $("#marca").autocomplete({
        source: function(request, response) {
          opcion = $("#marca").val();
          $.ajax({
            type: "POST",
            url: "aux_buscar_marca.php",
            data: {
              "enviar_opcion": opcion,
              "consulta": "marca",
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
          $('#marca').val(datos.item.label);
          $('#id_marca').val(datos.item.value);
          $('#marca_selected').val(datos.item.label);
          return false;
        }
      })
      $('#marca').change(function() {
        if ($('#marca').val() !== $('#marca_selected').val())
          $('#id_marca').val('0'); //cada vez que cambie la cerveza el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
      })
    })
  </script>


  <?php
  include("footer.php");
  ?>