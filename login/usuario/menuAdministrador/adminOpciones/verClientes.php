<?php
session_start();
require_once("conexion.php");
require_once("./template/cabecera.php");
require("./template/accesibilidad.php");

/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$consulta = "select * from clientesclub";
$paquete = $db->query($consulta);

?>

<form method="post" class="d-flex justify-content-center align-items-center" action="verDisponibilidadCliente.php">
  <input type="text" class="form-control " name="nombreCliente" required>
  <input type="submit" class="btn btn-secondary mx-1 material-symbols-rounded" name="submit" value="search">
</form>
<div class="navbar-mx-2 VolverDerecha">
  <a href='../menuAdministrador.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
      Volver</span></a>
</div>
</nav>
<div class="container pt-5 w-50">
  <div class="row">
    <div class="col-12 pt-5 d-flex align-items-center">
      <table class="table table-striped pt-5">
        <thead class=" thead-inverse">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Contraseña</th>
          </tr>
        </thead>
        <tbody>

          <?php
          while ($fila = $paquete->fetch_array()) {

            if ($fila['tipoCliente'] == 'Cliente') {
              ?>
              <tr>
                <td>
                  <?php echo $fila['id_cliente']; ?>
                </td>
                <td>
                  <?php echo $fila['nombreCliente']; ?>
                </td>
                <td>
                  <?php echo $fila['apellidoCliente']; ?>
                </td>
                <td><input type='password' name='nombre' value='<?php echo $fila['passWordCliente']
                  ; ?>' readonly class='form-control-plaintext'>
                </td>
              </tr>

              <?php
            }
          }

          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>

<?php

echo "</table></div>";

require_once("./template/pie.php");
$db->close();
?>