  <?php
  // conectando
  include_once("conexion.php");
  ?>
<!--empezamos con el formulario-->
<form action="admin_add.php" method="post">
  <fieldset>
    <legend>Añadir chapa</legend>
<!--Pedimos nombre-->
      <p>
        <label for="nombre">Cerveza:</label>
        <input type="text" name="cerveza" id="form_cerveza">
      </p>
      <p>
<!--Pedimos forma-->
        <label for="forma">Forma:</label>
        <select>
          <option value="0">Selecciona:</option>
          <?php
          $consulta_forma= "SELECT * FROM forma";
          $datos = mysqli_query ($conn, $consulta_forma);
          //$fila= mysqli_fetch_array ($datos);
          while ($fila = mysqli_fetch_array($datos))
          {
            echo '<option value="'.$fila[id].'">'.$fila[forma].'</option>';
          }
          ?>
        </select>
      </p>
<!--Pedimos pais-->
      <p>
        <label for="pais">Pais:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_pais= "SELECT * FROM pais";
            $datos = mysqli_query ($conn, $consulta_pais);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[pais].'</option>';
            }
        ?>
        </select>
      </p>
<!--Pedimos ciudad-->
      <p>
        <label for="ciudad">Ciudad:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_ciudad= "SELECT * FROM ciudad";
            $datos = mysqli_query ($conn, $consulta_ciudad);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[ciudad].'</option>';
            }
        ?>
        </select>
      </p>
  <!--Pedimos fermentacion-->
      <p>
        <label for="fermentacion">Fermentación:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_fermentacion= "SELECT * FROM fermentacion";
            $datos = mysqli_query ($conn, $consulta_fermentacion);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[fermentacion].'</option>';
            }
        ?>
        </select>
      </p>
  <!--Pedimos color cerveza-->
      <p>
        <label for="color_cerveza">Color de la cerveza:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_color_cerveza= "SELECT * FROM color_cerveza";
            $datos = mysqli_query ($conn, $consulta_color_cerveza);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[color_cerveza].'</option>';
            }
        ?>
        </select>
      </p>
<!--Pedimos marca-->
      <p>
        <label for="marca">Marca:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_marca= "SELECT * FROM marca";
            $datos = mysqli_query ($conn, $consulta_marca);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[marca].'</option>';
            }
        ?>
        </select>
      </p>
<!--Pedimos recipiente-->
      <p>
        <label for="pais">Recipiente:</label>
          <select>
            <option value="0">Selecciona:</option>
            <?php
            $consulta_recipiente= "SELECT * FROM recipiente";
            $datos = mysqli_query ($conn, $consulta_recipiente);
            //$fila= mysqli_fetch_array ($datos);
            while ($fila = mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila[id].'">'.$fila[recipiente].'</option>';
            }
        ?>
        </select>
      </p>
<!--Pedimos subtipo-->
            <p>
              <label for="subtipo">Subtipo:</label>
                <select>
                  <option value="0">Selecciona:</option>
                  <?php
                  $consulta_subtipo= "SELECT * FROM subtipo";
                  $datos = mysqli_query ($conn, $consulta_subtipo);
                  //$fila= mysqli_fetch_array ($datos);
                  while ($fila = mysqli_fetch_array($datos))
                  {
                    echo '<option value="'.$fila[id].'">'.$fila[subtipo].'</option>';
                  }
              ?>
              </select>
            </p>
<!--Pedimos tipo-->
            <p>
              <label for="tipo">Tipo:</label>
                <select>
                  <option value="0">Selecciona:</option>
                    <?php
                      $consulta_subtipo= "SELECT * FROM tipo";
                      $datos = mysqli_query ($conn, $consulta_tipo);
                      //$fila= mysqli_fetch_array ($datos);
                      while ($fila = mysqli_fetch_array($datos))
                              {
                                echo '<option value="'.$fila[id].'">'.$fila[tipo].'</option>';
                              }
                          ?>
                </select>
            </p>
  </fieldset>
</form>