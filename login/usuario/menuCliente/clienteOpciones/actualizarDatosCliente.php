<?php

require("conexion.php");
require("./template/cabecera.php");
require("./template/accesibilidad.php");
session_start();


$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];
$N = $_SESSION['nombreCliente'];
$idC = $_SESSION['id_cliente'];
$C = base64_encode($_SESSION['passWordCliente']);

?>
<div>
  <a href='../menuClientes.php' style='text-decoration:none; color:white'>&#8592;
    Volver</span></a>
</div>
</nav>


<div class="container contenido1 pt-5 w-50">

    <h4 class="px-3"> Modifica tus datos </h4>

        <?php

        $consulta = "select * from clientesclub where nombreCliente='$N' and passWordCliente='$C'";
        $paquete = $db->query($consulta);

        while ($fila = $paquete->fetch_array()) {
          ?>
          <form method='POST' class='form-horizontal mx-3' action='actualizarDatosCliente.php'
            enctype='multipart/form-data' autocomplete='off' name='registration'>

            <tr>
              <td> <input type='hidden' class='form-control' name='id' value='<?php echo $fila['id_cliente']; ?>'> </td>



              <td> <label class='col-sm-2 control-label  m-1'>Nombre</label></td>

              <td><input type='text' class='form-control' name='nombreAct' value='<?php echo $fila['nombreCliente']; ?>'>
              </td>

              <br>
              <td> <label class='col-sm-2 control-label  m-1'>Apellido</label></td>

              <td><input type='text' class='form-control' name='apellidoAct'
                  value='<?php echo $fila['apellidoCliente']; ?>'></td>

              <br>
              <td> <label class='col-sm-2 control-label  m-1'>Contraseña</label></td>

              <td><input type='text' class='form-control' name='passWordAct'
                  value='<?php echo base64_decode($fila['passWordCliente']); ?>'></td>
                 <!-- $password >= base64_encode ($_GET["password"]);-->

              <br>
              <td><input type='submit' class='btn btn-success' name='submit' value='Actualizar'></td>
            </tr>
            <?php
        }
        ?>
        </form>
 
<?php
if (isset($_POST['submit'])) {
  $I = $_POST["id"];
  $N = $_POST["nombreAct"];
  $A = $_POST["apellidoAct"];
  $P = base64_encode($_POST["passWordAct"]);

  $consulta = "UPDATE clientesclub SET nombreCliente='$N',apellidoCliente='$A',passWordCliente='$P' WHERE id_cliente='$I' ";
  $paquete = $db->query($consulta);

  $consulta = "select * from clientesclub where id_cliente='$I'";
  $paquete = $db->query($consulta);

  echo ' <meta http-equiv="Refresh" content=".51;url=/TFG/proyectoGreen/login/usuario/loginCliente.php">';


}

require("./template/pie.php");
$db->close();
?>