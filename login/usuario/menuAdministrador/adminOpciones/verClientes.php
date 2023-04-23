<?php
session_start();
include("conexion.php");
include("./template/cabecera.php");



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


              echo "<tr>";
              echo "<td>" . $fila['id_cliente'], "</td>";
              echo "<td>" . $fila['nombreCliente'], "</td>";
              echo "<td>" . $fila['passWordCliente'], "</td>";

              echo "</tr>";
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

include("./template/pie.php");
$db->close();
?>