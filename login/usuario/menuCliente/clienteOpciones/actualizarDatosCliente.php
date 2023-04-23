<?php

include("conexion.php");
include("./template/cabecera1.php");
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

              echo "<form method='POST' action='actualizarDatosCliente.php' >";
              echo "<tr>";
              echo "<td> <input type='hidden' name='id' value='" . $fila['id_cliente'] . "'> </td>";
              echo "<td><input type='text' name='nombre' value='" . $fila['nombreCliente'] . "'></td>";
              echo "<td><input type='text' name='apellido' value='" . $fila['apellidoCliente'] . "'></td>";
              echo "<td><input type='text' name='passWord' value='" . $fila['passWordCliente'] . "'></td>";
              echo "<td>", " <input type='submit' class='btn btn-success' name='submit' value='Actualizar'>", " </td>";
              echo "<td> <a href='../menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592; Volver</span></a></td>";
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

                echo "<td>" . $fila['id_cliente'] . " </td>";
                echo "<td> " . $fila['nombreCliente'] . "</td>";
                echo "<td> " . $fila['tipoCliente'] . " </td>";
                echo "<td> " . $fila['passWordCliente'] . " </td>";
                echo "<td><h4> Actualizado </h4> </td>";
                echo "</tr>";
                echo "<td> <a href='../../loginCliente.php'style='text-decoration:none;'><span font-size: 20px;'>&#8592;</span></a> Reiniciar</td>";



              }
          }
          ?>
          </tbody>
          <div>
          </div>
      </div>

      <?php
      include("./template/pie.php");
      $db->close();
      ?>