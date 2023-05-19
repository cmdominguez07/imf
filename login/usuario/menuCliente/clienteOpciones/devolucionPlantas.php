<?php
require("conexion.php");
require("./template/cabecera.php");
require("./template/accesibilidad.php");

session_start();

$_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];
$N = $_SESSION['nombreCliente'];
$C = base64_encode($_SESSION['passWordCliente']);
$idC = $_SESSION['id_cliente'];
$contador = 0;

if (!isset($_POST['submit'])) {

  $consulta = "select * from clientes_tablas where nombreCliente='$N' and passWordCliente='$C'";
  $paquete = $db->query($consulta);
  ?>

  <a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 18px;">&#8592;
      Volver</span></a>
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
              <th>Precio (€)</th>
              <th>Tipo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($fila = $paquete->fetch_array()) {
              $contador = $contador + 1;
              ?>
              <form method='POST' action='devolucionPlantas.php'>
                <tr>
                  <td> <input type='hidden' name='idplanta' value='<?php echo $fila['idplanta']
                  ; ?>' readonly class='form-control-plaintext'> </td>
                  <td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='precio' value='<?php echo $fila['precio']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='hidden' name='numeroEjemplares' value='<?php echo $fila['numeroEjemplares']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='hidden' name='id_reservado' value='<?php echo $fila['id_reservado']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <?php echo "<td><img style='width:100px' src='../../menuAdministrador/adminOpciones/" . $fila['ruta_imagen'] . "'</td>"; ?>
                  <td>
                    <input type='submit' name='Devolver' value='Anular' class='btn btn-danger'>
                  </td>
                </tr>
              </form>
            </tbody>
            <?php
            }
            ?>
        </table>
      </div>
    </div>
  </div>
  <?php
  if ($contador == 0) {

    echo '<div class="container contenido1 mt-3">';
    echo ' <table class="table table-striped">';
    echo "<tr>";
    echo "<td>No hay plantas en el carrito.</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  }

  if ($contador > 0) {
    $total = 0;
    $consulta = "SELECT precio FROM clientes_tablas WHERE id_cliente='$idC'";
    $paquete = $db->query($consulta);

    while ($fila = $paquete->fetch_array()) {

      $total = $total + $fila['precio'];
    }
    ?>

    <div class="container contenido1 mt-3">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead class=" thead-inverse">
              <tr>
                <th>Total:</th>
              </tr>
            </thead>
            <tbody>
              <form method='POST' action='devolucionPlantas.php'>
                <td>
                  <?php echo $total; ?> €
                </td>
                <td>
                  <div id="paypal-button-container"></div>
                  <input type='submit' name='pagar' value='pagar' class='btn btn-info'>
                  <script>
                    paypal.Buttons({
                      // Order is created on the server and the order id is returned
                      createOrder() {
                        return fetch("/my-server/create-paypal-order", {
                          method: "POST",
                          headers: {
                            "Content-Type": "application/json",
                          },
                          // use the "body" param to optionally pass additional order information
                          // like product skus and quantities
                          body: JSON.stringify({
                            cart: [
                              {
                                sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                                quantity: "YOUR_PRODUCT_QUANTITY",
                              },
                            ],
                          }),
                        })
                          .then((response) => response.json())
                          .then((order) => order.id);
                      },
                      // Finalize the transaction on the server after payer approval
                      onApprove(data) {
                        return fetch("/my-server/capture-paypal-order", {
                          method: "POST",
                          headers: {
                            "Content-Type": "application/json",
                          },
                          body: JSON.stringify({
                            orderID: data.orderID
                          })
                        })
                          .then((response) => response.json())
                          .then((orderData) => {
                            // Successful capture! For dev/demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            const transaction = orderData.purchase_units[0].payments.captures[0];
                            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                            // When ready to go live, remove the alert and show a success message within this page. For example:
                            // const element = document.getElementById('paypal-button-container');
                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            // Or go to another URL:  window.location.href = 'thank_you.html';
                          });
                      }
                    }).render('#paypal-button-container');
                  </script>
                </td>
              </form>
              <?php
  }
  ?>
            </form>
          </tbody>
        </table>

        <?php

}

if (isset($_POST['pagar'])) {

  //$totalC = $total;?idplanta='$totalC'
  echo ' <meta http-equiv="Refresh" content="0.2;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/paypalPago.php">';
}

if (isset($_POST['Devolver'])) {
  $contadorNumPlantas = $_POST["numeroEjemplares"];
  $contador = $contador + 1;
  $contadorNumPlantas = $contadorNumPlantas + 1;

  $I = $_POST["idplanta"];

  $idAlqu = $_POST["id_reservado"];

  $consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);


  $consulta = "DELETE FROM conector WHERE id_reservado='$idAlqu'";
  $paquete = $db->query($consulta);
  echo ' <meta http-equiv="Refresh" content="0.5;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/devolucionPlantas.php">';
  //  ob_start();
  //  header("Location:/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/devolucionPlantas.php");

}

require("./template/pie.php");
$db->close();

?>