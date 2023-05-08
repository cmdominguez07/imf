<?php
require_once("conexion.php");
require_once("./template/cabeceraLoginYGuardar.php");

if (!isset($_POST["submit"])) {

        ?>

        <form class="d-flex justify-content-left align-items-center p-5" method="post" action="guardarCliente.php"
                name="registration">
                <img src="./img/Captura.png" class="w-25 p-5 m-5">
                <div class="row d-flex justify-content-left align-items-center p-5 py-2">
                        <h3 style="color:black"> Introduce aquí tus datos</h3>
                        <label>Nombre</label>
                        <input type="text" name="nombreCliente" id="nombreCliente" class="form-control"
                                placeholder="Nombre Usuario" required />
                        <label>Apellido</label>
                        <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control"
                                placeholder="Apellido Usuario" required />
                        <label>Contraseña</label>
                        <input type="password" name="passWordCliente" id="passWordCliente" class="form-control"
                                placeholder="Escribir contraseña" required />
                        <label>Código nuevo Administrador</label>
                        <input type="number" name="codigoAdmin" id="codigoAdmin" class="form-control" placeholder="123" />
                        <br>
                        <input type="submit" name="submit" class="btn btn-secondary w-25" value="Enviar">
                </div>
        </form>
        </div>
        </div>
        <?php

} else {

        $N = $_POST["nombreCliente"];
        $A = $_POST["apellidoCliente"];
        $PSC = $_POST["passWordCliente"];
        $Codigo = $_POST["codigoAdmin"];

        $P = base64_encode($PSC);



        if ($Codigo == '776655') {

                $consulta = "INSERT INTO clientesclub (id_cliente,nombreCliente,apellidoCliente,tipoCliente,passWordCliente) VALUES (' ','$N','$A','Administrador','$P') ";
                $paquete = $db->query($consulta);
                ?>
                <div class=" pt-5">
                        <h4>Cuenta de Administrador creada</h4>
                </div>
                <meta http-equiv="Refresh" content="0.9;url=/TFG/proyectoGreen/login/index.php">

                <?php
        } else {
                $consulta = "INSERT INTO clientesclub (id_cliente,nombreCliente,apellidoCliente,tipoCliente,passWordCliente) VALUES (' ','$N','$A','Cliente','$P') ";
                $paquete = $db->query($consulta);

                ?>
                <div class=" pt-5">
                        <h4>Cuenta de usuario creada</h4>
                </div>
                <meta http-equiv="Refresh" content="0.9;url=/TFG/proyectoGreen/login/index.php">

                <?php
        }

        ?>
        <table>
                <tr>
                        <td>
                                <h3>Datos agregados</h3>
                                <meta http-equiv="Refresh" content="0.9;url=/TFG/proyectoGreen/login/index.php">
                        </td>
                </tr>
        </table>
        </div>
        </div>
        <?php
}

require("./template/pieLoginYGuardar.php");
$db->close();
?>