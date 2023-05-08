<?php
include("conexion.php");
include("./template/cabeceraMCLiente.php");
session_start();


?>
<!--//ver Bien<input type="submit" class="btn btn-success" name="cantidad" value="////Lista de productos comprados/////" onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/listarPelisAlquiladas.php">
-->

<div id="inicioBV" class="container-fluid d-flex align-items-center py-5">
   <!--<img class="fotoInicio" src="./img/florRosa.jpg" alt="">-->
   <div id="inicioBV2" class="row justify-content-left align-items-center py-5">
      <?php
      echo "<h1 class='mt-5' style='color:#78c2ad'>¡Hola " . $_SESSION['nombreCliente'] . "!</h1>";


      $_SESSION['passWordCliente'];
      $_SESSION['id_cliente'];

      $N = $_SESSION['nombreCliente'];

      $C = $_SESSION['passWordCliente'];


      $idC = $_SESSION['id_cliente'];
      include("./template/pie.php");
      $db->close();
      ?>