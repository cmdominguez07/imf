<?php


require_once("conexion.php");
require_once("./template/cabecera.php");
session_start();
$_SESSION['nombreCliente'];
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];


?>
<div class="navbar-mx-5 VolverDerecha">
  <a href='../menuAdministrador.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
      Volver</span></a>
</div>
</nav>

<div class="container-fluid pt-5 fnd">
  <div class="row mx-0  d-flex justify-content-center align-items-center f">
    <div class="col-12 pt-5 my-3 w-75 f">
      <table class="table mx-5">

        <?php





        /*echo "holo " . $_GET['idplanta'];*/
        if (!isset($_POST["Actualizar1"])) {
          $I = $_GET['idplanta'];
          $consulta = "select * from plantas where idplanta='$I'";
          $paquete = $db->query($consulta);

          while ($fila = $paquete->fetch_array()) {
            ?>
            <form method='POST' class='form-vertical mx-5' action='plantasActConExito.php' enctype='multipart/form-data'
              autocomplete='off' name='registration'>
              <tr>

                <input type='hidden' class='form-control my-1' name='idplanta' value='<?php echo $I ?>'>
                <br>
                <label class='col-sm-2 control-label  my-1'>Nombre</label>
                <input type='text' class='form-control mt-1' name='nombrePlanta'
                  value='<?php echo $fila['nombrePlanta']; ?>'>
                <br>
                <label class='col-sm-2 control-label  my-1'>Código</label>
                <input type='text' class='form-control mt-1' name='codigoPlanta'
                  value='<?php echo $fila['codigoPlanta']; ?>'>
                <br>
                <label class='col-sm-2 control-label my-1'>Cantidad</label>
                <input type='text' class='form-control mt-1' name='numeroEjemplares'
                  value='<?php echo $fila['numeroEjemplares']; ?>'>
                <br>
                <label class='col-sm-2 control-label my-1'>Precio</label>
                <input type='text' class='form-control mt-1' name='precio' value='<?php echo $fila['precio']; ?>'>

                <legend class="mt-2">Tipo de planta</legend>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios1" value="Interior">
                  <label class="form-check-label" for="optionsRadios1">Interior </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios2" value="Exterior">
                  <label class="form-check-label" for="optionsRadios2">Exterior</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios3" value="Medicinal">
                  <label class="form-check-label" for="optionsRadios3">Medicinal</label>
                </div>
                <input type="file" class="form-control my-2" id="archivo" name="archivo" accept="image/*">

                <td><input type='submit' class='btn btn-success  my-2' name='Actualizar1' value='Actualizar'> </td>

              </tr>
            </form>

            <?php
          }
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<?php

if (isset($_POST["Actualizar1"])) {
  $IPP = $_GET['idplanta'];
  header("Location:/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/plantasActConExito.php?idplanta=$IPP");

  /*
  $I = $_POST["idplanta"];
  $N = $_POST["nombrePlanta"];
  $P = $_POST["codigoPlanta"];
  $NE = $_POST["numeroEjemplares"];
  $TP1 = $_POST["tipoPlanta"];
  $foto = $_FILES["archivo"]["name"];
  $nameTemporal = $_FILES["archivo"]["tmp_name"];
  $id_insert = $db->insert_id;
  $ruta = 'files/' . $id_insert . '/';
  $archivo = $ruta . $_FILES["archivo"]["name"];
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
  if ($TP1 != "") {
  $consulta = "UPDATE plantas SET TipoPlanta='$TP1' WHERE idplanta='$I' ";
  $paquete = $db->query($consulta);
  }
  if ($archivo != "files/0/") {
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
  echo "<td> <input type='text' name='idplanta' value='" . $fila['idplanta'] . "' readonly class='form-control-plaintext' > </td>";
  echo "<td><input type='text' name='nombre' value='" . $fila['nombrePlanta'] . "' readonly class='form-control-plaintext'></td>";
  echo "<td><input type='text' name='codigo' value='" . $fila['codigoPlanta'] . "'readonly class='form-control-plaintext'></td>";
  echo "<td><img style='width:200px' src='" . $fila['ruta_imagen'] . "'></td>";
  }
  
  ?>
  </tbody>
  <div>
  </div>
  </div>
  
  <?php*/
}
require_once("./template/pie.php");

$db->close();
?>