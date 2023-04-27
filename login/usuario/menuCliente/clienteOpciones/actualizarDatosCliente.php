<?php

require_once("conexion.php");
require_once("./template/cabecera1.php");
session_start();

echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];
$N = $_SESSION['nombreCliente'];
$idC = $_SESSION['id_cliente'];
$C = $_SESSION['passWordCliente'];

?>

</nav>
<div class="container-fluid mt-5">
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

          $consulta = "select * from clientesclub where nombreCliente='$N' and passWordCliente='$C'";
          $paquete = $db->query($consulta);

          if (!isset($_POST['submit'])) {

            while ($fila = $paquete->fetch_array()) {
              ?>
              <form method='POST' action='actualizarDatosCliente.php'>
                <tr>
                  <td> <input type='hidden' name='id' value='<?php echo $fila['id_cliente']; ?>'> </td>
                  <td><input type='text' name='nombre' value='<?php echo $fila['nombreCliente']; ?>'></td>
                  <td><input type='text' name='apellido' value='<?php echo $fila['apellidoCliente']; ?>'></td>
                  <td><input type='text' name='passWord' value='<?php echo $fila['passWordCliente']; ?>'></td>
                  <td><input type='submit' class='btn btn-success' name='submit' value='Actualizar'></td>
                  <td> <a href='../menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592;
                        Volver</span></a></td>

                  <?php
            }

            ?>
              </tr>
            </form>
          </tbody>
          <div>
          </div>
      </div>

      <?php


          } else {
            $I = $_POST["id"];
            $N = $_POST["nombre"];
            $A = $_POST["apellido"];
            $P = $_POST["passWord"];

            $consulta = "UPDATE clientesclub SET nombreCliente='$N',apellidoCliente='$A',passWordCliente='$P' WHERE id_cliente='$I' ";
            $paquete = $db->query($consulta);

            $consulta = "select * from clientesclub where id_cliente='$I'";
            $paquete = $db->query($consulta);

            ?>

      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead class=" thead-inverse">
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Código</th>
              </tr>
            </thead>
            <tbody>

              <?php

              while ($fila = $paquete->fetch_array()) {
                ?>
                <td>
                  <?php echo $fila['id_cliente']; ?>
                </td>
                <td>
                  <?php echo $fila['nombreCliente']; ?>
                </td>
                <td>
                  <?php echo $fila['tipoCliente']; ?>
                </td>
                <td>
                  <?php echo $fila['passWordCliente']; ?>
                </td>
                <td>
                  <h4> Actualizado </h4>
                </td>";
                </tr>
                <td> <a href='../../loginCliente.php' style='text-decoration:none;'><span font-size:
                      18px;>&#8592;</span></a> Reiniciar</td>";
                <?php
              }
          }
          ?>

          </tbody>
          <div>
          </div>
      </div>

      <?php
      require_once
        ("./template/pie.php");
      $db->close();
      ?>