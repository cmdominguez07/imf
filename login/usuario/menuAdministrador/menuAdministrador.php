<?php
include("conexion.php");
include("./template/cabeceraAdmin.php");
include("./template/accesibilidad.php");
session_start();

?>

<div class="container-fluid d-flex align-items-center fd">
  <!--<img class="fotoInicio" src="./img/florRosa.jpg" alt="">-->
  <div class="row justify-content-left align-items-center ">

    <?php
    echo "<h1 class='mt-5 pt-5' style='color:#78c2ad'>¡Hola " . $_SESSION['nombreCliente'] . "!</h1>";
    ?>

    <div class=" d-flex align-items-center mb-0 justify-content-center">
      <div>
        <img src="./img/nenufarFavicon1.jpg">
      </div>
      <div class=" row m-5  align-items-center">
        <input type="submit" class='btn btn-success botonI' name="submit" value="Listado de clientes"
          onclick=location.href="/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/verClientes.php">
        <input type="submit" class='btn btn-success botonI mt-4' name="submit" value="Registro de plantas"
          onclick=location.href="/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/borrarPlantas.php">
        <input type="submit" class='btn btn-success botonI mt-4' name="submit" value="Registrar planta nueva"
          onclick=location.href="/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/guardarPlantas.php">
        <input type="submit" class='btn btn-success botonI mt-4' name="submit" value="Mensajes de Usuarios"
          onclick=location.href="/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/vermensajes.php">
          <input type="submit" class='btn btn-success botonI mt-4' name="submit" value="Visitar Tienda Online"
          onclick=location.href="../../usuario/menuCliente/menuClientes.php">
        <p>Codigo para añadir administador: '776655'</p>
      </div>

    </div>
  </div>


  <?php

  $_SESSION['passWordCliente'];
  $_SESSION['id_cliente'];

  $N = $_SESSION['nombreCliente'];

  $C = $_SESSION['passWordCliente'];


  $idC = $_SESSION['id_cliente'];
  include("./template/pieAdmin.php");
  $db->close();
  ?>