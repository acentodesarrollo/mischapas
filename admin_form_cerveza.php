  <?php
  //Formulario alta cerveza
  include_once("admin_cabecera.php");
  // include_once("conexion.php");
  include_once("functions.php");
  $id = $_GET["id"];
  //recuperamos el id para mostrar el form editar cerveza
  if ($id != null) {
    $cerveza = info_cerveza_by_id($id);
  }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cerveza_post = $_POST["cerveza"];
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
      $cerveza_repetida=$_POST["cerveza_repetida"];
      if($cerveza_repetida=="1"){
        echo "Esta cerveza ya existe";
      }else{
      if ($id != null) {
        if (actualizar_cerveza($cerveza_post, $cervecera, $cervecera_id, $graduacion, $pais, $region, $region_id, $ciudad, $ciudad_id, $fermentacion, $color, $marca, $marca_id, $recipiente, $tipo, $subtipo, $desc, $enlace_desc, $id)) {
          header("Refresh:0,url=admin_form_cerveza.php?id=" . $id . "&update=true"); //refrecamos la página para que cargue la desc. actualizada y no la guardada la vez anterior
        }
      } else {
        guardar_cerveza($cerveza_post, $cervecera, $cervecera_id, $graduacion, $pais, $region, $region_id, $ciudad, $ciudad_id, $fermentacion, $color, $marca, $marca_id, $recipiente, $tipo, $subtipo, $desc, $enlace_desc);
      }
    }
  }
  ?>
  <!--empezamos con el formulario-->
  <form method="post">
    <fieldset>
      <?php
      if (isset($cerveza)) {
      ?>
        <legend id="add-chapa">Editar cerveza</legend>
      <?php
      } else {
      ?>
        <legend id="add-chapa">Añadir cerveza</legend>
      <?php
      }
      ?>
      <!--Pedimos nombre-->
      <!-- <p>
        <label for="nombre">Cerveza</label>
        <?php
        //echo $cerveza['nom_cerveza']
        ?>
        <input type="text" name="cerveza" id="cerveza" value="<?php //echo $cerveza['nom_cerveza'] ?>" required>
      </p> -->

      <p>
            <label for="cerveza">Cerveza</label>
            <input name="cerveza" id="cerveza" type="text" value="<?php echo $cerveza['nom_cerveza'] ?>" required>
            <input name="id_cerveza" id="id_cerveza" value="<?php
                                                            if (isset($cerveza['id_cerveza'])) {
                                                                echo $cerveza['id_cerveza'];
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?>" type="hidden">
            <input id="cerveza_selected" type="hidden">
            <p id="cerveza_mensaje" style="display:none">Esta cerveza ya existe</p>
            <input type="hidden" name="cerveza_repetida" id="cerveza_repetida" value="0">
        </p>
      <!--Pedimos graduacion-->
      <p>
        <label for="graduacion">Graduación</label>
        <input type="number" name="graduacion" id="graduacion" step="0.1" value="<?php echo $cerveza['graduacion'] ?>" required>
      </p>

      <!--Pedimos pais-->
      <p>
        <label for="pais">Pais</label>
        <select name="pais" id="pais" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_pais = "SELECT * FROM pais_continente";
          $datos = mysqli_query($conn, $consulta_pais);
          while ($fila = mysqli_fetch_array($datos)) { ?>
            <option value="
                    <?php
                    echo $fila['id'];
                    ?>
                    " <?php
                      if ($cerveza['id_pais'] == $fila['id']) {
                        echo 'selected';
                      }
                      ?>>
              <?php echo $fila['nom_pais'] ?> </option>

          <?php
          }
          ?>
        </select>
      </p>
      <!--Pedimos region-->
      <p>
        <label for="region">Región</label>
        <input name="region" id="region" type="text" value="<?php echo $cerveza['nom_region'] ?>" required>
        <input name="id_region" id="id_region" value="<?php
                                                      if (isset($cerveza['id_region'])) {
                                                        echo $cerveza['id_region'];
                                                      } else {
                                                        echo 0;
                                                      }
                                                      ?>" type="hidden">
        <input id="region_selected" type="hidden">
      </p>
      <!--Pedimos ciudad-->
      <p>
        <label for="ciudad">Ciudad</label>
        <input name="ciudad" id="ciudad" type="text" value="<?php echo $cerveza['nom_ciudad'] ?>" required>
        <input name="id_ciudad" id="id_ciudad" value="<?php
                                                      if (isset($cerveza['id_ciudad'])) {
                                                        echo $cerveza['id_ciudad'];
                                                      } else {
                                                        echo 0;
                                                      }
                                                      ?>" type="hidden">
        <input id="ciudad_selected" type="hidden">
      </p>
      <!--Pedimos fermentacion-->
      <p>
        <label for="fermentacion">Fermentación</label>
        <select name="fermentacion" required id="fermentacion">
          <option value="0">Selecciona</option>
          <?php
          $consulta_fermentacion = "SELECT * FROM fermentacion";
          $datos = mysqli_query($conn, $consulta_fermentacion);
          while ($fila = mysqli_fetch_array($datos)) {
          ?>
            <option value="
                    <?php
                    echo $fila['id'];
                    ?>
                    " <?php
                      if ($cerveza['id_fermentacion'] == $fila['id']) {
                        echo 'selected';
                      }
                      ?>>
              <?php echo $fila['nom_fermentacion'] ?> </option>

          <?php
          }
          ?>
        </select>
      </p>
      <!--Pedimos color cerveza-->
      <p>
        <label for="color_cerveza">Color de la cerveza:</label>
        <select name="color" id="color" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_color_cerveza = "SELECT * FROM color";
          $datos = mysqli_query($conn, $consulta_color_cerveza);
          while ($fila = mysqli_fetch_array($datos)) {
          ?>
            <option value="
                    <?php
                    echo $fila['id'];
                    ?>
                    " <?php
                      if ($cerveza['id_color'] == $fila['id']) {
                        echo 'selected';
                      }
                      ?>>
              <?php echo $fila['nom_color'] ?> </option>

          <?php
          }
          ?>
        </select>
      </p>
      <!--Pedimos marca-->
      <p>
        <label for="marca">Marca</label>
        <input name="marca" id="marca" type="text" value="<?php echo $cerveza['nom_marca'] ?>" required>
        <input name="id_marca" id="id_marca" value="<?php
                                                    if (isset($cerveza['id_marca'])) {
                                                      echo $cerveza['id_marca'];
                                                    } else {
                                                      echo 0;
                                                    }
                                                    ?>" type="hidden">
        <input id="marca_selected" type="hidden">
      </p>
      <!--Pedimos cervecera-->
      <p>
        <label for="nombre">Cervecera</label>
        <input type="text" name="cervecera" id="cervecera" value="<?php echo $cerveza['nom_cervecera'] ?>" required>
        <input name="id_cervecera" id="id_cervecera" value="<?php
                                                            if (isset($cerveza['id_cervecera'])) {
                                                              echo $cerveza['id_cervecera'];
                                                            } else {
                                                              echo 0;
                                                            }
                                                            ?>" type="hidden">
        <input id="cervecera_selected" type="hidden">
      </p>
      <!--Pedimos recipiente-->
      <p>
        <label for="recipiente">Recipiente</label>
        <select name="recipiente" id="recipiente" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_recipiente = "SELECT * FROM recipiente";
          $datos = mysqli_query($conn, $consulta_recipiente);
          while ($fila = mysqli_fetch_array($datos)) {
          ?>
            <option value="
                    <?php
                    echo $fila['id'];
                    ?>
                    " <?php
                      if ($cerveza['id_recipiente'] == $fila['id']) {
                        echo 'selected';
                      }
                      ?>>
              <?php echo $fila['nom_recipiente'] ?> </option>

          <?php
          }
          ?>
        </select>
        <!--Pedimos tipo-->
      <p>
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" required>
          <option value="0">Selecciona</option>
          <?php
          $consulta_tipo = "SELECT * FROM tipo";
          $datos = mysqli_query($conn, $consulta_tipo);
          while ($fila = mysqli_fetch_array($datos)) {
          ?>
            <option value="
                    <?php
                    echo $fila['id'];
                    ?>
                    " <?php
                      if ($cerveza['id_tipo'] == $fila['id']) {
                        echo 'selected';
                      }
                      ?>>
              <?php echo $fila['nom_tipo'] ?> </option>

          <?php
          }
          ?>
        </select>
      </p>
      <!--Pedimos subtipo-->
      <p>
        <label for="subtipo">Subtipo</label>
        <select name="subtipo" id="subtipo" required>
          <option value="0">Selecciona</option>
          <!--eliminamos este option porque se sustituye por el del archivo aux_buscar_subtipo.php-->
        </select>
      </p>
      <!--Pedimos descripción-->
      <p>
        <label for="desc">Descripción</label><br>
        <textarea name="desc" id="desc"><?php echo $cerveza['descripcion']; ?></textarea>
      </p>
      <!--Pedimos enlace descripcion-->
      <p>
        <label for="enlace_desc">Enlace descripción</label>
        <input type="text" name="enlace_desc" id="enlace_desc" value="<?php echo $cerveza['enlace_desc'] ?>">
      </p>
      <!--Fin campos de peticion de datos-->
      <button type="submit"><a>Guardar</a></button>
    </fieldset>
  </form>
  <?php
  if($_GET["update"]){
  echo "La cerveza se ha actualizado correctamente";
  }
  ?>
  <!--Script para mostrar los subtipos dependiendo del tipo seleccionado-->
  <script>
    $(document).ready(function() {
      var tipo = $("#tipo").val(); //hace referencia al id del value tipo
      if (tipo != 0) {
        var subtipo = <?php
                      if ($id != null) {
                        echo $cerveza["id_subtipo"] . ";";
                      } else {
                        echo "0;";
                      }
                      ?>
        $.ajax({
          type: "POST",
          url: "aux_buscar_subtipo.php",
          data: {
            "enviar_tipo": tipo,
            "enviar_subtipo": subtipo
          }, //creo una nueva variable que es la que voy a enviar
          success: function(respuesta) {
            $("#subtipo").html(respuesta); //reemplazamos el html del subtipo por el del archivo buscar_subtipo.php
          },
          error: function(xhr, estado, error) {
            console.log("Error: " + JSON.parse(error));
          }
        })
      }
      // Aqui verificamos la seleccion
      $("#tipo").change(function() { //cuando seleccionamos la opcion del select
        tipo = $(this).val();
        $.ajax({
          type: "POST",
          url: "aux_buscar_subtipo.php",
          data: {
            "enviar_tipo": tipo,
            "enviar_subtipo": subtipo
          }, //creo una nueva variable que es la que voy a enviar
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
            url: "aux_buscar_guardados.php",
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
            url: "aux_buscar_guardados.php",
            data: {
              "enviar_opcion": opcion,
              "consulta": "ciudad",
              "region": region
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
            url: "aux_buscar_guardados.php",
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
            url: "aux_buscar_guardados.php",
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



<!--Script para autocompletar nombre cerveza-->
  <script>
    let encontrada="";

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
              console.log(respuesta.length);
              if(respuesta.length==1){
                encontrada=respuesta[0].nombre;
                  console.log(respuesta[0].nombre);
              }else{
                encontrada="";
              }
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
          $("#cerveza_mensaje").css("display","block");
          $('#cerveza_repetida').val('1');
          return false;
        }
      })
      $('#cerveza').change(function() {
        if ($('#cerveza').val() !== $('#cerveza_selected').val())
        {
          $('#id_cerveza').val('0'); //cada vez que cambie la cerveza el id se pone a 0 en caso de Chrome tb al pinchar fuera del cajetin, por eso ampliamos la linea de arriba
          $("#cerveza_mensaje").css("display","none");
          $('#cerveza_repetida').val('0');
        }
        console.log (encontrada);
        if(encontrada.toUpperCase()===$('#cerveza').val().toUpperCase()){
            $("#cerveza_mensaje").css("display","block");
            $('#cerveza_repetida').val('1');
        }
      })
    })
  </script>



  <?php
  include("admin_footer.php");
  ?>
