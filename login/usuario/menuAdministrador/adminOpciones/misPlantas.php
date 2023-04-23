<?php
include("conexion.php");
include("./template/cabecera.php");
session_start();
echo "<li class='mx-5'>Usuario: " . $_SESSION['nombreCliente'] . ".  </li>";
?>


<div class="d-flex align-items-center">
  <img src="./img/florRosa.jpg">
  <div class="row justify-content-left align-items-center">
    <div class="m-5 p-5  align-items-center">
      <input type="submit" class='btn btn-success botonI mt-4' name="submit" value=" planta"
        onclick=location.href="/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/borrarPlantas.php">
    </div>
  </div>
</div>


<?php
include("./template/pie.php");
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$N = $_SESSION['nombreCliente'];

$C = $_SESSION['passWordCliente'];


$idC = $_SESSION['id_cliente'];

$db->close();
?>