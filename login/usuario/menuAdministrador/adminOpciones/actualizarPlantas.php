<?php


include("conexion.php");
include("./template/cabecera.php");
session_start();
$_SESSION['nombreCliente'];
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];



?>
<div class="navbar-mx-5 VolverDerecha">
    <a href='../menuAdministrador.php' style='text-decoration:none;'><span
        style='color: white; font-size: 20px;'>&#8592; Volver</span></a>
</div>


</nav>

<div class="container mt-3">
  <div class="row">
    <div class="col-12">


      <?php



      if (!isset($_POST["Actualizar"])) {

        /*echo "holo " . $_GET['idplanta'];*/

        $I = $_GET['idplanta'];
        ?>
        <form method='POST' class='form-horizontal mx-3' action='actualizarPlantas.php' enctype='multipart/form-data'
          autocomplete='off' name='registration'>
          <tr>

            <td><input type='hidden' class='form-control m-1' name='idplanta' value=" . $I . "> </td>
            <br><td><label class='col-sm-2 control-label  m-1'>Nombre</label></td>
            <td><input type='text' class='form-control m-1' name='nombrePlanta'></td>
            <br><td><label class='col-sm-2 control-label  m-1'>Código</label></td>
            <td><input type='text' class='form-control m-1' name='codigoPlanta'></td>
            <br><td><label class='col-sm-2 control-label m-1'>Cantidad</label></td>
            <td><input type='text' class='form-control m-1' name='numeroEjemplares'></td>
            <br><td><label class='col-sm-2 control-label  m-1'>Tipo</label></td>
            <td><input type='text' class='form-control  m-1' name='TipoPlanta'></td>

            <input type="file" class="form-control m-1" id="archivo" name="archivo" accept="image/*">

            <td><input type='submit' class='btn btn-success  m-1' name='Actualizar' value='Actualizar'> </td>

          </tr>
        </form>

        </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
      } else {
        if ($_FILES["archivo"]["error"] > 0) {

          echo "Error al cargar archivo";
        } else {

          $I = $_POST["idplanta"];
          $N = $_POST["nombrePlanta"];
          $P = $_POST["codigoPlanta"];
          $NE = $_POST["numeroEjemplares"];
          $TP = $_POST["TipoPlanta"];
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

          if ($TP != "") {

            $consulta = "UPDATE plantas SET TipoPlanta='$TP' WHERE idplanta='$I' ";
            $paquete = $db->query($consulta);
          }
          if ($archivo != "") {



            $consulta = "UPDATE plantas SET ruta_imagen='$archivo' WHERE idplanta='$I' ";
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


              echo "<td> <input type='text' name='idplanta' value='" . $fila['idplanta'] . "' readonly class='form-control-plaintext' > </td>";
              echo "<td><input type='text' name='nombre' value='" . $fila['nombrePlanta'] . "' readonly class='form-control-plaintext'></td>";
              echo "<td><input type='text' name='codigo' value='" . $fila['codigoPlanta'] . "'readonly class='form-control-plaintext'></td>";
              echo "<td><img style='width:200px' src='" . $fila['ruta_imagen'] . "'></td>";
            }
        }
      }

      ?>
      </tbody>
      <div>
      </div>
  </div>


  <?php
  include("./template/pie.php");

  $db->close();
  ?>