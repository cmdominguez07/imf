<?php


require("conexion.php");
require("./template/cabecera.php");
session_start();
/*echo "Usuario: " . $_SESSION['nombreCliente'];*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$I = $_POST["idplanta"];





if (!empty($_POST["nombrePlanta"])) {
  $N = $_POST["nombrePlanta"];
  $consulta = "UPDATE plantas SET nombrePlanta='$N' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}


if (!empty($_POST["codigoPlanta"])) {
  $P = $_POST["codigoPlanta"];
  $consulta = "UPDATE plantas SET codigoPlanta='$P' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}
if (!empty($_POST["numeroEjemplares"])) {
  $NE = $_POST["numeroEjemplares"];
  $consulta = "UPDATE plantas SET numeroEjemplares='$NE' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}

if (!empty($_POST["tipoPlanta"])) {
  $TP = $_POST["tipoPlanta"];
  $consulta = "UPDATE plantas SET TipoPlanta='$TP' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}

if (!empty($_POST["precio"])) {
  $PRE = $_POST["precio"];
  $consulta = "UPDATE plantas SET precio='$PRE' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}

$foto = $_FILES["archivo"]["name"];
$nameTemporal = $_FILES["archivo"]["tmp_name"];
$id_insert = $db->insert_id;
$ruta = 'files/' . $id_insert . '/';
$archivo = $ruta . $_FILES["archivo"]["name"];

if ($archivo != "files/0/" || $_FILES["archivo"]["name"] != "") {



  $consulta = "UPDATE plantas SET ruta_imagen='$archivo' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);

}


$consulta = "select * from plantas where idplanta='$I'";
$paquete = $db->query($consulta);

?>

<div class="navbar-mx-5 VolverDerecha">
  <a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
      Volver</span></a>
</div>
</nav>

<div class="row pt-5 alto">
  <div class="col-12 pt-5 ">
    <table class="table table-striped ">
      <thead class=" thead-inverse">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Código</th>
          <th>Precio</th>
          <th>Tipo</th>
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
          <td><input type='text' name='precio' value=' <?php echo $fila['precio'] ?>' readonly
              class='form-control-plaintext'></td>
          <td><input type='text' name='TipoPlanta' value=' <?php echo $fila['TipoPlanta'] ?>' readonly
              class='form-control-plaintext'></td>
          <td><img style='width:200px' src=' <?php echo $fila['ruta_imagen'] ?>'></td>

          <?php

        }

        ?>
      </tbody>
      </table>
      <div>
      </div>
   

  <?php

  require_once("./template/pie.php");
  $db->close();
  ?>