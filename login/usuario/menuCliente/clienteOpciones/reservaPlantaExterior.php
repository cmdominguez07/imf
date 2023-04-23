<?php
include("conexion.php");
include("./template/cabecera.php");

session_start();
/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];


$NombreC = $_SESSION['nombreCliente'];

$C = $_SESSION['passWordCliente'];

$idC = $_SESSION['id_cliente'];




if (!isset($_POST['submit'])) {
  $consulta = $consulta = "SELECT * FROM `plantas` WHERE plantas.TipoPlanta='Exterior'";
  $paquete = $db->query($consulta);

  ?> ?>
  <li class="mx-5">
    <a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 20px;">&#8592;
        Volver</span></a>
  </li>
  <!--<li>
      <a type="submit" class='btn btn-secondary mx-2' name="submit" value="Consultar" onclick=location.href="adminOpciones/verDisponibilidad.php">Consultar disponibilidad</a>
      </li>-->
  </div>

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
              echo "<form method='POST' action='reservaPlantaExterior.php' >";
              echo "<tr>";
              echo "<td> <input type='hidden' name='idplanta' value='" . $fila['idplanta'] . "' readonly class='form-control-plaintext' > </td>";

              echo "<td><input type='text' name='nombre' value='" . $fila['nombrePlanta'] . "' readonly class='form-control-plaintext'></td>";
              echo "<td><input type='text' name='codigo' value='" . $fila['codigoPlanta'] . "'readonly class='form-control-plaintext'></td>";
              echo "<td><input type='text' name='TipoPlanta' value='" . $fila['TipoPlanta'] . "'readonly class='form-control-plaintext'></td>";
              echo "<td><input type='text' name='precio' value='" . $fila['precio'] . "'readonly class='form-control-plaintext'></td>";
              echo "<td><img style='width:200px' src='../../menuAdministrador/adminOpciones/" . $fila['ruta_imagen'] . "'</td>";
              echo "<td><input type='hidden' name='numeroEjemplares' value='" . $fila['numeroEjemplares'] . "'readonly class='form-control-plaintext'></td>";
              echo "<td>", " <input type='submit' class='btn btn-primary' name='submit' value='Añadir a la cesta'>", " </td>";
              echo "</tr>";
              echo "</form>";

              echo "</tbody>";

            }

            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

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
                  <?php
                  echo "<td><h4 >Planta reservada: </h4></td><br>";
                  echo "<td >" . "$N" . "</td>";
                  echo "<td> " . "$L" . "</td>";

                  echo "</tr>";
                  echo "</table>";



                  $consulta = "INSERT INTO conector (f_idplanta, f_idCliente) VALUES ('$I', '$idC')";
                  $paquete = $db->query($consulta);
    //$paquete=mysqli_query($conexion, $consulta);


  } else {

    echo '  <table width=400>';
    echo "<tr><td > El producto que has elegido no está disponible.</td></tr>";
    echo "<td> <a href='../menuCliente/menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592;</span></a></td>";
    echo "</table>";
  }
}

include("./template/pie.php");

$db->close();
?>