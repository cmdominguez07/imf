<?php


require_once("conexion.php");
require_once("./template/cabecera.php");
session_start();
echo "Usuario: " . $_SESSION['nombreCliente'];
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$I = $_POST["idplanta"];
$N = $_POST["nombrePlanta"];
$P = $_POST["codigoPlanta"];
$NE = $_POST["numeroEjemplares"];
$TP = $_POST["TipoPlanta"];
$AA = $_POST["archivo"];


if ($N != "") {

  $consulta = "UPDATE plantas SET nombrePlanta='$N' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}


if ($P != "") {

  $consulta = "UPDATE plantas SET codigoPlanta='$P' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}
if ($NE != "") {

  $consulta = "UPDATE plantas SET numeroEjemplares='$NE' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}

if ($TP != "") {

  $consulta = "UPDATE plantas SET TipoPlanta='$TP' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}

if ($AA != "") {


  $consulta = "UPDATE plantas SET ruta_imagen='$AA' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}


$consulta = "select * from plantas where idplanta='$I'";
$paquete = $db->query($consulta);

?>

<div class="navbar-mx-5 VolverDerecha">
  <li>
    <a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
        Volver</span></a>
  </li>
</div>
</nav>

<div class="row">
  <div class="col-12">
    <table class="table table-striped">
      <thead class=" thead-inverse">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Código</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($fila = $paquete->fetch_array()) {
          ?>

          <td> <input type='text' name='idplanta' value=' <?php echo $fila['idplanta'] ?>' readonly
              class='form-control-plaintext'> </td>
          <td><input type='text' name='nombre' value=' <?php echo $fila['nombrePlanta'] ?>' readonly
              class='form-control-plaintext'></td>
          <td><input type='text' name='codigo' value=' <?php echo $fila['codigoPlanta'] ?>' readonly
              class='form-control-plaintext'></td>
          <td><img style='width:200px' src=' <?php echo $fila['ruta_imagen'] ?>'></td>

          <?php

        }

        ?>
      </tbody>
      <div>
      </div>
  </div>

  <?php

  require_once("./template/pie.php");
  $db->close();
  ?>