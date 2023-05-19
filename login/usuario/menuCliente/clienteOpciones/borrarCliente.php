<?php
require("conexion.php");
require("template/cabecera.php");
require("./template/accesibilidad.php");

session_start();
/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$idid = $_SESSION['id_cliente'];

$N = $_SESSION['nombreCliente'];
$C = base64_encode($_SESSION['passWordCliente']);

?>
    <a href='../menuClientes.php' style='text-decoration:none;color:white;'><span font-size: 18px;>&#8592;
                        Volver</span></a>
</nav>

<div class="container-fluid pt-3 contenido1">
  <div class="row">
    <div class="col-12 container-fluid">
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
              ?>
              <form method='POST' action='borrarCliente.php'>
                <tr>
                  <td> <input type='hidden' name='id' value='<?php echo $fila['id_cliente']; ?>' readonly
                      class='form-control-plaintext'> </td>
                  <td><input type='text' name='nombre' value='<?php echo $fila['nombreCliente']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='apellido' value='<?php echo $fila['apellidoCliente']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='password' name='passWord' value='<?php echo base64_decode($fila['passWordCliente']); ?>' readonly
                      class='form-control-plaintext'></td>
                  <td> <input type='submit' class='btn btn-danger' name='submit' value='Borrar'> </td>
               

                  <?php

            }
           
          } else {

            $consulta = "DELETE FROM clientesclub WHERE id_cliente='$idid' ";
            $paquete = $db->query($consulta);
           
            ?>

   
        <html><body>
        <h4>Cuenta eliminada</h4>
        <meta http-equiv="Refresh" content="0.51;url=/TFG/proyectoGreen/login/index.php">
        </body></html>
        <?php

          }
          ?>

          </tbody>
          </table>
          </div>
          </div>
          </div>
       
   
      <?php
          require("template/pie.php");
          $db->close();
          ?>