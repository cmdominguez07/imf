<?php
require("conexion.php");
require("./template/cabeceraLoginYGuardar.php");
require("./template/accesibilidad.php");

if (!isset($_POST["submit"])) {

        ?>
        <div class="cont">
                <form class="d-flex justify-content-left align-items-center p-5 mx-2" method="post" action="guardarCliente.php"
                        name="registration">
                        <img src="./img/Captura.png" class="w-25 p-5 m-5 rounded-circle">
                        <div class="row d-flex justify-content-left align-items-center p-5 my-5 py-4">
                                <h3 style="color:black"> Introduce aquí tus datos</h3>
                                <label class="label label-primary my-1">Nombre</label>
                                <input type="text" name="nombreCliente" id="nombreCliente" class="form-control my-1"
                                        placeholder="Nombre Usuario" required />
                                <label class="label label-primary my-1">Apellido</label>
                                <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control my-1"
                                        placeholder="Apellido Usuario" required />
                                <label class="label label-primary">Contraseña</label>
                                <input type="password" name="passWordCliente" id="passWordCliente" class="form-control my-1"
                                        placeholder="Escribir contraseña" required />
                                <label class="label label-primary my-1">Código nuevo Administrador</label>
                                <input type="password" name="codigoAdmin" id="codigoAdmin" class="form-control my-1"
                                        placeholder="123" />
                                <br>
                                <input type="submit" name="submit" class="btn btn-secondary w-25 my-3" value="Enviar">
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
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-5">

                                <h3 class="font-weight-bold text-center">Datos agregados</h3>
                                <meta http-equiv="Refresh" content="0.7;url=/TFG/proyectoGreen/login/usuario/loginCliente.php">
                        </div>

                        <?php
        } else {
                $consulta = "INSERT INTO clientesclub (id_cliente,nombreCliente,apellidoCliente,tipoCliente,passWordCliente) VALUES (' ','$N','$A','Cliente','$P') ";
                $paquete = $db->query($consulta);

                ?>
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-5">

                                <h3 class="font-weight-bold text-center">Datos agregados</h3>
                                <meta http-equiv="Refresh" content="0.7;url=/TFG/proyectoGreen/login/usuario/loginCliente.php">
                        </div>
                        <?php
        }

        ?>
                <div class="container-fluid d-flex align-items-center justify-content-center pt-5">

                        <h3 class="font-weight-bold text-center">Datos agregados</h3>
                        <meta http-equiv="Refresh" content="0.7;url=/TFG/proyectoGreen/login/usuario/loginCliente.php">
                </div>
        </div>
        <?php
}

require("./template/pieLoginYGuardar.php");
$db->close();
?>