<?php
require_once("conexion.php");
require_once("./template/cabecera.php");
session_start();
/*<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];


$NombreC = $_SESSION['nombreCliente'];
$C = $_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];

if (!isset($_POST['submit'])) {
  $consulta = $consulta = "SELECT * FROM `plantas` WHERE plantas.TipoPlanta='Exterior'";
  $paquete = $db->query($consulta);

  ?>
    <a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 18px;">&#8592;
        Volver</span></a>
  <!--<li>
      <a type="submit" class='btn btn-secondary mx-2' name="submit" value="Consultar" onclick=location.href="adminOpciones/verDisponibilidad.php">Consultar disponibilidad</a>
      </li>-->
  </nav>

  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead class=" thead-inverse">
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Ref.</th>
              <th>Tipo</th>
              <th>Precio</th>
              <th>Imagen</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($fila = $paquete->fetch_array()) {
              ?>

              <form method='POST' action='reservaPlantaExterior.php'>
                <tr>
                  <td> <input type='hidden' name='idplanta' value='<?php echo $fila['idplanta']; ?>' readonly
                      class='form-control-plaintext'> </td>

                  <td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='precio' value='<?php echo $fila['precio']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><img style='width:200px'
                      src='../../menuAdministrador/adminOpciones/<?php echo $fila['ruta_imagen']; ?>'> </td>
                  <td><input type='hidden' name='numeroEjemplares' value='<?php echo $fila['numeroEjemplares']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='submit' class='btn btn-primary' name='submit' value='Añadir a la cesta'></td>
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
} else {


  $contadorNumPlantas = $_POST["numeroEjemplares"];
  $I = $_POST["idplanta"];

  $consulta = "select * from plantas WHERE idplanta='$I'";
  $paquete = $db->query($consulta);
  //$paquete=mysqli_query($conexion, $consulta);


  while ($fila = $paquete->fetch_array()) {

    $N = $fila['nombrePlanta'];
    $L = $fila['codigoPlanta'];
  }
  if ($contadorNumPlantas > 0) {

    $contadorNumPlantas = $contadorNumPlantas - 1;

    $consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' ";
    $paquete = $db->query($consulta);
    //$paquete=mysqli_query($conexion, $consulta);

    $consulta = "select * from plantas WHERE idplanta='$I' ";
    $paquete = $db->query($consulta);
    //$paquete=mysqli_query($conexion, $consulta);

    ?>
    <li class="mx-5">
      <a href="./reservaPlantaExterior.php" style="text-decoration:none;"><span
          style="color: white; font-size: 20px;">&#8592; Volver</span></a>
    </li>
    <!--<li>
        <a type="submit" class='btn btn-secondary mx-2' name="submit" value="Consultar" onclick=location.href="adminOpciones/verDisponibilidad.php">Consultar disponibilidad</a>
        </li>-->
    </div>
    </nav>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead class=" thead-inverse">
              <tr>
                <th> </th>
                <th>Nombre</th>
                <th>Código</th>
              </tr>
            </thead>
            <tbody>
              <td>
                <h4>Planta reservada: </h4>
              </td><br>
              <td>
                <?php echo "$N"; ?>
              </td>
              <td>
                <?php echo "$L"; ?>
              </td>
              </tr>
          </table>

          <?php
          
          $consulta = "INSERT INTO conector (f_idplanta, f_idCliente) VALUES ('$I', '$idC')";
          $paquete = $db->query($consulta);
    //$paquete=mysqli_query($conexion, $consulta);

  } else {
    ?>
          <table width=400>
            <tr>
              <td> El producto que has elegido no está disponible.</td>
            </tr>
            <td> <a href='../menuCliente/menuClientes.php' style='text-decoration:none;'><span font-size:
                  20px;>&#8592;</span></a></td>
          </table>
          <?php
  }
}

require_once("./template/pie.php");
$db->close();
?>