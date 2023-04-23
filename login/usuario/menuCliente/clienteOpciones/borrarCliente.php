<?php
include("conexion.php");

include("./template/cabecera.php");
session_start();
echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";
$_SESSION['passWordCliente'];
$idid = $_SESSION['id_cliente'];

$N = $_SESSION['nombreCliente'];

$C = $_SESSION['passWordCliente'];

?>

</nav>
<div class="container mt-3">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped">
        <thead class=" thead-inverse">
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Contraseña</th>
          </tr>
        </thead>
        <tbody>


          <?php
          if (!isset($_POST['submit'])) {
            $consulta = "select * from clientesclub WHERE nombreCliente='$N' and passWordCliente='$C'";
            $paquete = $db->query($consulta);

            while ($fila = $paquete->fetch_array()) {

              echo "<form method='POST' action='borrarCliente.php' >";
              echo "<tr>";
              echo "<td> <input type='hidden' name='id' value='" . $fila['id_cliente'] . "'  readonly class='form-control-plaintext' > </td>";
              echo "<td><input type='text' name='nombre' value='" . $fila['nombreCliente'] . "'  readonly class='form-control-plaintext' ></td>";
              echo "<td><input type='text' name='apellido' value='" . $fila['apellidoCliente'] . "'  readonly class='form-control-plaintext' ></td>";
              echo "<td><input type='text' name='passWord' value='" . $fila['passWordCliente'] . "'  readonly class='form-control-plaintext' ></td>";
              echo "<td>", " <input type='submit' class='btn btn-danger' name='submit' value='Borrar'>", " </td>";
              echo "<td> <a href='../menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592; Volver</span></a></td>";



            }
            ?>

          </tbody>
          <div>
          </div>
      </div>
      <?php
          } else {
            $consulta = "DELETE FROM clientesclub WHERE id_cliente='$idid' ";
            $paquete = $db->query($consulta);
            echo "<body>";
            echo "<h4 >Cuenta eliminada</h4>";
            echo "<tr><td> <a href='../../../index.php' style='text-decoration:none;'><span font-size: 30px;'>&#8592;</span></a>Menú principal</a></td></tr>";
          }

          include("./template/pie.php");

          $db->close();
          ?>