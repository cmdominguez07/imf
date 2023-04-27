<?php
session_start();
require_once("conexion.php");
require_once("./template/cabecera.php");

/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$consulta = "select * from clientesclub";
$paquete = $db->query($consulta);

?>

<form method="post" class="d-flex justify-content-center align-items-center" action="verDisponibilidadCliente.php">
  <input type="text" class="form-control " name="nombreCliente" required>
  <input type="submit" class="btn btn-secondary mx-1" name="submit" value="Buscar Nombre">
</form>
<div class="navbar-mx-2 VolverDerecha">
  <li>
    <a href='../menuAdministrador.php' style='text-decoration:none;'><span
        style='color: white; font-size: 20px;'>&#8592; Volver</span></a>
  </li>
  </li>
</div>
</div>
</nav>
<div class="container mt-3">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped">
        <thead class=" thead-inverse">
          <tr>
            <th>Referencia</th>
            <th>Nombre</th>
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
                  <?php echo $fila['passWordCliente']; ?>
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