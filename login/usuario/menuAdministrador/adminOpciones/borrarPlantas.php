<?php
session_start();
ob_start();
require_once("conexion.php");
require_once("./template/cabecera.php");

/*echo "<h5 style='color:white'>". $_SESSION['nombreCliente']."</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];
?>

<form method="post" class="d-flex justify-content-center align-items-center" action="verDisponibilidad.php">
  <input type="text" class="form-control " name="nombrePlanta" required>
  <input type="submit" class="btn btn-secondary mx-1 material-symbols-rounded" name="buscar" value="search">
</form>
<div class="navbar-mx-2 VolverDerecha">
  <a href='../menuAdministrador.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
      Volver</span></a>
</div>
</div>
</nav>
<div class="container py-5 d-flex justify-content-center align-items-center h-100">
  <div class="row">
    <div class="col-12 my-5 py-5">
      <table class="table table-striped mt-3 px-2">
        <thead class=" thead-inverse pt-5">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Imagen</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if (!isset($_POST['submit'])) {

            $consulta = "select * from plantas";
            $paquete = $db->query($consulta);

            while ($fila = $paquete->fetch_array()) {
              ?>
              <form method='POST' action='borrarPlantas.php'
                class="container-fluid d-flex justify-content-center align-items-center mt-2">
                <tr>
                  <td> <input type='text' name='idplanta' value='<?php echo $fila['idplanta']
                  ; ?>' readonly class='form-control-plaintext'> </td>
                  <td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='precio' value='<?php echo $fila['precio']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']
                  ; ?>' readonly class='form-control-plaintext'></td>
                  <td><img style='width:100px' src='<?php
                  echo $fila['ruta_imagen']; ?> '></td>
                  <td>
                    <input type='submit' name='Editar' value='Editar' class='btn btn-info'>
                  </td>
                  <td>
                    <input type='submit' name='Borrar' value='Borrar' class='btn btn-danger'>
                  </td>
                </tr>
              </form>
            </tbody>
            <?php
            }
            ?>

        </table>
      </div>
    </div>

    <?php
          }

          if (isset($_POST['Editar'])) {

            $IPP = $_POST['idplanta'];
            header("Location:/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/actualizarPlantas.php?idplanta=$IPP");
          }

          if (isset($_POST['Borrar'])) {


            $I = $_POST["idplanta"];
            $consulta = "DELETE FROM plantas WHERE idplanta='$I'";
            $paquete = $db->query($consulta);

            ?>

    <meta http-equiv="Refresh"
      content="0.3;url=/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/borrarPlantas.php">
    <div class="navbar-mx-5 VolverDerecha">
      <a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
          Volver</span></a>
    </div>
    </nav>

    <h3>Eliminado</h3>

    <?php

          }

          require_once("./template/pie.php");
          ob_end_flush();
          $db->close();
          ?>