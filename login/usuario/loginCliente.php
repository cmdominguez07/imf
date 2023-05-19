<?php
session_start();
require("conexion.php");
require("./template/cabeceraLoginYGuardar.php");
require("./template/accesibilidad.php");
?>


<div class="row d-flex justify-content-end align-items-center container-fluid" id="fondo">
  <form class="d-flex justify-content-end align-items-center w-50" method="post" action="loginCliente.php"
    name="registration">
    <!-- <img id="fotoInicio" class="col-lg-3 col-md-6 col-sm-12 m-5" src="./img/a45161a849f445e9919ea1b911cbaac9.png" alt="">-->
    <div class="m-0 row justify-content-left">
      <label class="col-form-label mt-3" for="inputInicio">Nombre</label>
      <input type="text" name="nombreCliente" placeholder="Escribe tu nombre" class="form-control" id="inputInicio"
        required />
      <label class="col-form-label mt-3" for="inputInicio1">Contraseña</label>
      <input type="password" name="passWordCliente" placeholder="Escribe tu contraseña" class="form-control"
        id="inputInicio1" required />
      <input type="submit" name="submit" class="btn btn-primary w-25 mt-3 " value="Entrar">
    </div>
  </form>
</div>

<?php

if (!isset($_POST["submit"])) {

} else {


  $_SESSION['nombreCliente'] = $_POST['nombreCliente'];
  $_SESSION['passWordCliente'] = $_POST['passWordCliente'];

  if (empty($_POST['nombreCliente']) && empty($_POST['passWordCliente'])) {

    echo "<p> Los campos son obligatorios";
  } else {

    $consulta = "select * from clientesClub";
    $paquete = $db->query($consulta);

    $new_password=base64_encode($_POST['passWordCliente']);

    $encontrado = 0;

    while ($fila = $paquete->fetch_array()) {

      
      $CBD=$fila['passWordCliente'];


      if ($_SESSION['nombreCliente'] == $fila['nombreCliente'] and (base64_encode($new_password) == base64_encode($CBD))) {
        $encontrado = 1;

        echo "intro" . $CBD ."  bd ". $new_password;
        $_SESSION['id_cliente'] = $fila['id_cliente'];


        if ($fila['tipoCliente'] == 'Cliente') {

          header('Location: /TFG/proyectoGreen/login/usuario/menuCliente/menuClientes.php');


        } else if ($fila['tipoCliente'] == 'Administrador') {

          header('Location: /TFG/proyectoGreen/login/usuario/menuAdministrador/menuAdministrador.php');
        }

      } else {
        $encontrado == 0;

      }
    }

    if ($encontrado == 0) {
      echo "<html><body><h1 style='color:black'>Usuario o contraseña incorrecto.</h1></body></html>";

    }
  }
}
require("./template/pieLoginYGuardar.php");
$db->close();
?>