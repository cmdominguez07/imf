<?php
include("conexion.php");

include("./template/cabecera.php");
session_start();
echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";
$_SESSION['passWordCliente'];
$idid = $_SESSION['id_cliente'];

$N = $_SESSION['nombreCliente'];

$C = $_SESSION['passWordCliente'];

?>

</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class=" thead-inverse">
                    <tr>

                        <th>ID</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>ID Usuario</th>
                        <th>Nombre Usuario</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    if (!isset($_POST['submit'])) {
                        $consulta = "select * from mensajes";
                        $paquete = $db->query($consulta);

                        while ($fila = $paquete->fetch_array()) {

                            echo "<form method='POST' action='verMensajes.php' >";
                            echo "<tr>";
                            echo "<td> <input type='text' name='id' value='" . $fila['id_mensaje'] . "'  readonly class='form-control-plaintext' > </td>";
                            echo "<td><input type='text' name='email' value='" . $fila['email'] . "'  readonly class='form-control-plaintext' ></td>";
                            echo "<td><input type='text' name='mensaje' value='" . $fila['mensaje'] . "'  readonly class='form-control-plaintext' ></td>";
                            echo "<td><input type='text' name='nombreCM' value='" . $fila['nombre_cliente_msj'] . "'  readonly class='form-control-plaintext' ></td>";
                            echo "<td>", " <input type='submit' class='btn btn-danger' name='submit' value='Contestar'>", " </td>";



                        }
                        ?>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
                    } else {
                        ?>
        <meta http-equiv='Refresh'
            content='0.4;url=/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/contestarMensajes.php'>

        <?php

                    }

                    include("./template/pie.php");

                    $db->close();
                    ?>