<?php
require("conexion.php");
require("./template/cabecera.php");
require("./template/accesibilidad.php");
session_start();
/*<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];


$NombreC = $_SESSION['nombreCliente'];
$C = $_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];

if (!isset($_POST['submit'])) {
  $consulta = $consulta = "SELECT * FROM `plantas` WHERE plantas.TipoPlanta='Interior'";
  $paquete = $db->query($consulta);

  ?>

<form method="post" class="d-flex justify-content-center align-items-center" action="buscadorPlantasCliente.php">
  <input type="text" class="form-control " name="nombrePlanta" required>
  <input type="submit" class="btn btn-secondary mx-1 material-symbols-rounded" name="buscar" value="search">
</form>
    <a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 18px;">&#8592;
        Volver</span></a>

  </nav>

  <div class="container-fluid contenido1 pt-2">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead class=" thead-inverse">
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Ref.</th>
              <th>Tipo</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($fila = $paquete->fetch_array()) {
              ?>

              <form method='POST' action='reservaPlantaInterior.php'>
                <tr>
                  <td> <input type='hidden' name='idplanta' value='<?php echo $fila['idplanta']; ?>' readonly
                      class='form-control-plaintext'> </td>
                  <td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']; ?>' readonly
                      class='form-control-plaintext'></td>
                      <td><input type='text' name='numeroEjemplares' value='<?php echo $fila['numeroEjemplares']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><input type='text' name='precio' value='<?php echo $fila['precio']; ?>' readonly
                      class='form-control-plaintext'></td>
                  <td><img style='width:100px'
                      src='../../menuAdministrador/adminOpciones/<?php echo $fila['ruta_imagen']; ?>'> </td>
                      
                  <td><input type='submit' class='btn btn-primary' name='submit' value='Añadir a la cesta'></td>
                </tr>
              </form>
            </tbody>
            <?php
            }
            ?>
        </table>
       
  <?php
} else {


  $contadorNumPlantas = $_POST["numeroEjemplares"];
  $I = $_POST["idplanta"];
  ?>
  <a href="./reservaPlantaInterior.php" style="text-decoration:none;"><span
  style="color: white; font-size: 18px;">&#8592; Volver</span></a>
</div>
</nav>
<?php
  $consulta = "select * from plantas WHERE idplanta='$I'";
  $paquete = $db->query($consulta);
  //$paquete=mysqli_query($conexion, $consulta);


  while ($fila = $paquete->fetch_array()) {

    $N = $fila['nombrePlanta'];
    $L = $fila['codigoPlanta'];
    $T = $fila['TipoPlanta'];
    $R = $fila['ruta_imagen'];
 
  }
  if ($contadorNumPlantas > 0) {

    $contadorNumPlantas = $contadorNumPlantas - 1;

    $consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' ";
    $paquete = $db->query($consulta);


    ?>
    <div class="container-fluid contenido1 pt-2">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead class=" thead-inverse">
              <tr>
                <th> </th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Tipo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <td>
                <h4>Añadida al carrito: </h4>
              </td>
              <td>
                <?php echo "$N"; ?>
              </td>
              <td>
                <?php echo "$L"; ?>
              </td>
              <td>
                <?php echo "$T"; ?>
              </td>
              <td>
              <td><img style='width:100px'
                      src='../../menuAdministrador/adminOpciones/<?php echo $R; ?>'>
              </td>
  </tr>
              <tbody>
          </table>
 
          <?php

          $consulta = "INSERT INTO conector (f_idplanta, f_idCliente) VALUES ('$I', '$idC')";
          $paquete = $db->query($consulta);
    //$paquete=mysqli_query($conexion, $consulta);

  } else {
    ?>  
  <div class="container-fluid contenido1 pt-2">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
            <tr>
              <td> El producto que has elegido no está disponible.</td>
            </tr>
          </table>
          <meta http-equiv="Refresh" content="1;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaInterior.php">
          <?php
  }
}


require("./template/pie.php");
$db->close();
?>