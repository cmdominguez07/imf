<?php


require("conexion.php");
require("template/cabecera.php");
session_start();
$_SESSION['nombreCliente'];
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];


?>
<div class="navbar-mx-5 VolverDerecha">
  <a href='../menuAdministrador.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
      Volver</span></a>
</div>
</nav>

<div class="container-fluid pt-5 fnd">
 

        <?php

        /*echo "holo " . $_GET['idplanta'];*/
        if (!isset($_POST["Actualizar1"])) {
          $I = $_GET['idplanta'];
          $consulta = "select * from plantas where idplanta='$I'";
          $paquete = $db->query($consulta);

?>
          <form method='POST' name='validarActualizar' class='form-vertical pt-5 mx-3' action='plantasActConExito.php'
          enctype='multipart/form-data' autocomplete='off' >

          <?php
          while ($fila = $paquete->fetch_array()) {
            
 
?>
         

                <input type='hidden' class='form-control my-1' name='idplanta' value='<?php echo $I ?>'>
                <br>
                <label class='col-sm-2 control-label  my-1'>Nombre</label>
                <input type='text' class='form-control mt-1' name='nombrePlanta'
                  value='<?php echo $fila['nombrePlanta']; ?>'>
                <br>
                <label class='col-sm-2 control-label  my-1'>Código</label>
                <input type='number' class='form-control mt-1' name='codigoPlanta'
                  value='<?php echo $fila['codigoPlanta']; ?>'>
                <br>
                <label class='col-sm-2 control-label my-1'>Cantidad</label>
                <input type='number' class='form-control mt-1' name='numeroEjemplares'
                  value='<?php echo $fila['numeroEjemplares']; ?>'>
                <br>
                <label class='col-sm-2 control-label my-1'>Precio</label>
                <input type='number' class='form-control mt-1' name='precio' value='<?php echo $fila['precio']; ?>'>

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

               <input type='submit' class='btn btn-success  my-2' name='Actualizar1' value='Actualizar'> 
       

            <?php
          }
        }
        ?>
     </form>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php

if (isset($_POST["Actualizar1"])) {

  $IPP = $_GET['idplanta'];
  header("Location:/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/plantasActConExito.php?idplanta=$IPP");

}
require("template/pie.php");

$db->close();
?>