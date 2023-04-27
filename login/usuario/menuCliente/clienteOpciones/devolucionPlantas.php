<?php
require_once("conexion.php");
require_once("./template/cabecera.php");
session_start();

/*echo "Usuario: " . $_SESSION['nombreCliente'];*/
$_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];
$N = $_SESSION['nombreCliente'];
$C = $_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];
$contador = 0;

if (!isset($_POST['submit'])) {

  $consulta = "select * from clientes_tablas where nombreCliente='$N' and passWordCliente='$C'";
  $paquete = $db->query($consulta);

  ?>

  <li class="mx-5">
    <a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 20px;">&#8592;
        Volver</span></a>
  </li>
  </div>
  </nav>
  <div class="container mt-2">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead class=" thead-inverse">
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Ref.</th>
              <th>Precio</th>
              <th>Tipo</th>
              <th>Imagen</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($fila = $paquete->fetch_array()) {
              $contador = $contador + 1;

              ?>
            <form method='POST' action='devolucionPlantas.php' >";
             <tr>";
            <td><input type='hidden' name='idplanta' value='<?php echo $fila['idplanta']; ?>' readonly class='form-control-plaintext'> </td>
            <td><input type='text' name='nombrePlanta' value='<?php echo $fila['nombrePlanta']; ?>' readonly class='form-control-plaintext'></td>
            <td><input type='text' name='codigoPlanta' value='<?php echo $fila['codigoPlanta']; ?>' readonly class='form-control-plaintext'></td>
            <td><input type='text' name='precio' value='<?php echo $fila['precio']; ?>' readonly  class='form-control-plaintext'></td>
            <td><input type='text' name='TipoPlanta' value='<?php echo  $fila['TipoPlanta']; ?>' readonly  class='form-control-plaintext'></td>
            <td><input type='hidden' name='numeroEjemplares' value='<?php echo $fila['numeroEjemplares']; ?>' readonly  class='form-control-plaintext'></td>
            <td><img style='width:200px' src='../../menuAdministrador/adminOpciones/ <?php echo $fila['ruta_imagen']; ?>'> </td>
            <td><input type='hidden' style='width:15px' name='id_reservado' value='<?php echo  $fila['id_reservado']; ?>' readonly  class='form-control-plaintext'></td>
            <td><input type='submit' class='btn btn-danger' name='Devolver' value='Eliminar del carrito'>", " </td>
             </tr>
<?php
            }

            if ($contador > 0) {
              $total = 0;
              $consulta = $consulta = "SELECT precio FROM clientes_tablas WHERE id_cliente='$idC'";
              $paquete = $db->query($consulta);

              while ($fila = $paquete->fetch_array()) {

                $total = $total + $fila['precio'];
              }

              ?>

              <div class="container mt-3">
                <div class="row">
                  <div class="col-12">
                    <table class="table table-striped">
                      <thead class=" thead-inverse">
                        <tr>
                          <th>Total:</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td>
                          <?php echo $total; ?> €
                        </td>

                        <?php

                        echo "<td>", " <input type='submit' class='btn btn-info' name='pagar' value='pagar'>", " </td>";
            }

            echo "</form>";

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";



}


if (isset($_POST['pagar'])) {

  //$totalC = $total;?idplanta='$totalC'
  echo ' <meta http-equiv="Refresh" content="0.5;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/paypalPago.php">';
}

if (isset($_POST['Devolver'])) {
  $contadorNumPlantas = $_POST["numeroEjemplares"];
  $contador = $contador + 1;
  $contadorNumPlantas = $contadorNumPlantas + 1;

  $I = $_POST["idplanta"];

  $idAlqu = $_POST["id_reservado"];

  $consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);


  $consulta = "DELETE FROM conector WHERE id_reservado='$idAlqu' ";
  $paquete = $db->query($consulta);



  ?>
                </div>

                </nav>
                <h3>Producto Devuelto</h3>

                <meta http-equiv="Refresh"
                  content="0.3;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/devolucionPlantas.php">
                <?php
  //  ob_start();
  //  header("Location:/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/devolucionPlantas.php");

}


if ($contador == 0) {

  echo ' <table class="table table-striped">';
  echo "<tr>";
  echo "<td>No hay plantas en el carrito.</td>";
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
}



require_once("./template/pie.php");

$db->close();

?>